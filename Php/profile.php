<?php

include("../PhpProcess/DatabaseCon.php");
if (!isset($_GET['id'])) {
    header("location: ./");
    exit();
}
$sql = "SELECT * FROM user WHERE user_id = '" . mysqli_real_escape_string($con, $_GET['id']) . "' ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../StyleCss/authCss/login.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="../Javascript/functions.js"></script>
</head>

<body  style="background-color: #857379;">

    <div class="mt-5">


        <div class="d-flex justify-content-center ">

        <div class="card " style="width: 30rem;">
  <div class="card-body">
  <h3 class="card-title text-center">ข้อมูลส่วนตัว</h3><br>
 <form id="uploadForm" method="POST" enctype="multipart/form-data">
 <div class="d-flex justify-content-center ">
     <img src="../Img/user.png" class="p1" height=80 width="80" alt=""></div>
                            
                            <input type="hidden" class="form-control" name="id" value="<?= $row['user_id']; ?>">
                                <div class="col">
                                    <div class="mb-3"><br>
                                        <label for="" class="form-label" id="headinput">ชื่อผู้ใช้
                                        </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control boxinput" value="<?= $row['user_name']; ?>" id="username" name="username"
                                                aria-describedby="basic-addon3 basic-addon4">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label" id="headinput">ชื่อ </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control boxinput" value="<?= $row['name']; ?>" id="name"name="name"
                                                aria-describedby="basic-addon3 basic-addon4">
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label" id="headinput">อีเมล </label>
                                        <div class="input-group">
                                            <input type="email" class="form-control boxinput"
                                            value="<?= $row['email']; ?>" id="email" name="email"
                                                aria-describedby="basic-addon3 basic-addon4" readonly="">
                                        </div>
                                    </div>
                                </div>
                            
                            
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="" class="form-label" id="headinput">เบอร์โทร</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control boxinput" value="<?= $row['user_tel']; ?>" id="tel" name="tel"
                                                aria-describedby="basic-addon3 basic-addon4">
                                        </div>
                                    </div>
                                </div>





                        
                            <div class="row mt-5">
                                <div class="col ">
                                    <div class="d-flex justify-content-center ">
                                        
                                            <button onclick="document.location = 'admin_page.php?page=admin_emp_manage'" type="submit" name="submit" class="btn btn-success "
                                                style="background-color: #857379;border:none;">บันทึก</button>&nbsp;
                                      
                                                <button onclick="document.location = 'admin_page.php?page=admin_emp_manage'" type="button" class="btn btn-secondary"><span class="glyphicon glyphicon-remove"></span>
                                    ยกเลิก</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>





                </div>
            </form>

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

<?php


if (
    isset($_POST['id']) && isset($_POST['username'])  && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['tel']) 
) {
    // sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';


    include("../PhpProcess/DatabaseCon.php");
    $id = $_POST['id'];
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
   

    //อัพโหลดรูปภาพ
    // if (is_uploaded_file($_FILES['file']['tmp_name'])) {
    //     $new_image_name = 'pr_' . uniqid() . "." . pathinfo(basename($_FILES['file']['name']), PATHINFO_EXTENSION);
    //     $image_upload_path = "uploads/" . $new_image_name;
    //     move_uploaded_file($_FILES['file']['tmp_name'], $image_upload_path);
    // } else {
    //     $new_image_name = "$file_name";
    // }
    // $passHash = md5($password);
    $sql = "UPDATE user SET 
                
                user_name = '" . htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8') . "',
                name = '" . htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8') . "',
                email = '" . htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8') . "',
                user_tel = '" . htmlspecialchars($_POST['tel'], ENT_QUOTES, 'UTF-8') . "'
               
                
                
                WHERE user_id = '" . mysqli_real_escape_string($con, $_POST['id']) . "' 
                
                ";  
                // file_name='$new_image_name'
    if (mysqli_query($con, $sql)) {
        echo '<script>
    setTimeout(function() {
     swal({
         title: "แก้ไขข้อมูลสำเร็จ",
         
         type: "success"
     }, function() {
         window.location = ""; //หน้าที่ต้องการให้กระโดดไป
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
         window.location = ""; //หน้าที่ต้องการให้กระโดดไป
     });
   }, 1000);
</script>';

    }
}

?>