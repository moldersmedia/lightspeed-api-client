<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Languages
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
         * @param int   $languageId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $languageId = null, $params = [] )
        {
            if (!$languageId) {
                return $this->client->read( 'languages', $params );
            } else {
                return $this->client->read( 'languages/' . $languageId, $params );
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
            return $this->client->read( 'languages/count', $params );
        }
    }