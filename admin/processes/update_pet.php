<?php

    $id= $_POST['id'];
    $name= $_POST['name'];
    $breed= $_POST['breed'];
    $age= $_POST['age'];
    $price= $_POST['price'];


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


    $sql = "UPDATE PETS SET NAME='$name', BREED='$breed', AGE=$age , PRICE=$price WHERE PET_ID=$id";

    $result = mysqli_query($conn,$sql);

    header('Location:../pages/pets.php');
    exit;