<?php namespace MoldersMedia\LightspeedApi\Classes\Exceptions\General;

/**
 * Class AbstractApiException
 *
 * @package MoldersMedia\LightspeedApi\Classes\Exceptions\General
 */
abstract class AbstractApiException extends \Exception
{
    /**
     * @var \Throwable
     */
    private $resource;
    /**
     * @var int
     */
    private $payload;

    /**
     * AbstractApiException constructor.
     *
     * @param string $message
     * @param array  $payload
     * @param string $resource
     */
    public function __construct( $message, $payload, $resource )
    {
        $this->resource = $resource;
        $this->message  = $message;
        $this->payload  = $payload;
    }

    /**
     * @return \Throwable
     */
    public function getResource()
    {
        return $this->resource;
    }
}