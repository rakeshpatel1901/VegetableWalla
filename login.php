<?php      
        session_start();
        if($_SERVER['REQUEST_METHOD']=='POST'){
            if(isset($_POST['mail']) && isset($_POST['pass'])){

                $mail=$_POST['mail'];
                $pass = $_POST['pass'];
                // $pass = md5($pass);
                include 'connection.php';
                $sql ="SELECT * from `user_details` where `email`='$mail' and `password`='$pass'";
                $result = mysqli_query($con,$sql);
                $row = mysqli_fetch_array($result);
                if($result){
                $num = mysqli_num_rows($result);
                if($num>0){
                    $_SESSION['login'] = 1; 
                    $_SESSION['displayLogin'] = 1;
                    setcookie('uid',$row['user_id']);
                    if(isset($_SESSION['pay'])){
                        unset($_SESSION['pay']);
                        echo"<script>";
                        echo"window.location.href = 'newCart.php'";
                        echo"</script>";
                    }
                    else{
                        echo"<script>";
                        echo"window.location.href = 'index.php'";
                        echo"</script>";
                    }
                }
                else{
                    echo '<script type="text/JavaScript">';
                    echo 'alert("Wrong Credentials")';
                    echo '</script>';
    
                }
            }
        }
    
        }
    ?>
    


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <style>
            *{

            }
            body{
                margin: 0;
                padding: 0;
                overflow: hidden;
            }
            .main{
                display: flex;
            }
            .sub1{
                width:45vw;
                height:100vh;
                background-color: white;
                
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
            .sub1-main{
            
                width:35vw;
                margin: 15vh auto;
            }
            p{
                font-size: 2.2em;
            }
            .usermail{
                font-size: 1.1em;
            }
            #email{
                padding: 1.2em;
                width: 100%;
                background-color:whitesmoke;
                border: 0px;
                border-bottom: 2px solid grey;
                border-radius: 5px;
                outline:transparent;
                margin-top: 0.8vh;
            }
            .submit{
            
                width:100%;
                background-color: seagreen;
                filter: brightness(90%);
                /* padding: 0.8em; */
                margin: 2vh auto;
            }
            .submit input{
                background:transparent;
                border:0;
                width: 100%;
                padding: 0.8em;
            }
            .submit input{
                color: white;
                font-size: 1.1em;
                text-decoration: none;
                
            }
            .submit:hover{
                background-color:#0C3720;
                filter: brightness(100%);
                transition: 0.5s;
                cursor: pointer;
            }
            /* .login-logo{
                height: 60vh;
                position :absolute;
                float:right;
                
                
            } */
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
       
        <div class="main">
            
            <form action="login.php" method="POST">
            <div class="sub1">
                <div class="sub1-main">
                    <p style ="color:#0C3720s">Login</p>
                        <div class="usermail">
                            <font>Email Address</font><br>
                            <input type="email" name="mail" id="email" placeholder="Enter Your Email">
                        </div><br>
                        <div class="userpass usermail">
                            <font>Password</font><br>
                            <input type="password" name="pass" id="email" placeholder="Enter Your Password">
                        </div><br>
                        <center>
                            <div class="submit">
                            <input type="submit" value="Login" id="submitBtn">
                            </div>
                        </center>
                        <div class="sign-up" style="float: right;">
                            <font>Not a Member?</font>
                            <font "> <a href="register.php" style="text-decoration: none; color : blue"> Sign up now </a></font>
                        </div>
                    </div>
                </div>
            </form>
            
            <div class="sub2">
                <div class="sub2-main">
    
                    <!-- <img src="https://i.postimg.cc/1t9GntCj/pngwing-com.png" alt="" class="login-logo"> -->
                    <img src="images/9929.jpg" alt="" class="login-logo">
                    <!-- <div class="sub2-font">
                        <font>Free Delivery,Fresh,</font><br>
                        <font>Crispy Food</font>
                    </div><br>
                    <div class="small-font">
                        <font>“We believe in creating an unmatched experience by maintaining the highest standard of quality, hygiene, service and customer satisfaction.”</font>
                    </div> -->
                </div>
            </div>
            
        </div>
    </body>
    </html>
    
   