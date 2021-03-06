<?php 

	include 'config.php';

  error_reporting(0);

  session_start();

  if (!isset($_SESSION['login'])) {
    header("Location: index.php");
}

  if (isset($_POST['submit'])) {
    $title = $_POST['title'];
  	$image = $_FILES['image']['name'];
  	$description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $username = $_SESSION['username'];
    $phone_no = $_SESSION['phone_no'];
    $city = $_SESSION['city'];

  	$sql = "INSERT INTO adverts (title, image, description, price, category, username, phone_no, city) VALUES ('$title', '$image', '$description', '$price', '$category', '$username', '$phone_no', '$city')";
  	$result = mysqli_query($conn, $sql);
  	if ($result) {
      $_SESSION['advert'] = '<span style="color:green">Ogłoszenie dodane! Możesz dodać następne, lub przejść do <a style="text-decoration: none; color:#5EA5BD" href="userSite.php">strony głównej</a></span>';
        $title = "";
        $image = "";
        $description = "";
        $price = "";        
        $category = "";
  	}else{
      $_SESSION['advert'] = '<span style="color:red">Coś poszło nie tak! Spróbuj dodać ogłoszenie jeszcze raz</span>';
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
          <ul>
              <li><a href="index.php">Strona główna</a></li>
              <li><a href="advert.php">Dodaj ogłoszenie</a></li>
              <li><a href="userAdvert.php">Twoje ogłoszenia</a></li>
              <li><a href="logout.php">Wyloguj</a></li>
          </ul>
    </header>
  <section class="banner">
		<div class="form" style="width: 800px;">
			<form action="" method="POST" class="add" enctype="multipart/form-data">
				<p class="form-text" style="font-size: 2rem; font-weight: 800;">Twoje ogłoszenie</p>
        <table style='width: 100%;'>
        <tr>
        <td class = input-group>
          <input type="title" placeholder="Tytuł ogłoszenia" name="title" value="<?php echo $title; ?>" required>
        </td>
        <td class = input-group>
          <input type="price" placeholder="Cena" name="price" value="<?php echo $price; ?>" required>  
        </td>
        </tr>
        <tr>
        <td class = input-group colspan='2' style='height: 100px;'>
          <input type="description" placeholder="Opis (do 255 znaków)" name="description" value="<?php echo $description; ?>" required>
        </td>
        </tr>
        <tr>
        <td class = input-group colspan='2'>
          <input type="file" name="image" value="<?php echo $image; ?>" required>
        </td>
        </tr>
        <tr>
        <td class = input-group colspan='2'>
          <label for="category">Kategoria</label>
          <select type="category" name="category" value="<?php echo $category; ?>">
            <option value="Motoryzacja">Motoryzacja</option>
            <option value="Książki">Książki</option>
            <option value="Gry">Gry</option>
            <option value="Elektronika">Elektronika</option>
            <option value="Ubrania">Ubrania</option>
            <option value="Inne" selected>Inne</option>
          </select>
        </td>
        </tr>
        <tr>
        <td class = input-group colspan='2'>  
          <button name="submit" class="btn">Dodaj</button>
        </td>
        </tr>
        </table>
			</form>
<?php
  if(isset($_SESSION['advert'])){
    echo $_SESSION['advert'];
    unset($_SESSION['advert']);
  }
?>
		</div>
  </section>

</body>
</html>