<?php
namespace GloriaFood\Api;

class FetchMenu
{
    /**
     * Ping Endpoint object
     *
     * @var string $_endpoint
     */
    protected $_endpoint;

    /**
     * HttpConnector object
     *
     * @var	HttpConnector	$_connector
     */
    protected $_connector;

    /**
     * Constructor
     *
     * Inits the appropriate endpoint and httpconnector objects
     * Sets all of the Ping class properties
     *
     * @param Configuration $config
     */
    function __construct(Configuration $config) {
        //init endpoint
        $this->_endpoint = new Endpoints();

        //init http connector
        $this->_connector = new HttpConnector();
        $this->_connector->setHeader("Authorization", $config->getAuthKey());
        $this->_connector->setHeader("Accept", "application/json");
        $this->_connector->setHeader("Glf-Api-Version", 2);
    }

    /**
     * fetchMenu() Fetch the menu from GloriaFood
     *
     * @return array GloriaFood Menu
     */
    public function fetchMenu() {
        $endpoint =  $this->_endpoint->getFetchMenuURL();
        $result = $this->_connector->processRequest($endpoint);
        return json_decode(json_encode($result));
    }
}