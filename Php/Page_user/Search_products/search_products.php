<?php 
    // include("/PhpProcess/DatabaseCon.php"); 
    // $sql = "SELECT * FROM products WHERE product_id ORDER BY review_score ASC";

    // $result = mysqli_query($con,$sql);
?>


<!DOCTYPE html>
<html lang="en">
<head> 
    <title>The Wisteria | Search</title>
    <link rel="stylesheet" href="../../../StyleCss/navbarCss/navbar.css"/>
    <link rel="stylesheet" href="../../../StyleCss/searchProductCss/searchProduct.css"/>
</head>
<script src="../../../Javascript/script.js"></script>
<!-- Navbar -->
<?php $page='home'; include_once("../../../navbar.php"); ?>
<body>
    <!-- Head color black -->
    <section class="nav-header">
        <a href="../../../index.php">
        <div class="con-btn-back">
            <i class="fa-solid fa-arrow-left" style="color: #857379;"></i><span>Back</span>
        </div>
        </a>
          <!-- Search Bar Input Text-->
          <div class="search-container-s">
                        <form action="#">
                        <div class="search-con-s">
                            <input type="search" placeholder="ค้นหาเครื่องดื่มที่นี่..." />
                            <button type="submit" id="btn-sub" class="btn-sm-s"><i class="fa-solid fa-magnifying-glass" style="color: #857379;"></i><span> Search</span></button>
                        </div>
                        </form>
            </div>
    </section>

    <!-- Section menu search -->
    <section class="con-menu-search">
        <div class="con-title-menu-search">
            <p>ผลการค้นหา"<span>โกโก้</span>"</p>
            <p>จำนวน <span>2</span> รายการ</p>
        </div>
        <!-- Grid Menu -->
        <div class="grid-menu-order">
            <!-- Product Item -->
            <a href="#">
                <div class="grid-items-menu-order">
                    <img src="../../../Img/Img-products/Hot/product-coffe.png" alt="">
                    <div class="desc-con">
                        <h6>Menu Name</h6>
                        <p>Hot</p>
                        <div class="price-con">
                            <div class="review-con">
                            <i class="fa-solid fa-star" style="color: #f9e510;"></i><span class="review-score">5.0</span>
                            </div>
                            <span class="price-product">$150</span>
                        </div>
                    </div>
                    <div class="Add-con">
                        <h6>+</h6>
                        <h6>Add</h6>
                    </div>
                </div>
                </a>
        </div>
    </section>
</body>
</html>
