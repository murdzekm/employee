<?php

class Employee
{
    private $table = "employees";
    private $Connection;
    private $id;
    private $login;
    private $password;
    private $email;
    private $name;
    private $surname;
    private $type;

    public function __construct($Connection)
    {
        $this->Connection = $Connection;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function create()
    {
        $stmt = $this->Connection->prepare("INSERT INTO " . $this->table . "(login,password,email,name,surname,type)
        VALUES (:login,:password,:email,:name,:surname,:type)");
        $result = $stmt->execute([
            "login" => $this->login,
            "password" => $this->password,
            "email" => $this->email,
            "name" => $this->name,
            "surname" => $this->surname,
            "type" => $this->type
        ]);
        $this->Connection = null;
        return $result;



    }

    public function update()
    {
        $stmt = $this->Connection->prepare("
        UPDATE " . $this->table . "
        SET
        login = :login,
        password = :password,
        email = :email,
        name = :name,
        surname = :surname,        
        type = :type
        WHERE id = :id
        ");

        $results = $stmt->execute([
            "id" => $this->id,
            "login" => $this->login,
            "password" => $this->password,
            "email" => $this->email,
            "name" => $this->name,
            "surname" => $this->surname,
            "type" => $this->type
        ]);
        $this->Connection = null;
        return $results;
    }

    public function getAll()
    {
        $stmt = $this->Connection->prepare("SELECT id,login,password,email,name,surname,type FROM " . $this->table);
        $stmt->execute();
        $results = $stmt->fetchAll();
        $this->Connection = null;
        return $results;
    }

    public function getById($id)
    {
        $stmt = $this->Connection->prepare("SELECT id,login,password,email,name,surname,type
        FROM " . $this->table . "  WHERE id = :id");

        $stmt->execute([
            "id" => $id
        ]);

        $results = $stmt->fetchObject();
        $this->Connection = null;
        return $results;
    }

    public function getBy($column, $value)
    {
        $stmt = $this->Connection->prepare("SELECT id,login,password,email,name,surname,type
        FROM " . $this->table . " WHERE :column = :value");
        $stmt->execute([
            "column" => $column,
            "value" => $value
        ]);
        $results = $stmt->fetchAll();
        $this->Connection = null;
        return $results;
    }

    public function findUserByEmailOrUsername($email, $login){
        $stmt = $this->Connection->prepare("SELECT login,email  FROM " . $this->table . "  WHERE login = :login OR email = :email");
        $stmt->execute([
            "login" => $login,
            "email" => $email
        ]);
        //Check row
        if($stmt->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function deleteById($id)
    {
        try {
            $stmt = $this->Connection->prepare("DELETE FROM " . $this->table . " WHERE id = :id");
            $stmt->execute([
                "id" => $id
            ]);
            $Connection = null;
        } catch (Exception $e) {
            echo 'Failed DELETE (deleteById): ' . $e->getMessage();
            return false;
        }
    }

    public function deleteBy($column, $value)
    {
        try {
            $stmt = $this->Connection->prepare("DELETE FROM " . $this->table . " WHERE :column = :value");
            $stmt->execute([
                "column" => $value,
                "value" => $value,
            ]);
            $Connection = null;
        } catch (Exception $e) {
            echo 'Failed DELETE (deleteBy): ' . $e->getMessage();
            return false;
        }
    }
}

