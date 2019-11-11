<?php

    namespace MoldersMedia\LightspeedApi\Classes\Api;

    use GuzzleHttp\Client;
    use GuzzleHttp\Exception\ClientException;
    use GuzzleHttp\Psr7\Response;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiLimitReachedException;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiSleepTimeException;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\InvalidApiCredentialsException;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\Resources\SupplierExistsException;
    use MoldersMedia\LightspeedApi\Traits\ResourcesTrait;

    /**
     * Class ApiClient
     *
     * @package MoldersMedia\LightspeedApi\Classes\Api
     */
    class ApiClient
    {
        use ResourcesTrait;

        /**
         * The Api Client version (do not change!)
         */
        const CLIENT_VERSION = '1.8.0';
        /**
         * Array with config => property configuration
         * this way we can set now configurable properties quicker
         *
         * @var array
         */
        CONST CONFIG = [
            'max_sleep_time'   => 'sleepMax',
            'extra_sleep_time' => 'extraSleepTime',
            'cluster'          => 'apiServer',
            'language'         => 'apiLanguage',
            'user_secret'      => 'apiSecret',
            'api_key'          => 'apiKey',
            'localhost_url'    => 'localhostUrl',
            'enable_test'      => 'test',
            'test_api_limit'   => 'testEnvMaxApiLength'
        ];
        /**
         * Errors thrown by the API
         */
        const ERRORS_TOO_MANY_REQUESTS = 'Too many requests in this time period. Try again later.';
        CONST ERROR_INVALID_DATA_INPUT = 'Invalid data input.';
        const SERVER_EU1_LIVE = 'https://api.webshopapp.com/';
        const SERVER_HOST_LIVE = 'https://api.webshopapp.com/';
        /**
         * The Api Hosts (do not change!)
         */
        const SERVER_HOST_LOCAL = 'https://api.webshopapp.dev/';
        const SERVER_HOST_TEST = 'https://api.webshopapp.net/';
        const SERVER_US1_LIVE = 'https://api.shoplightspeed.com/';
        const SUPPLIER_EXISTS_ERROR = 'Submitted supplier already exists, try update.';
        /**
         * @var int
         */
        public $apiCallsMade = 0;
        protected $perPage = 2;
        /**
         * The URL of your development location
         *
         * @var
         */
        protected $localhostUrl;
        /**
         * @var int
         */
        protected $sleepMax = 400;
        /**
         * @var int
         */
        protected $extraSleepTime = 10;
        /**
         * @var bool
         */
        protected $test = false;
        /**
         * @var int
         */
        protected $testEnvMaxApiLength = 6;
        /**
         * @var \Psr\Http\Message\ResponseInterface
         */
        protected $request = false;
        /**
         * @var string
         */
        private $apiServer = null;
        /**
         * @var string
         */
        private $apiKey = null;
        /**
         * @var string
         */
        private $apiSecret = null;
        /**
         * @var string
         */
        private $apiLanguage = null;

        /**
         * @param string $apiServer   The api server to use test / live
         * @param string $apiKey      The api key
         * @param string $apiSecret   The api secret
         * @param string $apiLanguage The language to use the api in
         * @param array $config
         * @throws \Exception
         */
        public function __construct($apiServer, $apiKey, $apiSecret, $apiLanguage, array $config = [])
        {
            if (!function_exists('curl_init')) {
                throw new \Exception('WebshopappApiClient needs the CURL PHP extension.');
            }
            if (!function_exists('json_decode')) {
                throw new \Exception('WebshopappApiClient needs the JSON PHP extension.');
            }

            $this->setApiServer($apiServer);
            $this->setApiKey($apiKey);
            $this->setApiSecret($apiSecret);
            $this->setApiLanguage($apiLanguage);
            $this->setConfig($config);
            $this->registerResources();
        }

        /**
         * @param array $config
         * @return $this
         */
        public function setConfig(array $config)
        {
            foreach ($config as $configKey => $value) {
                if ($this->isValidConfigOption($configKey)) {
                    $property = $this->getPropertyByConfigKey($configKey);

                    $this->{$property} = $value;
                }
            }

            return $this;
        }

        /**
         * @param $configKey
         * @return bool
         */
        private function isValidConfigOption($configKey)
        {
            return array_key_exists($configKey, self::CONFIG);
        }

        /**
         * @param $configKey
         * @return mixed
         */
        private function getPropertyByConfigKey($configKey)
        {
            return self::CONFIG[$configKey];
        }

        /**
         * @param string $url
         * @param array $payload
         *
         * @return array
         * @throws ApiClientException
         * @throws ApiLimitReachedException
         * @throws ApiSleepTimeException
         * @throws InvalidApiCredentialsException
         * @throws SupplierExistsException
         * @throws \GuzzleHttp\Exception\GuzzleException
         */
        public function create($url, $payload)
        {
            return $this->sendRequest($url, 'post', $payload);
        }

        /**
         * Invoke the Webshopapp API.
         *
         * @param string $url    The resource url (required)
         * @param string $method The http method (default 'get')
         * @param array $payload The query/post data
         * @param null $resource
         *
         * @return mixed The decoded response object
         * @throws ApiClientException
         * @throws ApiLimitReachedException
         * @throws ApiSleepTimeException
         * @throws SupplierExistsException
         * @throws \GuzzleHttp\Exception\GuzzleException
         * @throws InvalidApiCredentialsException
         */
        private function sendRequest($url, $method, $payload = null, $resource = null)
        {
            $this->checkLoginCredentials();

            $client = $this->makeRequest($url, $method, $payload, $resource);

            $responseBody = json_decode($client->getBody()->getContents(), true);

            $this->apiCallsMade++;

            if ($responseBody && !$this->getTestEnv() && preg_match('/^checkout/i', $url) !== 1) {
                $responseBody = array_shift($responseBody);
            }

            return $responseBody;
        }

        /**
         * @throws InvalidApiCredentialsException
         */
        private function checkLoginCredentials()
        {
            if (strlen($this->getApiSecret()) !== 32) {
                throw new InvalidApiCredentialsException('API secret should be exact 32 characters.');
            }

            if (strlen($this->getApiKey()) !== 32) {
                throw new InvalidApiCredentialsException('API key should be exact 32 characters..');
            }

            if (strlen($this->getApiLanguage()) !== 2) {
                throw new InvalidApiCredentialsException('Invalid API language. API language should be 2 characters');
            }
        }

        /**
         * @return string
         */
        public function getApiSecret()
        {
            return $this->apiSecret;
        }

        /**
         * @param $apiSecret
         */
        public function setApiSecret($apiSecret)
        {
            $this->apiSecret = $apiSecret;
        }

        /**
         * @return string
         */
        public function getApiKey()
        {
            return $this->apiKey;
        }

        /**
         * @param $apiKey
         */
        public function setApiKey($apiKey)
        {
            $this->apiKey = $apiKey;
        }

        /**
         * @return string
         */
        public function getApiLanguage()
        {
            return $this->apiLanguage;
        }

        /**
         * @param $apiLanguage
         */
        public function setApiLanguage($apiLanguage)
        {
            $this->apiLanguage = $apiLanguage;
        }

        /**
         * @param $url
         * @param $method
         * @param $payload
         * @param $resource
         * @return \GuzzleHttp\Psr7\Response
         * @throws ApiClientException
         * @throws ApiLimitReachedException
         * @throws ApiSleepTimeException
         * @throws \GuzzleHttp\Exception\GuzzleException
         * @throws SupplierExistsException
         */
        protected function makeRequest($url, $method, $payload, $resource): Response
        {
            $requestUrl = $this->makeRequestUrl($url);

            try {

                if ($this->getTestEnv()) {
                    $payload['app_key'] = substr($this->getApiKey(), 0, 6);
                }

                $request = $this->makeGuzzleRequest($method, $requestUrl, $payload);

                $this->request = $request;

                return $request;
            } catch (ClientException $exception) {

                $error = json_decode($exception->getResponse()->getBody()->getContents(), true);

                $callsLeft      = $this->extractCallsLeft($exception->getResponse());
                $secondForReset = $this->extractResetTime($exception->getResponse());

                $this->handleDefaultExceptions($callsLeft, $error, $payload, $resource);

                if (!$this->sleepMax) {
                    $this->throwErrorException($error['error'], $resource, $secondForReset, $payload, $exception);
                }

                $this->handleDelay($callsLeft, $secondForReset);

                return $this->makeRequest($requestUrl, $method, $payload, $resource);
            }
        }

        /**
         * @param $resourceUrl
         * @return string
         */
        protected function makeRequestUrl($resourceUrl)
        {
            $apiHost = $this->getApiHost();

            return $apiHost . $this->apiLanguage . '/' . $resourceUrl . '.json';
        }

        /**
         * @return string
         */
        public function getApiHost()
        {
            if ($this->getTestEnv()) {
                return $this->getLocalhostUrl();
            } elseif ($this->apiServer == 'live') {
                return self::SERVER_HOST_LIVE;
            } elseif ($this->apiServer == 'local') {
                return self::SERVER_HOST_LOCAL;
            } elseif ($this->apiServer == 'eu1') {
                return self::SERVER_EU1_LIVE;
            } elseif ($this->apiServer == 'us1') {
                return self::SERVER_US1_LIVE;
            }

            return self::SERVER_HOST_TEST;
        }

        /**
         * @return bool
         */
        public function getTestEnv()
        {
            return $this->test;
        }

        /**
         * @param string $urlSuffix
         * @return string
         */
        public function getLocalhostUrl($urlSuffix = '/')
        {
            return $this->localhostUrl . $urlSuffix;
        }

        /**
         * @param $method
         * @param $requestUrl
         * @param $payload
         * @return mixed|\Psr\Http\Message\ResponseInterface
         * @throws \GuzzleHttp\Exception\GuzzleException
         */
        protected function makeGuzzleRequest($method, $requestUrl, $payload)
        {
            $data = [
                'auth' => $this->getCredentials()
            ];

            if (strtolower($method) == 'post' || strtolower($method) == 'put') {
                $data['form_params'] = $payload;
            } else {
                $data['query'] = json_encode($payload);
            }

            return (new Client([
                'content-type' => 'application/json'
            ]))
                ->request($method, $requestUrl, [
                    'body' => json_encode($payload),
                    'auth' => $this->getCredentials()
                ]);
        }

        /**
         * @return array
         */
        private function getCredentials()
        {
            return [
                $this->getApiKey(),
                $this->getApiSecret(),
            ];
        }

        /**
         * @param \Psr\Http\Message\ResponseInterface $responseInterface
         * @return int
         */
        protected function extractCallsLeft($responseInterface)
        {
            return $this->extractFirstParameterFromHeader($responseInterface, 'X-RateLimit-Remaining');
        }

        /**
         * @param \Psr\Http\Message\ResponseInterface $responseInterface
         * @param string $header
         * @return int
         */
        private function extractFirstParameterFromHeader($responseInterface, $header)
        {
            $limitReset = $responseInterface->getHeader($header)[0];

            [$resetMinute] = explode('/', $limitReset);

            return (int)$resetMinute;
        }

        /**
         * @param \Psr\Http\Message\ResponseInterface $responseInterface
         * @return int
         */
        protected function extractResetTime($responseInterface)
        {
            return $this->extractFirstParameterFromHeader($responseInterface, 'X-RateLimit-Reset');
        }

        /**
         * @param $callsLeft
         * @param array $error
         * @param       $payload
         * @param       $resource
         * @throws ApiClientException
         * @throws SupplierExistsException
         */
        protected function handleDefaultExceptions($callsLeft, $error, $payload, $resource)
        {
            if (@$error['error']['message'] === self::SUPPLIER_EXISTS_ERROR && $callsLeft) {
                throw new SupplierExistsException($error['error']['message'], [], $payload, $resource);
            } elseif (@$error['error']['message'] === self::ERROR_INVALID_DATA_INPUT && $callsLeft) {
                throw new ApiClientException(self::ERROR_INVALID_DATA_INPUT . ' Check if the payload is filled', [],
                    $payload, $resource);
            } elseif (@$error['error']['message'] && $callsLeft) {
                throw new ApiClientException($error['error']['message'], [], $payload, $resource);
            }
        }

        /**
         * @param array $error
         * @param string $resource
         * @param                                       $limitReset
         * @param array $payload
         * @param \GuzzleHttp\Exception\ClientException $exception
         * @throws ApiClientException|ApiLimitReachedException
         */
        protected function throwErrorException($error, $resource, $limitReset, $payload, ClientException $exception)
        {
            if (array_key_exists('message', $error)) {

                $message = $error['message'];

                if ($message == self::ERRORS_TOO_MANY_REQUESTS) {
                    throw new ApiLimitReachedException($limitReset, $payload, $resource, $exception);
                }

                throw new ApiClientException($message, $payload, $resource, $exception);
            }

            throw new ApiClientException('Unknown error', $payload, $resource, $exception);
        }

        /**
         * @param $callsLeft
         * @param $resetMinute
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiSleepTimeException
         */
        protected function handleDelay($callsLeft, $resetMinute)
        {
            if (($this->getMaxSleepTime() === 0) || ($callsLeft <= 0 && $resetMinute < $this->getMaxSleepTime())) {
                sleep($resetMinute + $this->getExtraSleepTime());

                return;
            }

            throw new ApiSleepTimeException('Could not sleep. Increase sleep ratio');
        }

        /**
         * @return int
         */
        public function getMaxSleepTime()
        {
            return $this->sleepMax;
        }

        /**
         * @return int
         */
        public function getExtraSleepTime()
        {
            return $this->extraSleepTime;
        }

        /**
         * @param $value
         * @return $this
         */
        public function setExtraSleepTime($value)
        {
            $this->extraSleepTime = (int)$value;

            return $this;
        }

        /**
         * @param string $url
         * @param array $params
         *
         * @param null $resource
         * @return array
         * @throws ApiClientException
         * @throws ApiLimitReachedException
         * @throws ApiSleepTimeException
         * @throws InvalidApiCredentialsException
         * @throws SupplierExistsException
         * @throws \GuzzleHttp\Exception\GuzzleException
         */
        public function read($url, $params = [], $resource = null)
        {
            return $this->sendRequest($url, 'get', $params, $resource);
        }

        /**
         * @param string $url
         * @param array $payload
         *
         * @return array
         * @throws ApiClientException
         * @throws ApiLimitReachedException
         * @throws ApiSleepTimeException
         * @throws InvalidApiCredentialsException
         * @throws SupplierExistsException
         * @throws \GuzzleHttp\Exception\GuzzleException
         */
        public function update($url, $payload)
        {
            return $this->sendRequest($url, 'put', $payload);
        }

        /**
         * @param string $url
         *
         * @return array
         * @throws ApiClientException
         * @throws ApiLimitReachedException
         * @throws ApiSleepTimeException
         * @throws InvalidApiCredentialsException
         * @throws SupplierExistsException
         * @throws \GuzzleHttp\Exception\GuzzleException
         */
        public function delete($url)
        {
            return $this->sendRequest($url, 'delete');
        }

        /**
         * @return string
         */
        public function getApiServer()
        {
            return $this->apiServer;
        }

        /**
         * @param $apiServer
         */
        public function setApiServer($apiServer)
        {
            $this->apiServer = $apiServer;
        }

        /**
         * @return int
         */
        public function getApiCallsMade()
        {
            return $this->apiCallsMade;
        }

        /**
         * @param $value
         * @return $this
         */
        public function setSleep($value)
        {
            $this->sleepMax = (int)$value;

            return $this;
        }

        /**
         * @return \Psr\Http\Message\ResponseInterface
         */
        public function getRequest()
        {
            return $this->request;
        }

        /**
         * @return int
         */
        public function getPerPage(): int
        {
            return $this->perPage;
        }

        /**
         * @param int $perPage
         */
        public function setPerPage(int $perPage): void
        {
            $this->perPage = $perPage;
        }
    }