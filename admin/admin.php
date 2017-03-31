<?php
    session_start();
    $_SESSION['title']="Admin";

?>

<?php require "../includes/header.php"?>

    <!-- This is a Bootstrap container. Get more info at http://getbootstrap.com/ -->
    <div class="container">

        <h1 class="page-header">Welcome to Admin Panel</h1>
        <nav class=" navbar navbar-inverse">
            <div class="navbar-header">
                <a href="admin.php" class="navbar-brand">Home</a>
            </div>
            <div>
                <ul class="nav navbar-nav navbar-right" style="margin-right: 20px;">
                    <li><a href="pages/new_customer.php">Add Customer</a></li>
                    <li><a href="pages/new_pet.php">Add Pet</a></li>
                    <li><a href="pages/customers.php">Customers</a></li>
                    <li><a href="pages/pets.php">Pets</a></li>
                    <li><a href="pages/sell_pet.php">Sell Pet</a></li>
                    <li><a href="../includes/logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>

        <div class="row home-row">
            <?php
            require_once '../database/secret.php';
            //connect with database
            $conn = mysqli_connect($host, $un, $pw, $db);
            //if you could not connect to database
            if (mysqli_connect_errno()) {
                exit;
            }

            $sql = "SELECT COUNT(*) FROM PETS";

            $result = mysqli_query($conn, $sql);
            if ($result->num_rows == 1) {
                $data = $result->fetch_assoc();
                $_SESSION['pet-count'] = $data["COUNT(*)"];
            }

            $sql = "SELECT COUNT(*) FROM CUSTOMERS";

            $result = mysqli_query($conn, $sql);
            if ($result->num_rows == 1) {
                $data = $result->fetch_assoc();
                $_SESSION['customer-count'] = $data["COUNT(*)"];
            }

            $sql = "SELECT COUNT(*) FROM CUSTOMER_PET";

            $result = mysqli_query($conn, $sql);
            if ($result->num_rows == 1) {
                $data = $result->fetch_assoc();
                $_SESSION['sold-pets-count'] = $data["COUNT(*)"];
            }

            if(isset($_SESSION['pet-count']) && isset($_SESSION['sold-pets-count']))
            {
                $_SESSION['pets-to-sell'] =$_SESSION['pet-count'] - $_SESSION['sold-pets-count'];
            }

            ?>
            <h2>Store Statistics</h2>
            <table class="table table-hover table-responsive">
                <tr>
                    <td>
                    <th>Total Number of Customers:</th>
                    </td>
                    <td>
                        <?php echo isset($_SESSION['customer-count']) ? $_SESSION['customer-count'] : "Information not available" ?>
                    </td>
                </tr>
                <tr>
                    <td>
                    <th>Total Number of Pets:</th>
                    </td>
                    <td>
                        <?php echo isset($_SESSION['pet-count']) ? $_SESSION['pet-count'] : "Information not available" ?>
                    </td>
                </tr>
                <tr>
                    <td>
                    <th>Pets Available to sell:</th>
                    </td>
                    <td>
                        <?php echo isset($_SESSION['pets-to-sell']) ? $_SESSION['pets-to-sell'] : "Information not available" ?>
                    </td>
                </tr>
            </table>
        </div>

    </div>

<?php require "../includes/footer.php"?>