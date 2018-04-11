<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class ShippingmethodsCountries
    {
        /**
         * @var ApiClient
         */
        private $client;

        public function __construct(ApiClient $client)
        {
            $this->client = $client;
        }

        /**
         * @param int $shippingmethodId
         * @param int $countryId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         * @throws \GuzzleHttp\Exception\GuzzleException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiLimitReachedException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiSleepTimeException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\InvalidApiCredentialsException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\Resources\SupplierExistsException
         */
        public function get($shippingmethodId, $countryId = null, $params = [])
        {
            if (!$countryId) {
                return $this->client->read('shippingmethods/' . $shippingmethodId . '/countries', $params);
            } else {
                return $this->client->read('shippingmethods/' . $shippingmethodId . '/countries/' . $countryId,
                    $params);
            }
        }

        /**
         * @param int $shippingmethodId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         * @throws \GuzzleHttp\Exception\GuzzleException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiLimitReachedException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiSleepTimeException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\InvalidApiCredentialsException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\Resources\SupplierExistsException
         */
        public function count($shippingmethodId, $params = [])
        {
            return $this->client->read('shippingmethods/' . $shippingmethodId . '/countries/count', $params);
        }
    }