<?php namespace MoldersMedia\LightspeedApi\Classes\Exceptions\Resources;

use GuzzleHttp\Exception\ClientException;

abstract class AbstractItemNotFoundException extends \Exception
{
    /**
     * @var ClientException
     */
    private $exception;

    public function __construct(ClientException $exception)
    {
        $this->exception = $exception;
    }

    public function handle()
    {

    }
}