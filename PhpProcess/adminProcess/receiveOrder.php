<?php 
    include("../DatabaseCon.php");
    if(isset($_POST["order_id"])
    
    ){
        $status = "receive";
        if(isset($_POST["cancel"])){
            $status = "cancel";
        }
        $order_id = $_POST["order_id"];
        $sql = "UPDATE orders SET order_status='$status' WHERE order_id=$order_id";
        if ($con->query($sql) === TRUE) {
            //echo("<script>alert('สำเร็จ')</script>");
            echo('success');
        } else {
            echo("Error: " . $sql . "<br>" . $conn->error);
        }

    }

?>