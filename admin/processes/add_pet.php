<?php
/**
 * Created by PhpStorm.
 * User: anirudh
 * Date: 2016-11-14
 * Time: 2:01 PM
 */
session_start();

# used post method with submit button(add) to process
if(empty($_POST['name']) || empty($_POST['breed']) || empty($_POST['age']) || empty($_POST['price'])  )
{
    # missed a form field required to process
    header('Location:../pages/new_pet.php');
    exit;
}
else {
    #get variable data
    $name = strtoupper($_POST['name']);
    $breed = strtoupper($_POST['breed']);
    $price = strtoupper($_POST['price']);
    $age = strtoupper($_POST['age']);

    #get credentials
    require_once '../../database/secret.php';
    #connect with database
    $conn = mysqli_connect($host, $un, $pw, $db);

    #if you could not connect to database
    if (mysqli_connect_errno()) {
        header('Location:../pages/pets.php');
        exit;

    }

    #check user if he or she already exists in customer table
    $query = sprintf("SELECT * FROM PETS WHERE NAME='%s'", $name);
    $result = mysqli_query($conn, $query);
    if ($result->num_rows == 1) {
        #customer already exists
        header('Location:../pages/pets.php');
        exit;
        echo("Pet already exists!");
    } else {
        #add new customer
        $query = sprintf("INSERT INTO PETS(NAME,BREED,PRICE,AGE) VALUES ('%s','%s','%s','%s')", $name, $breed, $price, $age);
        $result = mysqli_query($conn, $query);
        if ($result) {
            header('Location:../pages/pets.php');
            exit;
            echo("Pet added!");
        } else {
            header('Location:../pages/pets.php');
            exit;
            echo("Failed to add pets for unknown reason!");
        }
    }
}