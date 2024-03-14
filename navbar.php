<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="StyleCss/navbarCss/navbar.css" />
    <!-- เข้าเว็บ cdnjs font awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  </head>
  <body>
  <?php
    // $page = 'home';
    
    $pagePath = "";
    $srcPath = "";
      if($page == 'home' || $page== 'promotion'|| $page == "historyOrder"){
        $pagePath = "./";
        $srcPath = "./";
      }else{
        $pagePath = "../";
        $srcPath = "../";
      }
    ?>

    <!-- ==== Navbar-header ==== -->
    <div class="navbar-header">
        <div class="container-nav" id="navbarHeader">
            <div class="logo">
            <img src="<?php echo($srcPath);?>Img/3.png" class="lg" alt="">
            </div>
            <div class="nav-header-right">
                <div class="search-icon" onclick="toggleSearchbar()">
                    <a><i class="fa-solid fa-magnifying-glass" style="color: #857379;"></i></a>
                </div>
                <?php
                  
                  include($pagePath."PhpProcess/DatabaseCon.php");
                  $cartCount = 0;
                  if(isset($_SESSION["user"])){
                    
                    $user_id = $_SESSION["user"];
                    $sqlCartC = "SELECT * FROM cart WHERE user_id='$user_id' AND cart_status='active'";
                    $resultCartC = $con->query($sqlCartC);
                    if ($resultCartC->num_rows > 0) {
                        $cartCount = $resultCartC->num_rows;
                    }
                  }
                  
                ?>
                <div class="cart-icon">
                    <a href="<?php echo $pagePath;?>Php/cart.php"><i class="fa-solid fa-bag-shopping" style="color: #857379;"></i> <div class="cart-count"><span id="cart_count" class="cart-count-number"><?php echo($cartCount);?></span></div> </a>
                </div>
            </div>
        </div>

        <!-- ==== Search Bar ==== -->
        <div class="search-bar-input" id="SearchBar">
            <form action="<?php echo $pagePath;?>index.php">
                <input name="search" type="search" placeholder="ค้นหาเครื่องดื่มที่นี่..." class="input-search"/>
                <button type="submit" id="btn-sub" class="btn-sm"><i class="fa-solid fa-magnifying-glass" style="color: #857379;"></i><span> ค้นหา</span></button>
            </form>
        </div>
    </div>

    <!-- ==== Navbar-Footer ==== -->
    <div class="navbar-footer">
        <div class="container-nav-footer">
            <ul class="container-icon-footer-menu">

            <!-- ==== Icon Home ==== -->
            <li class="icon-menu icon-home <?php if ($page == 'home') { echo 'active';} ?>">
            <a href="<?php echo $pagePath;?>index.php">
                <div class="footer-menu-info">
                    <i class="fa-solid fa-house <?php if ($page == 'home') { echo 'active';} ?>" style="color: #000000;"></i>
                    <h6 class="<?php if ($page == 'home') { echo 'active';} ?>">หน้าหลัก</h6>
                </div>
                </a> 
            </li>

            <!-- ==== Icon List Order ==== -->
            <li class="icon-menu <?php if ($page == 'historyOrder') { echo 'active';} ?>">
            <a href="<?php echo $pagePath;?>historyOrder.php">
                <div class="footer-menu-info">
                <i class="fa-solid fa-list <?php if ($page == 'user-his-order') { echo 'active';} ?>" style="color: #000000;"></i>
                <h6 class="<?php if ($page == 'user-his-order') { echo 'active';} ?>">คำสั่งซื้อ</h6>
                </div>
                </a>
            </li>

            <!-- ==== Icon Promotion Menu ==== -->
            <li class="icon-menu">
            <a href="<?php echo $pagePath;?>promotion.php">
                <div class="footer-menu-info">
                <i class="fa-solid fa-receipt <?php if ($page == 'promotion') { echo 'active';} ?>" style="color: #000000;"></i>
                <h6 class="<?php if ($page == 'promotion') { echo 'active';} ?>">โปรโมชั่น</h6>
                </div>
            </a>
            </li>
            
            <!-- ==== Icon Manage Account ==== -->
            <li class="icon-menu icon-manage <?php if ($page == 'user-profile') { echo 'active';} ?>">
            <a href="<?php if(isset($_SESSION["user"])){echo($pagePath."Php/ProfilePage.php");}else{echo($pagePath."Php/login.php");} ?>">
                <div class="footer-menu-info">
                <i class="fa-solid fa-user <?php if ($page == 'user-profile') { echo 'active';} ?>" style="color: #000000;"></i>
                <h6 class="<?php if ($page == 'user-profile') { echo 'active';} ?>">ข้อมูลส่วนตัว</h6>
                </div>
            </a>
            </li>
            <div class="animation-footer-bar"></div>
        </ul>
        </div>
    </div>

    <script src="Javascript/script.js"></script>
  </body>
</html>
