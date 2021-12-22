<?php 

include 'config.php';

session_start();
error_reporting(0);

if (isset($_SESSION['id'])) {
    header("Location: home.php");
}

if (isset($_POST['submit'])) {
	session_start();
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
	$result = mysqli_query($koneksi, $sql);

	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['id'] = $row['id'];
		$_SESSION['nama'] = $row['nama'];
		header("Location: home.php");
	} else {
		echo "<script>alert('Woops! Email atau Password anda salah . Silahkan periksa kembali ! ')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style-login.css">

	<title>MartMarketLogin</title>
</head>
<body>
	<div class="container">

		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800; margin-bottom: 5rem; ">Login</p>

			<div class="input-group">
				<p style="color:snow; font-weight: 500;">Email</p>
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>

			<div class="input-group">
				<p style="color:snow; font-weight: 500;">Password</p>
				<input type="password" placeholder="Password" name="password" value="<?php echo $password; ?>" required>
			</div>

			<div class="input-group">	
				<button name="submit" class="btn">Masuk</button>
			</div>
			
		</form>
	</div>
</body>
</html>