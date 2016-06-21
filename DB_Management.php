<?php

class DB_Management {

    //Database Variables
    public $db = null;
    public $servername;
    public $username;
    public $password;

    function __construct($dbServer, $dbUser, $dbPass)
    {
        $this->servername = $dbServer;
        $this->username = $dbUser;
        $this->password = $dbPass;
    }

    function connectToDB() {
        try {
            $this->db = new PDO("mysql:host=$this->servername;dbname=moviesdb", $this->username, $this->password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            return true;
        }
        catch(PDOException $e)
        {
            return false;
        }
    }

    function queryToDB($query) {
        $queryResult = $this->db->prepare($query);
        $queryResult->execute();

        return $queryResult;
    }

    function closeConnection() {
        $this->db = null;
    }
}
?>