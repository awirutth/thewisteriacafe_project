<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="../StyleCss/indexCss/indexCss.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../StyleCss/authCss/login.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="../Javascript/functions.js"></script>
</head>

<body>
    <table class="table table-hover" style="margin-top:100px;">
    <thead>
        <tr>
        <th scope="col">ราคารวม</th>
        <th scope="col">รายละเอียด</th>
        <th scope="col">สถานะ</th>
        <th scope="col">เบอร์ติดต่อ</th>
        </tr>
    </thead>
    <tbody>
    <?php
        session_start();
        $user_id = $_SESSION['user'];
        include("../PhpProcess/DatabaseCon.php");
        $price = 0;
        $sqlOrder = "SELECT orders.*,user.* FROM orders
        INNER JOIN user ON orders.user_id = user.user_id";
        $resultOrder = $con->query($sqlOrder);
        while ($rowOrder = $resultOrder->fetch_assoc()) {
            $order_id = $rowOrder['order_id'];
            $user_tel = $rowOrder["user_tel"];
            $order_slip = $rowOrder['order_slip'];
            $order_status = $rowOrder['order_status'];
            $sqlOrderDetail = "SELECT * FROM order_detail WHERE order_id='$order_id'";
            $resultOrderDetail = $con->query($sqlOrderDetail);
            $order_menu = [];
            while ($rowOrderDetail = $resultOrderDetail->fetch_assoc()) {
                $cart_id = $rowOrderDetail["cart_id"];
                $price = 0;
                $sql = "SELECT menu.*,cart.*, 
                        CONCAT('[', GROUP_CONCAT(JSON_OBJECT('addons_id', menu_addons.addons_id, 'addons_name', menu_addons.addons_name, 'addons_price', menu_addons.addons_price)), ']') AS addons_list
                FROM menu
                LEFT JOIN cart ON cart.menu_id = menu.menu_id
                LEFT JOIN cart_sp ON cart.cart_id = cart_sp.cart_id AND cart_sp.cartSp_status IS NULL
                LEFT JOIN menu_addons ON menu_addons.addons_id = cart_sp.addons_id
                WHERE cart.cart_id = '$cart_id' 
                GROUP BY cart.cart_id;";
                //print_r("<p style='margin-top:200px'>$sql</p>");
                

                $result = $con->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $addons = json_decode($row["addons_list"]);
                    $menu_name = $row["menu_name"];
                    $menu_id = $row["menu_id"];
                    $cart_id = $row["cart_id"];
                    $menu_price = $row["menu_price"];
                    $menu_img = $row["menu_image"];
                    $price += intval($menu_price);
                    array_push($order_menu, $row);
                    


                }
                $json = json_encode($order_menu);
            }
            
        
        
    ?>

        <tr>
        <th scope="row"><?php echo($rowOrder["order_price"]);?></th>
        <td><button style="background-color:rgb(127, 52, 1) !important;" onclick='ViewOrderItem(`<?php echo($json);?>`)' class="btn btn-secondary">ดูรายละเอียด</button></td>
        <td id="or<?php echo($order_id);?>">
        <?php if($order_status=="wait"): ?>
            <button style="background-color:rgb(127, 52, 1) !important;" onclick="receiveOrder(<?php echo($order_id);?>)" class="btn btn-secondary">ยืนยันออเดอร์</button>
        <?php elseif($order_status=="receive"): ?>
            รับออเดอร์แล้ว
        <?php elseif($order_status=="success"): ?>
           จ่ายเงินแล้ว
           <button style="background-color:rgb(127, 52, 1) !important;" onclick="slipView('<?php echo($order_slip);?>')" class="btn btn-secondary">ดูสลิปโอน</button>
        <?php elseif($order_status=="cancel"): ?>
           ยกเลิกออเดอร์แล้ว

        <?php endif ?>
        <?php if($order_status!="cancel"): ?>
        <button style="background-color:red !important;" onclick="receiveOrder(<?php echo($order_id);?>,'cancel')" class="btn btn-secondary">ยกเลิก</button>
        <?php endif ?>
        </td>
        <td>
            <?php echo($user_tel);?>
        </td>
        </tr>

        <?php }?>


    </tbody>
    </table>

    <div class="modal fade" id="MenuViewModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div  class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">รายละเอียดเมนู</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div id="menu_view" class="modal-body" style="overflow-y: auto;height:500px;">
                                <div id="modal-order-view" class="grid-menu-order" style="grid-template-columns:1fr;">
                                    <!-- <div class="grid-items-menu-order">
                                            <a >
                                                <img src="Img/Img-menu/<?php echo $row["menu_image"];?>" alt="">
                                                <div class="desc-con" >
                                                            <h6>name</h6>
                                                            <p>Ice</p>
                                                            <div class="price-con">
                                                                <div class="review-con">
                                                                <i class="fa-solid fa-star" style="color: #f9e510;"></i><span class="review-score">5.0</span>
                                                                </div>
                                                                <span class="price-product">70฿</span>
                                                            </div>
                                                        </div>
                                                        <div onclick='' class="Add-con">
                                                            <h6>-</h6>
                                                            <h6>ลบออกจากออเดอร์</h6>
                                                        </div>
                                                </a>
                                        </div> -->


                                </div>
                            </div>
                            <div class="modal-footer">

                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="SlipViewModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div  class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">สลิปโอนเงิน</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div id="slip_view" class="modal-body" style="text-align:center;">
           
                                    <img id="slipImg" style="width:100%;height:auto;" src="../Img/Img-slip/20_164564.png" alt="">

                                
                            </div>
                            <div class="modal-footer">

                            </div>
                            
                        </div>
                    </div>
                </div>


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