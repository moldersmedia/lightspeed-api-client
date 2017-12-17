<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class OrdersCustomstatuses
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
            $fields = [ 'customStatus' => $fields ];

            return $this->client->create( 'orders/customstatuses', $fields );
        }

        /**
         * @param int   $customstatusId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $customstatusId = null, $params = [] )
        {
            if (!$customstatusId) {
                return $this->client->read( 'orders/customstatuses', $params );
            } else {
                return $this->client->read( 'orders/customstatuses/' . $customstatusId, $params );
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
            return $this->client->read( 'orders/customstatuses/count', $params );
        }

        /**
         * @param int   $customstatusId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $customstatusId, $fields )
        {
            $fields = [ 'customStatus' => $fields ];

            return $this->client->update( 'orders/customstatuses/' . $customstatusId, $fields );
        }

        /**
         * @param int $customstatusId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $customstatusId )
        {
            return $this->client->delete( 'orders/customstatuses/' . $customstatusId );
        }
    }
