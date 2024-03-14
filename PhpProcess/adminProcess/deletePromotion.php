<?php 
    include("../DatabaseCon.php");
    if(isset($_POST["id"])){
        $id = $_POST["id"];
        $sql = "UPDATE promotions SET status='1' WHERE pt_id=$id";
        if ($con->query($sql) === TRUE) {
            echo("<script>alert('สำเร็จ')</script>");
            echo('<script>window.location.assign("../../Php/admin_page.php?page=admin_promotion_manage")</script>');
        }
    }



?>