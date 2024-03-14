



<!DOCTYPE html>
<html lang="en">
<head> 
    <title>The Wisteria | Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="StyleCss/navbarCss/navbar.css"/>
    <link rel="stylesheet" href="StyleCss/indexCss/indexCss.css"/>
    
    <!-- เข้าเว็บ cdnjs font awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
      integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="./Javascript/functions.js"></script>
</head>
 <!-- ==== Navbar-header ==== -->
<?php $page='home'; include_once("navbar.php"); ?>
<body>
   <div class="main-index">
        <!-- ==== Section Main ==== -->
        <section class="contianer-main">

            <!-- ==== Section Main Left ==== -->
            <div class="con-main-left">
                <h3>The Wisteria</h3>
                <h3>Cafe and Restaurant</h3>
                <p>สัมผัสกับคาเฟ่ใจกลางหมู่บ้านเหล่าสำราญ อ.เรณูนคร จ.นครพนม @The Wisteria Cafe’ อาหารอร่อย บรรยากาศดี กาแฟเลิศ วันหยุดผ่านมาเที่ยวเรณูนครต้องลองแว้บเข้าไปเช็คอินค่ะ</p>
                <!-- ==== btn contact + location ==== -->
                <div class="con-btn-main">
                    <a href="#">
                        <button type="button" class="btn-contact-us">ติดต่อร้าน</button>
                    </a>
                    <a href="#">
                        <button type="button" class="btn-location"><i class="fa-solid fa-location-dot" style="color: #ff5757;"></i><span>ที่ตั้งร้าน</span></button>
                    </a>
                </div>
            </div>

            <!-- ==== Section Main Right ==== -->
            <div class="con-main-right">
                <img src="Img/1.jpg" class="p1" height=460 width="580" alt="">
                <div class="color-bg-box"></div>
            </div>
        </section>

         <!-- ==== Section Main Social Contact ==== -->
         <div class="social-links">
            <a href="#">
                <i class="fa-brands fa-facebook" style="color: #000000;"></i>
            </a>
            <a href="#">
                <i class="fa-brands fa-instagram" style="color: #000000;"></i>
            </a>
            <div class="con-phone">
                <i class="fa-solid fa-phone" style="color: #000000;" onclick="toggleConPhone()"></i>
                <div class="con-phone-text" id="iconPhone">
                    +06x-xxx-xxxx
                </div>
            </div>
        </div> 
   </div>

   <!-- ==== Section Category ==== -->
   <div class="container-category">
        <div class="title-category">
            <h3 class="title-text-cate">ประเภทเมนู</h3>
        </div>
        <div class="grid-category">
                <!-- Category 1 -->
                <form action="./" method="GET">
                <div class="items-category">
                <input type="hidden" name="search" value="">
                    <button style="border:none;background-color:white;">
                        <div class="cate-icon">
                            <span><i class="fa-solid fa-list"></i></span>
                        </div>
                        <div class="text-icon">
                            <span>ทั้งหมด</span>
                        </div>
                    </button>
                </div>
                </form>
                <!-- Category 2 -->
                <form action="./" method="GET">
                <div class="items-category">
                <input type="hidden" name="search" value="ร้อน">
                    <button style="border:none;background-color:white;">
                        
                        <div class="cate-icon">
                            <span><i class="fa-solid fa-mug-hot"></i></span>
                        </div>
                        <div class="text-icon">
                            <span>ร้อน</span>
                        </div>
                    </button>
                </div>
                </form>
                <!-- Category 3 -->
                <form action="./" method="GET">
                <div class="items-category">
                <input type="hidden" name="search" value="เย็น">
                    <button href="" style="border:none;background-color:white;">
                        <div class="cate-icon">
                            <span><i class="fa-solid fa-mug-saucer"></i></span>
                        </div>
                        <div class="text-icon">
                            <span>เย็น</span>
                        </div>
                    </button>
                </div>
                </form>
                <!-- Category 4 -->
                <form action="./" method="GET">
                <div class="items-category">
                <input type="hidden" name="search" value="ปั่น">
                    <button style="border:none;background-color:white;">
                        <div class="cate-icon">
                            <span><i class="fa-solid fa-blender"></i></span>
                        </div>
                        <div class="text-icon">
                            <span>ปั่น</span>
                        </div>
                    </button>
                </div>
                </form>
        </div>
   </div>

   <!-- ==== Section Menu List ==== -->
   <div class="container-menuList">
        <!-- title menu list -->
        <div class="title-menuList">
            <div class="con-title-menulist-left">
                <h3 class="title-text-menuList">รายการเมนู</h3>
                <span class="title-menu-count"></span>
            </div>
        </div>

        <!-- content items menu list -->
        <!-- Grid Menu -->
        
        <?php
                    include("./PhpProcess/DatabaseCon.php");
                    $search = "";
                    if(isset($_GET["search"])){
                        $search=$_GET["search"];
                    }
                    $sql = "SELECT menu.*,
                    concat('[', group_concat(JSON_OBJECT('addons_id', menu_addons.addons_id, 'addons_name', menu_addons.addons_name,'addons_price', menu_addons.addons_price,'addons_type', menu_addons.addons_type) order by menu_addons.addons_id separator ','), ']') as menu_addons
                    FROM menu
                    LEFT JOIN menu_addons
                    ON menu.menu_id=menu_addons.menu_id
                    WHERE menu.status=0
                    ";
                    if($search!=""){
                        $search = str_replace('"', "", $search);
                        $sql.=" AND (menu.menu_name LIKE '%$search%' OR menu.menu_type LIKE '%$search%')";
                    }
                    $sql.=" GROUP BY menu.menu_id";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        echo('<div class="grid-menu-order">');
                        while ($row = $result->fetch_assoc()) {
                            $addons = json_decode($row["menu_addons"]);
                            $rowJson = json_encode($row);
                     
                ?>
                <!-- Product Item -->
                <div class="grid-items-menu-order">
                    <a >
                        <img src="Img/Img-menu/<?php echo $row["menu_image"];?>" alt="">
                        <div class="desc-con">
                            <h6><?php echo $row["menu_name"];?></h6>
                            <p><?php echo $row["menu_type"];?></p>
                            <div class="price-con">
                                <div class="review-con">
                                <i class="fa-solid fa-star" style="color: #f9e510;"></i><span class="review-score">5.0</span>
                                </div>
                                <span class="price-product"><?php echo $row["menu_price"];?> ฿</span>
                            </div>
                        </div>
                        <div onclick='MenuViewModal(`<?php echo($rowJson); ?>`,`./`)' class="Add-con">
                            <h6>+</h6>
                            <h6>เพิ่มไปยังตะกร้า</h6>
                        </div>
                    </a>
                </div>

                <?php
                // session_start();
                $user_id = "null";
                if(isset($_SESSION["user"])){
                    $user_id=$_SESSION["user"];
                }
                ?>

                <?php }echo("</div>");}else{?>
                    <div class="text-center" style="width:100%;font-size:30px;">
                        <i class="fa-solid fa-inbox" style="font-size:100px;"></i><br>
                        ไม่พบเมนู
                    </div>
                <?php }?>
                <div class="modal fade" id="MenuViewModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div  class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">รายละเอียดเมนู</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="./PhpProcess/systemProcess/insertCart.php" method="POST">
                            <div id="menu_view" class="modal-body">
                                
                            </div>
                            <div class="modal-footer">
                                <button style="background-color: #857379;" type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                <button onclick="addTocart(<?php echo($user_id);?>)" style="background-color: #857379;" type="button" class="btn btn-secondary">เพิ่มลงตะกร้า</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                      
        
   </div>

   <!-- ==== Section Footer ==== -->
   <div class="container-footer">
   </div>
    
   <script src="Javascript/script_index.js"></script>
   <!-- <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
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
