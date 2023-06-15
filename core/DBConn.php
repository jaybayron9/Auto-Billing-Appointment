<?php 

class DBConn {
    protected static $conn;

    public function __construct() {
        $config = require('config.php');

        extract($config['mysql']);

        try {
            self::$conn = new mysqli($localhost, $username, $password, $database);
        } catch (Exception $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function destructConn() {
        if (self::$conn && self::$conn->ping()) {
            self::$conn->close();
        }
    }
}