<?php 
    include("../DatabaseCon.php");
    if(isset($_POST["cart_id_delete"])
    
    ){
        $cart_id = $_POST["cart_id_delete"];
        $sql = "UPDATE cart SET cart_status='delete' WHERE cart_id=$cart_id";
        if ($con->query($sql) === TRUE) {
            //echo("<script>alert('สำเร็จ')</script>");
            echo('<script>window.location.assign("../../Php/cart.php")</script>');
        } else {
            echo("Error: " . $sql . "<br>" . $conn->error);
        }

    }

?>