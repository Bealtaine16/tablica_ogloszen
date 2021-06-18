<?php 

	include 'config.php';

  error_reporting(0);

  session_start();

  if (!isset($_SESSION['login'])) {
    header("Location: index.php");
}

  $add_id = $_GET['add_id'];
  $add = mysqli_query($conn, "SELECT * FROM adverts WHERE add_id='$add_id'");
  $row = mysqli_fetch_assoc($add);
  $title = $row['title'];
  $image = $row['image'];
  $description = $row['description'];
  $price = $row['price'];
  $category = $row['category'];

  if (isset($_POST['edit'])) {
  $tmp_image = $_FILES['tmp_image']['name'];
    $title = $_POST['title'];
    if ($tmp_image != "") $image = $_FILES['tmp_image']['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $sql = "UPDATE adverts SET title = '$title', image = '$image', description = '$description', price = '$price', category = '$category' WHERE add_id='$add_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $_SESSION['editAdvert'] = '<span style="color:green">Ogłoszenie edytowane!</span>';
    }else{
      $_SESSION['editAdvert'] = '<span style="color:red">Coś poszło nie tak! Spróbuj edytować ogłoszenie jeszcze raz</span>';
    }
  }

  if (isset($_POST['delete'])) {

  	$sql = "DELETE FROM adverts WHERE add_id='$id'";
  	$result1 = mysqli_query($conn, $sql);
  	if ($result1) {
      $_SESSION['editAdvert'] = '<span style="color:green">Ogłoszenie usunięte!</span>';
        $title = "";
        $image = "";
        $description = "";
        $price = "";        
        $category = "";
  	}else{
      $_SESSION['editAdvert'] = '<span style="color:red">Coś poszło nie tak! Spróbuj usunąć ogłoszenie jeszcze raz</span>';
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
          <input type="file" name="tmp_image">
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
        <td class = input-group>  
          <button name="edit" class="btn">Edytuj</button>
        </td>
        <td class = input-group>  
          <button name="delete" class="btn">Usuń</button>
        </td>
        </tr>
        </table>
			</form>
<?php
  if(isset($_SESSION['editAdvert'])){
    echo $_SESSION['editAdvert'];
    unset($_SESSION['editAdvert']);
  }
?>
		</div>
  </section>

</body>
</html>