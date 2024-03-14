<?php
    include("DatabaseCon.php");
    session_start();
    if(isset($_POST["email"]) && isset($_POST["password"])){
        $email = $_POST["email"];
        $password = md5($_POST["password"]);
        $sql = "SELECT * FROM User WHERE (email='$email' OR user_name='$email' OR user_tel='$email') and password='$password'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['user']= $row["user_id"];
            $_SESSION['user_name'] = $row["user_name"];
            $_SESSION['user_email'] = $row["email"];
            $_SESSION['user_role']= $row["user_role"];
            if($_SESSION['user_role']=="admin" || $_SESSION['user_role']=="employee"){
                header("Location:../../Php/admin_page.php");
            }else{
                header("Location:../../index.php");
            }
            
            
        }else{
            echo '<script>
            setTimeout(function() {
             swal({
                 title: "เกิดข้อผิดพลาด",
                 text:"อีเมลหริอรหัสผ่านไม่ถูกต้อง",
                 type: "error"
             }, function() {
                 window.location = "../../Php/login.php"; //หน้าที่ต้องการให้กระโดดไป
             });
           }, 1000);
        </script>';
           

        }
    }else{
        echo '<script>
            setTimeout(function() {
             swal({
                 title: "เกิดข้อผิดพลาด",
                 text:"กรอกข้อมูลไม่ครบถ้วน",
                 type: "error"
             }, function() {
                 window.location = "../../Php/login.php"; //หน้าที่ต้องการให้กระโดดไป
             });
           }, 1000);
        </script>';
       
    }


?>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">