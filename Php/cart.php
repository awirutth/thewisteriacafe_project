

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../StyleCss/navbarCss/navbar.css"/>
    <link rel="stylesheet" href="../StyleCss/indexCss/indexCss.css"/>
    <link rel="stylesheet" href="../StyleCss/otherCss/cart.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="../Javascript/functions.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<?php  $page='user-profile'; include_once("../navbar.php"); ?>
<body>
    
    

<div class="main-index" style="overflow:none;">
<div class="container-category" style="padding:170px 0;padding-bottom:59px;">



            
   




<div class="container" style="height: 380px;overflow-y: auto;">
<div class="grid-menu-order">
    


    <?php
        // session_start();
        if(!isset($_SESSION['user'])){
            echo("<script>window.location.assign('./login.php')</script>");
        }
        $user_id = $_SESSION['user'];
        include("../PhpProcess/DatabaseCon.php");
        $discount = 0;
        $date = date("Y-m-d");
        $sqlPromotion = "SELECT *
        FROM promotions
        WHERE date_start <= '$date' AND date_end >= '$date' AND status=0
        ORDER BY item_min DESC";
        $resultPro = $con->query($sqlPromotion);
        // $promotions = $resultPro->fetch_assoc();
        // if($promotions){
        //     $discount = $promotions["pt_discount"];
        // }
        
        $price = 0;
        $sql = "SELECT menu.*,cart.*, 
        CONCAT('[', GROUP_CONCAT(JSON_OBJECT('addons_id', menu_addons.addons_id, 'addons_name', menu_addons.addons_name, 'addons_price', menu_addons.addons_price)), ']') AS addons_list
 FROM menu
 LEFT JOIN cart ON cart.menu_id = menu.menu_id
 LEFT JOIN cart_sp ON cart.cart_id = cart_sp.cart_id
 LEFT JOIN menu_addons ON menu_addons.addons_id = cart_sp.addons_id
 WHERE cart.user_id = '$user_id' AND cart.cart_status='active'
 GROUP BY cart.cart_id;";
        $result = $con->query($sql);
        while($rowPro = $resultPro->fetch_assoc()){
            if($result->num_rows>=intval($rowPro["item_min"])){
                $discount = $rowPro["pt_discount"];
                break;
            }
        }
        while ($row = $result->fetch_assoc()) {
            $addons = json_decode($row["addons_list"]);
            $menu_name = $row["menu_name"];
            $menu_id = $row["menu_id"];
            $cart_id = $row["cart_id"];
            $menu_price = $row["menu_price"];
            $menu_img = $row["menu_image"];
            $price += intval($menu_price);
            //print_r($addons[0]);
        
    ?>
    <div class="grid-items-menu-order">
                    <a >
                        <img src="../Img/Img-menu/<?php echo($menu_img);?>" alt="">
                        <div class="desc-con">
                            <h6><?php echo($menu_name);?></h6>
                            <p>
                             .
                            <?php
                                $II=0;
                                foreach($addons as $item){
                                    if($item->addons_name!=""){
                                        $price += intval($item->addons_price);
                                ?>
                                
                                <input class="addonsCheckB" value="<?php echo($item->addons_id);?>" onclick="addonsToggle(this,<?php echo($item->addons_price);?>,<?php echo($discount);?>)" checked type="checkbox" name="" id=""> <?php echo($item->addons_name." ".$item->addons_price."    ");?>
                                
                                <?php if($II%2>0&&$II%2==0){echo("<br>");}$II++;}}?>
                            </p>
                            <div class="price-con">
                                <div class="review-con">
                                <i class="fa-solid fa-star" style="color: #f9e510;"></i><span class="review-score">5.0</span>
                                </div>
                                <span class="price-product"><?php echo($menu_price);?> ฿</span>
                            </div>
                        </div>
                        <form action="../PhpProcess/systemProcess/deleteCart.php" method="POST">
                            <input value="<?php echo($cart_id);?>" type="hidden" name="cart_id_delete">
                            <button type="submit" class="Add-con" style="background-color:gray;border:none;">
                                <h6>-</h6>
                                <h6>ลบออกจากตะกร้า</h6>
                            </button>

                        </form>
                        
                    </a>
                </div>
    
       
    
    
    <?php
        }
    ?>
</div>

        <div data-backdrop="static" class="modal fade" id="MenuViewModal" tabindex="-1" aria-labelledby="staticBackdropLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div id="modal-content"  class="modal-content">
                        
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">กำลังตรวจสอบ</h5>
                            </div>
                            
                            <div class="p-4 d-flex align-items-center">
                                <div style="margin-right:10px;" class="spinner-border text-secondary" role="status">
                                    <span class="sr-only">กรุณารอสักครู่ พนักงานกำลังตรวจสอบรายการ</span>
                                </div>
                                กรุณารอสักครู่ พนักงานกำลังตรวจสอบรายการ
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <?php
            
        ?>

        <div class="row sumPrice" >
            <input type="hidden" name="" id="Sum-Price-Full" value="<?php echo($price);?>">
            <input type="hidden" name="" id="Sum-Price" value="<?php echo(ceil($price-($price * intval($discount)/100)) );?>">
            <div  class="col sumPriceText">
                ราคารวม <s id="priceFull" class="discount" style=""><?php if($discount>0) echo($price);?></s>  
                <span id="sum-price-show" style="margin-left:10px;">
                    <?php echo(ceil($price-($price * intval($discount)/100)  ));?> </span>
                    บาท
                
<!-- <?php if($discount>0) echo(" <span id='discountText'>(ส่วนลด".$price-ceil($price-($price * intval($discount)/100))."บาท)</span>");?>  -->
<?php if($discount>0) echo(" <span id='discountText'>(ส่วนลด". ($price - ceil($price - ($price * intval($discount) / 100))) . "บาท)</span>");?>


                
            </div>
            <div class="col sumPriceText TextRight">
                <button onclick="submitCart(<?php echo($user_id);?>)" class="btn btn-primary">ยืนยันคำสั่งซื้อ</button>
            </div>
        </div>
        </div>
</div>
        
    
    <script src="../Javascript/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
