<?php

    namespace MoldersMedia\LightspeedApi\Classes\Resources;

    use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
    use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

    class OrdersProducts
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
         * @param int $orderId
         * @param int $productId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         * @throws \GuzzleHttp\Exception\GuzzleException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiLimitReachedException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiSleepTimeException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\InvalidApiCredentialsException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\Resources\SupplierExistsException
         */
        public function get($orderId, $productId = null, $params = [])
        {
            if (!$productId) {
                return $this->client->read('orders/' . $orderId . '/products', $params);
            } else {
                return $this->client->read('orders/' . $orderId . '/products/' . $productId, $params);
            }
        }

        /**
         * @param int $orderId
         * @param array $params
         *
         * @return array
         * @throws ApiClientException
         * @throws \GuzzleHttp\Exception\GuzzleException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiLimitReachedException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiSleepTimeException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\InvalidApiCredentialsException
         * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\Resources\SupplierExistsException
         */
        public function count($orderId, $params = [])
        {
            return $this->client->read('orders/' . $orderId . '/products/count', $params);
        }
    }