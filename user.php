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
				<span>Fakebook</span>
			</div>

			<div class="bar_search">
				<input type="search" name="search" placeholder="Chercher un ami">
				<input type="submit" name="search" placeholder="Chercher" class="search">
			</div>

			<div class="pseudoUser">	
				<?= $_SESSION['pseudo']; ?>
				<img src="<?= $_SESSION['photo']; ?>" alt="">

			</div>

			<a href="logout.php"><button class="logout">Déconnexion</button></a>
		</div>
	</header>

	<div class="main">

		<section class="profileUpdate">

			<!-- 	UploadInfoUser -->
			<form action="update.php" method="POST" class="sectionUpdate">
				<input type="text" name="name" placeholder="Nom*">
				<input type="text" name="surname" placeholder="Prénom*">
				<input type="email" placeholder="Email*">
				<input type="password" name="mdp" placeholder="Mot de passe*">
				<input type="password" name="ConfirmMdp" placeholder="Confimation de mot de passe*">
			</form>

			<!-- 	UploadPicture -->
			<p>Modifier ma photo de profile</p>
			<form action="/upload.php" method="POST" enctype="multipart/form-data">
				<input type="file" name="photo" id="photo">
				<input type="submit" name="upload" value="upload">
			</form>	

		</section>

		<section class="chat">
			<!-- 	ContentMessagesChat -->
				<div class="messages">
					<div class="message">
						<span class="date">23:22</span>
						<span class="pseudo">Niels</span> :
						<span class="content">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto repellendus magni quis aperiam molestiae, labore perferendis consequuntur nostrum perspiciatis placeat ex voluptas dignissimos, error saepe velit tenetur optio beatae dicta.</span>
					</div>
				</div>

				<div class="user_input">
					<form action="handler.php?task=write" method="POST" id="chat">
						<input type="text" name="pseudo" id="pseudo" value=<?= $_SESSION['pseudo']; ?> >
						<input type="text" name="content" id="content" placeholder="Votre message">
						<button type="submit" name="go" value="write" class="go">Send !</button>
					</form>
				</div>
		</section>
	</div>

	<script src="./js/script.js"></script>
</body>

</html>