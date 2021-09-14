<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="./css/style.css">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>login</title>
</head>
<body>

	<header>
		<div class="connection">
			<div class="logo_fk">
				<img src="https://www.cpas.grez-doiceau.be/epn/images/logo-facebook.png/@@images/e089d70f-51fe-4bc3-9fb4-50af5d51ef69.png" alt="">
				<span>Fakebook</span>
			</div>

	<!-- Formulaire de connexion -->

			<div class="login">
				<form action="./controlers/login.php" method="POST">
					<input type="email" name="email" placeholder="email*">
					<input type="password" name="mdp" placeholder="password*">
					<input type="submit" name="connexion" placeholder="Connexion" id="connexion">
				</form>

				<div class="forget_password">
					<a href="./views/view/forgot_password.php">Information de compte oublié ?</a>
				</div>
			</div>
		</div>
	</header>

	<!-- Formulaire d'inscription -->

	<div class="main">
		<div class="register">
			<div class="connected_people">
				<p>Avec Fakebook, partagez et restez en contact avec votre entourage.</p>
				<img src="https://pngimage.net/wp-content/uploads/2018/05/connecting-people-png-8.png" alt="">
			</div>

			<div class="inscription">
				<h1>Inscription</h1>
				<p>C'est gratuit (et ça le restera toujours)</p>
				<form action="./controlers/registration.php" method="POST">
					<input type="text" name="name" placeholder="prénom*" autocomplete="">
					<input type="text" name="surname" placeholder="Nom*" autocomplete="">
					<input type="email" name="email" placeholder="email*" autocomplete="">
					<input type="password" name="mdp" placeholder="Mot de passe*">
					<input type="password" name="confirmMdp" placeholder="Confirmation mot de passe*">
					<input type="text" name="pseudo" placeholder="pseudo*" autocomplete="">
					<input type="submit" name="submit" placeholder="Inscription" id="inscription">
				</form>
			</div>
		</div>
	</div>

</body>
</html>
