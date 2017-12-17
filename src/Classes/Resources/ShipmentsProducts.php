<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class ShipmentsProducts
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
         * @param int   $shipmentId
         * @param int   $productId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $shipmentId, $productId = null, $params = [] )
        {
            if (!$productId) {
                return $this->client->read( 'shipments/' . $shipmentId . '/products', $params );
            } else {
                return $this->client->read( 'shipments/' . $shipmentId . '/products/' . $productId, $params );
            }
        }

        /**
         * @param int   $shipmentId
         * @param array $params
         *
         * @return int
         * @throws ApiClientException
         */
        public function count( $shipmentId, $params = [] )
        {
            return $this->client->read( 'shipments/' . $shipmentId . '/products/count', $params );
        }
    }