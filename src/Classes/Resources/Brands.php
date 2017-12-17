<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Brands
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
            $fields = [ 'brand' => $fields ];

            return $this->client->create( 'brands', $fields );
        }

        /**
         * @param int   $brandId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $brandId = null, $params = [] )
        {
            if (!$brandId) {
                return $this->client->read( 'brands', $params );
            } else {
                return $this->client->read( 'brands/' . $brandId, $params );
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
            return $this->client->read( 'brands/count', $params );
        }

        /**
         * @param int   $brandId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $brandId, $fields )
        {
            $fields = [ 'brand' => $fields ];

            return $this->client->update( 'brands/' . $brandId, $fields );
        }

        /**
         * @param int $brandId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $brandId )
        {
            return $this->client->delete( 'brands/' . $brandId );
        }
    }