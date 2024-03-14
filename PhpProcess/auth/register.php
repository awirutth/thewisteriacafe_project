<?php
    include("DatabaseCon.php");
    if(isset($_POST["email"]) && isset($_POST["password"])
    && isset($_POST["passwordCon"]) && isset($_POST["name"])   ){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $passwordCon = $_POST["passwordCon"];
        $name = $_POST["name"];
        $nameFull = $_POST["nameFull"];
        $tel = $_POST["Tel"];
        

        if($password == $passwordCon){
            $sql = "SELECT email FROM User WHERE email='$email'";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                echo '<script>
            setTimeout(function() {
             swal({
                 title: "เกิดข้อผิดพลาด",
                 text:"อีเมลนี้ถูกใช้งานแล้ว",
                 type: "error"
             }, function() {
                 window.location = ""; //หน้าที่ต้องการให้กระโดดไป
             });
           }, 1000);
        </script>';
            } else {
                $passHash = md5($password);
                $sql = "INSERT INTO User (email,user_name, password, user_role,user_tel,`name`)
                VALUES ('$email','$name', '$passHash', 'user','$tel','$nameFull')";

                if ($con->query($sql) === TRUE) {
                    echo '<script>
                    setTimeout(function() {
                     swal({
                         title: "ลงทะเบียนสำเร็จ",
                         text:"กลับสู่หน้าล็อกอิน",
                         type: "success"
                     }, function() {
                         window.location = "../../Php/login.php"; //หน้าที่ต้องการให้กระโดดไป
                     });
                   }, 1000);
                </script>';
                    
                } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }
    
                
            }
            
        }else{
            echo '<script>
            setTimeout(function() {
             swal({
                 title: "เกิดข้อผิดพลาด",
                 text:"รหัสผ่านไม่ตรงกัน",
                 type: "error"
             }, function() {
                 window.location = ""; //หน้าที่ต้องการให้กระโดดไป
             });
           }, 1000);
        </script>';
        }
    }else{
        echo '<script>
            setTimeout(function() {
             swal({
                 title: "เกิดข้อผิดพลาด",
                 
                 type: "error"
             }, function() {
                 window.location = ""; //หน้าที่ต้องการให้กระโดดไป
             });
           }, 1000);
        </script>';
    }


?>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">