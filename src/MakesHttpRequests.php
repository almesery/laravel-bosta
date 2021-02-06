<?php

namespace Almesery\Bosta;

use Almesery\Bosta\Exceptions\FailedActionException;
use Almesery\Bosta\Exceptions\NotFoundException;
use Almesery\Bosta\Exceptions\TimeoutException;
use Almesery\Bosta\Exceptions\ValidationException;
use Exception;
use Psr\Http\Message\ResponseInterface;

trait MakesHttpRequests
{
    /**
     * Make a GET request to Bosta servers and return the response.
     *
     * @param string $uri
     * @return mixed
     * @throws Exception
     */
    public function get(string $uri)
    {
        return $this->request('GET', $uri);
    }

    /**
     * Make a POST request to Bosta servers and return the response.
     *
     * @param string $uri
     * @param array $payload
     * @return mixed
     * @throws Exception
     */
    public function post(string $uri, array $payload = [])
    {
        return $this->request('POST', $uri, $payload);
    }

    /**
     * Make a PUT request to Bosta servers and return the response.
     *
     * @param string $uri
     * @param array $payload
     * @return mixed
     * @throws Exception
     */
    public function put(string $uri, array $payload = [])
    {
        return $this->request('PUT', $uri, $payload);
    }

    /**
     * Make a DELETE request to Bosta servers and return the response.
     *
     * @param string $uri
     * @param array $payload
     * @return mixed
     * @throws Exception
     */
    public function delete(string $uri, array $payload = [])
    {
        return $this->request('DELETE', $uri, $payload);
    }

    /**
     * Make request to Bosta servers and return the response.
     *
     * @param string $verb
     * @param string $uri
     * @param array $payload
     * @return mixed
     * @throws Exception
     */
    protected function request(string $verb, string $uri, array $payload = [])
    {
        $response = $this->guzzle->request(
            $verb,
            $uri,
            empty($payload) ? [] : ['form_params' => $payload]
        );

        if ($response->getStatusCode() != 200) {
            return $this->handleRequestError($response);
        }

        $responseBody = (string)$response->getBody();

        return json_decode($responseBody, true) ?: $responseBody;
    }

    /**
     * Handle the request error.
     *
     * @param ResponseInterface $response
     * @return void
     *
     * @throws Exception
     * @throws FailedActionException
     * @throws NotFoundException
     * @throws ValidationException
     */
    protected function handleRequestError(ResponseInterface $response)
    {
        if ($response->getStatusCode() == 422) {
            throw new ValidationException(json_decode((string)$response->getBody(), true));
        }

        if ($response->getStatusCode() == 404) {
            throw new NotFoundException();
        }

        if ($response->getStatusCode() == 400) {
            throw new FailedActionException((string)$response->getBody());
        }

        throw new Exception((string)$response->getBody());
    }

    /**
     * Retry the callback or fail after x seconds.
     *
     * @param int $timeout
     * @param callable $callback
     * @param int $sleep
     * @return mixed
     *
     * @throws TimeoutException
     */
    public function retry(int $timeout, callable $callback, $sleep = 5)
    {
        $start = time();

        beginning:

        if ($output = $callback()) {
            return $output;
        }

        if (time() - $start < $timeout) {
            sleep($sleep);

            goto beginning;
        }

        throw new TimeoutException($output);
    }
}
