<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Taxes
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
            $fields = [ 'tax' => $fields ];

            return $this->client->create( 'taxes', $fields );
        }

        /**
         * @param int   $taxId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $taxId = null, $params = [] )
        {
            if (!$taxId) {
                return $this->client->read( 'taxes', $params );
            } else {
                return $this->client->read( 'taxes/' . $taxId, $params );
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
            return $this->client->read( 'taxes/count', $params );
        }

        /**
         * @param int   $taxId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $taxId, $fields )
        {
            $fields = [ 'tax' => $fields ];

            return $this->client->update( 'taxes/' . $taxId, $fields );
        }

        /**
         * @param int $taxId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $taxId )
        {
            return $this->client->delete( 'taxes/' . $taxId );
        }
    }