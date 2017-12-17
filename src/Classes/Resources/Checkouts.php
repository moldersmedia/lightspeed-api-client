<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Checkouts
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
            return $this->client->create( 'checkouts', $fields );
        }

        /**
         * @param int   $checkoutId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $checkoutId = null, $params = [] )
        {
            if (!$checkoutId) {
                return $this->client->read( 'checkouts', $params );
            } else {
                return $this->client->read( 'checkouts/' . $checkoutId, $params );
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
            return $this->client->read( 'checkouts/count', $params );
        }

        /**
         * @param int   $checkoutId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $checkoutId, $fields )
        {
            return $this->client->update( 'checkouts/' . $checkoutId, $fields );
        }

        /**
         * @param int $checkoutId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $checkoutId )
        {
            return $this->client->delete( 'checkouts/' . $checkoutId );
        }
    }