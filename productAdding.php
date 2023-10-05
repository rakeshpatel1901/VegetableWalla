<?php
    session_start();
    include 'connection.php';
    if(isset($_POST['pname']) && isset($_POST['category']) && isset($_POST['productprice']) && isset($_POST['dprice']) && isset($_POST['aname'])){

        $pname =$_POST['pname'] ;
        $File = $_FILES['doc']['name'];
        $Tmp_Name=$_FILES['doc']['tmp_name'];
        move_uploaded_file($Tmp_Name,'images/'.$File);
        $pimg='images/'.$File;
        $category = $_POST['category'];
        $price =$_POST['productprice'] ;
        $dprice =$_POST['dprice'] ;
        $aname =$_POST['aname'] ;
    
        $sql = "SELECT * FROM product where pname='$pname'";
        $que = mysqli_query($con,$sql);
        if(mysqli_num_rows($que)==0){
            $sql = "INSERT into product(`pname`,`pimg`,`category`,`price`,`discount_price`,`alternate_name`)values('$pname','$pimg','$category','$price','$dprice','$aname')";
            $que = mysqli_query($con,$sql);

            $_SESSION['reload']=1;
            $_SESSION['addProduct'] = 1;
            ?>
                <script>
                    window.history.go(-1);
                </script>
            <?php
        }
        else{
            $_SESSION['reload'] = 1;
            $_SESSION['addProduct'] = 0;
            ?>
            <script>
                window.history.go(-1);
                </script>
            <?php
        }
    
}
else{
    alert("Not able to add Product");
}
    ?>