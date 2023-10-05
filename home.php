<?php
    include 'nav.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vegies- Home Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <style>
        @import url('https://fonts.cdnfonts.com/css/poppins');
        *{
            overflow-x: hidden;
            
        }
        body{
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            /* button:#0C3720 */
        }
        .main_image{
            background:url('images/vegiesBg.jpg');
            height: 70vh;
            width:100%;
            background-size: 100% 100%;
            background-repeat:no-repeat;
        }
        .auto-type{
            
            font-size: 50px;
            position: relative;
            top: 25%;
            text-align:center;
    
        }
        .main_image #headers{
            color: whitesmoke;
            text-align:center;
            padding-top:10px;
            font-weight:bold;
            text-shadow: 4px 2px black;
            font-size: 35px;        
            letter-spacing : 1px;
        }
        span{
            color:white;
        }
        .type{
            color:#f0ff00;
        }
        #headers::after{
            content: '';
            position: relative;
            display:block;
            width: 250px;
            margin : 2px auto;
            height: 5px;
            background-color: #0C3720;
            border-radius:190px;
        }   
        .shop-button{
            position: relative;
            top: 30%;
            
            text-align:center;
            justify-content: center;
            padding-left:20px;
        }
        .shop-button a{
            padding: 12px 24px;
            color: white;
            line-height:45px;
            letter-spacing:1px;
            background-color:#0C3720;
            border-radius:20px;
            text-decoration:none;
        }
        h2{
            margin-left:10px;
        }
        .vegetables{
            width:92%;
            display:flex;
            position:relative;
            margin : 0 auto;
            justify-content:space-around;
            flex-wrap:wrap;
            
        }
        .block{
            margin-bottom: 20px;
            width:240px;
            background-color:#eee;
            border-radius: 8px;
            color:black;
        }
        .block img{
            width:100%;
            height: 180px;
            border-radius: 15px 15px 0 0;
        }
        .block div{
            /* text-align: center; */
            font-weight:bolder;
            font-size: x-large;
            margin-top:6px ;
            margin-bottom: 10px;
        }
        #disper{
            position : absolute;
            color: white;
            margin-top:5px;
            margin-right:5px;
            padding: 10px 5px;
            background-color: red;
            border-radius: 100%;
            font-size: x-small;
        }
        
        #ogprice{
            font-size: 17px;
            color:gray;
            text-decoration:line-through;
        }
        .block span{
            color:black;
            font-weight:bold;
        }
        #price,#disprice {
            font-size: 17px;
        }
        #price{
            margin-left:10px;
            font-size: 17px;
        }
        .prod_name{
            margin-left:10px;
        }
        #form1{
            margin-top:0px;
            margin-left:10px;
        
        }
        #form1 label{
            font-size:17px;
        }
        #form1 input{ 
            outline:none;
            border:none;
            border-radius:5px;
            padding:2px 4px;
            
         }

        
        #addtocart{
            width:96%;
            background-color:#0C3720;
            color:white;
            line-height: 30px;
            cursor: pointer;
            margin-top: 15px;
            margin-bottom: 2px;
            border:none;
            border-radius:3px;
        }
        #cart{
            float: right;
            position: fixed;
            border: 2px solid orange;
            padding: 10px 16px;
            font-size: larger;
            border-radius: 10px;
            z-index: 10;
            text-align:center;
            background-color: white;
            color:orange;
            bottom: 50px; 
            right: 40px;
        }
        
        #cart:hover{
            color:white;
            background-color:orange;
            transition: 0.2s ease;
        }
        .lockscroll{
            display:none;
        }
        @media(max-width: 1070px){
            .vegetables{
                width:96%;
            }
            .block{
                width: 220px;
            }
        }
        @media(max-width:950px){
            .block{
                width:190px;
            }
            .vegetables{
                width:98%;
            }
            .product-details div{
                font-size: 18px;
            }
        }
        @media(max-width: 810px){
            .main_image #headers{
                padding-top: 20px;
                font-size:28px;
            }
            .main_image{
                height: 55vh;
            }
            .auto-type{
                font-size: 40px;
            }
            #headers::after{
                width: 200px;
            }
            .vegetables{
                flex-wrap:wrap;
            }
            .block{
                width: 48%;
                margin-bottom:12px;
                display:flex;
                height: 205cpx;

            }
            .block img{
                width: 180px;
                height: 205px;
            }
            .product-details div{
                font-size: 17px;
            }
            .product-details span{
                font-size: 14px;
            }
            #price{
                font-size: 16px
            }
            #form1 label{
                font-size: 14px;
            }
        }
        @media (max-width:620px){
            .vegetables{
                flex-direction:column;
                gap: 12px;
            }
            .block{
                width: 98%;
            }
        }
        @media(max-width: 450px){
            .main_image #headers{
                font-size:22px;
            }
            .auto-type{
                font-size: 30px;
            }
            #headers::after{
                width: 160px;
            }
        }
        .style-quantity{
            background-color:white;
            width: 100px;
            
        }
        .style-quantity button{
    
            border-radius : none;
            text-align: center;
        }
        @media(max-width:700px){
            .prod_name{
                font-size:15px;
                font-weight:10;
            }
        }
        .search-results{
            display:flex;
            flex-wrap:wrap;
            gap: 15px;
            margin-left: 10px;
            margin-top: 20px;
            display: none;
        }
        .goback{
            display:none;
        }
        .goback div{
            border: 1px solid black;
            padding: 4px 7px;
            margin-left: 10px;
            cursor:pointer;
            border-radius: 7px;
            background-color: #0C3720;
            color: white;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="goback">
        <div><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</div>
    </div>
    <div class="search-results">
    </div>

    <div class="main-block">

    
    <!-- Starting Page Image -->
    <div class="main_image">
        <div id="headers">VEGETABLE WALLA</div>
        <div class="auto-type">
            <span>Fresh</span>
            <span class="type"></span>
        </div>
        <div class="shop-button">
            <a href="#vegie">Shop Now <i class="fa fa-arrow-down"></i></a>
        </div>
    </div>
    <!-- Ends -->

    <!-- Cart  -->
    <div id="cartdiv">
        <a href="MyCart.php" id="cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart</a>
    </div>
    <!-- Cart Close -->
    <br>
    <!-- Vegetable Slider -->
    <h2 style="color:green; text-decoration:underline" id="vegie">Vegetables <i class="fa fa-arrow-right"> </i> </h2>
    <br>
    
    <div class="vegetables" >
    <?php
        for($i=0; $i<8 ; $i++){
    ?>  
        <div class="block">
            <small>
                <span id="disper">25% Off</span>
            </small>
            <img src="images/spinach.jpg" alt="">
            <div class="product-details">
                <div class="prod_name">Spinach(Palak)</div>
                <span id="price">Price - </span>
                <span id="ogprice" style="font-weight:normal">&#x20B9;80</span>
                <span id="disprice"> &#x20B9;60/-</span><br>
                <span style="color:gray;margin-left:10px;font-weight:normal;font-size:17px;">per 250g</span>
                <br><div id="form1">
                <label for="">Quantity</label>
                <input type="number" name="quantity" min="1" style="width:40px;" value="1">
                <button id="addtocart" onclick="addcart()">Add to Cart</button>
                </div>
            </div>
        </div>        
       
        <?php }?>
    </div>
    <!-- Vegetable Slider End -->
    <br>
    <!-- Vegetable Slider -->
    <h2 style="color:green; text-decoration:underline">Fruits <i class="fa fa-arrow-right"> </i> </h2>
    <br>
    <?php

    ?>  
    <div class="vegetables">
    <?php
        for($i=0; $i<8 ; $i++){
    ?>  
        <div class="block">
            <small>
                <span id="disper">25% Off</span>
            </small>
            <img src="images/apple.jpg" alt="">
            <div class="product-details">
                <div class="prod_name">Spinach(Palak)</div>
                <span id="price">Price - </span>
                <span id="ogprice" style="font-weight:normal">&#x20B9;80</span>
                <span id="disprice"> &#x20B9;60/-</span><br>
                <span style="color:gray;margin-left:10px;font-weight:normal;font-size:17px;">per 250g</span>
                <br><div id="form1">
                <label for="">Quantity</label>
                <input type="number" name="quantity" min="1" style="width:40px;" value="1">
                <button id="addtocart" onclick="addcart()">Add to Cart</button>
                </div>
            </div>
        </div>        
        <?php }?>
    </div>
    <br>
    <!-- Vegetable Slider -->
    <h2 style="color:green; text-decoration:underline">Herbs & Leafs <i class="fa fa-arrow-right"> </i> </h2>
    <br>
    <?php

    ?>  
    <div class="vegetables">
    <?php
        for($i=0; $i<8 ; $i++){
    ?>  
        <div class="block">
            <small>
                <span id="disper">25% Off</span>
            </small>
            <img src="images/lemon.jpg" alt="">
            <div class="product-details">
                <div class="prod_name">Spinach(Palak)</div>
                <span id="price">Price - </span>
                <span id="ogprice" style="font-weight:normal">&#x20B9;80</span>
                <span id="disprice"> &#x20B9;60/-</span><br>
                <span style="color:gray;margin-left:10px;font-weight:normal;font-size:17px;">per 250g</span>
                <br><div id="form1">
                <label for="">Quantity</label>
                <input type="number" name="quantity" min="1" style="width:40px;" value="1">
                <button id="addtocart" onclick="addcart()">Add to Cart</button>
                </div>
            </div>
        </div>        
        <?php }?>
    </div>
    <p>h</p>
    <p><b>b</b></p>
    <p>d</p>
    <p>s</p>

    </div>
</body>
</html>
<script>
        //Function to Open/Close Responsive Navbar
        function opened(){
            let navi = document.querySelector("#header");
            navi.classList.toggle('active');
            let navi2 = document.querySelector(".main-block");
            navi2.classList.toggle('lockscroll');

            // let activeclass = document.getElementByClassName('active').length>0;
            // if(activeclass){
            //     alert('hi');
            //     $('#cartdiv').css('display','none');
            // }
        }
        function addcart(){
            $.ajax({
                url: "addCart.php",
                type: "POST",
                data:"pid=1",
                success:function(){
                    alert("Successfully Addded");
                }
            });
        }

        $('.goback div').click(function(){
            $('.main-block').css('display','block');
            $('.search-results').empty();
            $('.goback').css('display','none');
            $('.search-results').css('display','none');
        });

        $(document).ready(function(){
            
            $('.mr-2').keyup(function(){
                $('.search-results').empty();
                var text = this.value;
                $.ajax({
                type: "POST",
                url: "search.php",
                data:{detail: text},
                success:function(data){
                    $('.main-block').css('display','none');
                    $('.goback').css('display','flex');
                    $('.search-results').css('display','flex');
                    $('.search-results').append(data); 
                
        
                    // if(demo==""){
        
                        // $('.search-results').css('text-align','center');
                        // $('.search-results').css('position','relative');
                        // $('.search-results').css('top','50%');
                        // $('.search-results').css('left','50%');
                        // $('.search-results').css('transform','translate(-50%,-50%)');    
                    // }   
                },
            });
        });
    });
        //It is Used For auto Typing at main-image
        var typed = new Typed(".type", {
            strings: ["Vegetables", "Fruits"],
            typeSpeed: 180,
            backSpeed: 180,
            loop: true
        })
    </script>