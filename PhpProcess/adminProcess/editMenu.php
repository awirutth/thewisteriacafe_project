<?php 
    include("../DatabaseCon.php");
    if(isset($_POST["nameEdit"])&&
    isset($_POST["priceEdit"])&&
    isset($_POST["typeEdit"])
    
    ){
        $updateFeild = "";
        $updateValue = "";
        $name =$_POST["nameEdit"];
        $MenuIdEdit = $_POST["MenuIdEdit"];
        $price = $_POST["priceEdit"];
        $type = $_POST["typeEdit"];
        $m_type = $_POST["m_type_edit"];
        $d_recipe = $_POST["d_recipe_edit"];
        $addon = [];
        if(isset($_POST["addonEdit"])){
            $addon = $_POST["addonEdit"];
            $addonPrice = $_POST["addonPriceEdit"];
            $addonType = $_POST["addonTypeEdit"];
        }
        if(strlen($name)>0){
            $updateFeild = $updateFeild."menu_name='$name',";
        }
        if(strlen($price)>0){
            $updateFeild = $updateFeild."menu_price='$price',";
        }
        if(strlen($type)>0 && $type != "เลือก"){
            $updateFeild = $updateFeild."type_id='$type',";
        }
        if(strlen($m_type)>0){
            $updateFeild = $updateFeild."menu_type='$m_type',";
        }
        if(strlen($d_recipe)>0){
            $updateFeild = $updateFeild."menu_recipe='$d_recipe',";
        }
        
        
        $check = true;
        if(is_uploaded_file($_FILES['menu-img-edit']['tmp_name'])){
            $target_dir = "../../Img/Img-menu/";
            $file_extension = pathinfo($_FILES["menu-img-edit"]["name"], PATHINFO_EXTENSION);
            $img_name = $name."_".rand(100000, 999999).".".$file_extension;
            $target_file = $target_dir . $img_name ;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $check = getimagesize($_FILES["menu-img-edit"]["tmp_name"]);
            move_uploaded_file($_FILES["menu-img-edit"]["tmp_name"], $target_file);
            $updateFeild = $updateFeild."menu_image='$img_name',";
        }

        $updateFeild = preg_replace('/,$/', '', $updateFeild);
        

        if($check !== false && strlen($updateFeild)>0) {
            $sql = "UPDATE menu SET $updateFeild   WHERE menu_id='$MenuIdEdit'";
            if ($con->query($sql) === TRUE) {
                $id_insert = $MenuIdEdit;
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
            echo "File is not an image.";
            $uploadOk = 0;
        }

    }

?>