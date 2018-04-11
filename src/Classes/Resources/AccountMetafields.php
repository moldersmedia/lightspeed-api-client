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
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiLimitReachedException
     * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiSleepTimeException
     * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\InvalidApiCredentialsException
     * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\Resources\SupplierExistsException
     */
    public function get($metafieldId = null, $params = [])
    {
        if (!$metafieldId) {
            return $this->client->read('account/metafields', $params);
        } else {
            return $this->client->read('account/metafields/' . $metafieldId, $params);
        }
    }

    /**
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
    public function count($params = [])
    {
        return $this->client->read('account/metafields/count', $params);
    }
}