<?php
    include("../DatabaseCon.php");
    if(isset($_POST["type"])){
        $type = $_POST["type"];
        $sql = "INSERT INTO menu_type (type_name) VALUES ('$type')";

        if ($con->query($sql) === TRUE) {
            echo("successfully");
        } else {
            echo("Error: " . $sql . "<br>" . $conn->error);
        }

    }
?>