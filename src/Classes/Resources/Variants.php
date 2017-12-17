<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Variants
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
            $fields = [ 'variant' => $fields ];

            return $this->client->create( 'variants', $fields );
        }

        /**
         * @param int   $variantId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $variantId = null, $params = [] )
        {
            if (!$variantId) {
                return $this->client->read( 'variants', $params );
            } else {
                return $this->client->read( 'variants/' . $variantId, $params );
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
            return $this->client->read( 'variants/count', $params );
        }

        /**
         * @param int   $variantId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $variantId, $fields )
        {
            $fields = [ 'variant' => $fields ];

            return $this->client->update( 'variants/' . $variantId, $fields );
        }

        /**
         * @param int $variantId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $variantId )
        {
            return $this->client->delete( 'variants/' . $variantId );
        }
    }