<?php

class Database {

    private $pdo;
    private $connected;

    public function __construct() {
        $this->connected = false;
    }

    private function Connect(){
        if(!$this->connected){
            $config = new DatabaseConfig();
            try {
                $this->pdo = new PDO('mysql:host=' . $config->getHostname() . ';dbname=' . $config->getDatabase() . ';charset=' . $config->getCharset(), $config->getUser(), $config->getPassword());
                $this->connected = true;
            } catch (PDOException $e) {
                new DatabaseException($e->getMessage());
            }
        }
    }

    public function Query($query, $params = array()) {
        $this->Connect();

        $result = [];

        try {
            $req = $this->pdo->prepare($query);
            $req->execute($params);

            while ($row = $req->fetch(PDO::FETCH_OBJ)) {
                $result[] = $row;
            }
        } catch (PDOException $e) {
            new DatabaseException($e->getMessage());
        }

        return $result;
    }

    public function Exec($query, $params = array()) {
        $this->Connect();

        try {
            $req = $this->pdo->prepare($query);
            $req->execute($params);
        } catch (PDOException $e) {
            new DatabaseException($e->getMessage());
        }
    }

    public function RowCount($query, $params = array()) {
        $this->Connect();

        try {
            $req = $this->pdo->prepare($query);
            $req->execute($params);
        } catch (PDOException $e) {
            new DatabaseException($e->getMessage());
        }

        return $req->rowCount();
    }

}
