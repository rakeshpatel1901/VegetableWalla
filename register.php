<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up Form</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap");
        *{    
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x : hidden;
        }
        .login-container{
            display:flex;
            width:100%;
            margin-left:20px;
           
        }
        .login-box1{
            margin-top:10px;
            width:50%;
        }
        .sub2{
                width:55vw;
                background-color: seagreen;
                filter: brightness(90%);
                height: 100vh;
                position: relative;
                z-index:-2;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .sub2-main img{
                height:80vh;
                position: absolute;

            }
        .input-style{
    
            padding: 1.1em;
            width: 90%;
            background-color:whitesmoke;
            border: 0px;
            border-bottom: 2px solid grey;
            border-radius: 5px;
            outline:transparent;
            margin-top: 0.8vh;
        
        }
        
        .submit{
            width:90%;
            background-color: #cd977c;
            padding: 0.8em;
            margin: 2vh 0px;
        }
        .submit input{
            background:transparent;
            border:0;
            text-align:center;
        }
        .submit input{
            color: white;
            font-size: 1.1em;
            text-decoration: none;
        }
        .submit:hover{
            background-color:  #d67442;
            transition: 0.5s;
            cursor: pointer;
        }
        
        .sub2-font{
                letter-spacing: 1px;
                margin-top: 25vh;
                font-size: 2.2em;
                color: white;
                font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            }
            .small-font{
                font-size: 1.2em;
                color: white;
                width:50%;
                letter-spacing: 1px;
            }
            .sub2-main{
                /* padding-top: 3vh; */
                /* padding-left: 5vw; */
                display: flex;
                justify-content: center;
                align-items: center;
            }
    </style>
</head>
<body>

    <form action="register.php" method="POST">
        <div class="login-container">
            <div class="login-box1">
                    <center><h2 style="color:#d67442">Sign Up</h2></center>
                    <div class="usermail">
                    <font>Name</font><br>
                        <input type="text" name="name" class="input-style" placeholder="Enter Your Name">
                    </div><br>
                    <div class="usermail">
                        <font>Email Address</font><br>
                        <input type="email" name="email" class="input-style" placeholder="Enter Your Email">
                    </div><br>
                    <div class="userpass usermail">
                        <font>Password</font><br>
                        <input type="password" name="password" class="input-style" placeholder="Enter Your Password">
                    </div><br>
                    <div class="usermail">
                        <font>Confirm Your Password</font><br>
                        <input type="password" name="cpassword" class="input-style"  placeholder="Confirm-Password">
                    </div><br>
                    <div class="usermail">
                    <font>Contact</font><br>
                        <input type="text" name="contact" class="input-style" placeholder="Mobile No.">
                    </div><br>
                    <div class="usermail">
                    <font>Address</font><br>
                        <input type="text" name="address" class="input-style" placeholder="Enter Your Address">
                    </div><br>
                        <a href="">
                            <div class="submit">
                                <center>    
                                    <input type="submit" name="submit" value="Sign Up">
                                </center>
                            </div>
                        </a>
                    
                    <div class="sign-up" style="float: right; margin-right:35px">
                        <font>Already a Member?</font>
                        <font "> <a href="login.php" style="text-decoration: none; color : blue"> Sign in now </a></font>
                    </div>
            </div>
            <div class="sub2">
                <div class="sub2-main">
                <img src="images/9929.jpg" alt="" class="login-logo">
        </div>
            </div>
        </div>
    </form>
</body>
</html>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

    include 'connectdb.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    
    if($password != $cpassword)
    {
        echo'<script type="text/JavaScript">';
        echo'alert("Password Mismatch")';
        echo'</script>';
    }
    else{
        $nsql = "SELECT * FROM `custdetails` WHERE `email`='$email'";
        $result = mysqli_query($con,$nsql);
        if($result){
            $num = mysqli_num_rows($result);
            if($num>0){
                echo '<script type="text/JavaScript">';
                echo 'alert("Email Already Exists!!")';
                echo '</script>';
            }
            else{    
                $password = md5($password);
                $sql ="INSERT INTO `custdetails`(`cname`, `email`, `password`,`contact`,`address`) VALUES ('$name','$email','$password','$contact','$address')";
                $result = mysqli_query($con,$sql);
                if($result){
                    echo '<script type="text/JavaScript">';
                    echo"window.location.href = 'login.php'";
                    echo '</script>';
                }
                else{
                    die(mysqli_error($con));
                }
                
            }
        }
        
    }
}
    ?> 

