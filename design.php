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
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
/>
<link rel="stylesheet" href="css/newContainer.css">
<link rel="stylesheet" href="css/index.css">

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
</head>
<body>
<div class="swiper">
  <!-- Additional required wrapper -->
  <div class="vegetables"  >
  <div class="swiper-wrapper">
      <?php for($i=0;$i<4;$i++){
         $row= mysqli_fetch_array($vegetable);
         $discount_percent = ($row['price'] - $row['discount_price']) /($row['price']/100);
         
         ?>
      <!-- Slides -->
    <div class="swiper-slide">
    <div class="vProduct">
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

    </div>
  </div>
  <!-- If we need pagination -->
  <div class="swiper-pagination"></div>

  <!-- If we need navigation buttons -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>

  <!-- If we need scrollbar -->
  <div class="swiper-scrollbar"></div>
  <?php   }?>
</div>
        
        
                 
              
        </div>

</body>
</html>