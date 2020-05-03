<?php

namespace GloriaFood\communications;

use GuzzleHttp\Client;

class HttpConnector
{

    /**
     * Options to be used by Guzzle
     * @var $_options
     */
    protected $_options;

    /**
     * Constructor
     *
     */
    function __construct() {
    }

    /**
     * Add a HTTP header to the request
     *
     * @param $key
     * @param $value
     */
    public function setHeader($key,$value)
    {
        if(!isset($this->_options['headers']))
        {
            $this->_options['headers'] = array();
        }
        $this->_options['headers'][$key] = $value;
    }

    /**
     * processRequest() function - Public facing function to send a request to an endpoint.
     *
     * @param $url
     * @return    array    Parsed API response from private request method
     * @access    public
     */
    public function processRequest($url) {
        return $this->request($url );
    }

    /**
     * request() function - Internal function to send a request to an endpoint.
     *
     * @param string $url Incoming API Endpoint
     * @return    array Parsed API response
     *
     * @throws ApiException
     * @throws ConnectorException
     * @access    private
     */
    private function request($url)
    {
        $client = new Client();
        $response = null;

        try {
            $response = $client->request("GET", $url, $this->_options);
        }
        catch (RequestException | ConnectException $e)
        {
            throw new ConnectorException('Unexpected Guzzle error ' . $e->getMessage(), 0);
        }

        if (false === $response) { //make sure we got something back
            throw new ConnectorException("No response was received", 0);
        }

        if (is_null($response)) {
            throw new ConnectorException('Unexpected response format', 0);
        }

        // Check for HTTP error codes
        $statusCode = $response->getStatusCode();
        if( !($statusCode >= 200 && $statusCode < 300) )
        {
            throw new ConnectorException(
                "Received HTTP response",
                $statusCode);
        }

        if (false === $response) { //make sure we got something back
            throw new ConnectorException("No response was received", 0);
        }

        if (is_null($response)) {
            throw new ConnectorException('Unexpected response format', 0);
        }

        $res = json_decode($response->getBody(),true);

        // Check for HTTP error codes
        $statusCode = $response->getStatusCode();
        if( !($statusCode >= 200 && $statusCode < 300) )
        {
            throw new ApiException("", $statusCode);
        }

        return $res;

    }
}
