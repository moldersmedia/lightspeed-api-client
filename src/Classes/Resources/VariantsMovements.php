<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class VariantsMovements
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
         * @param int   $movementId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $movementId = null, $params = [] )
        {
            if (!$movementId) {
                return $this->client->read( 'variants/movements', $params );
            } else {
                return $this->client->read( 'variants/movements/' . $movementId, $params );
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
            return $this->client->read( 'variants/movements/count', $params );
        }
    }