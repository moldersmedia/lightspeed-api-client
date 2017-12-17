<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class ShopTracking
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
            $fields = [ 'shopTracking' => $fields ];

            return $this->client->create( 'shop/tracking', $fields );
        }

        /**
         * @param int   $trackingId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $trackingId = null, $params = [] )
        {
            if (!$trackingId) {
                return $this->client->read( 'shop/tracking', $params );
            } else {
                return $this->client->read( 'shop/tracking/' . $trackingId, $params );
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
            return $this->client->read( 'shop/tracking/count', $params );
        }

        /**
         * @param int   $trackingId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $trackingId, $fields )
        {
            $fields = [ 'shopTracking' => $fields ];

            return $this->client->update( 'shop/tracking/' . $trackingId, $fields );
        }

        /**
         * @param int $trackingId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $trackingId )
        {
            return $this->client->delete( 'shop/tracking/' . $trackingId );
        }
    }