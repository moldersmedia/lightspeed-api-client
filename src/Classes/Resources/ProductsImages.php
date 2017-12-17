<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class ProductsImages
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
         * @param int   $productId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function create( $productId, $fields )
        {
            $fields = [ 'productImage' => $fields ];

            return $this->client->create( 'products/' . $productId . '/images', $fields );
        }

        /**
         * @param int   $productId
         * @param int   $imageId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $productId, $imageId = null, $params = [] )
        {
            if (!$imageId) {
                return $this->client->read( 'products/' . $productId . '/images', $params );
            } else {
                return $this->client->read( 'products/' . $productId . '/images/' . $imageId, $params );
            }
        }

        /**
         * @param int   $productId
         * @param array $params
         *
         * @return int
         * @throws ApiClientException
         */
        public function count( $productId, $params = [] )
        {
            return $this->client->read( 'products/' . $productId . '/images/count', $params );
        }

        /**
         * @param int   $productId
         * @param int   $imageId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $productId, $imageId, $fields )
        {
            $fields = [ 'productImage' => $fields ];

            return $this->client->update( 'products/' . $productId . '/images/' . $imageId, $fields );
        }

        /**
         * @param int $productId
         * @param int $imageId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $productId, $imageId )
        {
            return $this->client->delete( 'products/' . $productId . '/images/' . $imageId );
        }
    }