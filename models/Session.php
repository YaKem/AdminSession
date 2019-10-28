<?php

    namespace Models;

    class Session
    {
        private $pdo;

        public function __construct()
        {
            $this->pdo = new \PDO('mysql:host=localhost;dbname=admin-space;charset=utf8', 'root', '');
        }

        public function isValidLogin($params)
        {
            //print_r($params); die();
            extract($params);
            
            $password = sha1($password);

            $sql = "SELECT * FROM users where login = ? AND password = ? AND admin = 1";
            $query = $this->pdo->prepare($sql);
            $query->execute([$login, $password]);

            if($result = $query->fetch(\PDO::FETCH_ASSOC)) {
                return true;
                //echo 'true';
            } else {
                return false;
                //echo 'false';
            }
        }

        public function getLogin()
        {
            $sql = "SELECT login FROM users";
            $query = $this->pdo->prepare($sql);
            $query->execute();
            $result = $query->fetch(\PDO::FETCH_ASSOC);
            $login = $result['login'];

            return $login;
        }
    }