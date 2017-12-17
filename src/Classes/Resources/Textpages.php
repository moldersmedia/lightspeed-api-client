<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Textpages
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
            $fields = [ 'textpage' => $fields ];

            return $this->client->create( 'textpages', $fields );
        }

        /**
         * @param int   $textpageId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $textpageId = null, $params = [] )
        {
            if (!$textpageId) {
                return $this->client->read( 'textpages', $params );
            } else {
                return $this->client->read( 'textpages/' . $textpageId, $params );
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
            return $this->client->read( 'textpages/count', $params );
        }

        /**
         * @param int   $textpageId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $textpageId, $fields )
        {
            $fields = [ 'textpage' => $fields ];

            return $this->client->update( 'textpages/' . $textpageId, $fields );
        }

        /**
         * @param int $textpageId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $textpageId )
        {
            return $this->client->delete( 'textpages/' . $textpageId );
        }
    }