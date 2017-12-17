<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Filters
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
            $fields = [ 'filter' => $fields ];

            return $this->client->create( 'filters', $fields );
        }

        /**
         * @param int   $filterId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $filterId = null, $params = [] )
        {
            if (!$filterId) {
                return $this->client->read( 'filters', $params );
            } else {
                return $this->client->read( 'filters/' . $filterId, $params );
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
            return $this->client->read( 'filters/count', $params );
        }

        /**
         * @param int   $filterId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $filterId, $fields )
        {
            $fields = [ 'filter' => $fields ];

            return $this->client->update( 'filters/' . $filterId, $fields );
        }

        /**
         * @param int $filterId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $filterId )
        {
            return $this->client->delete( 'filters/' . $filterId );
        }
    }