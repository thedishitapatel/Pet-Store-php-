<?php
/**
 * Created by PhpStorm.
 * User: anirudh
 * Date: 14/12/16
 * Time: 9:10 PM
 */
session_start();
if(isset($_POST['customer']) && isset($_POST['customer']))
{
    require_once '../../database/secret.php';
    //connect with database
    $conn = mysqli_connect($host, $un, $pw, $db);
    //if you could not connect to database
    if (mysqli_connect_errno()) {
        exit;
    }

    $customer = $_POST['customer'];
    $pet = $_POST['pets'];

    $query = sprintf("INSERT INTO CUSTOMER_PET VALUES ('%s','%s')",$customer, $pet );

    $result = mysqli_query($conn,$query);
    if($result)
    {
        header('Location:../pages/pets.php');
        exit;
    }
    else
    {
        header('Location:../pages/sell_pet.php');
        exit;
    }

}

header("../../pages/sell_pet.php");

?>