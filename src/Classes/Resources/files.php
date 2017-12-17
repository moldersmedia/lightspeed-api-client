<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Files
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
            $fields = [ 'file' => $fields ];

            return $this->client->create( 'files', $fields );
        }

        /**
         * @param int   $fileId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $fileId = null, $params = [] )
        {
            if (!$fileId) {
                return $this->client->read( 'files', $params );
            } else {
                return $this->client->read( 'files/' . $fileId, $params );
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
            return $this->client->read( 'files/count', $params );
        }

        /**
         * @param int   $fileId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $fileId, $fields )
        {
            $fields = [ 'file' => $fields ];

            return $this->client->update( 'files/' . $fileId, $fields );
        }

        /**
         * @param int $fileId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $fileId )
        {
            return $this->client->delete( 'files/' . $fileId );
        }
    }