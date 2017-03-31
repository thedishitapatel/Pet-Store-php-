<?php
    session_start();
    $_SESSION['authorize']=false;

    if(!isset($_POST['username']) || !isset($_POST['password']) ||empty($_POST['username'] || empty($_POST['password']))) {
        //redirect to main page
        header('Location:index.php');
        exit;
    }
    $username = strtoupper($_POST['username']);
    $password = $_POST['password'] ;

    require_once 'database/secret.php';
    //connect with database
    $conn = mysqli_connect($host,$un , $pw,$db);

    //if you could not connect to database
    if (mysqli_connect_errno())
    {
        //redirect to main page
        header('Location:index.php');
        exit;
    }

    //selects all the information from admin
    $sql = "SELECT * FROM ADMIN WHERE USERNAME='$username'";

    $result = mysqli_query($conn,$sql);

    //matches the password if the user loging in is a user or admin
    if($result->num_rows == 1) {
        $data = $result->fetch_assoc();

        if( $data['PASSWORD'] == md5($password))
        {

            header('Location:admin/admin.php');
            exit;
        } else {
            header('Location:index.php');
            exit;
        }

    } else {

        $sql = "SELECT * FROM CUSTOMERS WHERE USERNAME='$username'";

        $result = mysqli_query($conn,$sql);

        if($result->num_rows == 1) {
            $data = $result->fetch_assoc();

            if ($data['PASSWORD'] == md5($password)) {

                $_SESSION['username'] = $username;
                 header('Location:customers/index.php');
                exit;
            } else {
                header('Location:index.php');
                exit;
            }
        }


    }



