<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class ExternalServices
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
            $fields = [ 'externalService' => $fields ];

            return $this->client->create( 'external_services', $fields );
        }

        /**
         * @param int   $externalserviceId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $externalserviceId = null, $params = [] )
        {
            if (!$externalserviceId) {
                return $this->client->read( 'external_services', $params );
            } else {
                return $this->client->read( 'external_services/' . $externalserviceId, $params );
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
            return $this->client->read( 'external_services/count', $params );
        }

        /**
         * @param int $externalserviceId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $externalserviceId )
        {
            return $this->client->delete( 'external_services/' . $externalserviceId );
        }
    }