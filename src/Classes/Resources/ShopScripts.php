<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class ShopScripts
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
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function create( $fields )
        {
            $fields = [ 'shopScript' => $fields ];

            return $this->client->create( 'shop/scripts', $fields );
        }

        /**
         * @param int   $scriptId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $scriptId = null, $params = [] )
        {
            if (!$scriptId) {
                return $this->client->read( 'shop/scripts', $params );
            } else {
                return $this->client->read( 'shop/scripts/' . $scriptId, $params );
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
            return $this->client->read( 'shop/scripts/count', $params );
        }

        /**
         * @param int   $scriptId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $scriptId, $fields )
        {
            $fields = [ 'shopScript' => $fields ];

            return $this->client->update( 'shop/scripts/' . $scriptId, $fields );
        }

        /**
         * @param int $scriptId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $scriptId )
        {
            return $this->client->delete( 'shop/scripts/' . $scriptId );
        }
    }