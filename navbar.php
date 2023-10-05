<?php
    include 'connection.php';
    $vegies = "SELECT * FROM product where category='Vegetables'";
    $fruits = "SELECT * FROM product where category='Fruits'";
    $vegetable = mysqli_query($con,$vegies);
    $fruit = mysqli_query($con,$fruits);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/index.css">
    <style>
        @import url('https://fonts.cdnfonts.com/css/poppins');
        body{
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            /* button:#0C3720 */
            background-color: #efefef;
        }
        
        *{
            padding: 0;margin: 0; 
            box-sizing: border-box;
        }
 
</style>
</head>
<body>
    <header id="header">    
        <nav>
            <ul class="navbar-logo">
                <li><img src="images/logo.png" alt=""></li>
            </ul>
            <ul>
                <div>
                    <input class="form-control mr-2" type="text" placeholder="Search Products...">
                    <button class="btn search-btn-info" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </ul>
                <ul class="navbar-header">
                <li><a href="" class="under same">Home</a></li>
                <li><a href="" class="under same">About</a></li>
                <!-- <li><a href="" class="under same">Contact</a></li> -->
                <li><a href="" id="login" class="same">Login</a></li>
                <li><a href="" id="signup" class="same">Sign up</a></li>
            </ul>
            <ul class="hide-both open-btn">
                <li><i id="menu-btn" class="fa fa-bars butt" name="menu-open" onclick='opened()'></i></li>
                <li><i id="cross-btn" class="fa fa-times butt" name="menu-close" onclick='opened()'></i></li>
            </ul>
        </nav>
    </header>

<!-- Main Page -->

    <div class="goback">
        <div><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</div>
    </div>
    <div class="search-results"></div>
    
    
        <!-- Starting Page Image -->
</html>
<script>
    

    </script>