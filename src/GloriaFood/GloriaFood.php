<?php

namespace GloriaFood;

require_once 'Exception.php';
require_once 'Configuration.php';
require_once 'communications/Endpoints.php';
require_once 'communications/HttpConnector.php';
require_once 'api/FetchMenu.php';

class GloriaFood
{
    /**
     * Config object
     *
     * Holds API token, Serial and API version
     *
     * @var	Configuration	$_config
     */
    protected $_config;

    /**
     * API Objects
     *
     * Stores APIs with required config
     */
    protected $_fetchMenuAPI;

    /**
     * Constructor
     *
     * @param $authKey Authorization key obtained from GloriaFood web application
     */
    public function __construct($authKey)
    {
        //set configs
        $this->_config = new Configuration();
        $this->_config->setAuthKey($authKey);
    }

    /**
     * getConfig() function
     *
     * @return Configuration This API client's configuration
     */
    public function getConfig()
    {
        return $this->_config;
    }

    /**
     * fetchMenu() function
     *
     * @return FetchMenu API
     * @throws ConfigurationException
     */
    public function fetchMenu()
    {
        if (is_null($this->_fetchMenuAPI)) {
            $this->_fetchMenuAPI = new FetchMenu($this->_config);
        }
        return $this->_fetchMenuAPI;
    }

}