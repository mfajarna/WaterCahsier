<?php
	session_start();
    include "controller/koneksi.php";

	if(isset($_POST["login"])){
		
		$username = mysqli_real_escape_string($koneksi,$_POST["username"]);
		$password = mysqli_real_escape_string($koneksi,$_POST["password"]);

		$result = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username'");
		

		if(mysqli_num_rows($result) === 1){
			$row = mysqli_fetch_assoc($result);
			$_SESSION['username']=$row['username'];
			$_SESSION['nama']=$row['nama'];
			$_SESSION['password']=$row['password'];
			$_SESSION['jabatan']=$row['jabatan'];

			if($row['jabatan'] == "administrator"){
				if($password == $row["password"]){
					header("Location:admin/adminpanel.php");
					exit;
				}
			}
			else if($row['jabatan'] == "user"){
				if(password_verify($password, $row["password"])){
					header("Location:admin/userpanel.php");
					exit;
				}
			}
		}
		$error = true;
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Aplikasi Pembayaran Air Online</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="assets/images/logo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/library/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/library/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/library/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/library/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/styles/util.css">
	<link rel="stylesheet" type="text/css" href="assets/styles/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="assets/images/logo.png" class="rounded-circle" alt="IMG" height="300px">
				</div>

				<form action="#" method="post" class="login100-form validate-form">
					<span class="login100-form-title">
                       SUMBER HURIP ABADI
					</span>
				<?php   
					if(isset($error)){
						echo "
						<script> alert('Username/Password salah');
						document.location.href = 'login.php';
						</script>
						";
					}
				?>
					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="username" id="username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password" id="password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" name="login" value="login">
					</div>

					<div class="text-center p-t-12">

					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="assets/library/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/library/js/popper.js"></script>
	<script src="assets/library/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/library/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/library/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="assets/script/main.js"></script>

</body>
</html>