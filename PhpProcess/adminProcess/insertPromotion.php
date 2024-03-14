<?php 
    include("../DatabaseCon.php");
    if(isset($_POST["name"])&&
    isset($_POST["percent"])
    ){
        $name =$_POST["name"];
        $min =$_POST["min"];
        $percent = $_POST["percent"];
        $date_start = $_POST["date_start"];
        $date_end = $_POST["date_end"];
        echo($date_start);
        echo($date_end);
    
        $target_dir = "../../Img/Img-promotion/";
        $file_extension = pathinfo($_FILES["promotion-img"]["name"], PATHINFO_EXTENSION);
        $img_name = "promotion_"."_".rand(100000, 999999).rand(100000, 999999).".".$file_extension;
        $target_file = $target_dir . $img_name ;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["promotion-img"]["tmp_name"]);

        




        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
            if (move_uploaded_file($_FILES["promotion-img"]["tmp_name"], $target_file)) {
                $sql = "INSERT INTO promotions (pt_name,pt_discount,date_start,date_end,pt_image,status,item_min) 
                VALUES ('$name','$percent','$date_start','$date_end','$img_name','0','$min')";
                echo($sql);
                if ($con->query($sql) === TRUE) {
                    echo("<script>alert('บันทึกสำเร็จ')</script>");
                    echo('<script>window.location.assign("../../Php/admin_page.php?page=admin_promotion_manage")</script>');
                } else {

                    echo("error sql");
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