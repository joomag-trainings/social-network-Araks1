<?php

namespace Controller;

session_start();

class AccountController
{
    static function get()
    {
        if (isset($_GET['id'])) {
            include "Class/view/UsersView.php";
        }
    }

    static function makeModel()
    {
        $modelPath = 'Class/Model/AuthModel.php';
        include($modelPath);

    }

    public function actionViewAccount()
    {
        $id = $_SESSION['id'];
        self::makeModel();
        $userModel = new \AuthModel();
        $notification = $userModel->allow($id);
        include('Class/view/AccountView.php');
    }

    public function actionSearchFriends()
    {
        if (isset($_POST['search'])) {
            $name = $_POST['name'];
            self::makeModel();
            $userModel = new \AuthModel();
            $response = $userModel->search($name);
            $arr = array();
            $firstName = array();
            $lastName = array();
            while ($row = $response->fetch()) {
                $id = $row['id'];
                $first = $row['first_name'];
                $last = $row['last_name'];
                array_push($arr, $id);
                array_push($firstName, $first);
                array_push($lastName, $last);
            }

        }
        self::get();
        include "Class/view/SearchView.php";

    }

    public function actionGet()
    {
        if (isset($_GET['send'])) {
            $id = $_GET['send'];
            self::makeModel();
            $userModel = new \AuthModel();
            $who = $_SESSION['id'];
            $is = $userModel->notify($id, $who);
            include "Class/view/UsersView.php";
        }
    }
}