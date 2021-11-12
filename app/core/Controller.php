<?php

class Controller
{
    protected function view($view, $data = [])
    {
        if (file_exists("../app/views/" . $view . ".php")) {
            include "../app/views/" . $view . ".php";
        } else {
            include "../app/views/404.php";
        }
    }

    protected function loadModel($model, $conn = null)
    {
        if (file_exists("../app/models/" . $model . ".php")) {
            include "../app/models/" . $model . ".php";
            return $model = new $model($conn);
        }

        return false;
    }

    protected function checkLogin()
    {
        if (!$result = $this->checkLoggedIn()) {
            header("Location:" . ROOT . "login");
            die;
        }
    }

    function checkLoggedIn()
    {
        $DB = new Database();
        if (isset($_SESSION['url_address'])) {

            $arr['url_address'] = $_SESSION['url_address'];
            $query = "select * from users where url_address = :url_address limit 1";

            $data = $DB->get($query, $arr);

            if (is_array($data)) {
                $_SESSION['username'] = $data['username'];
                $_SESSION['url_address'] = $data['url_address'];

                return true;
            }
        }
        return false;
    }
}