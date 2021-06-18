<?php 

include 'config.php';

session_start();

if ((isset($_SESSION['login'])) && ($_SESSION['login']==true))
{
	header('Location: userSite.php');
	exit();
}

  $sql = "SELECT * FROM adverts WHERE title LIKE '$str'";
  $result = mysqli_query($conn, $sql);
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
      					echo "<td style='text-align:left; font-size: 15px;'>Sprzedający: ".$row['username']."</td>";
      					echo "<td style='text-align:right; font-size: 15px;'>Nr telefonu: ".$row['phone_no']."</td>";
      					echo "</tr>";
      					echo "<tr>";
      					echo "<td style='text-align:left; font-size: 10px;'>Miejscowość: ".$row['city']."</td>";
      					echo "<td style='text-align:right; font-size: 10px;'>Data dodania: ".$row['addDate']."</td>";
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

		</script>

</body>
</html>