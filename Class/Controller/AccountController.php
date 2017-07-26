<?php

namespace Controller;

session_start();

class AccountController
{
    private $currentPage = '';
    private $allPages = '';
    private $offset = '';
    private $name = '';

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
        while ($row = $notification->fetch(\PDO::FETCH_ASSOC)) {
            $count = count($row);
            $friend = $row['user_id_1'];
        }
        $list = $userModel->selectAllFriends($friend);
        $firstName = array();
        while ($row = $list->fetch(\PDO::FETCH_ASSOC)) {
            array_push($firstName, $row['first_name']);
        }
        include('Class/view/AccountView.php');
    }

    public function actionSearchFriends()
    {
        if (isset($_POST['search'])) {
            $this->name = $_POST['name'];
        }
        $this->getAllUsers();
        $current = $_GET['num'];
    }

    public function getAllUsers()
    {
        self::makeModel();
        $userModel = new \AuthModel();
        $this->allPages = $userModel->search();
        $response = $userModel->pagination();
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
        }
        include "Class/view/UsersView.php";
    }
}