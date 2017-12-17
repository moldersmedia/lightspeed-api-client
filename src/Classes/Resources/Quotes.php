<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Quotes
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
            $fields = [ 'quote' => $fields ];

            return $this->client->create( 'quotes', $fields );
        }

        /**
         * @param int   $quoteId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $quoteId = null, $params = [] )
        {
            if (!$quoteId) {
                return $this->client->read( 'quotes', $params );
            } else {
                return $this->client->read( 'quotes/' . $quoteId, $params );
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
            return $this->client->read( 'quotes/count', $params );
        }

        /**
         * @param int   $quoteId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $quoteId, $fields )
        {
            $fields = [ 'quote' => $fields ];

            return $this->client->update( 'quotes/' . $quoteId, $fields );
        }
    }