<?php namespace MoldersMedia\LightspeedApi\Classes\Exceptions\General;

/**
 * Class ApiLimitReachedException
 *
 * @package MoldersMedia\LightspeedApi\Classes\Exceptions\General
 */
class ApiLimitReachedException extends AbstractApiException
{
    /**
     * @var string
     */
    private $waitTime;

    /**
     * ApiLimitReachedException constructor.
     *
     * @param string $waitTime
     * @param array  $payload
     * @param int    $resource
     * @param        $guzzleException
     */
    public function __construct( $waitTime, $payload, $resource, $guzzleException )
    {
        $message = 'Too many requests in this time period. Try again in ' . $waitTime . ' seconds';

        $this->waitTime = $waitTime;

        parent::__construct( $message, $payload, $resource, $guzzleException );
    }

    /**
     * @return string
     */
    public function getWaitTime()
    {
        return $this->waitTime;
    }
}