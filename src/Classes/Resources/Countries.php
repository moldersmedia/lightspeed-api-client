<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Countries
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
         * @param int   $countryId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $countryId = null, $params = [] )
        {
            if (!$countryId) {
                return $this->client->read( 'countries', $params );
            } else {
                return $this->client->read( 'countries/' . $countryId, $params );
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
            return $this->client->read( 'countries/count', $params );
        }
    }