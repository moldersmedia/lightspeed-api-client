<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Events
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
                return $this->client->read( 'events', $params );
            } else {
                return $this->client->read( 'events/' . $eventId, $params );
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
            return $this->client->read( 'events/count', $params );
        }

        /**
         * @param int $eventId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $eventId )
        {
            return $this->client->delete( 'events/' . $eventId );
        }
    }