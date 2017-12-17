<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class InvoicesItems
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
         * @param int   $itemId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $invoiceId, $itemId = null, $params = [] )
        {
            if (!$itemId) {
                return $this->client->read( 'invoices/' . $invoiceId . '/items', $params );
            } else {
                return $this->client->read( 'invoices/' . $invoiceId . '/items/' . $itemId, $params );
            }
        }

        /**
         * @param int   $invoiceId
         * @param array $params
         *
         * @return int
         * @throws ApiClientException
         */
        public function count( $invoiceId, $params = [] )
        {
            return $this->client->read( 'invoices/' . $invoiceId . '/items/count', $params );
        }
    }