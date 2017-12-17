<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class InvoicesMetafields
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
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function create( $invoiceId, $fields )
        {
            $fields = [ 'invoiceMetafield' => $fields ];

            return $this->client->create( 'invoices/' . $invoiceId . '/metafields', $fields );
        }

        /**
         * @param int   $invoiceId
         * @param int   $metafieldId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $invoiceId, $metafieldId = null, $params = [] )
        {
            if (!$metafieldId) {
                return $this->client->read( 'invoices/' . $invoiceId . '/metafields', $params );
            } else {
                return $this->client->read( 'invoices/' . $invoiceId . '/metafields/' . $metafieldId, $params );
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
            return $this->client->read( 'invoices/' . $invoiceId . '/metafields/count', $params );
        }

        /**
         * @param int   $invoiceId
         * @param int   $metafieldId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $invoiceId, $metafieldId, $fields )
        {
            $fields = [ 'invoiceMetafield' => $fields ];

            return $this->client->update( 'invoices/' . $invoiceId . '/metafields/' . $metafieldId, $fields );
        }

        /**
         * @param int $invoiceId
         * @param int $metafieldId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $invoiceId, $metafieldId )
        {
            return $this->client->delete( 'invoices/' . $invoiceId . '/metafields/' . $metafieldId );
        }
    }