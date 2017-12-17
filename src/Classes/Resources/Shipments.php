<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Shipments
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
         * @param int   $shipmentId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $shipmentId = null, $params = [] )
        {
            if (!$shipmentId) {
                return $this->client->read( 'shipments', $params );
            } else {
                return $this->client->read( 'shipments/' . $shipmentId, $params );
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
            return $this->client->read( 'shipments/count', $params );
        }

        /**
         * @param int   $shipmentId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $shipmentId, $fields )
        {
            $fields = [ 'shipment' => $fields ];

            return $this->client->update( 'shipments/' . $shipmentId, $fields );
        }
    }