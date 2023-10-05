<?php
    $host="localhost";
    $server = "root";
    $password= "";
    $db = "vegies";


    $con =mysqli_connect($host,$server,$password);
    if(!$con){
        echo"Connection Not Established";
        exit();
    }
    $sql = "CREATE DATABASE IF NOT EXISTS $db";
    $query = mysqli_query($con,$sql);

    if(!$query){
        echo"Unable to Create Database";
        exit();
    }
    $con =mysqli_connect($host,$server,$password,$db);

    $t1 = "CREATE TABLE IF NOT EXISTS `product`(
           `pid` int auto_increment primary key,
           `pname` varchar(100) unique key,
           `pimg` varchar(300),
           `category` varchar(100),
           `price` int,
           `discount_price` int,
           `weight` varchar(50),
           `Availability` varchar(50),
           `alternate_name` varchar(100));"; 
    $q1 = mysqli_query($con,$t1);

    $t2 = "CREATE TABLE IF NOT EXISTS `user_details`(
        `user_id` int auto_increment primary key,
        `username` varchar(100),
        `email` varchar(100) unique,
        `password` varchar(32),
        `contact` bigint(10),
        `address` varchar(300),
        `pincode` varchar(6));";  
    $q2 = mysqli_query($con,$t2);
    $t3 = "CREATE TABLE IF NOT EXISTS `mycart`(
        `oid` int primary key,
        `quantity` int,
        `weight` varchar(40), 
        `pid` int,
        `user_id` int,
        PRIMARY KEY (pid,user_id),
        FOREIGN KEY (user_id) REFERENCES user_details(user_id),
        FOREIGN KEY (pid) REFERENCES product(pid)
    );";
    $q3 = mysqli_query($con,$t3);

?>