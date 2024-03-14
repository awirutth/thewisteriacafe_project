<?php
session_start();

if (
isset($_POST['password']) 
) {
    // sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';


    include("../DatabaseCon.php");
    $id = $_SESSION['user'];
    $password = $_POST['password'];
    $newPass = $_POST['NewPassword'];
    $conNewPass = $_POST['ConNewPassword'];
    $passHash = md5($password);
    $sql = "SELECT email FROM User WHERE user_id='$id' AND password='$passHash'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $NewPassHash = md5($newPass);
        if($newPass == $conNewPass){
            $sql = "UPDATE user SET 
                

                
            password = '" . htmlspecialchars($NewPassHash, ENT_QUOTES, 'UTF-8') . "'
           
            
            
            WHERE user_id = '" . mysqli_real_escape_string($con, $id) . "' 
            
            ";  
            // file_name='$new_image_name'
            if (mysqli_query($con, $sql)) {
                echo '<script>
            setTimeout(function() {
            swal({
                title: "แก้ไขข้อมูลสำเร็จ",
                
                type: "success"
            }, function() {
                window.location = "../../Php/ProfilePage.php";
            });
            }, 1000);
            </script>';

            } else {
                echo '<script>
            setTimeout(function() {
            swal({
                title: "แก้ไขข้อมูลไม่สำเร็จ",
                type: "error"
            }, function() {
                window.location = "../../Php/ProfilePage.php";
            });
            }, 1000);
            </script>';

            }

        }else{
            echo '<script>
    setTimeout(function() {
        swal({
            title: "เกิดข้อผิดพลาด",
            text:"รหัสผ่านไม่ตรงกัน",
            type: "error"
        }, function() {
            window.location = "../../Php/ProfilePage.php";
        });
    }, 1000);
</script>';
        }
        
    }else{
        echo '<script>
    setTimeout(function() {
        swal({
            title: "เกิดข้อผิดพลาด",
            text:"รหัสผ่านไม่ถูกต้อง",
            type: "error"
        }, function() {
            window.location = "../../Php/ProfilePage.php"; 
        });
    }, 1000);
</script>';
    }
    

   
}

?>