<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Contacts
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
         * @param int   $contactId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $contactId = null, $params = [] )
        {
            if (!$contactId) {
                return $this->client->read( 'contacts', $params );
            } else {
                return $this->client->read( 'contacts/' . $contactId, $params );
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
            return $this->client->read( 'contacts/count', $params );
        }
    }