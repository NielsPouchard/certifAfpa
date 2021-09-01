<?php
session_start();
include('bdd.php');

if (!$_SESSION['mdp']) {
	header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/user.css">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>user</title>
</head>

<body>

	<header>
		<div class="navigation">

			<div class="logo_fk">
				<img src="https://www.cpas.grez-doiceau.be/epn/images/logo-facebook.png/@@images/e089d70f-51fe-4bc3-9fb4-50af5d51ef69.png" alt="">
			</div>

			<div class="bar_search">
				<input type="search" name="search">
				<button>Search</button>
			</div>

			<div class="pseudoUser">
				<img src="<?= $_SESSION['photo']; ?>">	
				<?= $_SESSION['pseudo']; ?>
			</div>

			<a href="logout.php"><button class="logout">Déconnexion</button></a>

		</div>
	</header>

	<div class="main">
		<div class="info_Profil">

			<p>Information du profil</p>
				<ul>
					<li>Votre pseudo:</li><?= $_SESSION['pseudo']; ?>
				</ul>

			<p>Insérer une photo</p>
				<form action="/upload.php" method="POST" enctype="multipart/form-data">
					<input type="file" name="photo" id="photo">
					<button type="submit" name="upload" value="upload">Upload</button>
				</form>
		</div>


		<h1>chat</h1>

	<section class="chat">
			<div class="messages">

				<div class="message">
					<span class="date">23:22</span>
					<span class="pseudo">Niels</span> :
					<span class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto repellendus magni quis aperiam molestiae, labore perferendis consequuntur nostrum perspiciatis placeat ex voluptas dignissimos, error saepe velit tenetur optio beatae dicta.</span>
				</div>
			</div>

			<div class="user_input">
				<form action="handler.php?task=write" method="POST" id="chat">
					<input type="text" name="pseudo" id="pseudo" value=<?= $_SESSION['pseudo']; ?>>
					<input type="text" name="content" id="content" placeholder="Votre message">
					<button type="submit" name="go" value="write">Send !</button>
				</form>
			</div>
	</section>
 
	</div>





	
	<script src="./js/script.js"></script>
</body>

</html>