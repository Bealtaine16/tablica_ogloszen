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
    $addDate = $_POST['addDate'];
    $username = $_SESSION['username'];
    $phone_no = $_SESSION['phone_no'];
    $city = $_SESSION['city'];

  	$sql = "INSERT INTO adverts (title, image, description, price, category, addDate, username, phone_no) VALUES ('$title', '$image', '$description', '$price', '$category', '$addDate', '$username', '$phone_no')";
  	$result = mysqli_query($conn, $sql);
  	if ($result) {
      $_SESSION['advert'] = '<span style="color:green">Ogłoszenie dodane!</span>';
        $title = "";
        $image = "";
        $description = "";
        $price = "";        
        $category = "";
  	}else{
      $_SESSION['advert'] = '<span style="color:red">Coś poszło nie tak!</span>';
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
              <li><a href="advert.php">Dodaj ogłoszenie</a></li>
              <li><a href="#">Twoje ogłoszenia</a></li>
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
        <td class = input-group colspan='2'>
          <input type="description" placeholder="Opis (do 255 znaków)" name="description" value="<?php echo $description; ?>" required>
        </td>
        </tr>
        <tr>
        <td class = input-group colspan='2'>
          <input type="file" name="image">
        </td>
        </tr>
        <tr>
        <td class = input-group>
          <input type="addDate" placeholder="Data dodania (powinna sama się tworzyć)" name="addDate" value="<?php echo $addDate; ?>" required>
        </td>
        <td class = input-group>
          <input type="category" placeholder="Kategorie (lista zwijana)" name="category" value="<?php echo $category; ?>" required>
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