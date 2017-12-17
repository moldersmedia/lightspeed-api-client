<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Invoices
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
         * @param int   $invoiceId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $invoiceId = null, $params = [] )
        {
            if (!$invoiceId) {
                return $this->client->read( 'invoices', $params );
            } else {
                return $this->client->read( 'invoices/' . $invoiceId, $params );
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
            return $this->client->read( 'invoices/count', $params );
        }

        /**
         * @param int   $invoiceId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $invoiceId, $fields )
        {
            $fields = [ 'invoice' => $fields ];

            return $this->client->update( 'invoices/' . $invoiceId, $fields );
        }
    }