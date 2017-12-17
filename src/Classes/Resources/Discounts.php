<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Discounts
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
            $fields = [ 'discount' => $fields ];

            return $this->client->create( 'discounts', $fields );
        }

        /**
         * @param int   $discountId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $discountId = null, $params = [] )
        {
            if (!$discountId) {
                return $this->client->read( 'discounts', $params );
            } else {
                return $this->client->read( 'discounts/' . $discountId, $params );
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
            return $this->client->read( 'discounts/count', $params );
        }

        /**
         * @param int   $discountId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $discountId, $fields )
        {
            $fields = [ 'discount' => $fields ];

            return $this->client->update( 'discounts/' . $discountId, $fields );
        }

        /**
         * @param int $discountId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $discountId )
        {
            return $this->client->delete( 'discounts/' . $discountId );
        }
    }