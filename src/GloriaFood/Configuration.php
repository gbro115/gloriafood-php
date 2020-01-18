<?php


namespace GloriaFood;

/**
 * Configuration class
 *
 * @author George Brownlee
 */
class Configuration
{
    /**
     * Configuration: Authorization key
     *
     * @var string $_authKey
     */
    protected $_authKey;

    /**
     * getAuthKey() function
     *
     * @return string Authorization key
     */
    public function getAuthKey()
    {
        return $this->_authKey;
    }

    /**
     * Set Authorization key
     *
     * @param $authKey
     */
    public function setAuthKey($authKey)
    {
        $this->_authKey = $authKey;
    }
}