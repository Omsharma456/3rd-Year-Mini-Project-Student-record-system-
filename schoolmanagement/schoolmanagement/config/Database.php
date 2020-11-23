<?php

class Database
{
    private static $_instance;
    private $_connection; //The single instance
    private $_host = "localhost";
    private $_username = "root";
    private $_password = "";
    private $_database = "schoolmanagement";

    /*
    Get an instance of the Database
    @return Instance
    */

    public function __construct()
    {
        $this->_connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);

        // Error handling
        if (mysqli_connect_error()) {
            trigger_error("Failed to conencto to MySQL: " . mysqli_connect_error(),
                E_USER_ERROR);
        }
    }

    // Constructor

    public static function getInstance()
    {
        if (!self::$_instance) { // If no instance then make one
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    // Magic method clone is empty to prevent duplication of connection

    public function getConnection()
    {
        return $this->_connection;
    }

    // Get mysqli connection

    private function __clone()
    {
    }
}


?>