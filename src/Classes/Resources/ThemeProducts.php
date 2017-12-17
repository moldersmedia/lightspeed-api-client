<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class ThemeProducts
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
            $fields = [ 'themeProduct' => $fields ];

            return $this->client->create( 'theme/products', $fields );
        }

        /**
         * @param int   $productId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $productId = null, $params = [] )
        {
            if (!$productId) {
                return $this->client->read( 'theme/products', $params );
            } else {
                return $this->client->read( 'theme/products/' . $productId, $params );
            }
        }

        /**
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function count( $params = [] )
        {
            return $this->client->read( 'theme/products/count', $params );
        }

        /**
         * @param int   $productId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $productId, $fields )
        {
            $fields = [ 'themeProduct' => $fields ];

            return $this->client->update( 'theme/products/' . $productId, $fields );
        }

        /**
         * @param int $productId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $productId )
        {
            return $this->client->delete( 'theme/products/' . $productId );
        }
    }

