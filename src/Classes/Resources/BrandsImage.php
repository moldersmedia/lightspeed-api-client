<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class BrandsImage
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
         * @param int   $brandId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function create( $brandId, $fields )
        {
            $fields = [ 'brandImage' => $fields ];

            return $this->client->create( 'brands/' . $brandId . '/image', $fields );
        }

        /**
         * @param int $brandId
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $brandId )
        {
            return $this->client->read( 'brands/' . $brandId . '/image' );
        }

        /**
         * @param int $brandId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $brandId )
        {
            return $this->client->delete( 'brands/' . $brandId . '/image' );
        }
    }