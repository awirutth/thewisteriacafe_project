<?php
    include("../DatabaseCon.php");
    session_start();
    if(isset($_POST["user_id"])){
        $user_id = $_POST["user_id"];
        $addons_deny = $_POST["addons_deny"];
        $addons_deny = explode(",",$addons_deny);
        $price = 0;

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
            $menu_price = $row["menu_price"];
            $menu_img = $row["menu_image"];
            $price += intval($menu_price);
            //print_r($addons[0]);
            $II=0;
            foreach($addons as $item){
                if($item->addons_name!="" && in_array($item->addons_id, $addons_deny)==false ){
                    $price += intval($item->addons_price);
                }
            }



        }
        $dis = 0;
        if($discount > 0){
            $dis = $price - ceil($price-($price * intval($discount)/100));
        }
        
        $price = ceil($price-($price * intval($discount)/100));
        
        
        $sqlInsertOrder = "INSERT INTO orders (user_id,order_price,order_status,discount) VALUES ('$user_id','$price','wait','$dis')";
        $InsertOrder = $con->query($sqlInsertOrder);
        if($InsertOrder===TRUE){
            $last_id = $con->insert_id;
            $ItemPrice = 0;
            $result = $con->query($sql);
            while ($row = $result->fetch_assoc()) {
                $ItemPrice = 0;
                $addons = json_decode($row["addons_list"]);
                $menu_name = $row["menu_name"];
                $menu_id = $row["menu_id"];
                $menu_price = $row["menu_price"];
                $menu_img = $row["menu_image"];
                $ItemPrice += intval($menu_price);
                $cart_id=$row["cart_id"];
                //print_r($addons[0]);
                $II=0;
                foreach($addons as $item){
                    if($item->addons_name!="" && in_array($item->addons_id, $addons_deny)==true){
                        $aadd = $item->addons_id;
                        $sqlUpdateAddonsStatus = "UPDATE cart_sp SET cartSp_status='delete' WHERE cart_id=$cart_id AND addons_id=$aadd";
                        $updateAddonsS= $con->query($sqlUpdateAddonsStatus);
                    }
                    if($item->addons_name!="" && in_array($item->addons_id, $addons_deny)==false){
                        $ItemPrice += intval($item->addons_price);
                    }
                }
                $sqlInsertOrderDetail = "INSERT INTO order_detail (cart_id,order_id,order_detail_price) VALUES ('$cart_id','$last_id','$ItemPrice')";
                $InsertOrderDetail = $con->query($sqlInsertOrderDetail);
                $sqlUpdateCart = "UPDATE cart SET cart_status='ordered' WHERE cart_id=$cart_id";
                $updateCart= $con->query($sqlUpdateCart);
            }
            echo("successfully:".$last_id);

        }

        
        

    }
?>