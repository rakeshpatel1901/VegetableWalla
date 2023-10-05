<?php
    include 'connection.php';
    $pid = $_POST['pid'];
    $qty = $_POST['qty'];
    $weight = $_POST['weight'];
    $cid = rand(999,99999999);
    $que ="SELECT * FROM mycart where pid='$pid'";
    $res = mysqli_query($con,$que);
    if(mysqli_num_rows($res)<1){
        $que ="INSERT into `mycart`(`cid`,`quantity`,`weight`,`user_id`,`pid`) values($cid,$qty,$weight,1,$pid)";
        $res = mysqli_query($con,$que);
        if(!$res){
            echo mysqli_error($con);
        }
    }
?>