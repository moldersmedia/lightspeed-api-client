<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class ProductsFiltervalues
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
         * @param int $productId
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $productId )
        {
            return $this->client->read( 'products/' . $productId . '/filtervalues' );
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
            return $this->client->read( 'products/' . $productId . '/filtervalues/count', $params );
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
            $fields = [ 'productFiltervalue' => $fields ];

            return $this->client->create( 'products/' . $productId . '/filtervalues', $fields );
        }

        /**
         * @param int $productId
         * @param int $filterValueId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $productId, $filterValueId )
        {
            return $this->client->delete( 'products/' . $productId . '/filtervalues/' . $filterValueId );
        }
    }