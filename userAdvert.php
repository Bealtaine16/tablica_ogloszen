<?php 

include 'config.php';

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
$phone_no = $_SESSION['phone_no'];

if (isset($_POST['submit'])){
  $search = $_POST["search"];
  if($search == ""){
    $result = mysqli_query($conn, "SELECT * FROM adverts WHERE username='$username' AND phone_no='$phone_no'");    
  }else{
    $sql = "SELECT * FROM adverts WHERE title LIKE '$search' OR description LIKE '$search' OR category LIKE '$search' OR username LIKE '$search' OR city LIKE '$search';";
    $result = mysqli_query($conn, $sql); 
  }
}else{
  $result = mysqli_query($conn, "SELECT * FROM adverts WHERE username='$username' AND phone_no='$phone_no'");
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Tablica Ogłoszeń</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/macy@2.5.1/dist/macy.min.js"></script>
</head>

<body>
    <header>
        <a class="logo" href="userSite.php">
          <img src="images/logo-white.png">
        </a>
        <div class="search text-center">
          <form action="" method="POST">
              <input type="search" name="search" placeholder="Czego szukasz?" required>
              <input type="submit" name="submit" value="Szukaj" class="btn">
          </form>
        </div>
          <ul>
              <li><a href="userSite.php">Strona główna</a></li>
            	<li><a href="advert.php">Dodaj ogłoszenie</a></li>
              <li><a href="#">Twoje ogłoszenia</a></li>
              <li><a href="logout.php">Wyloguj</a></li>
          </ul>
    </header>
    <section class="gallery">
            	  <?php
    						while ($row = mysqli_fetch_array($result)) {
                echo "<div class='adds'>";
                echo "<table style='width: 100%'>";
                echo "<tr>";
                echo "<td class = add-title colspan='2'>".$row['title']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td colspan='2'><img class='advert' src='images/".$row['image']."' ></td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td style='text-align:center; font-size: 30px; font-weight: bold;' colspan='2'>Cena: ".$row['price']." zł</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td style='text-align:center' colspan='2'>".$row['description']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "</tr>";
                echo "<tr>";
                echo "<td style='text-align:right; font-size: 10px;' colspan='2'>Data dodania: ".$row['addDate']."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td class='input-group' colspan='2'>
                  <a style='text-decoration: none;' href='editAdvert.php?add_id=".$row['add_id']."' class='btn'>Edytuj ogłoszenie</a></td>";
                echo "</tr>";
                echo "</table>";
                echo "</div>";
    						}
  						?>
    </section>

    <script type="text/javascript" src="script.js"></script>

    <script type = "text/javascript">
    	window.addEventListener("scroll", function(){
    		var header = document.querySelector("header");
    		header.classList.toggle("sticky", window.scrollY > 0);
    	})
    	
<?php
	if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
?>    </script>

</body>
</html>