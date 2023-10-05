<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="index.js"></script>
    <style>
         @import url('https://fonts.cdnfonts.com/css/poppins');
         body{
             font-family: 'Poppins', sans-serif;
             margin: 0;
             padding: 0;
             overflow-x: hidden;
            /* button:#0C3720 */
        }
        li{
            list-style:none;

        }
        *{
            padding: 0;margin: 0;
            overflow-x:hidden;
        }
        img{
            height:40px;
        }
        header{
            height: 60px;
            border-bottom: 1px solid black;
        }
        header nav {
            display: flex;
            justify-content: space-between;
            margin-right: 20px;
            margin-left: 70px;
            line-height: 50px;
        }
        header nav ul{
            display:flex;
            gap: 30px;
            justify-content:space-between;
        }
        header nav ul li a{
            color:black;
            text-decoration:none;
            font-size: 1.1em;
        }
        header nav ul li img{
            position : relative;
            top: 10px;
        }
        #login{
            padding: 6px 12px;
            border: 1px solid black;
            border-radius: 6px;
            
        }
        #signup{
            padding: 6px 12px;
            border: 1px solid black;
            border-radius: 6px;
        }
        .under::after{
            color: green;
        }
        #login:hover,#signup:hover{
            color:white;
            transform: scaleX(0);
            transform-origin: bottom right;
            background-color:#0C3720;
            cursor: pointer;
        }
        #signup:hover:after,#signup:hover:after{
            transform: scaleX(1);
        }
        .under:hover{
            color:green;
        }
        .hide-both li i{
            font-size: 1.4em;
            position: relative;
            top: 10px;
            border: 2px solid black;
            padding: 1px 4px;
            
        }
        .hide-both{
            display:none;
        }
        #bg{
            height: 100vh;
            overflow:hidden;
            position:absolute;
            width:100vw;
        }
        @media(max-width:825px){
            
            #login{
                border:none;
            }
            #signup{
                border:none;
            }
            .same{
                font-size: 1.4em;
            }
            .nav-header:hover{
                color:green;
            }
            .navbar-header{
                display:none;
            }
            .hide-both{
                display:flex;
            }
            #cross-btn{
                display:none;
            }
            
            .active nav .hide-both #cross-btn{
                display:flex;
                position:relative;
            }
            .active nav .hide-both{
                position: relative;
                right: 30px;
            }
            .active nav .hide-both #menu-btn{
                position:absolute;
                display:none;
            }
            .active #bg{
                background-color:lime;
                opacity: 0.3;
            }
            .active{
                /* background-color: lime; */
                height: 100vh;
                overflow-y:hidden;
                z-index: 100;
            }
            .active nav{
                height: 100%;
            }
            .active nav .navbar-header{
                display:block;
                text-align:center;
                position:absolute;
                top:40%;
                left:50%;
                transform: translate(-50%,-50%);
                overflow-y: hidden;
            }
            header nav{
                margin-left: 45px;
            }
            .active nav ul div{
                display:none;
            }
        }
        
        .mr-2{
            width: 300px;
            padding: 6px 8px;
            border-radius: 7px;
            outline:none;
            border:none;
            background-color:#eee;
        }
        .search-btn-info{
            padding: 4px 7px;
            border-radius: 7px;
            border:none;
            cursor:pointer;
            color:white;
            background-color:#0C3720;
        }
        #signup{
            margin-right: 10px;
        }
        @media(max-width:560px){
            .mr-2{
                width: 150px;
            }
            header nav{
                margin-right:0px;
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
</body>
</html>
