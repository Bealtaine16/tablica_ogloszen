<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['login'])) {
    header("Location: userSite.php");
    exit();
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$email = htmlentities($email, ENT_QUOTES, "UTF-8");
	$password = htmlentities($password, ENT_QUOTES, "UTF-8");

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['login'] = true;

		$_SESSION['user_id'] = $row['id'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['phone_no'] = $row['phone_no'];
		$_SESSION['city'] = $row['city'];

		unset($_SESSION['errorLogin']);
		$result->free_result();
		header("Location: userSite.php");
	} else {
		$_SESSION['errorLogin'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
	}
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tablica Ogłoszeń</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/macy@2.5.1/dist/macy.min.js"></script>
</head>
<body>
    <header>
        <a class="logo" href="index.php">
          <img src="images/logo-white.png">
        </a>
        <div class="search text-center">
          <form action="" method="POST">
              <input type="search" name="search" placeholder="Czego szukasz?" required>
              <input type="submit" name="submit" value="Szukaj" class="btn">
          </form>
        </div>
          <ul>
              <li><a href="index.php">Strona główna</a></li>
              <li><a href="register.php">Zarejestruj się</a></li>
              <li><a href="login.php">Zaloguj się</a></li>
            	<li><a href="login.php">Dodaj ogłoszenie</a></li>
          </ul>
    </header>
  <section class="banner">
		<div class="form">
			<form action="" method="POST" class="login-register">
				<p class="form-text" style="font-size: 2rem; font-weight: 800;">Logowanie</p>
				<div class="input-group">
					<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
				</div>
				<div class="input-group">
					<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
				</div>
				<div class="input-group">
					<button name="submit" class="btn">Zaloguj się</button>
				</div>
				<p class="login-register-text">Nie masz jeszcze konta? <a href="register.php">Zarejestruj się tutaj!</a>.</p>
			</form>
<?php
	if(isset($_SESSION['errorLogin'])){
		echo $_SESSION['errorLogin'];
		unset($_SESSION['errorLogin']);
	}	
?>
		</div>
  </section>

</body>
</html>