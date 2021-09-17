
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/user.css">
	<title>forgot Password</title>
</head>
<body>
<!-- HEADER START -->
<?php
include __DIR__."/part/header.php";
?>
<!-- HEADER END -->

	<div class="main">
		<!-- ----- LEFT PART START (Menu Burger) -----  -->
		<?php
			include __DIR__.'/commun/menuBurger.php';
		?>
		<!-- -----   LEFT PART END   -----  -->

		<div class="middleSide">
			<h1>Mot de passe oublié</h1>
			<div class="forgotPassword">
				<form action="" method="POST">
					<input type="email" name="email" placeholder="Entrez votre email*">
					<input type="submit" name="submit">
				</form>
			</div>
		</div>
	</div>

</body>
</html>
