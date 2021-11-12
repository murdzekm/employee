<?php

class homeController extends Controller
{
    public function index()
    {
        //$employee = $this->loadModel("employee",$this->Connection);

        //$data['employees'] = $employee->getAll();
        $data['title'] = "Emploee app";

        $this->view("index.view", $data);
    }
}