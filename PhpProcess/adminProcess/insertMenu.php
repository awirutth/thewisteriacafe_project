<?php 
    include("../DatabaseCon.php");
    if(isset($_POST["name"])&&
    isset($_POST["price"])&&
    isset($_POST["type"])
    
    ){
        $name =$_POST["name"];
        $price = $_POST["price"];
        $type = $_POST["type"];
        $m_type = $_POST["m_type"];
        $d_recipe = $_POST["d_recipe"];
        $addon = [];
        if(isset($_POST["addon"])){
            $addon = $_POST["addon"];
            $addonPrice = $_POST["addonPrice"];
            $addonType = $_POST["addonType"];
        }
        

    
        $target_dir = "../../Img/Img-menu/";
        $file_extension = pathinfo($_FILES["menu-img"]["name"], PATHINFO_EXTENSION);
        $img_name = $name."_".rand(100000, 999999).".".$file_extension;
        $target_file = $target_dir . $img_name ;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["menu-img"]["tmp_name"]);

        




        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
            if (move_uploaded_file($_FILES["menu-img"]["tmp_name"], $target_file)) {
                $sql = "INSERT INTO menu (menu_name,type_id,menu_price,menu_image,menu_type,menu_recipe,status) VALUES ('$name','$type','$price','$img_name','$m_type','$d_recipe','0')";
                if ($con->query($sql) === TRUE) {
                    $id_insert = $con->insert_id;
                    for($j=0;$j<count($addon);$j++){
                        $adon = $addon[$j];
                        $pr = $addonPrice[$j];
                        $adT = $addonType[$j];
                        $sqlAddon = "INSERT INTO menu_addons (addons_name,addons_price,addons_type,menu_id) VALUES ('$adon','$pr','$adT','$id_insert')";
                        $con->query($sqlAddon);
                    }
                    echo("<script>alert('บันทึกสำเร็จ')</script>");
                    echo('<script>window.location.assign("../../Php/admin_page.php")</script>');
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