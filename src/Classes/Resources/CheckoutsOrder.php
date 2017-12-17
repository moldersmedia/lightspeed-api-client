<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class CheckoutsOrder
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
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function create( $checkoutId, $fields )
        {
            return $this->client->create( 'checkouts/' . $checkoutId . '/order', $fields );
        }
    }