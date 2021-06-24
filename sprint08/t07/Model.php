<?php

abstract class Model {
    protected $connection;
    protected $db_connection;

    public function __construct($table) {
        $this->setConnection();
        $this->setTable($table);
    }

    public function setTable($table) {
        $this->table = $table;
    }

    public function setConnection() {
        $this->db_connection = new DatabaseConnection("127.0.0.1", null, "vkharchenk", "securepass", "ucode_web");
        $this->connection = $this->db_connection->connection;
    }

    abstract protected function find($id);
    abstract protected function delete();
    abstract protected function save();
}
