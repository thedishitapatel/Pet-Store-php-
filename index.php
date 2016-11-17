<?php
session_start();
$_SESSION['title']="HUMBER PET SHOP";
?>

<?php require "includes/header.php"?>

    <!-- This is a Bootstrap container. Get more info at http://getbootstrap.com/ -->
    <div class="container">

        <h1 class="page-header">Humber Pet Management</h1>

        <?php require "includes/form.php"?>

    </div>

<?php require "includes/footer.php"?>