<?php

    namespace MoldersMedia\LightspeedApi\Classes\Exceptions\General;

    /**
     * Class ApiClientException
     *
     * @package MoldersMedia\LightspeedApi\Classes\Exceptions\General
     */
    class ApiClientException extends AbstractApiException
    {
        /**
         * ApiClientException constructor.
         *
         * @param string $message
         * @param array $payload
         * @param string $resource
         * @param        $guzzleException
         */
        public function __construct($message, $payload, $resource, $guzzleException)
        {
            parent::__construct($message, $payload, $resource, $guzzleException);
        }
    }