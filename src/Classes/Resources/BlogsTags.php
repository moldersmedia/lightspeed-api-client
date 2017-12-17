<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class BlogsTags
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
            $fields = [ 'blogTag' => $fields ];

            return $this->client->create( 'blogs/tags', $fields );
        }

        /**
         * @param int   $tagId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get( $tagId = null, $params = [] )
        {
            if (!$tagId) {
                return $this->client->read( 'blogs/tags', $params );
            } else {
                return $this->client->read( 'blogs/tags/' . $tagId, $params );
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
            return $this->client->read( 'blogs/tags/count', $params );
        }

        /**
         * @param int   $tagId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         */
        public function update( $tagId, $fields )
        {
            $fields = [ 'blogTag' => $fields ];

            return $this->client->update( 'blogs/tags/' . $tagId, $fields );
        }

        /**
         * @param int $tagId
         *
         * @return array
         * @throws ApiClientException
         */
        public function delete( $tagId )
        {
            return $this->client->delete( 'blogs/tags/' . $tagId );
        }
    }