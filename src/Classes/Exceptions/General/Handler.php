<?php namespace MoldersMedia\LightspeedApi\Classes\Exceptions\General;

use GuzzleHttp\Exception\ClientException;

class Handler
{
    /**
     * @var \Exception|ClientException
     */
    private $e;

    public function __construct(ClientException $e)
    {
        $this->e = $e;
    }

    public function getException()
    {
        return $this->e;
    }

    public function handle()
    {
        $error = json_decode($this->getContents(), true);

        $message = $error['error']['message'];
        dd(__LINE__ . ':[' . __FILE__ . ']', $error, $this->e);

    }

    public function getContents()
    {
        return $this->getBody()->getContents();
    }

    public function getBody()
    {
        return $this->getResponse()->getBody();
    }

    public function getResponse()
    {
        return $this->e->getResponse();
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface $responseInterface
     * @return int
     */
    protected function extractCallsLeft($responseInterface)
    {
        return $this->extractFirstParameterFromHeader($responseInterface, 'X-RateLimit-Remaining');
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface $responseInterface
     * @param string $header
     * @return int
     */
    private function extractFirstParameterFromHeader($responseInterface, $header)
    {
        $limitReset = $responseInterface->getHeader($header)[0];

        [$resetMinute] = explode('/', $limitReset);

        return (int)$resetMinute;
    }

    /**
     * @param \Psr\Http\Message\ResponseInterface $responseInterface
     * @return int
     */
    protected function extractResetTime($responseInterface)
    {
        return $this->extractFirstParameterFromHeader($responseInterface, 'X-RateLimit-Reset');
    }
}