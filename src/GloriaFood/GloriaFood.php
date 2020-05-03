<?php

namespace GloriaFood;

use GloriaFood\api\FetchMenu;

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
     * @param $authKey String Authorization key obtained from GloriaFood web application
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
     */
    public function fetchMenu()
    {
        if (is_null($this->_fetchMenuAPI)) {
            $this->_fetchMenuAPI = new FetchMenu($this->_config);
        }
        return $this->_fetchMenuAPI;
    }

}