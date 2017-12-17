<?php namespace MoldersMedia\LightspeedApi\Classes\Exceptions\General;

/**
 * Class ApiLimitReachedException
 *
 * @package MoldersMedia\LightspeedApi\Classes\Exceptions\General
 */
/**
 * Class ApiLimitReachedException
 *
 * @package MoldersMedia\LightspeedApi\Classes\Exceptions\General
 */
class ApiLimitReachedException extends AbstractApiException
{
    private $waitTime;

    /**
     * ApiLimitReachedException constructor.
     *
     * @param string $waitTime
     * @param array  $payload
     * @param int    $resource
     */
    public function __construct( $waitTime, $payload, $resource )
    {
        $message = 'Too many requests in this time period. Try again in ' . $waitTime . ' seconds';

        $this->waitTime = $waitTime;

        parent::__construct( $message, $payload, $resource );
    }

    public function getWaitTime()
    {
        return $this->waitTime;
    }
}