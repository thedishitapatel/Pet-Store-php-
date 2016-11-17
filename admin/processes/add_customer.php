<?php
/**
 * Created by PhpStorm.
 * User: anirudh
 * Date: 2016-11-14
 * Time: 2:01 PM
 */
session_start();

# used post method with submit button(add) to process
if(empty($_POST['username']) || empty($_POST['first']) || empty($_POST['last']) || empty($_POST['password'])  )
{
    # missed a form field required to process
    header('Location:../pages/new_customer.php');
    exit;
}
else
{
    #get variable data
    $username = strtoupper($_POST['username']);
    $password = md5($_POST['password']);
    $first = strtoupper($_POST['first']);
    $last = strtoupper($_POST['last']);

    #get credentials
    require_once '../../database/secret.php';

    #connect with database
    $conn = mysqli_connect($host,$un,$pw,$db);

    #if you could not connect to database
    if (mysqli_connect_errno())
    {
        header('Location:../pages/customers.php');
        exit;
        exit("Failed to connect!");
    }

    #check user if he or she already exists in customer table
    $query = sprintf("SELECT * FROM CUSTOMERS WHERE USERNAME='%s'",$username);
    $result = mysqli_query($conn,$query);
    if($result->num_rows == 1)
    {
        #customer already exists
        header('Location:../pages/customers.php');
        exit;
        echo("Customer already exists!");
    }
    else
    {
        #check user if he or she already exists in admin table
        $query = sprintf("SELECT * FROM ADMIN WHERE USERNAME='%s'",$username);
        $result = mysqli_query($conn,$query);
        if($result->num_rows == 1)
        {
            header('Location:../pages/customers.php');
            exit;
            #customer already exists
            echo("Username already reserved by admin user!");
        }
        else
        {
            #add new customer
            $query = sprintf("INSERT INTO CUSTOMERS(USERNAME,PASSWORD,FIRST,LAST) VALUES ('%s','%s','%s','%s')",$username,$password,$first,$last);
            $result = mysqli_query($conn,$query);
            if($result)
            {
                header('Location:../pages/customers.php');
                exit;
                echo("Customer added!");
            }
            else
            {
                header('Location:../pages/customers.php');
                exit;
                echo("Failed to add Customer for unknown reason!");
            }
        }
    }
}


?>