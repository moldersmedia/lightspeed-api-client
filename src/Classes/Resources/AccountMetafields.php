<?php namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class AccountMetafields
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
         * @param int $metafieldId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         */
        public function get($metafieldId = null, $params = array())
        {
            if (!$metafieldId)
            {
                return $this->client->read('account/metafields', $params);
            }
            else
            {
                return $this->client->read('account/metafields/' . $metafieldId, $params);
            }
        }

        /**
         * @param array $params
         *
         * @return int
         * @throws ApiClientException
         */
        public function count($params = array())
        {
            return $this->client->read('account/metafields/count', $params);
        }
    }