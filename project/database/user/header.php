<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='./danhsachsanphamuser.css' rel='stylesheet'>
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="./sourcecss.css" rel="stylesheet">
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        html{
          font-size: 100%;
        }
        /* header menu logo */
        #header1{
            background-color: #53284f;
            height: 80px;
        }
        .nav{
            max-width: 1650px;
            margin: 0px auto;
        }
        nav{
            display: flex;
        }
        #main-menu{
            display: flex;
            list-style: none;
            margin-left: 2.5rem;
        
        }
        .nav #logo img{
            /* logo */
            max-width: 200px;
            height: auto;
        }
        #logo{
            padding: 5px 0px;
            margin-top: 0.6rem;
        }
        #main-menu li {
            position: relative;
          height: 80px;
        }
        #main-menu li a{
            color: white;
            text-decoration: none;
            display: block;
            padding: 25px 25px;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-weight: 600;
            height: 3.5rem;
        } 
        /* sub menu */
        #main-menu ul.sub-menu{
            position: absolute;
            background-color: #ebeaea;
            padding: 15px 0px;
            list-style: none;
            width: 12rem;
            border-radius: 5px;
            opacity: 80%;
            left: 1.45rem;
            display: none;
            margin-top: 1rem;
            z-index: 2;
        }
        #main-menu ul.sub-menu a{
            padding: 10px 30px;
        }
        #main-menu li:hover ul.sub-menu{
            display: block;
          
        }
        
          /* ANH HEADER */
          
          .icon_add{
            position: absolute;
            top:4%;
            left: 97%;
          }
          .icon_add .bx{
          font-size: 1.5rem;
          color: whitesmoke;
          }
    </style>
</head>
<body>
<div id="container1">
        <div id ="header">
            <div id="header1">
                <nav class="nav">
                    <a href="danhsachsanphamuser.php" id="logo">
                        <img src="../public/logo.png" alt="">
                    </a>
           
                    <ul id="main-menu">
                        <li><a class="linkheader" href="#">Products</a>
                            <ul class="sub-menu">
                                <li><a style=" color:#625d5d;" href="">Menu 1</a></li>
                                <li><a style=" color:#625d5d;" href="">Menu 1</a></li>
                                <li><a style=" color:#625d5d;" href="">Menu 1</a></li>
                            </ul>
                        </li> 
                        <li><a class="linkheader" href="#">Help Center</a>
                            <ul class="sub-menu">
                                <li><a style=" color:#625d5d;" href="">Menu 1</a></li>
                                <li><a style=" color:#625d5d;" href="">Menu 1</a></li>
                                <li><a style=" color:#625d5d;" href="">Menu 1</a></li>
                            </ul></li>
                        <li><a class="linkheader" href="#">Explore</a>
                            <ul class="sub-menu">
                                <li><a style=" color:#625d5d;" href="">Menu 1</a></li>
                                <li><a style=" color:#625d5d;" href="">Menu 1</a></li>
                                <li><a style=" color:#625d5d;" href="">Menu 1</a></li>
                            </ul></li>
                    </ul>
                </nav>
            </div>
            <a href="./view-cart.php" class="icon_add"><i class='bx bx-cart-add'></i></a>
           
        </div>
        
    </div>
    