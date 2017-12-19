<?php

    namespace MoldersMedia\LightspeedApi\Classes\Api;

    use GuzzleHttp\Client;
    use GuzzleHttp\Exception\ClientException;
    use GuzzleHttp\Psr7\Response;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiLimitReachedException;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiSleepTimeException;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\InvalidApiCredentialsException;
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
         * The Api Hosts (do not change!)
         */
        const SERVER_HOST_LOCAL = 'https://api.webshopapp.dev/';

        const SERVER_HOST_TEST = 'https://api.webshopapp.net/';

        const SERVER_HOST_LIVE = 'https://api.webshopapp.com/';

        const SERVER_EU1_LIVE = 'https://api.webshopapp.com/';

        const SERVER_US1_LIVE = 'https://api.shoplightspeed.com/';

        /**
         * Errors thrown by the API
         */
        const ERRORS_TOO_MANY_REQUESTS = 'Too many requests in this time period. Try again later.';

        CONST ERROR_INVALID_DATA_INPUT = 'Invalid data input.';

        /**
         * @var int
         */
        protected $sleepMax = 400;

        /**
         * @var int
         */
        protected $extraSleepTime = 10;

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
         * @var int
         */
        public $apiCallsMade = 0;

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
            'api_key'          => 'apiKey'
        ];

        /**
         * @param string $apiServer   The api server to use test / live
         * @param string $apiKey      The api key
         * @param string $apiSecret   The api secret
         * @param string $apiLanguage The language to use the api in
         * @param array  $config
         * @throws \Exception
         */
        public function __construct( $apiServer, $apiKey, $apiSecret, $apiLanguage, array $config = [] )
        {
            if (!function_exists( 'curl_init' )) {
                throw new \Exception( 'WebshopappApiClient needs the CURL PHP extension.' );
            }
            if (!function_exists( 'json_decode' )) {
                throw new \Exception( 'WebshopappApiClient needs the JSON PHP extension.' );
            }

            $this->setApiServer( $apiServer );
            $this->setApiKey( $apiKey );
            $this->setApiSecret( $apiSecret );
            $this->setApiLanguage( $apiLanguage );
            $this->setConfig( $config );
            $this->registerResources();
        }

        /**
         * @param string $url
         * @param array  $payload
         *
         * @return array
         * @throws ApiClientException
         */
        public function create( $url, $payload )
        {
            return $this->sendRequest( $url, 'post', $payload );
        }

        /**
         * @param string $url
         * @param array  $params
         *
         * @param null   $resource
         * @return array
         */
        public function read( $url, $params = [], $resource = null )
        {
            return $this->sendRequest( $url, 'get', $params, $resource );
        }

        /**
         * @param string $url
         * @param array  $payload
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $url, $payload )
        {
            return $this->sendRequest( $url, 'put', $payload );
        }

        /**
         * @param string $url
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $url )
        {
            return $this->sendRequest( $url, 'delete' );
        }

        /**
         * @return string
         */
        public function getApiHost()
        {
            if ($this->apiServer == 'live') {
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
         * @throws ApiClientException
         */
        private function checkLoginCredentials()
        {
            if (strlen( $this->getApiSecret() ) !== 32) {
                throw new InvalidApiCredentialsException( 'API secret should be exact 32 characters.' );
            }

            if (strlen( $this->getApiKey() ) !== 32) {
                throw new InvalidApiCredentialsException( 'API key should be exact 32 characters..' );
            }

            if (strlen( $this->getApiLanguage() ) !== 2) {
                throw new InvalidApiCredentialsException( 'Invalid API language. API language should be 2 characters' );
            }
        }

        /**
         * @param $resourceUrl
         * @return string
         */
        private function makeRequestUrl( $resourceUrl )
        {
            $apiHost = $this->getApiHost();

            return $apiHost . $this->apiLanguage . '/' . $resourceUrl . '.json';
        }

        /**
         * Invoke the Webshopapp API.
         *
         * @param string $url     The resource url (required)
         * @param string $method  The http method (default 'get')
         * @param array  $payload The query/post data
         * @param null   $resource
         *
         * @return mixed The decoded response object
         */
        private function sendRequest( $url, $method, $payload = null, $resource = null )
        {
            $this->checkLoginCredentials();

            $client = $this->makeRequest( $url, $method, $payload, $resource );


            $client->withAddedHeader('X-RateLimit-Limit', '10');
            dd( __LINE__ . ':[' . __FILE__ . ']' , $client->getHeaders());

            $responseBody = json_decode( $client->getBody()->getContents(), true );

            $this->apiCallsMade++;

            if ($responseBody && preg_match( '/^checkout/i', $url ) !== 1) {
                $responseBody = array_shift( $responseBody );
            }

            return $responseBody;
        }

        /**
         * @param $url
         * @param $method
         * @param $payload
         * @param $resource
         * @return \GuzzleHttp\Psr7\Response
         * @throws ApiLimitReachedException
         */
        private function makeRequest( $url, $method, $payload, $resource ): Response
        {
            $test = $this->makeRequestUrl( $url );

            try {
                return ( new Client() )
                    ->request( $method, $test, [
                        'auth'        => $this->getCredentials(),
                        'form_params' => $payload,
                        'query'       => $payload
                    ] );
            } catch( ClientException $exception ) {
                $error = json_decode( $exception->getResponse()->getBody()->getContents(), true );

                $callsLeft      = $this->extractCallsLeft( $exception->getResponse() );
                $secondForReset = $this->extractResetTime( $exception->getResponse() );

                $this->handleDefaultExceptions( $error, $payload, $resource );

                if (!$this->sleepMax) {
                    $this->throwErrorException( $error['error'], $resource, $secondForReset, $payload, $exception );
                }

                $this->handleDelay( $callsLeft, $secondForReset );

                return $this->makeRequest( $test, $method, $payload, $resource );
            }
        }

        /**
         * @param array                                 $error
         * @param string                                $resource
         * @param                                       $limitReset
         * @param array                                 $payload
         * @param \GuzzleHttp\Exception\ClientException $exception
         * @throws ApiClientException|ApiLimitReachedException
         */
        private function throwErrorException( $error, $resource, $limitReset, $payload, ClientException $exception )
        {
            if (array_key_exists( 'message', $error )) {

                $message = $error['message'];

                if ($message == self::ERRORS_TOO_MANY_REQUESTS) {
                    throw new ApiLimitReachedException( $limitReset, $payload, $resource, $exception );
                }

                throw new ApiClientException( $message, $payload, $resource, $exception );
            }

            throw new ApiClientException( 'Unknown error', $payload, $resource, $exception );
        }

        /**
         * @param $callsLeft
         * @param $resetMinute
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiSleepTimeException
         */
        private function handleDelay( $callsLeft, $resetMinute )
        {
            if (( $this->getMaxSleepTime() === 0 ) || ( $callsLeft <= 0 && $resetMinute < $this->getMaxSleepTime() )) {
                sleep( $resetMinute + $this->getExtraSleepTime() );

                return;
            }

            throw new ApiSleepTimeException( 'Could not sleep. Increase sleep ratio' );
        }

        /**
         * @param \Psr\Http\Message\ResponseInterface $responseInterface
         * @return int
         */
        private function extractCallsLeft( $responseInterface )
        {
            return $this->extractFirstParameterFromHeader( $responseInterface, 'X-RateLimit-Remaining' );
        }

        /**
         * @param \Psr\Http\Message\ResponseInterface $responseInterface
         * @return int
         */
        private function extractResetTime( $responseInterface )
        {
            return $this->extractFirstParameterFromHeader( $responseInterface, 'X-RateLimit-Reset' );
        }

        /**
         * @param \Psr\Http\Message\ResponseInterface $responseInterface
         * @param string                              $header
         * @return int
         */
        private function extractFirstParameterFromHeader( $responseInterface, $header )
        {
            $limitReset = $responseInterface->getHeader( $header )[0];

            [ $resetMinute ] = explode( '/', $limitReset );

            return (int) $resetMinute;
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
         * @return string
         */
        public function getApiLanguage()
        {
            return $this->apiLanguage;
        }

        /**
         * @param $apiServer
         */
        public function setApiServer( $apiServer )
        {
            $this->apiServer = $apiServer;
        }

        /**
         * @param $apiKey
         */
        public function setApiKey( $apiKey )
        {
            $this->apiKey = $apiKey;
        }

        /**
         * @return string
         */
        public function getApiKey()
        {
            return $this->apiKey;
        }

        /**
         * @param $apiSecret
         */
        public function setApiSecret( $apiSecret )
        {
            $this->apiSecret = $apiSecret;
        }

        /**
         * @return string
         */
        public function getApiSecret()
        {
            return $this->apiSecret;
        }

        /**
         * @param $apiLanguage
         */
        public function setApiLanguage( $apiLanguage )
        {
            $this->apiLanguage = $apiLanguage;
        }

        /**
         * @return string
         */
        public function getApiServer()
        {
            return $this->apiServer;
        }

        /**
         * @return int
         */
        public function getApiCallsMade()
        {
            return $this->apiCallsMade;
        }

        /**
         * @param array $error
         * @param       $payload
         * @param       $resource
         * @throws ApiClientException
         */
        private function handleDefaultExceptions( $error, $payload, $resource )
        {
            if (@$error['error']['message'] === self::ERROR_INVALID_DATA_INPUT) {
                throw new ApiClientException( self::ERROR_INVALID_DATA_INPUT . ' Check if the payload is filled', [],
                    $payload, $resource );
            }
        }

        /**
         * @param $value
         * @return $this
         */
        public function setExtraSleepTime( $value )
        {
            $this->extraSleepTime = (int) $value;

            return $this;
        }

        /**
         * @param $value
         * @return $this
         */
        public function setSleep( $value )
        {
            $this->sleepMax = (int) $value;

            return $this;
        }

        /**
         * @param array $config
         * @return $this
         */
        public function setConfig( array $config )
        {
            foreach ($config as $configKey => $value) {
                if ($this->isValidConfigOption( $configKey )) {
                    $property = $this->getPropertyByConfigKey( $configKey );

                    $this->{$property} = $value;
                }
            }

            return $this;
        }

        /**
         * @param $configKey
         * @return bool
         */
        private function isValidConfigOption( $configKey )
        {
            return array_key_exists( $configKey, self::CONFIG );
        }

        /**
         * @param $configKey
         * @return mixed
         */
        private function getPropertyByConfigKey( $configKey )
        {
            return self::CONFIG[$configKey];
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

    }