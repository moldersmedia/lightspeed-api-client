<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class ShopJavascript
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
         * @return array
         * @throws ApiClientException
         */
        public function get()
        {
            return $this->client->read( 'shop/javascript' );
        }

        /**
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $fields )
        {
            $fields = [ 'shopJavascript' => $fields ];

            return $this->client->update( 'shop/javascript', $fields );
        }
    }