<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class OrdersMetafields
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
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function create( $orderId, $fields )
        {
            $fields = [ 'orderMetafield' => $fields ];

            return $this->client->create( 'orders/' . $orderId . '/metafields', $fields );
        }

        /**
         * @param int   $orderId
         * @param int   $metafieldId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $orderId, $metafieldId = null, $params = [] )
        {
            if (!$metafieldId) {
                return $this->client->read( 'orders/' . $orderId . '/metafields', $params );
            } else {
                return $this->client->read( 'orders/' . $orderId . '/metafields/' . $metafieldId, $params );
            }
        }

        /**
         * @param int   $orderId
         * @param array $params
         *
         * @return int
         * @throws ApiClientException
         */
        public function count( $orderId, $params = [] )
        {
            return $this->client->read( 'orders/' . $orderId . '/metafields/count', $params );
        }

        /**
         * @param int   $orderId
         * @param int   $metafieldId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $orderId, $metafieldId, $fields )
        {
            $fields = [ 'orderMetafield' => $fields ];

            return $this->client->update( 'orders/' . $orderId . '/metafields/' . $metafieldId, $fields );
        }

        /**
         * @param int $orderId
         * @param int $metafieldId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $orderId, $metafieldId )
        {
            return $this->client->delete( 'orders/' . $orderId . '/metafields/' . $metafieldId );
        }
    }