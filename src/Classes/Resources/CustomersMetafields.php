<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class CustomersMetafields
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
         * @param int   $customerId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function create( $customerId, $fields )
        {
            $fields = [ 'customerMetafield' => $fields ];

            return $this->client->create( 'customers/' . $customerId . '/metafields', $fields );
        }

        /**
         * @param int   $customerId
         * @param int   $metafieldId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $customerId, $metafieldId = null, $params = [] )
        {
            if (!$metafieldId) {
                return $this->client->read( 'customers/' . $customerId . '/metafields', $params );
            } else {
                return $this->client->read( 'customers/' . $customerId . '/metafields/' . $metafieldId, $params );
            }
        }

        /**
         * @param int   $customerId
         * @param array $params
         *
         * @return int
         * @throws ApiClientException
         */
        public function count( $customerId, $params = [] )
        {
            return $this->client->read( 'customers/' . $customerId . '/metafields/count', $params );
        }

        /**
         * @param int   $customerId
         * @param int   $metafieldId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $customerId, $metafieldId, $fields )
        {
            $fields = [ 'customerMetafield' => $fields ];

            return $this->client->update( 'customers/' . $customerId . '/metafields/' . $metafieldId, $fields );
        }

        /**
         * @param int $customerId
         * @param int $metafieldId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $customerId, $metafieldId )
        {
            return $this->client->delete( 'customers/' . $customerId . '/metafields/' . $metafieldId );
        }
    }