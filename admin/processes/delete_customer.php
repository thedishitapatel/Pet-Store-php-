<?php


session_start();


$username = $_GET['username'];


require_once '../../database/secret.php';
//connect with database
$conn = mysqli_connect($host,$un,$pw,$db);

//if you could not connect to database
if (mysqli_connect_errno())
{
    echo "Connection Error";
    //redirect to main page
    //header('Location:../pages/customers.php');
    exit;
}

//delete all the information of particular customer
$sql = "DELETE FROM CUSTOMERS WHERE USERNAME='$username'";

$result = mysqli_query($conn,$sql);

echo var_dump($result);

if($result) {
    header('Location:../pages/customers.php');
    exit;
} else {
    header('Location:../admin.php');
    exit;
}
