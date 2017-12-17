<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Redirects
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
            $fields = [ 'redirect' => $fields ];

            return $this->client->create( 'redirects', $fields );
        }

        /**
         * @param int   $redirectId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $redirectId = null, $params = [] )
        {
            if (!$redirectId) {
                return $this->client->read( 'redirects', $params );
            } else {
                return $this->client->read( 'redirects/' . $redirectId, $params );
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
            return $this->client->read( 'redirects/count', $params );
        }

        /**
         * @param int   $redirectId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $redirectId, $fields )
        {
            $fields = [ 'redirect' => $fields ];

            return $this->client->update( 'redirects/' . $redirectId, $fields );
        }

        /**
         * @param int $redirectId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $redirectId )
        {
            return $this->client->delete( 'redirects/' . $redirectId );
        }
    }