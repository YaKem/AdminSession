<?php

    namespace Controllers;

    require_once('models/Session.php');

    class Session
    {
        public function __construct()
        {
            session_start();
            $this->isConnected();
        }

        public function loginForm()
        {
            header('Location: home.php');
        }
        public function isAdmin($params)
        {
            //print_r($params); die();
            $model = new \Models\Session();
            //echo $model->isValidLogin($params); die();
            if($model->isValidLogin($params)) {
                $login = $model->getLogin();
                $this->setSession('login', 1);
                $this->setSession('name', $login);
                header('Location: /page.php');
            } else {
                header('Location: /home.php');
            }
        }

        public function setSession($name, $value)
        {
            $_SESSION[$name] = $value;
        }

        public function isConnected()
        {
            if(isset($_SESSION['login'])) {
                if($_SESSION['login'] != 1) {
                    header('Location: /home.php');
                } else {
                    header('Location: /home.php');
                }
            }
        }

        public function deconnect()
        {
            session_destroy();
            header('Location: /home.php');
        }
    }