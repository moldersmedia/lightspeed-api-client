<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class FiltersValues
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
         * @param int   $filterId
         * @param int   $filterValueId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $filterId, $filterValueId = null, $params = [] )
        {
            if (!$filterValueId) {
                return $this->client->read( 'filters/' . $filterId . '/values', $params );
            } else {
                return $this->client->read( 'filters/' . $filterId . '/values/' . $filterValueId, $params );
            }
        }

        /**
         * @param int   $filterId
         * @param array $params
         *
         * @return int
         * @throws ApiClientException
         */
        public function count( $filterId, $params = [] )
        {
            return $this->client->read( 'filters/' . $filterId . '/values/count', $params );
        }

        /**
         * @param int   $filterId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function create( $filterId, $fields )
        {
            $fields = [ 'filterValue' => $fields ];

            return $this->client->create( 'filters/' . $filterId . '/values', $fields );
        }

        /**
         * @param int   $filterId
         * @param int   $filterValueId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $filterId, $filterValueId, $fields )
        {
            $fields = [ 'filterValue' => $fields ];

            return $this->client->update( 'filters/' . $filterId . '/values/' . $filterValueId, $fields );
        }

        /**
         * @param int $filterId
         * @param int $filterValueId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $filterId, $filterValueId )
        {
            return $this->client->delete( 'filters/' . $filterId . '/values/' . $filterValueId );
        }
    }