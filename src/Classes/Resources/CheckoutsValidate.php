<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class CheckoutsValidate
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
         * @param int $checkoutId
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $checkoutId )
        {
            return $this->client->read( 'checkouts/' . $checkoutId . '/validate' );
        }
    }