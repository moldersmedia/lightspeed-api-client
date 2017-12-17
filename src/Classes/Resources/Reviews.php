<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Reviews
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
            $fields = [ 'review' => $fields ];

            return $this->client->create( 'reviews', $fields );
        }

        /**
         * @param int   $reviewId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $reviewId = null, $params = [] )
        {
            if (!$reviewId) {
                return $this->client->read( 'reviews', $params );
            } else {
                return $this->client->read( 'reviews/' . $reviewId, $params );
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
            return $this->client->read( 'reviews/count', $params );
        }

        /**
         * @param int   $reviewId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $reviewId, $fields )
        {
            $fields = [ 'review' => $fields ];

            return $this->client->update( 'reviews/' . $reviewId, $fields );
        }

        /**
         * @param int $reviewId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $reviewId )
        {
            return $this->client->delete( 'reviews/' . $reviewId );
        }
    }