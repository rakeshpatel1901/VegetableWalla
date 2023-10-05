<?php
    session_start();
    session_destroy();
    session_start();
    header("Location:index.php");
    $_SESSION['logout'] = 1;
    exit;
?>