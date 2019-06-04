
<?php
    session_start();
    $_SESSION['logueado'] = "false";
    header("Location: login.php");
?>


