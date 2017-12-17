<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class ShippingmethodsValues
    {
        /**
         * @var ApiClient
         */
        private $client;

        public function __construct( ApiClient $client )
        {
            $this->client = $client;
        }

        /**
         * @param int   $shippingmethodId
         * @param int   $valueId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $shippingmethodId, $valueId = null, $params = [] )
        {
            if (!$valueId) {
                return $this->client->read( 'shippingmethods/' . $shippingmethodId . '/values', $params );
            } else {
                return $this->client->read( 'shippingmethods/' . $shippingmethodId . '/values/' . $valueId, $params );
            }
        }

        /**
         * @param int   $shippingmethodId
         * @param array $params
         *
         * @return int
         * @throws ApiClientException
         */
        public function count( $shippingmethodId, $params = [] )
        {
            return $this->client->read( 'shippingmethods/' . $shippingmethodId . '/values/count', $params );
        }
    }