<?php
session_start();

if (
isset($_POST['name']) && isset($_POST['tel']) 
) {
    // sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';


    include("../DatabaseCon.php");
    $id = $_SESSION['user'];
    $name = $_POST['name'];
    $tel = $_POST['tel'];

    $sql = "UPDATE user SET 
                

                
                user_tel = '" . htmlspecialchars($_POST['tel'], ENT_QUOTES, 'UTF-8') . "',
                name = '" . htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8') . "'
               
                
                
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
}

?>