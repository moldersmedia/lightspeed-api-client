<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class BlogsArticles
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
            $fields = [ 'blogArticle' => $fields ];

            return $this->client->create( 'blogs/articles', $fields );
        }

        /**
         * @param int   $articleId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $articleId = null, $params = [] )
        {
            if (!$articleId) {
                return $this->client->read( 'blogs/articles', $params );
            } else {
                return $this->client->read( 'blogs/articles/' . $articleId, $params );
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
            return $this->client->read( 'blogs/articles/count', $params );
        }

        /**
         * @param int   $articleId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $articleId, $fields )
        {
            $fields = [ 'blogArticle' => $fields ];

            return $this->client->update( 'blogs/articles/' . $articleId, $fields );
        }

        /**
         * @param int $articleId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $articleId )
        {
            return $this->client->delete( 'blogs/articles/' . $articleId );
        }
    }