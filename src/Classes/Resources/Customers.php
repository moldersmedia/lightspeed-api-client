<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Customers
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
            $fields = [ 'customer' => $fields ];

            return $this->client->create( 'customers', $fields );
        }

        /**
         * @param int   $customerId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $customerId = null, $params = [] )
        {
            if (!$customerId) {
                return $this->client->read( 'customers', $params );
            } else {
                return $this->client->read( 'customers/' . $customerId, $params );
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
            return $this->client->read( 'customers/count', $params );
        }

        /**
         * @param int   $customerId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $customerId, $fields )
        {
            $fields = [ 'customer' => $fields ];

            return $this->client->update( 'customers/' . $customerId, $fields );
        }

        /**
         * @param int $customerId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $customerId )
        {
            return $this->client->delete( 'customers/' . $customerId );
        }
    }