<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Shippingmethods
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
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $shippingmethodId = null, $params = [] )
        {
            if (!$shippingmethodId) {
                return $this->client->read( 'shippingmethods', $params );
            } else {
                return $this->client->read( 'shippingmethods/' . $shippingmethodId, $params );
            }
        }

        /**
         * @param array $params
         *
         * @return int
         * @throws ApiClientException
         */
        public function count( $params = [] )
        {
            return $this->client->read( 'shippingmethods/count', $params );
        }
    }