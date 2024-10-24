<?php
    class Database{

        private $host;
        private $dbname;
        private $user;
        private $password;
        private $charset;


        public function __construct()
        {
            $this->host = constant('HOST');
            $this->dbname = constant('DB');
            $this->user = constant('USER');
            $this->password = constant('PASSWORD');
            $this->charset = constant('CHARSET');
        }

        public function connect(){
            try {
                
                $connection = "mysql:host=$this->host;dbname=$this->dbname;charset=$this->charset";
                
                $option = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false
                ];

                $pdo = new PDO($connection, $this->user, $this->password, $option);
                
                return $pdo;

            } catch (PDOException $e) {
                print_r("Error connection" . $e->getMessage());
            }
        }
    }

?>