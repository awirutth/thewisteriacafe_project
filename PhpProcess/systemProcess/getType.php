<?php
    include("../DatabaseCon.php");
    $sql = "SELECT * FROM menu_type";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $allRows = [];

        while ($row = $result->fetch_assoc()) {
            $allRows[] = json_encode($row); 
        }
        $jsonString = '[' . implode(',', $allRows) . ']';
        echo $jsonString;
    }else{
        echo("error");
    }


?>