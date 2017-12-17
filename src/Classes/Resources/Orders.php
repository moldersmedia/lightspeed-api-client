<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Orders
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
         * @param int   $orderId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $orderId = null, $params = [] )
        {
            if (!$orderId) {
                return $this->client->read( 'orders', $params );
            } else {
                return $this->client->read( 'orders/' . $orderId, $params );
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
            return $this->client->read( 'orders/count', $params );
        }

        /**
         * @param int   $orderId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $orderId, $fields )
        {
            $fields = [ 'order' => $fields ];

            return $this->client->update( 'orders/' . $orderId, $fields );
        }
    }