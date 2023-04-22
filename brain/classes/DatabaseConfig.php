<?php

class DatabaseConfig {

    private $DB_HOSTNAME = "127.0.0.1";
    private $DB_PORT = 3306;
    private $DB_USER = "root";
    private $DB_PASSWORD = "";
    private $DB_DATABASE = "swifthabbo";
    private $DB_PREFIX = "x_";
    private $DB_CHARSET = "utf8";

    public function getHostname() {
        return $this->DB_HOSTNAME;
    }

    public function getPort() {
        return $this->DB_PORT;
    }

    public function getUser() {
        return $this->DB_USER;
    }

    public function getPassword() {
        return $this->DB_PASSWORD;
    }

    public function getDatabase() {
        return $this->DB_DATABASE;
    }

    public function getPrefix() {
        return $this->DB_PREFIX;
    }

    public function getCharset() {
        return $this->DB_CHARSET;
    }

}
