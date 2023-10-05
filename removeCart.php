<?php
    include 'connection.php';
    $pid = $_POST['product_id'];
    $uid = $_POST['uid'];
    $sql = "DELETE FROM mycart where user_id = '$uid' and pid = '$pid'";
    $query = mysqli_query($con,$sql);
?>