<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Attributes
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
            $fields = [ 'attribute' => $fields ];

            return $this->client->create( 'attributes', $fields );
        }

        /**
         * @param int   $attributeId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $attributeId = null, $params = [] )
        {
            if (!$attributeId) {
                return $this->client->read( 'attributes', $params );
            } else {
                return $this->client->read( 'attributes/' . $attributeId, $params );
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
            return $this->client->read( 'attributes/count', $params );
        }

        /**
         * @param int   $attributeId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $attributeId, $fields )
        {
            $fields = [ 'attribute' => $fields ];

            return $this->client->update( 'attributes/' . $attributeId, $fields );
        }

        /**
         * @param int $attributeId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $attributeId )
        {
            return $this->client->delete( 'attributes/' . $attributeId );
        }
    }