<?php
$con = new mysqli("localhost", "root", "", "TheWisteria");

// Check connection
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: " . $con->connect_error;
    exit();
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    
    if (empty($email)) {
        echo "Please enter your email!";
    } else {
        $sql = "SELECT * FROM user WHERE email = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $password = uniqid(md5(time()));
            
            // Update the user's password with the new token
            $update_query = "UPDATE user SET password = ? WHERE email = ?";
            $update_stmt = $con->prepare($update_query);
            $update_stmt->bind_param("ss", $password, $email);
            $update_stmt->execute();
            $update_stmt->close();

            echo "Click <a href='reset.php?password=$password'> here </a> to reset your password";
        } else {
            echo "User not found";
        }
    }
}

$con->close();
?>
