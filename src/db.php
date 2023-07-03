<?php
class DB
{
    private $host;
    private $username;
    private $dbPassword;
    private $database;
    private $connection;

    public function __construct() {
        $this->host = "localhost";
        $this->username = "root";
        $this->dbPassword = "David123";
        $this->database = "drug_dispenser_db";

        $this->connect();
    }

    private function connect() {
        $this->connection = new mysqli($this->host, $this->username, $this->dbPassword, $this->database);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function login($ssn, $password, $table){
        $ssn = $this->connection->real_escape_string($ssn);
        $password = $this->connection->real_escape_string($password);
        
        $sql = "SELECT * FROM $table WHERE SSN = $ssn AND password = '$password'";
        $result = $this->connection->query($sql);
        return $result;
    }

    public function insert($table, $data) {
        $columns = implode(", ", array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";

        $sql = "INSERT INTO $table ($columns) VALUES ($values)";

        if ($this->connection->query($sql) === TRUE) {
            return array("status"=>TRUE);
        } else {
            return array("status"=>FALSE,"data"=>$this->connection->error);
        }
    }

    public function update($table, $data, $where) {
        $set = array();
        foreach ($data as $column => $value) {
            $set[] = "$column = '$value'";
        }
        $setClause = implode(", ", $set);

        $sql = "UPDATE $table SET $setClause WHERE $where";

        if ($this->connection->query($sql) === TRUE) {
            return array("status"=>TRUE);
        } else {
            return array("status"=>FALSE,"data"=>$this->connection->error);
        }
    }

    public function select($table, $where = null) {
        $sql = "SELECT * FROM $table";
        
        if ($where) {
            $sql .= " WHERE $where;";
        }
        
        $result = $this->connection->query($sql);
         $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return array("status"=>TRUE,"data"=>$rows);
    }

    public function delete($table, $where) {
        $sql = "DELETE FROM $table WHERE $where";

        if ($this->connection->query($sql) === TRUE) {
            return array("status"=>TRUE);
        } else {
            return array("status"=>FALSE,"data"=>$this->connection->error);
        }
    }
}
?>