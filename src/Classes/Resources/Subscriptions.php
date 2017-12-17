<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Subscriptions
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
            $fields = [ 'subscription' => $fields ];

            return $this->client->create( 'subscriptions', $fields );
        }

        /**
         * @param int   $subscriptionId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $subscriptionId = null, $params = [] )
        {
            if (!$subscriptionId) {
                return $this->client->read( 'subscriptions', $params );
            } else {
                return $this->client->read( 'subscriptions/' . $subscriptionId, $params );
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
            return $this->client->read( 'subscriptions/count', $params );
        }

        /**
         * @param int   $subscriptionId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $subscriptionId, $fields )
        {
            $fields = [ 'subscription' => $fields ];

            return $this->client->update( 'subscriptions/' . $subscriptionId, $fields );
        }

        /**
         * @param int $subscriptionId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $subscriptionId )
        {
            return $this->client->delete( 'subscriptions/' . $subscriptionId );
        }
    }
