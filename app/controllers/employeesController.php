<?php

require_once "../app/models/employee.php";


class EmployeesController extends Controller
{
    private $db;
    private $Connection;

    public function __construct()
    {
        $this->db = new Database();
        $this->Connection = $this->db->Connection();
        //$employee = $this->loadModel("employee",$this->Connection);
    }

    public function index()
    {

        $employee = new Employee($this->Connection);

        $data['employees'] = $employee->getAll();
        $data['title'] = "PHP app";

        $this->view("employee/index.view", $data);
    }

    public function login()
    {
        $employee = new Employee($this->Connection);

        $data['employees'] = $employee->getAll();
        $data['title'] = "PHP app";

        $this->view("pages/login.view", $data);
    }

    public function details($id)
    {
        $employee = new Employee($this->Connection);

        $data['employee'] = $employee->getById($id);
        $data['title'] = "PHP app | User Details";

        $this->view("employee/details.view", $data);
    }

    public function create()
    {
        //$_SESSION['error'] = "nie dizała";
        $data = [
            'login' => "",
            'password' => "",
            'passwordRepeat' => "",
            'email' => "",
            'name' => "",
            'surname' => "",
            'type' => ""
        ];

//        if (isset($_POST["name"])) {
        //Validate inputs
        if (!empty($_POST["login"]) || !empty($_POST["password"]) || !empty($_POST["email"]) || !empty($_POST["name"]) || !empty($_POST["surname"]) ||
            !empty($_POST["passwordRepeat"])) {

            $employee = new Employee($this->Connection);
            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


            //Init data
            $data = [
                'login' => trim($_POST['login']),
                'password' => trim($_POST['password']),
                'passwordRepeat' => trim($_POST['passwordRepeat']),
                'email' => trim($_POST['email']),
                'name' => trim($_POST['name']),
                'surname' => trim($_POST['surname']),
                'type' => trim($_POST['type'])
            ];

            if (!preg_match("/^[a-zA-Z0-9]*$/", $data['login'])) {
                $_SESSION['error']['login'] = "Nieprawidłowy login";
            }

            if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $_SESSION['error']['email'] = "Nieprawidłowy adres email";
            }

            if (strlen($data['password']) < 6) {
                $_SESSION['error']['password'] = "Hasło musi być dłuższe niż 6 znaków";
            } else if ($data['password'] !== $data['passwordRepeat']) {
                $_SESSION['error']['passwordRepeat'] = "Podane hasła są różne";
            }

            //User with the same email or password already exists
            if ($employee->findUserByEmailOrUsername($data['email'], $data['login'])) {
                //flash("register", "Username or email already taken");
                $_SESSION['error']['check'] = "Login lub email już istnieje";
            }

            //Passed all validation checks.
            //Now going to hash password
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
//
//            //Register User
//            if ($this->userModel->register($data)) {
////            redirect("../login.php");
//                $this->view("employee/index.view", $data);
//
            if ($_SESSION['error'] == "") {
                $employee->setLogin($data["login"]);
                $employee->setPassword($data["password"]);
                $employee->setEmail($data["email"]);
                $employee->setName($data["name"]);
                $employee->setSurname($data["surname"]);
                $employee->setType($data["type"]);
                $employee->create();
                header('Location:' . ROOT . 'employee/index.view.php');
            } else {
                die("Something went wrong");
            }

        }
        $data['page_title'] = "Nowy pracownik";
        $this->view("employee/create.view", $data);

    }


    public function update()
    {
        if (isset($_POST["id"])) {

            $employee = new Employee($this->Connection);

            $employee->setId($_POST["id"]);
            $employee->setName($_POST["name"]);
            $employee->setSurname($_POST["surname"]);
            $employee->setEmail($_POST["email"]);
            $employee->setphone($_POST["phone"]);
            $save = $employee->update();
        }
        header('Location:' . ROOT . 'index.view.php');
    }

    public function delete($id)
    {
        $employee = new Employee($this->Connection);

        $data['employee'] = $employee->deleteById($id);
        $data['title'] = "PHP app";
        header('Location:' . ROOT . 'index.view.php');
    }


}
