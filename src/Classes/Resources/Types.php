<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Types
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
            $fields = [ 'type' => $fields ];

            return $this->client->create( 'types', $fields );
        }

        /**
         * @param int   $typeId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $typeId = null, $params = [] )
        {
            if (!$typeId) {
                return $this->client->read( 'types', $params );
            } else {
                return $this->client->read( 'types/' . $typeId, $params );
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
            return $this->client->read( 'types/count', $params );
        }

        /**
         * @param int   $typeId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $typeId, $fields )
        {
            $fields = [ 'type' => $fields ];

            return $this->client->update( 'types/' . $typeId, $fields );
        }

        /**
         * @param int $typeId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $typeId )
        {
            return $this->client->delete( 'types/' . $typeId );
        }
    }