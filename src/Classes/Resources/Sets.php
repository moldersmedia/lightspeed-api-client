<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Sets
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
            $fields = [ 'set' => $fields ];

            return $this->client->create( 'sets', $fields );
        }

        /**
         * @param int   $setId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $setId = null, $params = [] )
        {
            if (!$setId) {
                return $this->client->read( 'sets', $params );
            } else {
                return $this->client->read( 'sets/' . $setId, $params );
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
            return $this->client->read( 'sets/count', $params );
        }

        /**
         * @param int   $setId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $setId, $fields )
        {
            $fields = [ 'set' => $fields ];

            return $this->client->update( 'sets/' . $setId, $fields );
        }

        /**
         * @param int $setId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $setId )
        {
            return $this->client->delete( 'sets/' . $setId );
        }
    }