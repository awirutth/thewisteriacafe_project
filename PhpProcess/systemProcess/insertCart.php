<?php
    include("../DatabaseCon.php");
    session_start();
    if(isset($_POST["menu_id"])){
        $menu_id = $_POST["menu_id"];
        $user_id = $_SESSION["user"];
        $addons = $_POST["addons"];
        $addons = explode( ",",$addons );
        $sql = "INSERT INTO cart (user_id,menu_id,cart_status) VALUES ('$user_id','$menu_id','active')";

        if ($con->query($sql) === TRUE) {
            $last_id = $con->insert_id;
            foreach($addons as $i){
                if($i != ""){
                    $sqlA = "INSERT INTO cart_sp (cart_id,addons_id) VALUES ('$last_id','$i')";
                    $result = $con->query($sqlA);
                }
            }
            echo("successfully");
        } else {
            echo("Error: " . $sql . "<br>" . $con->error);
        }

    }
?>