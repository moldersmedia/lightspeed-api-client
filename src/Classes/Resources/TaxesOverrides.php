<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class TaxesOverrides
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
         * @param int   $taxId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function create( $taxId, $fields )
        {
            $fields = [ 'taxOverride' => $fields ];

            return $this->client->create( 'taxes/' . $taxId . '/overrides', $fields );
        }

        /**
         * @param int   $taxId
         * @param int   $taxOverrideId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $taxId, $taxOverrideId = null, $params = [] )
        {
            if (!$taxOverrideId) {
                return $this->client->read( 'taxes/' . $taxId . '/overrides', $params );
            } else {
                return $this->client->read( 'taxes/' . $taxId . '/overrides/' . $taxOverrideId, $params );
            }
        }

        /**
         * @param int   $taxId
         * @param array $params
         *
         * @return int
         * @throws ApiClientException
         */
        public function count( $taxId, $params = [] )
        {
            return $this->client->read( 'taxes/' . $taxId . '/overrides/count', $params );
        }

        /**
         * @param int   $taxId
         * @param int   $taxOverrideId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $taxId, $taxOverrideId, $fields )
        {
            $fields = [ 'taxOverride' => $fields ];

            return $this->client->update( 'taxes/' . $taxId . '/overrides/' . $taxOverrideId, $fields );
        }

        /**
         * @param int $taxId
         * @param int $taxOverrideId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $taxId, $taxOverrideId )
        {
            return $this->client->delete( 'taxes/' . $taxId . '/overrides/' . $taxOverrideId );
        }
    }