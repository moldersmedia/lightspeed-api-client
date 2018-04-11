<?php namespace MoldersMedia\LightspeedApi\Classes\Resources;

use MoldersMedia\LightspeedApi\Classes\Api\ApiClient;
use MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiClientException;

class Deliverydates
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
    public function create($fields)
    {
        $fields = ['deliverydate' => $fields];

        return $this->client->create('deliverydates', $fields);
    }

    /**
     * @param int $deliverydateId
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
    public function get($deliverydateId = null, $params = [])
    {
        if (!$deliverydateId) {
            return $this->client->read('deliverydates', $params);
        } else {
            return $this->client->read('deliverydates/' . $deliverydateId, $params);
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
        return $this->client->read('deliverydates/count', $params);
    }

    /**
     * @param int $deliverydateId
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
    public function update($deliverydateId, $fields)
    {
        $fields = ['deliverydate' => $fields];

        return $this->client->update('deliverydates/' . $deliverydateId, $fields);
    }

    /**
     * @param int $deliverydateId
     *
     * @return array
     * @throws ApiClientException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiLimitReachedException
     * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\ApiSleepTimeException
     * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\General\InvalidApiCredentialsException
     * @throws \MoldersMedia\LightspeedApi\Classes\Exceptions\Resources\SupplierExistsException
     */
    public function delete($deliverydateId)
    {
        return $this->client->delete('deliverydates/' . $deliverydateId);
    }
}