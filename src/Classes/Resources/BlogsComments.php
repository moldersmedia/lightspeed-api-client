<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class BlogsComments
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
            $fields = [ 'blogComment' => $fields ];

            return $this->client->create( 'blogs/comments', $fields );
        }

        /**
         * @param int   $commentId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $commentId = null, $params = [] )
        {
            if (!$commentId) {
                return $this->client->read( 'blogs/comments', $params );
            } else {
                return $this->client->read( 'blogs/comments/' . $commentId, $params );
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
            return $this->client->read( 'blogs/comments/count', $params );
        }

        /**
         * @param int   $commentId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $commentId, $fields )
        {
            $fields = [ 'blogComment' => $fields ];

            return $this->client->update( 'blogs/comments/' . $commentId, $fields );
        }

        /**
         * @param int $commentId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $commentId )
        {
            return $this->client->delete( 'blogs/comments/' . $commentId );
        }
    }