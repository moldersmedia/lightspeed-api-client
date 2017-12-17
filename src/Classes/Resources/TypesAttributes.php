<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class TypesAttributes
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
            $fields = [ 'typesAttribute' => $fields ];

            return $this->client->create( 'types/attributes', $fields );
        }

        /**
         * @param int   $relationId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $relationId = null, $params = [] )
        {
            if (!$relationId) {
                return $this->client->read( 'types/attributes', $params );
            } else {
                return $this->client->read( 'types/attributes/' . $relationId, $params );
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
            return $this->client->read( 'types/attributes/count', $params );
        }

        /**
         * @param int $relationId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $relationId )
        {
            return $this->client->delete( 'types/attributes/' . $relationId );
        }
    }