<!DOCTYPE html>
<html lang="en">
<head>
    <title>The Wisteria | Promotion Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="StyleCss/navbarCss/navbar.css"/>
    <link rel="stylesheet" href="StyleCss/indexCss/indexCss.css"/>
    <link rel="stylesheet" href="StyleCss/promotionCss/promotionCss.css"/>

    <!-- เข้าเว็บ cdnjs font awesome -->
    <link 
    rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" 
        referrerpolicy="no-referrer"
        />
    <script src="./Javascript/functions.js"></script>
</head>
<!-- ==== Navbar-header ==== -->
<?php $page='promotion'; include_once("navbar.php"); ?>
<body>

    <!-- ==================================================================== Section Banner Promotion ==================================================================== -->
    <div class="container-menuList container-promotion">
        <!-- title Promotion -->
        <div class="title-menuList">
            <div class="con-title-menulist-left">
                <h3 class="title-text-menuList">โปรโมชั่นทั้งหมด</h3>
            </div>
        </div>

        <!-- Grid Promotion -->
        <div class="grid-promo-order">
            <?php
            include("./PhpProcess/DatabaseCon.php");
            $sql = "SELECT * FROM promotions WHERE status=0";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    ?>
                    <!-- Promotion Banner Item -->
                    <div class="col">
                        <div class="card mb-4 shadow-sm ">
                            <div style="" class="">

                                <img class="w-100 mx-auto menu_img"
                                    src="Img/Img-promotion/<?php echo ($row["pt_image"]) ?>" height="300" alt="">
                            </div>

                            <div class="card-body">
                                <h3 style="color: red" class="font-weight-bold"><?php echo $row["pt_name"];?></h3>
                                <br>
                                <span class="promotion-discountText"> ลด
                                    <?php echo ($row["pt_discount"]) ?> %
                                </span>
                                <br>               
                                วันที่
                                <?php echo ($row["date_start"]) ?> ถึง
                                <span class="promotion-discountText">
                                <?php echo ($row["date_end"]) ?>
                                </span>
                            </div>


                        </div>
                    </div>

                <?php }
} ?>



        </div>
    </div>

    <!-- ==== Section Footer ==== -->
    <!-- <div class="container-footer">
   </div> -->

    <script src="Javascript/script_index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
</body>
</html>
