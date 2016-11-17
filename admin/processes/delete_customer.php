<?php


session_start();

if(!$_SESSION['authorize']) {
    //redirect to main page
    header('Location:../admin.php');
    exit;
}

$username = $_GET['username'];


require_once '../../database/secret.php';
//connect with database
$conn = mysqli_connect($host,$un , $pw,$db);

//if you could not connect to database
if (mysqli_connect_errno())
{
    //redirect to main page
    header('Location:../pages/customers.php');
    exit;
}


$sql = "DELETE FROM CUSTOMERS WHERE USERNAME='$username'";

$result = mysqli_query($conn,$sql);

if($result) {
    header('Location:../pages/customers.php');
    exit;
} else {
    header('Location:../admin.php');
    exit;
}
