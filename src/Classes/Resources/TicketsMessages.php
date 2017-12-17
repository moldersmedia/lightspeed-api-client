<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class TicketsMessages
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
         * @param int   $ticketId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function create( $ticketId, $fields )
        {
            $fields = [ 'ticketMessage' => $fields ];

            return $this->client->create( 'tickets/' . $ticketId . '/messages', $fields );
        }

        /**
         * @param int   $ticketId
         * @param int   $messageId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $ticketId, $messageId = null, $params = [] )
        {
            if (!$messageId) {
                return $this->client->read( 'tickets/' . $ticketId . '/messages', $params );
            } else {
                return $this->client->read( 'tickets/' . $ticketId . '/messages/' . $messageId, $params );
            }
        }

        /**
         * @param int   $ticketId
         * @param array $params
         *
         * @return int
         * @throws ApiClientException
         */
        public function count( $ticketId, $params = [] )
        {
            return $this->client->read( 'tickets/' . $ticketId . '/messages/count', $params );
        }

        /**
         * @param int   $ticketId
         * @param int   $messageId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $ticketId, $messageId, $fields )
        {
            $fields = [ 'ticketMessage' => $fields ];

            return $this->client->update( 'tickets/' . $ticketId . '/messages/' . $messageId, $fields );
        }

        /**
         * @param int $ticketId
         * @param int $messageId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $ticketId, $messageId )
        {
            return $this->client->delete( 'tickets/' . $ticketId . '/messages/' . $messageId );
        }
    }