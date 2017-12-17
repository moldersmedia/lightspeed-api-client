<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class ProductsAttributes
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
         * @param int   $attributeId Set to null for bulk update.
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $productId, $attributeId, $fields )
        {
            if (!$attributeId) {
                $fields = [ 'productAttributes' => $fields ];

                return $this->client->update( 'products/' . $productId . '/attributes', $fields );
            } else {
                $fields = [ 'productAttribute' => $fields ];

                return $this->client->update( 'products/' . $productId . '/attributes/' . $attributeId, $fields );
            }
        }

        /**
         * @param int   $productId
         * @param int   $attributeId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $productId, $attributeId = null, $params = [] )
        {
            if (!$attributeId) {
                return $this->client->read( 'products/' . $productId . '/attributes', $params );
            } else {
                return $this->client->read( 'products/' . $productId . '/attributes/' . $attributeId, $params );
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
            return $this->client->read( 'products/' . $productId . '/attributes/count', $params );
        }

        /**
         * @param int $productId
         * @param int $attributeId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $productId, $attributeId )
        {
            return $this->client->delete( 'products/' . $productId . '/attributes/' . $attributeId );
        }
    }