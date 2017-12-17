<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class OrdersEvents
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
         * @param int   $eventId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $eventId = null, $params = [] )
        {
            if (!$eventId) {
                return $this->client->read( 'orders/events', $params );
            } else {
                return $this->client->read( 'orders/events/' . $eventId, $params );
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
            return $this->client->read( 'orders/events/count', $params );
        }
    }