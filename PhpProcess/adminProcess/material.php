<?php
    session_start();
    include("../DatabaseCon.php");
    $id = $_POST["id"];
    $amount = $_POST["amount"];
    $price = intval($_POST["price"]) * intval($amount);
    $sqlInsert = "";
    $sqlUpdate = "";
    if(isset($_POST["add"])){
        $sqlInsert = "INSERT INTO raw_material_log (rml_amount,rml_type,raw_material_id,rml_price	
        ) VALUES ('$amount','นำเข้า','$id','$price')";
        $sqlUpdate = "UPDATE raw_material SET raw_material_amount=raw_material_amount+$amount";
    }
    if(isset($_POST["remove"])){
        $sqlInsert = "INSERT INTO raw_material_log (rml_amount,rml_type,raw_material_id,rml_price	
        ) VALUES ('$amount','นำออก','$id','$price')";
        $sqlUpdate = "UPDATE raw_material SET raw_material_amount=raw_material_amount-$amount";
    }
    
    if ($con->query($sqlInsert) === TRUE) {
        
        if ($con->query($sqlUpdate) === TRUE) {
            echo '<script>
                setTimeout(function() {
                swal({
                    title: "แก้ไขข้อมูลสำเร็จ",
                    text:"กลับสู่หน้าวัตถุดิบ",
                    type: "success"
                }, function() {
                    window.location = "../../Php/admin_page.php?page=admin_mtr_manage"; //หน้าที่ต้องการให้กระโดดไป
                });
            }, 1000);
            </script>';
        }else {
            echo '<script>
                    setTimeout(function() {
                    swal({
                        title: "แก้ไขข้อมูลไม่สำเร็จ",
                        type: "error"
                    }, function() {
                        window.location = "../../Php/admin_page.php?page=admin_mtr_manage"; //หน้าที่ต้องการให้กระโดดไป
                    });
                }, 1000);
                </script>';
    
        }
    }
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';


?>