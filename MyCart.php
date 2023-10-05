<?php
    include 'connection.php';
    include 'navbar.php';
     $que = "SELECT product.pimg,product.pname,product.price,product.discount_price,mycart.quantity,mycart.pid,mycart.user_id
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        @media (min-width: 1025px) {
.h-custom {
height: 100vh !important;
}
}
    </style>
</head>
<body>
<section class="h-100 h-custom" style="background-color: #eee; height: cover;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">
            <div class="row">
              <div class="col-lg-7">
                <h5 class="mb-3"><a href="index.php" class="text-body">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Continue shopping</a></h5>
                <hr>
                <div class="d-flex justify-content-between align-items-center mb-4">
                  <div>
                    <p class="mb-1">Shopping cart</p>
                    <p class="mb-0">You have <?php echo$cnt;?> items in your cart</p>
                  </div>
                </div>
                <?php while($row = mysqli_fetch_array($res)){
                  $total = ($row['discount_price']*$row['quantity'])+ $total;
                  $saved = ($row['price']*$row['quantity'])+ $saved;
                  ?>
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div>
                          <img src="<?php echo $row['pimg'];?>" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;height:65px; margin-right:5px;">
                        </div>
                        <div class="ms-3">
                          <h5><?php echo $row['pname'];?></h5>
                          <p class="small mb-0">/Kg</p>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <div style="width: 50px;">
                          <h5 class="fw-normal mb-0"><?php echo $row['quantity'];?></h5>
                        </div>
                        <div style="width: 80px;">
                          <h5 class="mb-0"><span style="text-decoration:line-through; color:gray"><?php echo $row['price'].' ';?></span>&#x20B9;<?php echo $row['discount_price'];?></h5>
                        </div>
                        <input type="hidden" value="<?php echo $row['user_id'];?>" id="uid">
                        <input type="hidden" value="<?php echo $row['pid'];?>" id="pid">
                        <div onclick="removeproduct()" style="color: red; margin-left: 20px;"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php };?>
              </div>
              <div class="col-lg-5">
              
                <div class="card bg-primary text-white rounded-3" style="background-color:#0C3720;">
                  <div class="card-body" style="background-color:green">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h5 class="mb-0">Summary</h5>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Subtotal</p>
                      <p class="mb-2">&#x20B9;<?php echo $total + $saved-$total;?></p>
                    </div>

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Shipping</p>
                      <p class="mb-2">
                      <?php if($total<500){
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
                        echo"0"; 
                      }?></p>
                    </div>

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">You Saved</p>
                      <p class="mb-2">&#x20B9;<?php echo$saved-$total;?></p>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-2">Total(Incl. taxes)</p>
                      <p class="mb-2">&#x20B9;<?php echo$total?></p>
                    </div>

                    <button type="button" class="btn btn-info btn-block btn-lg" style="background-color:#0C3720;border:none;">
                      <div class="d-flex justify-content-between">
                        <span>&#x20B9;<?php echo$total+$charge?></span>
                        <span>Checkout <i class="fa fa-caret-right" aria-hidden="true"></i><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                      </div>
                    </button>

                  </div>
                </div>

              </div>


            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
<script>
  function removeproduct(){
    var user_id = $('#uid').val();
    var pid = $('#pid').val();
    
    $.ajax({
      url : "removeCart.php",
      type : "POST",
      data : {uid : user_id, product_id : pid},
      success : function(){
        window.location.replace("MyCart.php");
      },
    });
  }
</script>
