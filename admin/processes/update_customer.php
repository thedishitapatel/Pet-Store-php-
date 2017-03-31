<?php

$username= $_POST['username'];
$first= strtoupper($_POST['first']);
$last= strtoupper($_POST['last']);
$password= md5($_POST['password']);

require_once '../../database/secret.php';
//connect with database
$conn = mysqli_connect($host,$un , $pw,$db);

//if you could not connect to database
if (mysqli_connect_errno())
{
    //redirect to main page
    header('Location:../admin.php');
    exit;
}

$sql = "UPDATE CUSTOMERS SET FIRST='$first', LAST='$last', PASSWORD='$password' WHERE USERNAME='$username'";

echo $sql;
$result = mysqli_query($conn,$sql);


header('Location:../pages/customers.php');
exit;