<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Categories
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
            $fields = [ 'category' => $fields ];

            return $this->client->create( 'categories', $fields );
        }

        /**
         * @param int   $categoryId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $categoryId = null, $params = [] )
        {
            if (!$categoryId) {
                return $this->client->read( 'categories', $params );
            } else {
                return $this->client->read( 'categories/' . $categoryId, $params );
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
            return $this->client->read( 'categories/count', $params );
        }

        /**
         * @param int   $categoryId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $categoryId, $fields )
        {
            $fields = [ 'category' => $fields ];

            return $this->client->update( 'categories/' . $categoryId, $fields );
        }

        /**
         * @param int $categoryId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $categoryId )
        {
            return $this->client->delete( 'categories/' . $categoryId );
        }
    }