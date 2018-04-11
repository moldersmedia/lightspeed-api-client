<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class BlogsArticlesImage
    {
        /**
         * @var ApiClient
         */
        private $client;

        public function __construct(ApiClient $client)
        {
            $this->client = $client;
        }

        /**
         * @param int $articleId
         * @param array $fields
         *
         * @return array
         * @throws ApiClientException
         * @throws \GuzzleHttp\Exception\GuzzleException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiLimitReachedException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiSleepTimeException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\InvalidApiCredentialsException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\Resources\SupplierExistsException
         */
        public function create($articleId, $fields)
        {
            $fields = ['blogArticleImage' => $fields];

            return $this->client->create('blogs/articles/' . $articleId . '/image', $fields);
        }

        /**
         * @param int $articleId
         *
         * @return array
         * @throws ApiClientException
         * @throws \GuzzleHttp\Exception\GuzzleException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiLimitReachedException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiSleepTimeException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\InvalidApiCredentialsException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\Resources\SupplierExistsException
         */
        public function get($articleId)
        {
            return $this->client->read('blogs/articles/' . $articleId . '/image');
        }

        /**
         * @param int $articleId
         *
         * @return array
         * @throws ApiClientException
         * @throws \GuzzleHttp\Exception\GuzzleException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiLimitReachedException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiSleepTimeException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\InvalidApiCredentialsException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\Resources\SupplierExistsException
         */
        public function delete($articleId)
        {
            return $this->client->delete('blogs/articles/' . $articleId . '/image');
        }
    }