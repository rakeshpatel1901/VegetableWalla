<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
<?php
    include 'connection.php';
    if(isset($_POST['detail'])){
    $search = $_POST['detail'];
    $que = "SELECT * FROM product WHERE pname like '$search%' OR pname like'%$search%' OR alternate_name like '$search%'";
    $res= mysqli_query($con,$que);
    if($res){
        if(mysqli_num_rows($res)==0){
            echo "No Result Found";
        }
        else{

            while($row = mysqli_fetch_array($res)){
                $discount_percent = ($row['price'] - $row['discount_price']) /($row['price']/100);
                echo'
            <div class="vProduct">
                <div class="vImage">
                    <small>
                        <span id="disper">'.floor($discount_percent).'% Off</span>
                    </small>
                    <img src="'.$row['pimg'].'" alt="" height="80px;">
                </div>
                <div class="vDetail" style="background-color:white ; padding-left:10px;" >
                    <div class="vName">'.$row['pname'].'</div>
                    <div class="vPrice">
                        <span id="price">Price - </span>
                        <span id="ogprice" style="font-weight:normal">&#x20B9;'.$row['price'].'</span>
                        <span id="disprice"> &#x20B9;'.$row['discount_price'].'/-</span><br>
                    </div>
                    <div class="vWeight">
                        <span style="color:gray;font-weight:normal;font-size:17px;"></span>
                    </div>
                    <br>
                    <div class="vQuantity">
                        <label for="">Quantity</label>
                        <input type="number" name="quantity" min="1" style="width:40px;" value="1">
                    </div>
                    <div class="vButtons">
                        <button id="addtocart" onclick="addcart()">Add to Cart</button>
                    </div>
                </div>
            </div>';
            
        }
         } 
     }
   
    }
   
    ?>

</body>
</html>
