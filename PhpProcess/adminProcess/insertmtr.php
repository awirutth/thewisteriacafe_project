
<?php
    include("../DatabaseCon.php");
    if(isset($_POST["name"]) && isset($_POST["price"])&& isset($_POST["amount"])
    
       ){
        $name = $_POST["name"];
        $price = $_POST["price"];
        $amount = $_POST["amount"];
        
        
        
        

        
            $sql = "SELECT raw_material_name FROM raw_material WHERE raw_material_name='$name'";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                echo( '<script>
                setTimeout(function() {
                 swal({
                     title: "เกิดข้อผิดพลาด",
                     text: "ชื่อนี้ถูกใช้งานแล้ว",
                     icon: "error"
                 }, function() {
                     window.location = "../../Php/admin_page.php?page=admin_mtr_manage"; //หน้าที่ต้องการให้กระโดดไป
                 });
               }, 1000);
           </script>');
            } else {
                $sql = "INSERT INTO raw_material (raw_material_name,raw_material_price,raw_material_amount)
                VALUES ('$name','$price','$amount')";

                if ($con->query($sql) === TRUE) {
                  
                    echo('<script>
             setTimeout(function() {
              swal({
                  title: "เพิ่มวัตถุดิบสำเร็จ",
                  text: "กลับสู่หน้าวัตถุดิบ",
                  icon: "success"
              }, function() {
                  window.location = "../../Php/admin_page.php?page=admin_mtr_manage"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>');
                } else {
                echo ("Error: " . $sql . "<br>" . $conn->error);
                }
    
                
            }
            
    }else{

    }


?>

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">