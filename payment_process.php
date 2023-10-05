<?php
    $api = 'rzp_test_pug7r0IXCL6qCp';
    $secret = 'TY2R1lZATrcgLhMh0szht4rY';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
    
<form action="" method="POST">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $api; ?>" 
    data-amount="1" 
    data-currency="INR"
    data-order_id="order_CgmcjRh9ti2lP7"
    data-buttontext="Pay with Razorpay"
    data-name="Vegetable Walla"
    data-description=""
    data-image="images/logo.png"
    data-prefill.name="Rakesh"
    data-prefill.email="gaurav.kumar@example.com"
    data-theme.color="#F37254"
></script>
<input type="hidden" custom="Hidden Element" name="hidden"/>
</form>
</body>
</html>
<script>
    $(document).ready(function(){

    })
</script>
