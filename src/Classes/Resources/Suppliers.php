<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Suppliers
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
            $fields = [ 'supplier' => $fields ];

            return $this->client->create( 'suppliers', $fields );
        }

        /**
         * @param int   $supplierId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $supplierId = null, $params = [] )
        {
            if (!$supplierId) {
                return $this->client->read( 'suppliers', $params );
            } else {
                return $this->client->read( 'suppliers/' . $supplierId, $params );
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
            return $this->client->read( 'suppliers/count', $params );
        }

        /**
         * @param int   $supplierId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $supplierId, $fields )
        {
            $fields = [ 'supplier' => $fields ];

            return $this->client->update( 'suppliers/' . $supplierId, $fields );
        }

        /**
         * @param int $supplierId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $supplierId )
        {
            return $this->client->delete( 'suppliers/' . $supplierId );
        }
    }