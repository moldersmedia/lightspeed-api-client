<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Discountrules
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
            $fields = [ 'discountRule' => $fields ];

            return $this->client->create( 'discountrules', $fields );
        }

        /**
         * @param int   $discountruleId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $discountruleId = null, $params = [] )
        {
            if (!$discountruleId) {
                return $this->client->read( 'discountrules', $params );
            } else {
                return $this->client->read( 'discountrules/' . $discountruleId, $params );
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
            return $this->client->read( 'discountrules/count', $params );
        }

        /**
         * @param int   $discountruleId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $discountruleId, $fields )
        {
            $fields = [ 'discountRule' => $fields ];

            return $this->client->update( 'discountrules/' . $discountruleId, $fields );
        }

        /**
         * @param int $discountruleId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $discountruleId )
        {
            return $this->client->delete( 'discountrules/' . $discountruleId );
        }
    }