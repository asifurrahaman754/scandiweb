<?php
    namespace classes;

    use \PDO;

    class DbConnect
    {
        private $server = "--server--";
        private $dbname = "--dbname--";
        private $user = "--user--";
        private $pass = "";

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