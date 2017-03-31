<?php

    session_start();

    $_SESSION['title'] = "CUSTOMERS";


    require_once '../../database/secret.php';
    //connect with database
    $conn = mysqli_connect($host, $un, $pw, $db);

    //if you could not connect to database
    if (mysqli_connect_errno()) {
        //redirect to main page
        header('Location:../admin.php');
        exit;
    }

// check if user is searching specific user or all users
    if (isset($_GET['search'])) {
        $name = strtoupper($_GET["search"]);
        $sql = "SELECT * FROM CUSTOMERS WHERE USERNAME='$name'";
    } else {
        $sql = "SELECT * FROM CUSTOMERS ORDER BY USERNAME";
    }
    $result = mysqli_query($conn, $sql);

    //function to get the pet name based on the user
    function getPetName($uname)
    {
        global $conn;
        $query = sprintf("select PETS.NAME from PETS INNER JOIN CUSTOMER_PET ON CUSTOMER_PET.PET_ID = PETS.PET_ID WHERE CUSTOMER_PET.USERNAME='%s'", $uname);
        $result = mysqli_query($conn, $query);
        if ($result->num_rows == 0) {
            return "NONE";
        } else {
            $names = "";
            $data = $result->fetch_all();
            foreach ($data as $d) {
                $names .= $d[0] . "</br>";
            }
            return $names;
        }
    }

?>


<?php require "../../includes/header.php" ?>

<!-- This is a Bootstrap container. Get more info at http://getbootstrap.com/ -->
<div class="container">

    <h1 class="page-header">CUSTOMERS' INFORMATIONS</h1>

    <!--navigation bar-->
    <nav class=" navbar navbar-inverse">
        <div class="navbar-header">
            <a href="../admin.php" class="navbar-brand">Home</a>
        </div>
        <div>
            <ul class="nav navbar-nav navbar-right" style="margin-right: 20px;">
                <li><a href="new_customer.php">Add Customer</a></li>
                <li><a href="new_pet.php">Add Pet</a></li>
                <li><a href="customers.php">Customers</a></li>
                <li><a href="pets.php">Pets</a></li>
                <li><a href="sell_pet.php">Sell Pet</a></li>
                <li><a href="../../includes/logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!--  SEARCH BUTTON TO  SEARCH CUSTOMERS   -->
    <div class="row">
        <div class="cols-sm-3"></div>
        <div class="cols-sm-3"></div>
        <div class="cols-sm-3">
            <form action="customers.php" method="get">
                <input type="search" name="search" placeholder="Enter Username">
                <button type="submit" class="btn btn-danger">Search Customer</button>
            </form>
        </div>
        <div class="cols-sm-3"></div>
    </div>


    <?php
    if ($result->num_rows == 0) {
//        if there is no data with that username
        echo "<div class='alert alert-danger'>No Record Found</div>";
    } else {
        //display data
        echo "<table class='table table-responsive table-bordered table-striped'><tr><th>Username</th><th>FIRSTNAME</th><th>LASTNAME</th><th>PET OWNED</th><th>EDIT</th><th>DELETE</th></tr>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["USERNAME"] . "</td>
                <td>" . $row["FIRST"] . "</td>
                     <td>" . $row["LAST"] . "</td>
                     <td>" . getPetName($row["USERNAME"]) . "</td>
                        <td><a href='edit_customer.php?username=" . $row['USERNAME'] . "'> <i class='fa fa-edit'>&nbsp</i></a></td>
                    <td><a href='../processes/delete_customer.php?username=" . $row['USERNAME'] . "'> <i class='fa fa-remove'>&nbsp</i></a></td></tr>";
        }
        echo "</table>";
    }
    ?>
</div>
<!--add footer-->
<?php require "../../includes/footer.php" ?>



