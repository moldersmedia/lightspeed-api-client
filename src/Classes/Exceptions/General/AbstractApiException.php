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
     * @var
     */
    private $guzzleException;

    /**
     * AbstractApiException constructor.
     *
     * @param string $message
     * @param array  $payload
     * @param string $resource
     * @param        $guzzleException
     */
    public function __construct( $message, $payload, $resource, $guzzleException )
    {
        $this->resource        = $resource;
        $this->message         = $message;
        $this->payload         = $payload;
        $this->guzzleException = $guzzleException;
    }

    /**
     * @return \Throwable
     */
    public function getResource()
    {
        return $this->resource;
    }

    public function getGuzzleResponse()
    {
        return $this->guzzleException;
    }
}