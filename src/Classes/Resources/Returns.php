<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Returns
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
            $fields = [ 'returns' => $fields ];

            return $this->client->create( 'returns', $fields );
        }

        /**
         * @param int   $returnId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $returnId = null, $params = [] )
        {
            if (!$returnId) {
                return $this->client->read( 'returns', $params );
            } else {
                return $this->client->read( 'returns/' . $returnId, $params );
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
            return $this->client->read( 'returns/count', $params );
        }

        /**
         * @param int   $returnId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $returnId, $fields )
        {
            $fields = [ 'return' => $fields ];

            return $this->client->update( 'returns/' . $returnId, $fields );
        }

        /**
         * @param int $returnId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $returnId )
        {
            return $this->client->delete( 'returns/' . $returnId );
        }
    }