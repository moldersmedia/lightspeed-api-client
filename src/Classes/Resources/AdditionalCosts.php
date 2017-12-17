<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class AdditionalCosts
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
         * @param int   $additionalcostId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $additionalcostId = null, $params = [] )
        {
            if (!$additionalcostId) {
                return $this->client->read( 'additionalcosts', $params );
            } else {
                return $this->client->read( 'additionalcosts/' . $additionalcostId, $params );
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
            return $this->client->read( 'additionalcosts/count', $params );
        }

        /**
         * @param int   $additionalcostId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $additionalcostId, $fields )
        {
            $fields = [ 'additionalCost' => $fields ];

            return $this->client->update( 'additionalcosts/' . $additionalcostId, $fields );
        }

        /**
         * @param int $additionalcostId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $additionalcostId )
        {
            return $this->client->delete( 'additionalcosts/' . $additionalcostId );
        }
    }