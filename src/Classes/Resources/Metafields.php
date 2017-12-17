<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Metafields
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
            $fields = [ 'metafield' => $fields ];

            return $this->client->create( 'metafields', $fields );
        }

        /**
         * @param int   $metafieldId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $metafieldId = null, $params = [] )
        {
            if (!$metafieldId) {
                return $this->client->read( 'metafields', $params );
            } else {
                return $this->client->read( 'metafields/' . $metafieldId, $params );
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
            return $this->client->read( 'metafields/count', $params );
        }

        /**
         * @param int   $metafieldId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $metafieldId, $fields )
        {
            $fields = [ 'metafield' => $fields ];

            return $this->client->update( 'metafields/' . $metafieldId, $fields );
        }

        /**
         * @param int $metafieldId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $metafieldId )
        {
            return $this->client->delete( 'metafields/' . $metafieldId );
        }
    }