<?php
    session_start();
    include 'connection.php';
     $que = "SELECT product.pimg,product.pname,product.price,product.discount_price,mycart.quantity,mycart.pid,mycart.user_id,mycart.weight
    FROM product
    LEFT JOIN mycart 
    ON product.pid = mycart.pid
    WHERE mycart.user_id=1";
     $res = mysqli_query($con,$que);
     $cnt = mysqli_num_rows($res);
     $total=0;
     $saved=0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/nav.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/index.css">
    
    <style>
        .main{
            display: flex;
            width: 90%;
            margin-top : 50px;
            justify-content: center;
            background-color: white;
            margin: 50px auto;
            gap: 4px;
        }
        .main-cart{
            padding: 40px 20px;
            width: 75%;
            display: block;
            justify-content: center;
           
        }
        .main-cart-summary{
            position : relative;
            width: 25%;
            background-color: white;
            background-color: #efefef;
            border-radius: 7px;
        }
        .main-cart-items{
            display: flex;
            padding: 20px;
            border-top : 1px solid black;
            border-bottom : 1px solid black;
            justify-content: center;
            align-items: center;
        }
        .main-cart-items * {
            width: 140px;
            text-align: center;
        }
        .main-cart-summary-details{
            position : absolute;
            /* height: 365px; */
            width:100%; 
            background-color: green;
            padding-top: 20px;
            margin-left: 8px;
            color: white;
            border-radius: 7px;
        }
        .item-details{
            border: none;
        }
        .cart-item-product-img img{
            height : 60px;
            width: 70px;
        }
        #cart-item-quantity{
            width : 50px;
            height: 40px;
            /* padding: 1px 5px; */
        }
        .main-cart-summary-details h3{
            margin-right: 15px;
            margin-left: 15px;
            border-bottom: 1px solid gray;
            padding-top: 10px;
            padding-bottom: 25px;
            font-size : 22px;
            text-align:center;
        }
        .summary-box{
            margin-top: 30px;
            font-size: 18px;
        }
        .summary-box-inside{
            padding: 8px 10px;
            display: flex;

        }
        .summary-box-inside * {
            width: 50%;
        }
        .summary-box-inside-2{
            text-align:right;
            padding-right: 30px;
        }
        .summary-box button{
            width: 95%;
            display: flex;
            margin : 20px auto;
            border-radius: 6px;
            border: 2px solid transparent;
        }
        .summary-box button:hover{
            border: 2px solid yellowgreen;
            cursor: pointer;
        }
        .btn-info{
            padding: 12px 6px;
            color: white;
            margin: 0 4px;
            display: flex;
            position: relative;
            justify-content: space-between;
        }@media(max-width: 1200px){
            .main{
                display: block;
            }
            .main-cart{
                width:100%;
            }
            .main-cart-summary{
                width:100%; 
            }
            .main-cart-summary-details{
                position : absolute;
                width:100%; 
                margin: 10px 0;
        }
        }
        @media(max-width: 900px){
            
            .main-cart-items{
                 display:block;
            }
            .hide-main-cart{
                display:none;
            }  
            .cart-item-product-price{
                display:block;
            }
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
                    <input class="form-control mr-2" style="padding:11px 11px;" type="text" placeholder="Search Products...">
                    <button class="btn search-btn-info" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </ul>
            <ul class="navbar-header">
                <li><a href="index.php" class="under same">Home</a></li>
                <li><a href="" class="under same">About</a></li>
                <!-- <li><a href="" class="under same">Contact</a></li> -->
                <?php 
                    
                    if(isset($_SESSION['login'])){
                        ?>
                        <li><a href="" id="orders" class="under same">Orders</a></li>
                        <li><a href="Logout.php" id="login" class="same">Logout</a></li>
                        <?php
                    }
                    else{?>
                        <li><a href="login.php" id="login" class="same">Login</a></li>
                        <li><a href="" id="signup" class="same">Sign up</a></li>
                        <?php
                    }
                    ?>
            </ul>
            <ul class="hide-both open-btn">
                <li><i id="menu-btn" class="fa fa-bars butt" name="menu-open" onclick='opened()'></i></li>
                <li><i id="cross-btn" class="fa fa-times butt" name="menu-close" onclick='opened()'></i></li>
            </ul>
        </nav>
    </header>
    <div class="goback">
        <div><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</div>
    </div>
    <div class="search-results"></div>
    <div class="main main-block">
        
        <div class="main-cart">
            
            <div class="main-cart-items hide-main-cart">
                <div class="cart-item-product-img">
                    Product Image
                </div>
                <div class="cart-item-product-name">
                    Product Name
                </div>
                <div class="cart-item-product-price">
                    Price
                </div>
                <div class="cart-item-product-quantity">
                    Quantity
                </div>
                <div class="cart-item-product-subtotal">
                    Sub-Total
                </div>
                <div class="cart-item-product-remove">
                    Remove
                </div>
            </div>
            <?php $i=0;
            while($row = mysqli_fetch_array($res)){
                    $i++;
                    $disper = $row['discount_price']/1000;
                    $disper = $disper * $row['weight'];
                    $per = $row['price']/1000;
                  $per = $per * $row['weight'];
                    $total = ($disper*$row['quantity'])+ $total;
                  $saved = ($per*$row['quantity'])+ $saved;
                  
                  ?>
                <div class="main-cart-items item-details">
                    <div class="cart-item-product-img">
                        <img src="<?php echo $row['pimg'];?>" alt="">
                    </div>
                    <div class="cart-item-product-name">
                        <?php echo $row['pname'];?>
                    </div>
                    <div class="cart-item-product-price">
                        <?php echo $per; if($row['weight'] == 1000){ $st ="/Kg";}else if($row['weight'] == 500){$st ="/500g";}else{$st ="/250g";}?>
                        <span style="font-size: small; color:gray" ><?php echo $st ?></span>
                    </div>
                    <div class="cart-item-product-quantity">
                        <input type="number" id="cart-item-quantity" class="quantity-update<?php echo $i ;?>" value="<?php echo $row['quantity']?>" min="1" onchange="update_quantity(<?php echo $i ;?>)">
                    </div>
                    <div class="cart-item-product-subtotal" >
                        <input type="hidden" id="subTotalQty<?php echo $i?>" value="<?php echo $row['quantity'] ?>">
                        <input type="hidden" id="subTotalPer<?php echo $i?>" value="<?php echo $per ?>">

                        <span> &#x20B9; </span> 
                        <span id="subtotal<?php echo $i;?>"><?php
                            echo $per*$row['quantity'];
                            ?>
                        </span>
                    </div>
                    
                    <div class="cart-item-product-remove">
                        <input type="hidden" value="<?php echo $row['user_id'];?>" id="uid">
                        <input type="hidden" value="<?php echo $row['pid'];?>" id="pid" class="pid<?php echo $i?>">
                        <div onclick="removeproduct()" style="color: red; margin-left: 20px;"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></div>
                    </div>
                </div>
                <?php }?>
            </div>
    
        <div class="main-cart-summary">
            <div class="main-cart-summary-details">
                <h3>Summary</h3>
                <div class="summary-box">
                    <div class="summary-box-inside" id="summary-box-1"><span >Sub Total</span> <span class="summary-box-inside-2">&#x20B9;<?php echo $total +$saved-$total;?></span></div>
                    <div class="summary-box-inside" id="summary-box-2"><span >Shipping</span> <span class="summary-box-inside-2"><?php if($total<500){
                        if($cnt <1){
                            $charge = 0;
                        }
                        else{
                            
                          $charge = 100;
                        }
                        echo"&#x20B9;$charge";
                      }
                      else{
                        $charge = 0;
                        echo"&#x20B9; 0"; 
                      }?></span></div>
                    <div class="summary-box-inside" id="summary-box-3"><span >Saved(By Discount)</span> <span class="summary-box-inside-2">&#x20B9;<?php echo$saved-$total;?></span></div>
                    <div class="summary-box-inside" id="summary-box-4"><span >Total(Incl. Taxes)</span> <span class="summary-box-inside-2">&#x20B9;<?php echo$total?></span></div>
                    <!-- <button><span id="button-checkout-1">&#x20B9;<?php echo$total+$charge?></span><span>Checkout <i class="fa fa-caret-right" aria-hidden="true"></i><i class="fa fa-angle-right" aria-hidden="true"></i></span></button> -->
                    
                        <form action="razorpay-php-testapp-master/pay.php" method="POST">

                            <button type="submit" class="btn btn-info btn-block btn-lg" style="background-color:#0C3720;" >
                                <div>&#x20B9;<?php echo$total+$charge?></div>
                                <input type="hidden" name="totalcharge" value="<?php echo $total+$charge?>">
                                <div>Checkout <i class="fa fa-caret-right" aria-hidden="true"></i><i class="fa fa-angle-right" aria-hidden="true"></i></div>
                            </button>
                        </form>
    
                    
                </div>
            </div>
        </div>
    </div>

</body>
</html>
<script>
    function payment_process(){
        $.ajax({
            type: "post",
            url: 'payment_process.php',
            success: function(response){
                alert("hi");
            }
        })
    }
    function removeproduct(){
        var pid = $('#pid').val();
        var user_id = $('#uid').val();
    $.ajax({
      url : "removeCart.php",
      type : "POST",
      data : {uid : user_id, product_id : pid},
      success : function(){
        window.location.replace("newCart.php");
      },
    });
  }
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
        function update_quantity(index){
            var pid = $('.pid'+index).val();
            var user_id = $('#uid').val();
            var qty = $('.quantity-update'+index).val();
            var temp = document.querySelector('#subTotalPer'+index).value;
    
            $.ajax({
                url : 'upadateQuantity.php',
                type : 'POST',
                data : {pid : pid, uid : user_id , qty :qty },
                success : function(){
                
                    document.querySelector('#subtotal'+index).innerHTML = (qty * temp);
                }
            });
        }
        $('.goback div').click(function(){
            $('.main-block').css('display','flex');
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
</script>