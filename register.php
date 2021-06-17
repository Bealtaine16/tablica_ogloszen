<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['login'])) {
    header("Location: userSite.php");
}

if (isset($_POST['submit'])) {
	$full_name = $_POST['full_name'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$phone_no = $_POST['phone_no'];
	$city = $_POST['city'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (full_name, username, email, phone_no, city, password) VALUES ('$full_name', '$username', '$email', '$phone_no', '$city', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				$_SESSION['register'] = '<span style="color:green">Konto zostało pomyślnie dodane!<a href="login.php">Zaloguj się tutaj!</a></span>';
				$username = "";
				$email = "";
				$phone_no = "";
				$full_name = "";				
				$city = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				$_SESSION['register'] = '<span style="color:red">Coś poszło nie tak. Spróbuj wprowadzić dane jeszcze raz</span>';
			}
		} else {
			$_SESSION['register'] = '<span style="color:red">Ten email już istnieje</span>';
		}
	} else {
		$_SESSION['register'] = '<span style="color:red">Podane hasła nie zgadzają się ze sobą</span>';
	}
	session_destroy();
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
            	<li><a href="advert.php">Dodaj ogłoszenie</a></li>
          </ul>
    </header>
  <section class="banner">
		<div class="form">
			<form action="" method="POST" class="login-register">
      	      <p class="form-text" style="font-size: 2rem; font-weight: 800;">Rejestracja</p>
				<div class="input-group">
					<input type="text" placeholder="Imię i nazwisko" name="full_name" value="<?php echo $full_name; ?>" required>
				</div>
				<div class="input-group">
					<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
				</div>
				<div class="input-group">
					<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
				</div>
				<div class="input-group">
					<input type="phone_no" placeholder="Numer telefonu" name="phone_no" value="<?php echo $phone_no; ?>" required>
				</div>
				<div class="input-group">
					<input type="city" placeholder="Miejscowość" name="city" value="<?php echo $city; ?>" required>
				</div>
				<div class="input-group">
					<input type="password" placeholder="Hasło" name="password" value="<?php echo $_POST['password']; ?>" required>
          	  </div>
            	<div class="input-group">
					<input type="password" placeholder="Powtórz hasło" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
				</div>
				<div class="input-group">
					<button name="submit" class="btn">Zarejestruj się</button>
				</div>
				<p class="login-register-text">Nie masz jeszcze konta? <a href="login.php">Zaloguj się tutaj!</a>.</p>
			</form>
<?php
	if(isset($_SESSION['register']))	echo $_SESSION['register'];
?>
		</div>
  </section>
</body>
</html>