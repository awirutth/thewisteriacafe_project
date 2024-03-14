
<?php
    include("../DatabaseCon.php");
    if(isset($_POST["name"]) &&  isset($_POST["tel"])
    && isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["role"])
       ){
        $name = $_POST["name"];
        $tel = $_POST["tel"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $role = $_POST["role"];
        
        
        

        
            $sql = "SELECT email FROM User WHERE email='$email'";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                echo '<script>
                setTimeout(function() {
                 swal({
                     title: "เกิดข้อผิดพลาด",
                     text: "อีเมลนี้ถูกใช้งานแล้ว",
                     icon: "error"
                 }, function() {
                     window.location = "../../Php/admin_page.php?page=admin_emp_manage"; //หน้าที่ต้องการให้กระโดดไป
                 });
               }, 1000);
           </script>';
            } else {
                $passHash = md5($password);
                $sql = "INSERT INTO User (name,user_tel,email,user_name, password, user_role)
                VALUES ('$name','$tel','$email','$username', '$passHash', '$role')";

                if ($con->query($sql) === TRUE) {
                  
                    echo '<script>
             setTimeout(function() {
              swal({
                  title: "เพิ่มข้อมูลสำเร็จ",
                  text: "กลับสู่หน้าข้อมูลพนักงาน",
                  icon: "success"
              }, function() {
                  window.location = "../../Php/admin_page.php?page=admin_emp_manage"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
                } else {
                    echo '<script>
                    setTimeout(function() {
                     swal({
                         title: "เกิดข้อผิดพลาด",
                         
                         icon: "error"
                     }, function() {
                         window.location = "../../Php/admin_page.php?page=admin_emp_manage"; //หน้าที่ต้องการให้กระโดดไป
                     });
                   }, 1000);
               </script>';
                }
    
                
            }
            
    }else{

    }


?>

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">