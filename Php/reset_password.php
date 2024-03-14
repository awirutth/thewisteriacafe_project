<?php
require_once("../PhpProcess/DatabaseCon.php");

$con;

$act = $_POST['act'];

if ($act == "reset") {
    $email = $con->real_escape_string($_POST['email']);
    $password = $con->real_escape_string($_POST['password']);
    $confirmPassword = $con->real_escape_string($_POST['confirmPassword']);

    if (empty($password) || empty($confirmPassword)) {
        echo "empty Fields";
    } else {
        if ($password == $confirmPassword) {
            // Hash the password
            $password = md5($password);

            // Update the password in the database
            $query = "UPDATE user SET password = '$password' WHERE email = '$email'";
            $res = $con->query($query);

            if ($res) {
                echo "Password updated successfully! Click <a href='login.php'>here</a> to login again.";
            } else {
                echo "Error updating password: " . $con->error;
            }
        } else {
            echo "Password do not match";
        }
    }
}
?>
