<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Tickets
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
            $fields = [ 'ticket' => $fields ];

            return $this->client->create( 'tickets', $fields );
        }

        /**
         * @param int   $ticketId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $ticketId = null, $params = [] )
        {
            if (!$ticketId) {
                return $this->client->read( 'tickets', $params );
            } else {
                return $this->client->read( 'tickets/' . $ticketId, $params );
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
            return $this->client->read( 'tickets/count', $params );
        }

        /**
         * @param int   $ticketId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $ticketId, $fields )
        {
            $fields = [ 'ticket' => $fields ];

            return $this->client->update( 'tickets/' . $ticketId, $fields );
        }

        /**
         * @param int $ticketId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $ticketId )
        {
            return $this->client->delete( 'tickets/' . $ticketId );
        }
    }