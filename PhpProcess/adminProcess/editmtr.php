<?php

include("../DatabaseCon.php");
if (!isset($_GET['id'])) {
    header("location: ./");
    exit();
}
$sql = "SELECT * FROM raw_material WHERE raw_material_id = '" . mysqli_real_escape_string($con, $_GET['id']) . "' ";
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

<body>
    <div class="mt-5">


        <div class="container contentCon">
            <h3>แก้ไขข้อมูลวัตถุดิบ</h3><br>
            <form class="row gy-4" action="" method="POST" enctype="multipart/form-data">
                <div row="">
                    <div class="col-md-4">
                        <label for="name" class="form-label">ลำดับ:</label>
                        <input type="text" class="form-control" readonly id="id" name="id" placeholder="ลำดับ"
                            value="<?php echo $row['raw_material_id'] ?>" required>
                    </div><br>
                    <div class="col-md-4">
                        <label for="name" class="form-label">ชื่อวัตถุดิบ:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="ชื่อวัตถุดับ"
                            value="<?php echo $row['raw_material_name'] ?>" required>
                    </div><br>
                    <div class="col-md-4">
                        <label for="price" class="form-label">ราคา:</label>
                        <input type="number" class="form-control" id="price" name="price" placeholder="ราคา"
                            value="<?php echo $row['raw_material_price'] ?>" required>
                    </div><br>


                    
                    <button type="submit" name="submit" class="btn btn-warning" style="background-color: #857379;border:none;"><span
                                class="glyphicon glyphicon-check" ></span> บันทึก</button>
                        <button onclick="document.location = '../../Php/admin_page.php?page=admin_mtr_manage'" type="button" class="btn btn-secondary"
                            data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>
                            ยกเลิก</button>
                        
                    
                </div>
            </form>
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
    isset($_POST['id']) && isset($_POST['name']) && isset($_POST['price'])  
) {
    // sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';


    include("../DatabaseCon.php");
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
   

    //อัพโหลดรูปภาพ
    // if (is_uploaded_file($_FILES['file']['tmp_name'])) {
    //     $new_image_name = 'pr_' . uniqid() . "." . pathinfo(basename($_FILES['file']['name']), PATHINFO_EXTENSION);
    //     $image_upload_path = "uploads/" . $new_image_name;
    //     move_uploaded_file($_FILES['file']['tmp_name'], $image_upload_path);
    // } else {
    //     $new_image_name = "$file_name";
    // }

    $sql = "UPDATE raw_material SET 
                
                raw_material_name = '" . htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8') . "',
                raw_material_price = '" . htmlspecialchars($_POST['price'], ENT_QUOTES, 'UTF-8') . "'
               
                
                WHERE raw_material_id = '" . mysqli_real_escape_string($con, $_POST['id']) . "' 
                
                ";
    if (mysqli_query($con, $sql)) {
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

    } else {
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

?>