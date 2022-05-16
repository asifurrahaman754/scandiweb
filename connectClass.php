<?php
    /**
    * Database Connection
    */
    class DbConnect
    {
        private $server = 'localhost';
        private $dbname = 'id18938961_scandiweb';
        private $user = 'id18938961_testasifur';
        private $pass = '$vKE|/(x6kUBzR\0';

        public function getConnection()
        {
            try {
                $conn = new PDO('mysql:host=' .$this->server .';dbname=' . $this->dbname, $this->user, $this->pass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conn;
            } catch (\Exception $e) {
                echo "Database Error: " . $e->getMessage();
            }
        }
    }