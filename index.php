<?php
    session_start();
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
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/newContainer.css">
    <link rel="stylesheet" href="css/popup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
        .categoriesImage img{
            width : 350px;
}

        
     
 
</style>
</head>
<body>
    <div class="pop">
        <div class="popup">
            <div class="icon"><i class="fa-solid fa-check"></i></div>
            <div class="message">Item Added</div>
        </div>
    </div>
    <header id="header">    
        <nav>
            <ul class="navbar-logo">
                <li><img src="images/logo.png" alt=""></li>
            </ul>
            <ul>
                <div>
                    <input class="form-control mr-2" style="padding:11px 11px;" type="text" placeholder="Search Products...">
                    <button class="btn search-btn-info" style=""type="submit"><i class="fa fa-search" style=""></i></button>
                </div>
            </ul>
                <ul class="navbar-header">
                <li><a href="" class="under same">Home</a></li>
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

<!-- Main Page -->

    <div class="goback">
        <div><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</div>
    </div>
    <div class="search-results"></div>
    
    <div class="main-block">
  
        <!-- Starting Page Image -->
        <div class="main_image">
            <div class="main_image_sub_block">
                <div class="main_image_details">
                    <div id="headers">VEGETABLE WALLA</div>
                    <div class="auto-type">
                        <span>Fresh</span>
                        <span class="type"></span>
                    </div>
                    <div class="ourmoto">
                        <i>"We promises to offer fresh, diverse produce while ensuring fair pricing and exceptional customer service, all with a commitment to sustainability and safety."</i>
                    </div>
                    
                    <div class="shop-button">
                        <a href="#vegie">Shop Now <i class="fa fa-arrow-down"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ends -->
    
        <!-- Cart  -->
        <div id="cartdiv">
            <a href="newCart.php" id="cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart</a>
        </div>
        <!-- Cart Close -->
    <br>
    <div class="reveal">

        <h2>CATEGORIES</h2>
        <div class="vegetables categoriesVegetable">
            
            <div class="vProduct" >
            <a href="pages/products.php?category=Vegetables">
                <div class="vImage categoriesImage">
                    <img src="images/vegetables.jpg" alt="">
                    <div class="content">
                        <h3>VEGETABLES</h3>
                    </div>
                </div>
                </a>
            </div>
            
            <div class="vProduct">
            <a href="pages/products.php?category=Fruits">
                <div class="vImage categoriesImage">
                    <img src="images/fruits.jpg" alt="">
                    <div class="content">
                    <h3>FRUITS</h3>
                    </div>
                </div>
            </a>
            </div>
            
            <div class="vProduct" >
            <a href="pages/products.php?category=Leaf N Herbs">
                <div class="vImage categoriesImage">
                    <img src="images/spinach2.jpg" alt="">
                    <div class="content">
                    <h3>LEAF & HERBS</h3>
                </div>
            </div>
            </a> 
            </div>
        </div>
    </div>
    <div id="vegie"></div>
    <br>
    <div class="reveal" >

        <h2 >VEGETABLES</h2>
        <div class="vegetables"  >
        <?php for($i=0;$i<4;$i++){
            $row= mysqli_fetch_array($vegetable);
            $discount_percent = ($row['price'] - $row['discount_price']) /($row['price']/100);
            
            ?> <div class="vProduct">
                <div class="vImage">
                <small>
                    <span id="disper"><?php echo floor($discount_percent); ?>% Off</span>
                </small>
                <img src="<?php echo $row['pimg'];?>" alt="">
            </div>
            <div class="vDetails">
                <div class="vName">
                    <?php echo $row['pname'];?>
                </div>
                <div class="vPrice">
                    <span id="price">Price - </span>
                    <span id="ogprice" style="font-weight:normal">&#x20B9;<?php echo $row['price'];?></span>
                    <span id="disprice"> &#x20B9;<?php echo $row['discount_price'];?>/-</span>
                    <input type="hidden" value="<?php echo $row['pid'];?>" id="pid<?php echo$i;?>">
                    
                </div>
                <div class="vWeight">
                    <span style="color:gray;font-weight:normal;font-size:17px;">
                        <select name="" id="weight<?php echo$i;?>">
                            <option value="1000">Per 1Kg</option>
                            <option value="500">Per 500g</option>
                            <option value="250">Per 250g</option>
                        </select>
                    </span>
                </div>
                <div class="vQuantity">
                    <label for="">Quantity</label>
                    <span class="input-wrapper">
                        <button class="decrement<?php echo $i?>" id="decrement" onclick="quantityClickDecrease(<?php echo$i?>)">-</button>
                        <input type="number" value="1" class="qty<?php echo$i?>" id="quantity"  min="1"/>
                        <button class="increment<?php echo $i?>" id="increment" onclick="quantityClickIncrease(<?php echo$i?>)">+</button>
                    </span>

                </div>
                <div class="vButtons">
                    <button id="addtocart" onclick="addcart(<?php echo$i;?>)">Add to Cart</button>
                </div>
            </div>
            
        </div>
            <?php   }?>
        
        
                 
              
        </div>

    </div>
    <br>
    <div class="reveal">

        <h2>FRUITS</h2>
        <div class="vegetables">
            <?php for($i=1000;$i<1004;$i++){
            $row= mysqli_fetch_array($fruit);
            
            $discount_percent = ($row['price'] - $row['discount_price']) /($row['price']/100);
            
            ?> <div class="vProduct">
                <div class="vImage">
                <small>
                    <span id="disper"><?php echo floor($discount_percent); ?>% Off</span>
                </small>
                <img src="<?php echo $row['pimg'];?>" alt="">
            </div>
            <div class="vDetails">
                <div class="vName">
                    <?php echo $row['pname'];?>
                </div>
                <div class="vPrice">
                    <span id="price">Price - </span>
                    <span id="ogprice" style="font-weight:normal">&#x20B9;<?php echo $row['price'];?></span>
                    <span id="disprice"> &#x20B9;<?php echo $row['discount_price'];?>/-</span>
                    <input type="hidden" value="<?php echo $row['pid'];?>" id="pid<?php echo$i;?>">
                    
                </div>
                <div class="vWeight">
                    <span style="color:gray;font-weight:normal;font-size:17px;">
                        <select name="" id="weight<?php echo$i;?>">
                            <option value="1000">Per 1Kg</option>
                            <option value="500">Per 500g</option>
                            <option value="250">Per 250g</option>
                        </select>
                    </span>
                </div>
                <div class="vQuantity">
                    <label for="">Quantity</label>
                    <span class="input-wrapper">
                        <button class="decrement<?php echo $i?>" id="decrement" onclick="quantityClickDecrease(<?php echo$i?>)">-</button>
                        <input type="number" value="1" class="qty<?php echo$i?>" id="quantity"  min="1"/>
                        <button class="increment<?php echo $i?>" id="increment" onclick="quantityClickIncrease(<?php echo$i?>)">+</button>
                    </span>

                </div>
                <div class="vButtons">
                    <button id="addtocart" onclick="addcart(<?php echo$i;?>)">Add to Cart</button>
                </div>
            </div>
            
        </div>
            <?php   }?>
        </div>
    </div>
    <br>
    <div class="reveal">
    <h2>LEAF & HERBS</h2>
    <div class="vegetables">

        <div class="vProduct">
            <div class="vImage">
                <small>
                    <span id="disper">25% Off</span>
                </small>
                <img src="images/potato2.jpg" alt="">
            </div>
            <div class="vDetails">
                <div class="vName">
                    Potato
                </div>
                <div class="vPrice">
                    <span id="price">Price - </span>
                    <span id="ogprice" style="font-weight:normal">&#x20B9;80</span>
                    <span id="disprice"> &#x20B9;60/-</span>
                </div>
                <div class="vWeight">
                    <!-- <span style="color:gray;font-weight:normal;font-size:17px;">per 250g</span> -->
                    <span style="color:gray;font-weight:normal;font-size:17px;">
                        <select name="" id="weight<?php echo$i;?>">
                            <option value="1000">Per 1Kg</option>
                            <option value="500">Per 500g</option>
                            <option value="250">Per 250g</option>
                        </select>
                    </span>
                </div>
                <div class="vQuantity">
                    <label for="">Quantity</label>
                    <span class="input-wrapper">
                        <button id="decrement">-</button>
                        <input type="number" value="1" id="quantity" min="1"/>
                        <button id="increment">+</button>
                    </span>
                </div>
                <div class="vButtons">
                    <button id="addtocart">Add to Cart</button>
                </div>
            </div>
            
        </div>

        <div class="vProduct">
            <div class="vImage">
                <small>
                    <span id="disper">25% Off</span>
                </small>
                <img src="images/apple2.jpg" alt="">
            </div>
            <div class="vDetails">
                <div class="vName">
                    Apple
                </div>
                <div class="vPrice">
                    <span id="price">Price - </span>
                    <span id="ogprice" style="font-weight:normal">&#x20B9;80</span>
                    <span id="disprice"> &#x20B9;60/-</span>
                </div>
                <div class="vWeight">
                    <span style="color:gray;font-weight:normal;font-size:17px;">per 250g</span>
                </div>
                <div class="vQuantity">
                    <label for="">Quantity</label>
                    <span class="input-wrapper">
                        <button id="decrement">-</button>
                        <input type="number" value="1" id="quantity" min="1"/>
                        <button id="increment">+</button>
                    </span>
                </div>
                <div class="vButtons">
                    <button id="addtocart">Add to Cart</button>
                </div>
            </div>
        </div>

        <div class="vProduct">
            <div class="vImage">
                <small>
                    <span id="disper">25% Off</span>
                </small>
                <img src="images/spinach2.jpg" alt="">
            </div>
            <div class="vDetails">
                <div class="vName">
                    Spinach
                </div>
                <div class="vPrice">
                    <span id="price">Price - </span>
                    <span id="ogprice" style="font-weight:normal">&#x20B9;80</span>
                    <span id="disprice"> &#x20B9;60/-</span>
                </div>
                <div class="vWeight">
                    <span style="color:gray;font-weight:normal;font-size:17px;">per 250g</span>
                </div>
                <div class="vQuantity">
                    <label for="">Quantity</label>
                    <span class="input-wrapper">
                        <button id="decrement">-</button>
                        <input type="number" value="1" id="quantity" min="1"/>
                        <button id="increment">+</button>
                    </span>
                </div>
                <div class="vButtons">
                    <button id="addtocart">Add to Cart</button>
                </div>
            </div>
        </div>

        <div class="vProduct">
            <div class="vImage">
                <small>
                    <span id="disper">25% Off</span>
                </small>
                <img src="images/lemon2.jpg" alt="">
            </div>
            <div class="vDetails">
                <div class="vName">
                    Lemon
                </div>
                <div class="vPrice">
                    <span id="price">Price - </span>
                    <span id="ogprice" style="font-weight:normal">&#x20B9;80</span>
                    <span id="disprice"> &#x20B9;60/-</span>
                </div>
                <div class="vWeight">
                    <span style="color:gray;font-weight:normal;font-size:17px;">per 250g</span>
                </div>
                <div class="vQuantity">
                    <label for="">Quantity</label>
                    <span class="input-wrapper">
                        <button id="decrement">-</button>
                        <input type="number" value="1" id="quantity" min="1"/>
                        <button id="increment">+</button>
                    </span>
                </div>
                <div class="vButtons">
                    <button id="addtocart" >Add to Cart</button>
                </div>
            </div>
        </div>

    </div>
    </div>

    <!-- <p class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3780.9117550429246!2d73.79032997529434!3d18.62303848249048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2b9ae334e1b77%3A0x32950757cf71d582!2sKairali%20Bazar!5e0!3m2!1sen!2sin!4v1694150650314!5m2!1sen!2sin" width="80%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p> -->
    <?php include 'pages/footer.php';?>
</div>
    
</body>
</html><?php
if(isset($_SESSION['displayLogin'])){
        $message = "Login Successfully";
        
        unset($_SESSION['displayLogin']);
        ?>
        <script>
            
            function pop(message){
                    document.querySelector('.message').innerHTML = message;
                   $('.pop').addClass('show');
                    $('.pop').css('position','fixed');
                    $('.show').css('top','10px');
                    // $('.show').css('transform','translateY(500px)');
                    $('.show').css('transition','0.5s all ease-in-out');
                    $('.show').css('z-index','100');
                    setTimeout(function(){
                        // $('.show').css('transform','translateY(-500px)');
                        $('.show').css('top','-100px');
                        $('.pop').removeClass('show');
                    }, 3000)
    }
            pop('<?php echo $message ;?>');
         
        </script>
<?php
    }

    if(isset($_SESSION['logout'])){
        $message = "Logout Successfully";
        echo $message;
        unset($_SESSION['logout']);
        echo "<script>";
        echo "pop('$message')";
        echo "</script>";

    }?>
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
        function addcart(index){
            var pid = $('#pid'+index).val();
            var qty = $('.qty'+index).val();
            var weight = $('#weight'+index).val();
            $.ajax({
                url:"addCart.php",
                type:"POST",
                data:{pid : pid, qty:qty, weight: weight},
                success: function(){
                    $('.pop').addClass('show');
                    $('.pop').css('position','fixed');
                    $('.show').css('top','10px');
                    document.querySelector('.message').innerHTML="Item Added";
                    // $('.show').css('transform','translateY(500px)');
                    $('.show').css('transition','0.5s all ease-in-out');
                    $('.show').css('z-index','100');
                    setTimeout(function(){
                        // $('.show').css('transform','translateY(-500px)');
                        $('.show').css('top','-100px');
                        $('.pop').removeClass('show');
                    }, 3000)
                },
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

function quantityClickIncrease(index){
    
    const incrementButton = document.querySelector(".increment"+index);
   
    const quantityInput = document.querySelector(".qty"+index);
    
        quantityInput.value = parseInt(quantityInput.value) + 1;

}
function quantityClickDecrease(index){

const decrementButton = document.querySelector(".decrement"+index);
const quantityInput = document.querySelector(".qty"+index);


if(parseInt(quantityInput.value)>1){
    
    quantityInput.value = parseInt(quantityInput.value) - 1;
}
}


window.addEventListener('scroll',reveal);
function reveal(){
    var reveals = document.querySelectorAll('.reveal');
    for(var i = 0 ; i< reveals.length ; i++){
        var windowheight = window.innerHeight;
        var revealtop = reveals[i].getBoundingClientRect().top;
        var revealpoint=10;

        if(revealtop< windowheight - revealpoint){
            reveals[i].classList.add('animatescroll');
        }
        else{
            reveals[i].classList.remove('animatescroll');
        }
    }
}

    </script>