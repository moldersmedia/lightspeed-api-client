<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class CategoriesProducts
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
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function create( $fields )
        {
            $fields = [ 'categoriesProduct' => $fields ];

            return $this->client->create( 'categories/products', $fields );
        }

        /**
         * @param int   $relationId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $relationId = null, $params = [] )
        {
            if (!$relationId) {
                return $this->client->read( 'categories/products', $params );
            } else {
                return $this->client->read( 'categories/products/' . $relationId, $params );
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
            return $this->client->read( 'categories/products/count', $params );
        }

        /**
         * @param int $relationId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $relationId )
        {
            return $this->client->delete( 'categories/products/' . $relationId );
        }
    }