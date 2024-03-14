<?php
    include("../DatabaseCon.php");
    if(isset($_POST["order_id"])){
        $order_id = $_POST['order_id'];
        $sql = "SELECT * FROM orders WHERE order_id='$order_id'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            $allRows = [];
            while ($row = $result->fetch_assoc()) {
                echo($row["order_status"]);
            }
        }else{
            echo("error");
        }

    }
    


?>