<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class BlogsArticlesTags
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
            $fields = [ 'blogArticleTag' => $fields ];

            return $this->client->create( 'blogs/articles/tags', $fields );
        }

        /**
         * @param int   $relationId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $relationId = null, $params = [] )
        {
            if (!$relationId) {
                return $this->client->read( 'blogs/articles/tags', $params );
            } else {
                return $this->client->read( 'blogs/articles/tags/' . $relationId, $params );
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
            return $this->client->read( 'blogs/articles/tags/count', $params );
        }

        /**
         * @param int $relationId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $relationId )
        {
            return $this->client->delete( 'blogs/articles/tags/' . $relationId );
        }
    }