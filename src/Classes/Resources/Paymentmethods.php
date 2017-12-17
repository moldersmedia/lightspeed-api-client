<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Paymentmethods
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
         * @param int   $paymentmethodId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $paymentmethodId = null, $params = [] )
        {
            if (!$paymentmethodId) {
                return $this->client->read( 'paymentmethods', $params );
            } else {
                return $this->client->read( 'paymentmethods/' . $paymentmethodId, $params );
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
            return $this->client->read( 'paymentmethods/count', $params );
        }
    }