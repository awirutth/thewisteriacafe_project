<?php 
    include("../DatabaseCon.php");
    if(isset($_POST["order_id_update"])
    
    ){
        $order_id = $_POST["order_id_update"];

        $target_dir = "../../Img/Img-slip/";
        $file_extension = pathinfo($_FILES["menu-img"]["name"], PATHINFO_EXTENSION);
        $img_name = $order_id."_".rand(100000, 999999).".".$file_extension;
        $target_file = $target_dir . $img_name ;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["menu-img"]["tmp_name"]);

        if($check !== false) {
            $uploadOk = 1;
            if (move_uploaded_file($_FILES["menu-img"]["tmp_name"], $target_file)) {
                $sql = "UPDATE orders SET order_status='success',order_slip='$img_name' WHERE order_id=$order_id";
                if ($con->query($sql) === TRUE) {
                    echo('<script>
                        setTimeout(function() {
                        swal({
                            title: "บันทึกสำเร็จ",
                            icon: "success"
                        }, function() {
                            window.location = "../../index.php"; 
                        });
                        }, 1000);
                    </script>');
                    // echo("<script>alert('บันทึกสำเร็จ')</script>");
                    // echo('<script>window.location.assign("../../index.php")</script>');
                } else {
                    echo("Error: " . $sql . "<br>" . $conn->error);
                }
              } else {
                echo "Sorry, there was an error uploading your file.";
              }
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

    }

?>

<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">