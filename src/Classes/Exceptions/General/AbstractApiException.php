<?php namespace MoldersMedia\LightspeedApi\Classes\Exceptions\General;

abstract class AbstractApiException extends \Exception
{
    private $resource;
    private $payload;

    public function __construct( $message, $payload, $resource )
    {
        $this->resource = $resource;
        $this->message  = $message;
        $this->payload  = $payload;
    }

    public function getResource()
    {
        return $this->resource;
    }
}