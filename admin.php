<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        nav li{
            list-style:none;
            font-weight: bolder;
            text-align:center;
            font-size: 40px;
        }
        .sameadm{
            height: 200px;
            width: 200px;
            border: 1px solid black;
            text-align: center;
            border-radius: 6px;
            margin-top: 130px;
            background-color: #0C3720;
            color: white;
        }
        .sameadm i{
            margin-top: 15px;
        }
        .mainadm{
            display:flex;
            justify-content: space-between;
            width: 80%;
            margin : 12px auto;
        }
        a{
            text-decoration:none;
        }
        @media(max-width:1040px){
            .mainadm{
                width: 96%;
            }
            .sameadm{
                height: 170px;
                width: 170px;
            }
        }
        @media(max-width:750px){
            .mainadm{
                display: block;
                margin-top: 50px;
            }
            .sameadm{
                text-align:center;
                margin : 20px auto;
            }
        }
    </style>
</head>
<body>
        <nav>
            <li>Admin Panel</li>
        </nav>
        <hr>
        <div class="mainadm">
            <a href="pages/totalProduct.php">
                <div class="adm1 sameadm">
                    <h3>Total Products</h3>
                    <hr>
                    <i class="fa fa-archive fa-5x" aria-hidden="true"></i>
                </div>
            </a>
            <a href="pages/addProduct.php">
            <div class="adm2 sameadm">
                <h3>Add Products</h3>
                <hr>
                <i class="fa fa-plus fa-5x" aria-hidden="true"></i>
            </div>
            </a>
            <div class="adm3 sameadm">
                <h3>Orders</h3>
                <hr>
                <i class="fa fa-credit-card fa-5x" aria-hidden="true"></i>
            </div>
            <div class="adm4 sameadm">
                <h3>Income</h3>
                <hr>
                <i class="fa fa-line-chart fa-5x" aria-hidden="true"></i>
            </div>
        </div>
</body>
</html>