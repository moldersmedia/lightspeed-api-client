<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class CategoriesImage
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
         * @param int   $categoryId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function create( $categoryId, $fields )
        {
            $fields = [ 'categoryImage' => $fields ];

            return $this->client->create( 'categories/' . $categoryId . '/image', $fields );
        }

        /**
         * @param int $categoryId
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $categoryId )
        {
            return $this->client->read( 'categories/' . $categoryId . '/image' );
        }

        /**
         * @param int $categoryId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $categoryId )
        {
            return $this->client->delete( 'categories/' . $categoryId . '/image' );
        }
    }