
<?php
   // session_abort();
    unset( $_SESSION['authorize']);

    session_destroy();

    header('Location:../index.php');