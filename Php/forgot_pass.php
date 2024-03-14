<html>

<head lang="en">
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
		integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
		integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="css/login_new.css"> -->
	<script src="https://code.jquery.com/jquery-3.6.3.js"
		integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<style>
	.login-panel {
		margin-top: 150px;
	}

	.block {
		max-width: auto;
		padding: 5px;
		background-color: #D7F5CB;
	}

	body {
		display: flex;
		align-items: center;
		padding-top: 40px;
		padding-bottom: 40px;
		background-color: #857379;
	}

	html,
	body {
		height: 100%;
	}

	.form-signin {
		width: 100%;
		max-width: 400px;
		padding: 15px;
		margin: auto;
	}

	.form-signin .form-floating:focus-within {
		z-index: 4;
	}

	.form-signin input[type="email"] {
		margin-bottom: -1px;
		border-bottom-right-radius: 0;
		border-bottom-left-radius: 0;
	}

	.form-signin input[type="password"] {
		margin-bottom: -1px;
		border-top-left-radius: 0;
		border-top-right-radius: 0;
	}
</style>

<body>

	<body>
		<div class=" container col-lg-6 " style="background-color:white; "><br>
			<i class="bi bi-arrow-left-circle" onclick="document.location = 'login.php'" style="color:black;"></i>

			<div class=" justify-content-center " style="padding:100px; margin-top: -15px;">



				<div style="text-align:center;font-size:30px;margin-bottom:10px;color:red; "><img src="../Img/2.jpg"
						width="120" height="120" style="center"><br>ลืมรหัสผ่าน</div>
				<div style="text-align:center;font-size:20px;margin-bottom:20px;">รีเซ็ตรหัสผ่านด้วยอีเมล</div>
				<form role="form" method="post" id="myform_forgotpass">
					<div class="form_msg" id="msg"></div>


					<div style="margin-left: 107px;">อีเมล</div>

					<div class="d-flex justify-content-center mt-3 login_container">
						<div class="col-lg-9">
							<input type="text" name="email" id="email" class="form-control input_user" value=""
								placeholder="email">
							</input>
						</div><br>
					</div>
					<div class="d-flex justify-content-center mt-3 login_container">
						<button type="submit" name="login" class="btn btn-primary">ยืนยันอีเมล</button>
					</div>
				</form>
			</div>


		</div>

	</body>

</html>

<script>
	$(document).ready(function () {
		$('#myform_forgotpass').submit(function (e) {
			e.preventDefault();

			var email = $('#email').val();
			$.ajax({
				type: "POST",
				url: "forgot_pass_word.php",
				data: { email: email },
				success: function (data) {
					// $('.form_msg').css('display', 'block');
					$('.form_msg').addClass('block');
					$('.form_msg').html(data)
				}
			})
		});
	});
</script>