<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class CheckoutsProducts
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
         * @param int   $checkoutId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function create( $checkoutId, $fields )
        {
            return $this->client->create( 'checkouts/' . $checkoutId . '/products', $fields );
        }

        /**
         * @param int   $checkoutId
         * @param int   $productId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $checkoutId, $productId = null, $params = [] )
        {
            if (!$productId) {
                return $this->client->read( 'checkouts/' . $checkoutId . '/products', $params );
            } else {
                return $this->client->read( 'checkouts/' . $checkoutId . '/products/' . $productId, $params );
            }
        }

        /**
         * @param int   $checkoutId
         * @param array $params
         *
         * @return int
         * @throws ApiClientException
         */
        public function count( $checkoutId, $params = [] )
        {
            return $this->client->read( 'checkouts/' . $checkoutId . '/products/count', $params );
        }

        /**
         * @param int   $checkoutId
         * @param int   $productId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $checkoutId, $productId, $fields )
        {
            return $this->client->update( 'checkouts/' . $checkoutId . '/products/' . $productId, $fields );
        }

        /**
         * @param int $checkoutId
         * @param int $productId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $checkoutId, $productId )
        {
            return $this->client->delete( 'checkouts/' . $checkoutId . '/products/' . $productId );
        }
    }