<?php
include("../DatabaseCon.php");
$search = $_POST["search"];
if($search !=""){
    $sql = "SELECT * FROM user WHERE user_name LIKE '%$search%' OR surname LIKE '%$search%' ORDER BY user_name ASC "; //เลือกข้อมูลจากตาราง employee ออกมาแสดง
    
    
}else{
    $sql = "SELECT * FROM user ORDER BY user_id";
}


?>