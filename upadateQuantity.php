<?php 
    include 'connection.php';
    $pid = $_POST['pid'];
    $uid = $_POST['uid'];
    $qty = $_POST['qty'];
    $que = "UPDATE mycart set quantity='$qty' where user_id = '$uid' and pid ='$pid'";
    $res = mysqli_query($con,$que);
    if($res){
        echo "successfully";
    }

?>