<?php 

class DBConn {
    protected static $conn;

    public function __construct() {
        $config = require('config.php');

        extract($config['mysql']);

        try {
            $dsn = "mysql:host=$localhost;dbname=$database;charset=utf8mb4";
            self::$conn = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function __destruct() {
        self::$conn = null;
    }

    public static function insert($table, $data) {
        $columns = implode(', ', array_keys($data));
        $values = implode(', ', array_fill(0, count($data), '?'));

        $query = "INSERT INTO $table ($columns) VALUES ($values)";

        $stmt = self::$conn->prepare($query);
        $stmt->execute(array_values($data));
    }

    public static function update($table, $data, $where) {
        $set = implode('=?, ', array_keys($data)) . '=?';

        $query = "UPDATE $table SET $set WHERE $where";

        $stmt = self::$conn->prepare($query);
        $stmt->execute(array_values($data));

        return self::find($table, $where);
    }

    public static function select($table, $columns = '*', $where = null, $orderBy = null, $limit = null) {
        $query = "SELECT $columns FROM $table";
    
        if ($where) {
            $conditions = [];
            foreach ($where as $column => $value) {
                $conditions[] = "$column = :$column";
            }
            $query .= " WHERE " . implode(' AND ', $conditions);
        }
    
        if ($orderBy) {
            $query .= " ORDER BY $orderBy";
        }
    
        if ($limit) {
            $query .= " LIMIT $limit";
        }
    
        $stmt = self::$conn->prepare($query);
        $stmt->execute($where);
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    public static function find($table, $id, $column = '', $data = '*') {
        $query = "SELECT $data FROM $table WHERE $column = ?";
        $stmt = self::$conn->prepare($query);
        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public static function findOrFail($table, $id, $column, $data = '*') {
        $record = self::find($table, $id, $column, $data);

        if ($record === false) {
            throw new Exception("Record not found for ID: $id");
        }

        return $record;
    }

    public static function alert($status, $message) {
        return json_encode(
                array(
                    'status' => $status, 
                    'msg' => $message
                )
            );
    }
}