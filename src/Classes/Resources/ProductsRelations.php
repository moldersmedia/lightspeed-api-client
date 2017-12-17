<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class ProductsRelations
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
            $fields = [ 'productRelation' => $fields ];

            return $this->client->create( 'products/' . $productId . '/relations', $fields );
        }

        /**
         * @param int   $productId
         * @param int   $relationId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $productId, $relationId = null, $params = [] )
        {
            if (!$relationId) {
                return $this->client->read( 'products/' . $productId . '/relations', $params );
            } else {
                return $this->client->read( 'products/' . $productId . '/relations/' . $relationId, $params );
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
            return $this->client->read( 'products/' . $productId . '/relations/count', $params );
        }

        /**
         * @param int   $productId
         * @param int   $relationId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $productId, $relationId, $fields )
        {
            $fields = [ 'productRelation' => $fields ];

            return $this->client->update( 'products/' . $productId . '/relations/' . $relationId, $fields );
        }

        /**
         * @param int $productId
         * @param int $relationId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $productId, $relationId )
        {
            return $this->client->delete( 'products/' . $productId . '/relations/' . $relationId );
        }
    }