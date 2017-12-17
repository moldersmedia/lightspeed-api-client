<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class CheckoutsShipmentMethods
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
         * @param int   $checkoutId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $checkoutId, $params = [] )
        {
            return $this->client->read( 'checkouts/' . $checkoutId . '/shipment_methods', $params );
        }
    }