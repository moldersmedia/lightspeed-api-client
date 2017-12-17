<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class Blogs
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
            $fields = [ 'blog' => $fields ];

            return $this->client->create( 'blogs', $fields );
        }

        /**
         * @param int   $blogId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $blogId = null, $params = [] )
        {
            if (!$blogId) {
                return $this->client->read( 'blogs', $params );
            } else {
                return $this->client->read( 'blogs/' . $blogId, $params );
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
            return $this->client->read( 'blogs/count', $params );
        }

        /**
         * @param int   $blogId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $blogId, $fields )
        {
            $fields = [ 'blog' => $fields ];

            return $this->client->update( 'blogs/' . $blogId, $fields );
        }

        /**
         * @param int $blogId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $blogId )
        {
            return $this->client->delete( 'blogs/' . $blogId );
        }
    }