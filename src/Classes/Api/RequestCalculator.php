<?php namespace MoldersMedia\LightspeedApi\Classes\Api;

use Psr\Http\Message\ResponseInterface;

/**
 * Class RequestCalculator
 *
 * @package MoldersMedia\LightspeedApi\Classes\Api
 */
class RequestCalculator
{
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;

    /**
     * RequestCalculator constructor.
     *
     * @param \Psr\Http\Message\ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }

    /**
     * @return array
     */
    public function getRequestsLeft()
    {
        $header = $this->response->getHeader('X-RateLimit-Remaining')[0];

        [$minute, $hour, $day] = explode('/', $header);

        return compact('minute', 'hour', 'day');
    }

    /**
     * @return array
     */
    public function getRequestLimits()
    {
        $header = $this->response->getHeader('X-RateLimit-Limit')[0];

        [$minute, $hour, $day] = explode('/', $header);

        return compact('minute', 'hour', 'day');
    }
}