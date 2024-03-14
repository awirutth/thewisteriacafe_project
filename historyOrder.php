


<!DOCTYPE html>
<html lang="en">
<head> 
    <title>The Wisteria | Promotion Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="StyleCss/navbarCss/navbar.css"/>
    <link rel="stylesheet" href="StyleCss/indexCss/indexCss.css"/>
    <link rel="stylesheet" href="StyleCss/historyOrderCss/historyOrderCss.css"/>
    
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
<?php $page='historyOrder'; include_once("navbar.php"); ?>
<body>

   <!-- ==================================================================== Section history ==================================================================== -->
   <div class="container-menuList container-history">
   <table class="table table-hover" style="">
    <thead>
        <tr>
        <th scope="col">หมายเลขคำสั่งซื้อ</th>
        <th scope="col">ราคารวม</th>
        <th scope="col">สถานะ</th>
        <th scope="col">การชำระ</th>
        <th scope="col">รายละเอียด</th>
        </tr>
    </thead>
    <tbody>
    <?php
        session_start();
        if(!isset($_SESSION['user'])){
            echo("<script>window.location.assign('./Php/login.php')</script>");
        }
        $user_id = $_SESSION['user'];
        include("./PhpProcess/DatabaseCon.php");
        $price = 0;
        $sqlOrder = "SELECT orders.*,user.* 
        FROM orders 
        INNER JOIN user ON orders.user_id=user.user_id
        WHERE orders.user_id='$user_id'";
        $resultOrder = $con->query($sqlOrder);
        while ($rowOrder = $resultOrder->fetch_assoc()) {
            $order_id = $rowOrder['order_id'];
            $order_slip = $rowOrder['order_slip'];
            $order_status = $rowOrder['order_status'];
            $sqlOrderDetail = "SELECT * FROM order_detail WHERE order_id='$order_id'";
            $resultOrderDetail = $con->query($sqlOrderDetail);
            $order_menu = [];
            $jsonOr = json_encode($rowOrder);
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
            <td><?php echo($rowOrder["order_id"]);?></td>
            <td scope="row"><?php echo($rowOrder["order_price"]);?></td>
                <td id="or<?php echo($order_id);?>">
                <?php if($order_status=="wait"): ?>
                    รอรับออเดอร์
                    <td>-</td>
                <?php elseif($order_status=="receive"): ?>
                    รับออเดอร์แล้ว
                    <td>-</td>
                <?php elseif($order_status=="success"): ?>
                    เสร็จสิ้น
                    <td><button style="background-color:#857379 !important;" onclick="slipView('<?php echo($order_slip);?>',`./`)" class="btn btn-secondary">สลิป</button></td>
                <?php elseif($order_status=="cancel"): ?>
                    ยกเลิกออเดอร์
                    <td>-</td>

                <?php endif ?>
                </td>
                <?php if($order_status=="success"): ?>
                <td><button style="background-color:#857379 !important;" onclick='ViewOrderItemUser(`<?php echo($json);?>`,`./`,<?php echo($jsonOr);?>)' class="btn btn-secondary">ใบเสร็จ</button></td>
                <?php else: ?>
                <td>-</td>
                <?php endif ?>
        </tr>

        <?php }?>


    </tbody>
    </table>

    <!-- Box show Detail -->
    <div class="modal fade" id="MenuViewModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div  class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ใบเสร็จคำสั่งซื้อ</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <div id="menu_view" class="modal-body" style="overflow-y: auto;height:500px;">
                                <div id="slip_detail">

                                    <div class="box_slip_title">
                                        <span class="slip_title">หมายเลขคำสั่งซื้อ</span>
                                    </div>

                                    <div class="box_slip_title">
                                        <span class="slip_title_No">xxxxx</span>
                                    </div>

                                    <div class="box_slip_dataUser">
                                        <div class="box_slip_dataUser_1">
                                            <span>วันที่สั่งซื้อ: xx-xx-xx24</span>
                                            <span>เวลา: xx:xx น.</span>
                                        </div>
                                        <div class="box_slip_dataUser_2">
                                            <span>ชื่อลูกค้า: xaxaxa axaxaxax</span>
                                        </div>
                                    </div>

                                    <div class="box_slip_order">
                                        <div class="box_slip_order_title">
                                            <span>รายการสินค้า</span>
                                            <span>ราคา</span>
                                        </div>
                                        <div id="modal-order-view">
                                            <div class="box_slip_oderData">
                                                <span class="box_slip_orderName">ชาเย็น</span>
                                                <span class="box_slip_opt1">หวานน้อย</span>
                                                <span class="box_slip_opt2">เพิ่มช็อต</span>
                                                <span class="box_slip_count">x1</span>
                                                <span class="box_slip_price">75</span>
                                            </div>

                                            <div class="box_slip_oderData">
                                                <span class="box_slip_orderName">ชาดำ</span>
                                                <span class="box_slip_opt1">หวานปกติ</span>
                                                <span class="box_slip_opt2">เพิ่มช็อต</span>
                                                <span class="box_slip_count">x1</span>
                                                <span class="box_slip_price">75</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box_slip_footer">
                                        <div class="box_slip_footerData">
                                            <span class="box_slip_footerData_Text">ราคารวมทั้งหมด</span>
                                            <span class="box_slip_footerData_Text">150 บาท</span>
                                        </div>
                                        <div class="box_slip_status">
                                            <span>สถานะคำสั่งซื้อ: เสร็จสิ้น</span>
                                        </div>
                                    </div>

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
   </div>

   <!-- ==== Section Footer ==== -->
   <div class="container-footer">
   </div>
    
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
