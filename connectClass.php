<?php
    /**
    * Database Connection
    */
    class DbConnect
    {
        private $server = 'sql102.epizy.com';
        private $dbname = 'epiz_31728413_scandiwebtest';
        private $user = 'epiz_31728413';
        private $pass = 'wviq3iMMKwUDX2';

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