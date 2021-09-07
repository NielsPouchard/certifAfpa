<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="./css/header.css">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Header</title>
</head>
<body>
		<header>
		<div class="navigation">
			<div class="logo_fk">
				<span>Fakebook</span>
			</div>

			<div class="bar_search">
				<input type="search" name="search" placeholder="Chercher un ami" id="search_user">
				<input type="submit" name="search" placeholder="Chercher" class="search" value="search">
			</div>
			<div>
				<div id="result_search"></div>				
			</div>

			<div class="pseudoUser">	
				<?= $_SESSION['pseudo']; ?>
				<img src="<?= $_SESSION['photo']; ?>" alt="">
			</div>

			<a href="logout.php"><button class="logout">Déconnexion</button></a>
		</div>
	</header>




</body>
</html>