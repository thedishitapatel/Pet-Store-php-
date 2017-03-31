<?php


session_start();

$id = $_GET['id'];


require_once '../../database/secret.php';
//connect with database
$conn = mysqli_connect($host,$un , $pw,$db);

//if you could not connect to database
if (mysqli_connect_errno())
{
    //redirect to main page
    header('Location:../pages/pets.php');
    exit;
}


$sql = "DELETE FROM PETS WHERE PET_ID='$id'";

$result = mysqli_query($conn,$sql);

if($result) {
    header('Location:../pages/pets.php');
    exit;
} else {
    header('Location:../pages/pets.php');
    exit;
}
