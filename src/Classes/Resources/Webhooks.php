<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Webhooks
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
            $fields = [ 'webhook' => $fields ];

            return $this->client->create( 'webhooks', $fields );
        }

        /**
         * @param int   $webhookId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $webhookId = null, $params = [] )
        {
            if (!$webhookId) {
                return $this->client->read( 'webhooks', $params );
            } else {
                return $this->client->read( 'webhooks/' . $webhookId, $params );
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
            return $this->client->read( 'webhooks/count', $params );
        }

        /**
         * @param int   $webhookId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $webhookId, $fields )
        {
            $fields = [ 'webhook' => $fields ];

            return $this->client->update( 'webhooks/' . $webhookId, $fields );
        }

        /**
         * @param int $webhookId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $webhookId )
        {
            return $this->client->delete( 'webhooks/' . $webhookId );
        }
    }