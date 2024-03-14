<html>

<head lang="en">
	<meta charset="UTF-8">
	<title></title>
	<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
		integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
		integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="css/login_new.css"> -->
	<script src="https://code.jquery.com/jquery-3.6.3.js"
		integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</head>
<style>
	.login-panel {
		margin-top: 150px;
	}

</style>

<body style="background-color: #857379;">
<?php
require_once "../PhpProcess/DatabaseCon.php";

// Instantiate the DatabaseCon class
$con;

if (isset($_GET['password'])) {
    $password = $_GET['password'];

    // Sanitize the input to prevent SQL injection
    $password = $con->real_escape_string($password);

    // Execute the query
    $sql = "SELECT * FROM user WHERE password='$password'";
    $result = $con->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // $email = $row['email'];
            // die(json_encode($email));
        } else {
            echo "No user found with this password.";
        }
    } else {
        echo "Error executing query: " . $con->error;
    }
}
?>


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->


	<div class="padding:200px;">


		<div class="col-md-6" style=" margin-left: 380px;">


			<div class="" style="font-size: 0.80rem;">

				<div class=" justify-content-center " style="background-color:white;padding:100px; ">
					<div style="text-align:center;font-size:25px;margin-bottom:20px;"><img src="../Img/2.jpg"  width="120" height="120" style="center"><br>รีเซ็ทรหัสผ่าน</div>
					<form role="form" method="post" id="reset_forgotpass">
						<div class="form_msg" id="msg"></div>
						<div class="row">
							<div class="col-md-3"
								style="text-align:center;height: calc(2.25rem + 2px);padding: 1rem 0.75rem;">อีเมล</div>
							<div class="col-md-9" style="padding:8;">
								<input type="text" name="email" id="email" class="form-control input_user"
									value="<?= $row['email'] ?>" placeholder="email">
							</div>
						</div>
						<div class="row">
							<div class="col-md-3"
								style="text-align:center;height: calc(2.25rem + 2px);padding: 1rem 0.75rem;">
								รหัสผ่านใหม่</div>
							<div class="col-md-9" style="padding:8;">
								<input type="password" name="password" id="password" class="form-control input_user"
									value="" placeholder="password">
							</div>
						</div>
						<div class="row">
							<div class="col-md-3"
								style="text-align:center;height: calc(2.25rem + 2px);padding: 1rem 0.75rem;">
								ยืนยันรหัสผ่าน</div>
							<div class="col-md-9" style="padding:8;">
								<input type="password" name="confirmPassword" id="confirmPassword"
									class="form-control input_user" value="" placeholder="confirmPassword">
							</div>
						</div>
						<div class="d-flex justify-content-center mt-3 login_container">

							<button type="submit" name="login" class="btn btn-primary">รีเซ็ทรหัสผ่าน</button>
						</div>
					</form>
				</div>

				<div class="d-flex justify-content-center links">
				</div>
			</div>
		</div>
	</div>
	


</body>

</html>

<script>
	$(document).ready(function () {
		$('#reset_forgotpass').submit(function (e) {
			e.preventDefault();

			var formData = new FormData(this);
			formData.append("act", "reset");

			$.ajax({
				type: "POST",
				url: "reset_password.php",
				data: formData,
				processData: false,
				contentType: false,
				success: function (data) {
					$('.form_msg').addClass('block');
					$('.form_msg').html(data)
				}
			})
		});
	});
</script>