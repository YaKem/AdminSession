<?php

    require_once('controllers/Session.php');

    class Router
    {
        static private $paths = [
            'home'      =>  ['controller' => 'Session', 'method' => 'loginForm' ],
            'login'     =>  ['controller' => 'Session', 'method' => 'isAdmin'   ],
            'deconnect' =>  ['controller' => 'Session', 'method' => 'deconnect' ]
        ];

        static public function renderController()
        {
            $params =[];
            $request = $_GET['r'];
            if(!empty($_POST)) {
                foreach($_POST as $k => $v) {
                    $params[$k] = $v;
                }
                //print_r($params); die();
            }
            if(array_key_exists($request, self::$paths)) {
                $controller = self::$paths[$request]['controller'];
                $controllerName = "\Controllers\\".$controller;
                $method = self::$paths[$request]['method'];
    
                $controller = new $controllerName();
                $controller->$method($params);               
            } else {
                echo '404';
            }
        }
    }