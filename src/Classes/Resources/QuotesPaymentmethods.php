<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class QuotesPaymentmethods
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
            return $this->client->read( 'quotes/' . $quoteId . '/paymentmethods' );
        }

        /**
         * @param array $params
         *
         * @return int
         * @throws ApiClientException
         */
        public function count( $quoteId, $params = [] )
        {
            return $this->client->read( 'quotes/' . $quoteId . '/paymentmethods/count', $params );
        }
    }