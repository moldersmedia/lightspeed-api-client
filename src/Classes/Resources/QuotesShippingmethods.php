<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class QuotesShippingmethods
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
         * @param int $quoteId
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $quoteId )
        {
            return $this->client->read( 'quotes/' . $quoteId . '/shippingmethods' );
        }

        /**
         * @param int   $quoteId
         * @param array $params
         *
         * @return int
         * @throws ApiClientException
         */
        public function count( $quoteId, $params = [] )
        {
            return $this->client->read( 'quotes/' . $quoteId . '/shippingmethods/count', $params );
        }
    }