<?php


namespace GloriaFood;

/**
 * Exception class
 *
 * GloriaFood-specific exception types
 *
 *
 * @author George Brownlee
 *
 */
class Exception extends \Exception
{
    /**
     * Exception: Message class variable
     *
     * @var string $_message holds the error message string
     */
    protected $_message;

    /**
     * Exception: Code instance variable
     *
     * @var int $_code holds the error message code
     */	protected $_code;

    /**
     * Constructor
     *
     * @param string $message Exception message
     * @param int $code Exception code
     */
    public function __construct($message, $code = 0) {

        //set class vars
        $this->_message = $message;
        $this->_code = $code;

        //send to super
        parent::__construct($this->_message, $this->_code);
    }

    // custom string representation of object
    public function __toString() {
        return __CLASS__ . ": {$this->message} [{$this->code}]\n";
    }
}

/**
 * ConfigurationException class
 */
class ConfigurationException extends Exception {}

/**
 * ConnectorException class
 */
class ConnectorException extends Exception {}

/**
 * ApiException class
 */
class ApiException extends Exception {}
