<?php
namespace GloriaFood;

/**
 * Endpoints class to build, format and return API endpoint urls based on incoming platform and version
 *
 * @author George Brownlee
 */
class Endpoints {

    /**
     * Endpoints: Set BASE API Endpoint URL
     */
    CONST BASE_URL_GLORIA_FOOD = 'https://pos.globalfoodsoft.com';

    /**
     * Endpoint URL holders
     *
     * Holds each of the URLS for the API endpoints
     * Version is added in the constructor
     *
     */
    protected $fetchMenuURL;

    /**
     * Constructor
     *
     */
    function __construct()
    {
        // Menu
        $this->fetchMenuURL = self::BASE_URL_GLORIA_FOOD . '/pos/menu';
    }

    //methods to build out and return endpoints

    /**
     * getFetchMenuURL() function
     *
     * @return string	Endpoint URL
     */
    public function getFetchMenuURL()
    {
        return $this->fetchMenuURL;
    }

}