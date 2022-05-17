<?php
    session_start();
    $logined=0;
    if(!isset($_SESSION['luottruycap'])) $_SESSION['luottruycap']=0;
    else $_SESSION['luottruycap']+=1;

    if(isset($_COOKIE['user'])&&isset($_COOKIE['pass'])){
        echo "Cookie đã đăng ký là: ".$_COOKIE['user']." - ".$_COOKIE['pass'];
    }

    if(isset($_GET['delc'])&&($_GET['delc']==1)){
        setcookie("user","",time()-(86400*7));
        setcookie("pass","",time()-(86400*7));
        echo "<br><font color='red'>Bạn đã xóa cookie</font>";
    }

    if(isset($_POST['login'])&&($_POST['login'])){
        $user=$_POST['user'];
        $pass=$_POST['pass'];
        if(($user=="demo")&&($pass=="demo")){
            $_SESSION['user']=$user;
            $_SESSION['pass']=$pass;
            $logined=1;
            $msg= "<br><font color='blue'>Các bạn đăng nhập thành công</font>";
        }else{
            $logined=0;
            $msg= "<br><font color='red'>Vui lòng đăng nhập</font>";
        }
        if(isset($_POST['ghinho'])&&($_POST['ghinho'])){
            setcookie("user",$user,time()+(86400*7));
            setcookie("pass",$pass,time()+(86400*7));
            $msgcookie="<br>Đã ghi nhận cookie!";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator</title>

    <link rel="icon" type="image/x-icon" href="../assets/img/Icon.jpg">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <link rel="stylesheet" href="../assets/css/destination.css">
    <!-- fa icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    
    <!-- Themify icon -->
    <link rel="stylesheet" href="../assets/themify-icons/themify-icons.css">
    <!-- Roboto font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/additional.css">
    <style>
       header {
           height:300px;
           background-image: url(admin.png);
           background-size: cover;
           background-position: center;
       }

       .body-admin {
            margin-left: 70px;
            margin-top: 20px;

       }

       table {
           margin-bottom:50px;
       } 
       th {
            width: 300px;
            background-color: #d7cbcb;
            font-size: 2rem;
            color: #5a5353;
       }
       td {
           text-align:center;
           margin: 12px 0;
           font-size:1.6rem;
       }

       .admin-heading {
           font-size: 3rem;
           color: #949494;
       }
    </style>
</head>
<body>
    <header>
        <div class="navbar">
                <div class="grid wide navbar--grid">
                        <div class="row navbar--wrap">
                            <a href="" class="navbar__logo-link">
                                <img src="../assets/img/homelogo.png" alt="" class="navbar__logo-img">
                            </a>
        
                            <ul class="navbar__list hide-on-tablet-mobile">
                                <li class="navbar__item">
                                    <a href="" class="navbar__item-link">HOME</a>
                                </li>
                                <li class="navbar__item">
                                    <a href="#" class="navbar__item-link">PACKAGES</a>
                                    <ul class="navbar__item-list">
                                        <li class="navbar__item-item navbar__item-item--hot">
                                            <a href="#" class="navbar__item-item-link">Search 1</a>
                                            <div class="hot-active">
                                                <span class="hot-active__text">HOT</span>
                                            </div>
                                            <div class="new-active">
                                                <span class="new-active__text">NEW</span>
                                            </div>
                                            <div class="row-navbar">
                                                <i class="row-navbar__icon fas fa-angle-right"></i>
                                            </div>
                                        </li>
                                        <li class="navbar__item-item navbar__item-item--new">
                                            <a href="#" class="navbar__item-item-link">Search 2</a>
                                            <div class="hot-active">
                                                <span class="hot-active__text">HOT</span>
                                            </div>
                                            <div class="new-active">
                                                <span class="new-active__text">NEW</span>
                                            </div>
                                            <div class="row-navbar">
                                                <i class="row-navbar__icon fas fa-angle-right"></i>
                                            </div>
                                        </li>
                                        <li class="navbar__item-item navbar__item-item--row">
                                            <a href="#" class="navbar__item-item-link">Tour Package</a>
                                            <div class="hot-active">
                                                <span class="hot-active__text">HOT</span>
                                            </div>
                                            <div class="new-active">
                                                <span class="new-active__text">NEW</span>
                                            </div>
                                            <div class="row-navbar">
                                                <i class="row-navbar__icon fas fa-angle-right"></i>
                                                <ul class="navbar-list__additional">
                                                    <li class="navbar-list__additional-item">
                                                        <a href="#" class="navbar-list__additional-item-link">Carousel</a>
                                                    </li>
                                                    <li class="navbar-list__additional-item">
                                                        <a href="#" class="navbar-list__additional-item-link">Custom map</a>
                                                    </li>
                                                    <li class="navbar-list__additional-item">
                                                        <a href="#" class="navbar-list__additional-item-link">360 Panorama</a>
                                                    </li>
                                                    <li class="navbar-list__additional-item">
                                                        <a href="#" class="navbar-list__additional-item-link">Default</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="navbar__item-item">
                                            <a href="#" class="navbar__item-item-link">Destination</a>
                                            <div class="hot-active">
                                                <span class="hot-active__text">HOT</span>
                                            </div>
                                            <div class="new-active">
                                                <span class="new-active__text">NEW</span>
                                            </div>
                                            <div class="row-navbar">
                                                <i class="row-navbar__icon fas fa-angle-right"></i>
                                            </div>
                                        </li>
                                        <li class="navbar__item-item">
                                            <a href="#" class="navbar__item-item-link">Topology</a>
                                            <div class="hot-active">
                                                <span class="hot-active__text">HOT</span>
                                            </div>
                                            <div class="new-active">
                                                <span class="new-active__text">NEW</span>
                                            </div>
                                            <div class="row-navbar">
                                                <i class="row-navbar__icon fas fa-angle-right"></i>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="navbar__item">
                                    <a href="#" class="navbar__item-link">SHOP</a>
                                    <ul class="navbar__item-list">
                                        <li class="navbar__item-item ">
                                            <a href="#" class="navbar__item-item-link">Archive</a>
                                            <div class="hot-active">
                                                <span class="hot-active__text">HOT</span>
                                            </div>
                                            <div class="new-active">
                                                <span class="new-active__text">NEW</span>
                                            </div>
                                            <div class="row-navbar">
                                                <i class="row-navbar__icon fas fa-angle-right"></i>
                                            </div>
                                        </li>
                                        <li class="navbar__item-item ">
                                            <a href="#" class="navbar__item-item-link">Single Product</a>
                                            <div class="hot-active">
                                                <span class="hot-active__text">HOT</span>
                                            </div>
                                            <div class="new-active">
                                                <span class="new-active__text">NEW</span>
                                            </div>
                                            <div class="row-navbar">
                                                <i class="row-navbar__icon fas fa-angle-right"></i>
                                            </div>
                                        </li>
                                        <li class="navbar__item-item">
                                            <a href="#" class="navbar__item-item-link">Cart</a>
                                            <div class="hot-active">
                                                <span class="hot-active__text">HOT</span>
                                            </div>
                                            <div class="new-active">
                                                <span class="new-active__text">NEW</span>
                                            </div>
                                            <div class="row-navbar">
                                                <i class="row-navbar__icon fas fa-angle-right"></i>
                                            </div>
                                        </li>
                                        <li class="navbar__item-item">
                                            <a href="#" class="navbar__item-item-link">Checkout</a>
                                            <div class="hot-active">
                                                <span class="hot-active__text">HOT</span>
                                            </div>
                                            <div class="new-active">
                                                <span class="new-active__text">NEW</span>
                                            </div>
                                            <div class="row-navbar">
                                                <i class="row-navbar__icon fas fa-angle-right"></i>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="navbar__item">
                                    <a href="#" class="navbar__item-link">ABOUT US</a>
                                    <ul class="navbar__item-list">
                                        <li class="navbar__item-item navbar__item-item--new">
                                            <a href="#" class="navbar__item-item-link">About Us</a>
                                            <div class="hot-active">
                                                <span class="hot-active__text">HOT</span>
                                            </div>
                                            <div class="new-active">
                                                <span class="new-active__text">NEW</span>
                                            </div>
                                            <div class="row-navbar">
                                                <i class="row-navbar__icon fas fa-angle-right"></i>
                                            </div>
                                        </li>
                                        <li class="navbar__item-item ">
                                            <a href="#" class="navbar__item-item-link">About Us 2</a>
                                            <div class="hot-active">
                                                <span class="hot-active__text">HOT</span>
                                            </div>
                                            <div class="new-active">
                                                <span class="new-active__text">NEW</span>
                                            </div>
                                            <div class="row-navbar">
                                                <i class="row-navbar__icon fas fa-angle-right"></i>
                                            </div>
                                        </li>
                                        <li class="navbar__item-item">
                                            <a href="#" class="navbar__item-item-link">About Us 3</a>
                                            <div class="hot-active">
                                                <span class="hot-active__text">HOT</span>
                                            </div>
                                            <div class="new-active">
                                                <span class="new-active__text">NEW</span>
                                            </div>
                                            <div class="row-navbar">
                                                <i class="row-navbar__icon fas fa-angle-right"></i>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="navbar__item">
                                    <a href="#" class="navbar__item-link">PAGES</a>
                                    <ul class="navbar__item-list">
                                        <li class="navbar__item-item ">
                                            <a href="#" class="navbar__item-item-link">Services</a>
                                            <div class="hot-active">
                                                <span class="hot-active__text">HOT</span>
                                            </div>
                                            <div class="new-active">
                                                <span class="new-active__text">NEW</span>
                                            </div>
                                            <div class="row-navbar">
                                                <i class="row-navbar__icon fas fa-angle-right"></i>
                                            </div>
                                        </li>
                                        <li class="navbar__item-item ">
                                            <a href="#" class="navbar__item-item-link">Agency Tour</a>
                                            <div class="hot-active">
                                                <span class="hot-active__text">HOT</span>
                                            </div>
                                            <div class="new-active">
                                                <span class="new-active__text">NEW</span>
                                            </div>
                                            <div class="row-navbar">
                                                <i class="row-navbar__icon fas fa-angle-right"></i>
                                            </div>
                                        </li>
                                        <li class="navbar__item-item ">
                                            <a href="#" class="navbar__item-item-link">Testimonials</a>
                                            <div class="hot-active">
                                                <span class="hot-active__text">HOT</span>
                                            </div>
                                            <div class="new-active">
                                                <span class="new-active__text">NEW</span>
                                            </div>
                                            <div class="row-navbar">
                                                <i class="row-navbar__icon fas fa-angle-right"></i>
                                                
                                            </div>
                                        </li>
                                        <li class="navbar__item-item">
                                            <a href="#" class="navbar__item-item-link">Prices</a>
                                            <div class="hot-active">
                                                <span class="hot-active__text">HOT</span>
                                            </div>
                                            <div class="new-active">
                                                <span class="new-active__text">NEW</span>
                                            </div>
                                            <div class="row-navbar">
                                                <i class="row-navbar__icon fas fa-angle-right"></i>
                                            </div>
                                        </li>
                                        <li class="navbar__item-item">
                                            <a href="#" class="navbar__item-item-link">Promotions</a>
                                            <div class="hot-active">
                                                <span class="hot-active__text">HOT</span>
                                            </div>
                                            <div class="new-active">
                                                <span class="new-active__text">NEW</span>
                                            </div>
                                            <div class="row-navbar">
                                                <i class="row-navbar__icon fas fa-angle-right"></i>
                                            </div>
                                        </li>
                                        <li class="navbar__item-item ">
                                            <a href="#" class="navbar__item-item-link">Faq</a>
                                            <div class="hot-active">
                                                <span class="hot-active__text">HOT</span>
                                            </div>
                                            <div class="new-active">
                                                <span class="new-active__text">NEW</span>
                                            </div>
                                            <div class="row-navbar">
                                                <i class="row-navbar__icon fas fa-angle-right"></i>
                                            </div>
                                        </li>
                                        <li class="navbar__item-item ">
                                            <a href="#" class="navbar__item-item-link">Coming Soon</a>
                                            <div class="hot-active">
                                                <span class="hot-active__text">HOT</span>
                                            </div>
                                            <div class="new-active">
                                                <span class="new-active__text">NEW</span>
                                            </div>
                                            <div class="row-navbar">
                                                <i class="row-navbar__icon fas fa-angle-right"></i>
                                            </div>
                                        </li>
                                        <li class="navbar__item-item navbar__item-item--row">
                                            <a href="#" class="navbar__item-item-link">About Us</a>
                                            <div class="hot-active">
                                                <span class="hot-active__text">HOT</span>
                                            </div>
                                            <div class="new-active">
                                                <span class="new-active__text">NEW</span>
                                            </div>
                                            <div class="row-navbar">
                                                <i class="row-navbar__icon fas fa-angle-right"></i>
                                                <ul class="navbar-list__additional">
                                                    <li class="navbar-list__additional-item">
                                                        <a href="#" class="navbar-list__additional-item-link">About Us 1</a>
                                                    </li>
                                                    <li class="navbar-list__additional-item">
                                                        <a href="#" class="navbar-list__additional-item-link">About Us 2</a>
                                                    </li>
                                                    <li class="navbar-list__additional-item">
                                                        <a href="#" class="navbar-list__additional-item-link">About Us 3</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="navbar__item-item navbar__item-item--row">
                                            <a href="#" class="navbar__item-item-link">Contact</a>
                                            <div class="hot-active">
                                                <span class="hot-active__text">HOT</span>
                                            </div>
                                            <div class="new-active">
                                                <span class="new-active__text">NEW</span>
                                            </div>
                                            <div class="row-navbar">
                                                <i class="row-navbar__icon fas fa-angle-right"></i>
                                                <ul class="navbar-list__additional">
                                                    <li class="navbar-list__additional-item">
                                                        <a href="#" class="navbar-list__additional-item-link">Contact 1</a>
                                                    </li>
                                                    <li class="navbar-list__additional-item">
                                                        <a href="#" class="navbar-list__additional-item-link">Contact 2</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="navbar__item">
                                    <a href="#" class="navbar__item-link">NEWS</a>
                                    <ul class="navbar__item-list">
                                        <li class="navbar__item-item">
                                            <a href="#" class="navbar__item-item-link">Archive</a>
                                            <div class="hot-active">
                                                <span class="hot-active__text">HOT</span>
                                            </div>
                                            <div class="new-active">
                                                <span class="new-active__text">NEW</span>
                                            </div>
                                            <div class="row-navbar">
                                                <i class="row-navbar__icon fas fa-angle-right"></i>
                                            </div>
                                        </li>
                                        <li class="navbar__item-item navbar__item-item--row">
                                            <a href="#" class="navbar__item-item-link">Single Post</a>
                                            <div class="hot-active">
                                                <span class="hot-active__text">HOT</span>
                                            </div>
                                            <div class="new-active">
                                                <span class="new-active__text">NEW</span>
                                            </div>
                                            <div class="row-navbar">
                                                <i class="row-navbar__icon fas fa-angle-right"></i>
                                                <ul class="navbar-list__additional">
                                                    <li class="navbar-list__additional-item">
                                                        <a href="#" class="navbar-list__additional-item-link">Full Width</a>
                                                    </li>
                                                    <li class="navbar-list__additional-item">
                                                        <a href="#" class="navbar-list__additional-item-link">Right Sidebar</a>
                                                    </li>
                                                    <li class="navbar-list__additional-item">
                                                        <a href="#" class="navbar-list__additional-item-link">Left Sidebar</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="navbar__item">
                                    <a href="#" class="navbar__item-link">CONTACT</a>
                                    <ul class="navbar__item-list">
                                        <li class="navbar__item-item ">
                                            <a href="#" class="navbar__item-item-link">Contact 1</a>
                                            <div class="hot-active">
                                                <span class="hot-active__text">HOT</span>
                                            </div>
                                            <div class="new-active">
                                                <span class="new-active__text">NEW</span>
                                            </div>
                                            <div class="row-navbar">
                                                <i class="row-navbar__icon fas fa-angle-right"></i>
                                            </div>
                                        </li>
                                        <li class="navbar__item-item navbar__item-item--hot">
                                            <a href="#" class="navbar__item-item-link">Contact 2</a>
                                            <div class="hot-active">
                                                <span class="hot-active__text">HOT</span>
                                            </div>
                                            <div class="new-active">
                                                <span class="new-active__text">NEW</span>
                                            </div>
                                            <div class="row-navbar">
                                                <i class="row-navbar__icon fas fa-angle-right"></i>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <a href="booknow.php" class="btn btn-purple hide-on-tablet-mobile">
                                <span>BOOK NOW</span>
                            </a>
                            
                            <div class="navbar-user">
                                <?php
                                    include 'config.php';
                                    $user_id = $_SESSION['user_id'];
                                    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
                                    
                                    if(mysqli_num_rows($select) > 0){
                                        $fetch = mysqli_fetch_assoc($select);
                                    }
                                ?>

                                <form action="" method="post" enctype="multipart/form-data">
                                    <?php
                                        
                                        if($fetch['image'] == ''){
                                        echo '<img class="navbar-user__img" src="./images/default-avatar.png">';
                                        }else{
                                        echo '<img class="navbar-user__img" src="./uploaded_img/'.$fetch['image'].'">';
                                        }
                                    
                                    ?>
                                </form>
                                <ul class="navbar-user__list">
                                    <li class="navbar-user__item">
                                        <a href="update_profile.php" class="navbar-user__item-link">My profile</a>
                                    </li>
                                    <li class="navbar-user__item navbar-user__item--red">
                                        <a href="logout.php" class="navbar-user__item-link navbar-user__item-link--red">Log out</a>
                                    </li>
                                </ul>
                            </div>

                            <label for="option-checkbox" class="navbar__option">
                                <i class="ti-align-justify navbar__option-icon"></i>
                            </label>

                            <input type="checkbox" hidden class="navbar__option-checkbox" id="option-checkbox">

                            <div class="navbar__option-list">
                                <div class="navbar__option-list-content">
                                    <div class="navbar__option-close-container">
                                        <label for="option-checkbox" class="navbar__option-close">
                                            <i class="ti-close navbar__option-close-icon"></i>
                                        </label>
                                    </div>
                                    <div class="navbar__option-text">
                                        <span class="navbar__option-text-sub">BEST</span>
                                        <div class="navbar__option-text-main">PACKAGES</div>
                                    </div>
                                    <div class="navbar__option-destination">
                                        <div class="navbar__option-destination-photo">
                                            <img src="../../assets/img/package1.jpg" alt="" class="navbar__option-destination-img">
                                        </div>
                                        <div class="navbar__option-destination-detail">
                                            <span class="navbar__option-destination-nation">Berlin</span>
                                            <div class="navbar__option-destination-area">
                                                <i class="navbar__option-destination-area-icon ti-location-pin"></i>
                                                <span class="navbar__option-destination-area-text">Europe</span>
                                            </div>
                                            <div class="btn navbar__option-destination-btn">FROM 700$</div>
                                        </div>
                                    </div>
                                    <div class="navbar__option-destination">
                                        <div class="navbar__option-destination-photo">
                                            <img src="../../assets/img/package2.jpg" alt="" class="navbar__option-destination-img">
                                        </div>
                                        <div class="navbar__option-destination-detail">
                                            <span class="navbar__option-destination-nation">Hong Kong</span>
                                            <div class="navbar__option-destination-area">
                                                <i class="navbar__option-destination-area-icon ti-location-pin"></i>
                                                <span class="navbar__option-destination-area-text">Asia</span>
                                            </div>
                                            <div style="background: linear-gradient(to right, #f76570 0%, #f78d65 100%);" class="btn navbar__option-destination-btn">FROM 500$</div>
                                        </div>
                                    </div>
                                    <div class="navbar__option-destination">
                                        <div class="navbar__option-destination-photo">
                                            <img src="../../assets/img/package3.jpg" alt="" class="navbar__option-destination-img">
                                        </div>
                                        <div class="navbar__option-destination-detail">
                                            <span class="navbar__option-destination-nation">San Francisco</span>
                                            <div class="navbar__option-destination-area">
                                                <i class="navbar__option-destination-area-icon ti-location-pin"></i>
                                                <span class="navbar__option-destination-area-text">United States</span>
                                            </div>
                                            <div style="background: linear-gradient(to right, #ba71da 0%, #da717b 100%);" class="btn navbar__option-destination-btn">FROM 400$</div>
                                        </div>
                                    </div>

                                    <div class="navbar__option-destination-child">
                                        <div class="destination-child ">
                                            <div class="destination-container">
                                                <div style="background-image: url(../../assets/img/destination-1.jpg);" class="destination-item__background">
                                                    <div class="destination-item">
                                                        <div class="destination-item__text">
                                                            <div class="destination-item__name">Europe</div>
                                                            <div class="destination-item__package">3 PACKAGES</div>
                                                        </div>
                                                        <div class="destination-item__icon">
                                                            <img src="../../assets/img/destination_icon1.png" alt="" class="destination-item__icon-img">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="destination-container__hover">
                                                    <div  class="destination-item__hover">
                                                        <div class="destination-item__hover-heading">
                                                            <span>Packages</span>
                                                        </div>
                                                        <ul class="destination-item__hover-list">
                                                            <li class="destination-item__hover-item">
                                                                <a href="#" class="destination-item__hover-item-link">Berlin</a>
                                                            </li>
                                                            <li class="destination-item__hover-item">
                                                                <a href="#" class="destination-item__hover-item-link">Amsterdam</a>
                                                            </li>
                                                            <li class="destination-item__hover-item">
                                                                <a href="#" class="destination-item__hover-item-link">Tuscany</a>
                                                            </li>
                                                        </ul>
                                                        <a href="../../html/destination1.php" class="btn destination-item__hover-view">
                                                            <span class="destination-item__hover-view-text">VIEW DESTINATION</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="navbar__option-text">
                                        <span class="navbar__option-text-sub">LAST</span>
                                        <div class="navbar__option-text-main-bottom">MINUTES</div>
                                    </div>
                                    <div class="navbar__option-destination">
                                        <div class="navbar__option-destination-photo">
                                            <img src="../../assets/img/package4.jpg" alt="" class="navbar__option-destination-img">
                                        </div>
                                        <div class="navbar__option-destination-detail">
                                            <span class="navbar__option-destination-nation">Tuscany</span>
                                            <div class="navbar__option-destination-area">
                                                <i class="navbar__option-destination-area-icon ti-location-pin"></i>
                                                <span class="navbar__option-destination-area-text">Italy</span>
                                            </div>
                                            <div style="background: linear-gradient(to right, #1bbc9b 0%, #1bbc63 100%);" class="btn navbar__option-destination-btn">FROM 730$</div>
                                        </div>
                                    </div>
                                    <div class="navbar__option-destination">
                                        <div class="navbar__option-destination-photo">
                                            <img src="../../assets/img/package5.jpg" alt="" class="navbar__option-destination-img">
                                        </div>
                                        <div class="navbar__option-destination-detail">
                                            <span class="navbar__option-destination-nation">Amsterdam</span>
                                            <div class="navbar__option-destination-area">
                                                <i class="navbar__option-destination-area-icon ti-location-pin"></i>
                                                <span class="navbar__option-destination-area-text">Netherlands</span>
                                            </div>
                                            <div style="background: linear-gradient(to right, #f3a46b 0%, #f3c96b 100%);" class="btn navbar__option-destination-btn">FROM 1500$</div>
                                        </div>
                                    </div>
                                    <div class="navbar__option-destination">
                                        <div class="navbar__option-destination-photo">
                                            <img src="../../assets/img/package6.jpg" alt="" class="navbar__option-destination-img">
                                        </div>
                                        <div class="navbar__option-destination-detail">
                                            <span class="navbar__option-destination-nation">Phuket</span>
                                            <div class="navbar__option-destination-area">
                                                <i class="navbar__option-destination-area-icon ti-location-pin"></i>
                                                <span class="navbar__option-destination-area-text">Thailandia</span>
                                            </div>
                                            <div style="background: linear-gradient(to right, #14b9d5 0%, #14d5b1 100%);" class="btn navbar__option-destination-btn">FROM 1200$</div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                </div>
        </div>
        <div class="grid wide  ">
                <div style="display:flex; justify-content:center;" class="header-destination-title">
                    <span class="header-destination-title-text">Administrator</span>
                </div>
        </div>
            
    </header>

    <div class="body-admin">
    <?php
        $conn = new mysqli("localhost", "root", "", "user_db");
        $sql = "SELECT * From user_form";

        $result = $conn->query($sql);
        
    ?>
    <h2 class="admin-heading">Users information</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Gmail</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>".$row[0]."</td>";
                echo "<td>".$row[1]."</td>";
                echo "<td>".$row[2]."</td>";
                echo "</tr>";
            }
        } 
        ?>
    </table>

    <?php
        $conn = new mysqli("localhost", "root", "", "user_db");
        $sql = "SELECT * From feedback";

        $result = $conn->query($sql);
        
    ?>
    <h2 class="admin-heading">Feedbacks</h2>
    <table>
        <tr>
            <th style="width: 900px;">Feedbacks</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo '<td style="text-align: left">'.$row[0]."</td>";
                echo "</tr>";
            }
        } 
        ?>
    </table>


    
    </div>
</body>
</html>