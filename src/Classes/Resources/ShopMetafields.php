<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class ShopMetafields
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
            $fields = [ 'shopMetafield' => $fields ];

            return $this->client->create( 'shop/metafields', $fields );
        }

        /**
         * @param int   $metafieldId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $metafieldId = null, $params = [] )
        {
            if (!$metafieldId) {
                return $this->client->read( 'shop/metafields', $params );
            } else {
                return $this->client->read( 'shop/metafields/' . $metafieldId, $params );
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
            return $this->client->read( 'shop/metafields/count', $params );
        }

        /**
         * @param int   $metafieldId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $metafieldId, $fields )
        {
            $fields = [ 'shopMetafield' => $fields ];

            return $this->client->update( 'shop/metafields/' . $metafieldId, $fields );
        }

        /**
         * @param int $metafieldId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $metafieldId )
        {
            return $this->client->delete( 'shop/metafields/' . $metafieldId );
        }
    }