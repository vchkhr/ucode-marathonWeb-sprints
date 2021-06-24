<?php

class Heroes extends Model {
    public $id;
    public $name;
    public $description;
    public $race;
    public $class_role;

    public function __construct() {
        parent::__construct("heroes");
    }

    public function find($id) {
        if (!$this->db_connection->getConnectionStatus()) {
            return [];
        }

        $res = $this->connection->query("SELECT * FROM $this->table WHERE id = $id;");
        $res = $res->fetch_all()[0];

        $this->id = $res[0];
        $this->name = $res[1];
        $this->description = $res[2];
        $this->race = $res[3];
        $this->class_role = $res[4];

        return $res;
    }
    
    public function delete() {
        if (!$this->db_connection->getConnectionStatus()) {
            return false;
        }

        $res = $this->connection->query("SELECT * FROM $this->table WHERE id = $this->id;");
        $res = $res->fetch_all();

        if (empty($res)) {
            return false;
        }

        $this->connection->query("DELETE FROM $this->table WHERE id = $this->id;");

        return true;
    }
    public function save() {
        if (!$this->db_connection->getConnectionStatus()) {
            return false;
        }

        $res = $this->connection->query("SELECT * FROM $this->table WHERE id = $this->id;");
        $res = $res->fetch_all();

        if (empty($res)) {
            $this->connection->query("INSERT INTO $this->table (name, description, race, class_role) VALUE ('$this->name', '$this->description', '$this->race', '$this->class_role');");
        } else {
            $this->connection->query("UPDATE $this->table SET name='$this->name', description='$this->description', race='$this->race', class_role='$this->class_role' WHERE id = $this->id;");
        }

        return true;
    }
}
