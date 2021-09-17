<?php $user = $_SESSION['user']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/style.css">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>user</title>
</head>

<body>
<!-- HEADER START -->
<?php
include __DIR__."/part/header.php";
?>
<!-- HEADER END -->

	<div class="main">
		<!-- ----- LEFT PART START (Menu Burger)-----  -->
			<?php
			include __DIR__.'/commun/menuBurger.php';
			?>
		<!-- -----   LEFT PART END   -----  -->
		<!-- ----- MIDDLE PART START -----  -->

				<!-- 	UploadInfoUser -->
		<div class="middleSide">
			<section class="profileUpdate">
				<p>Modifier mon profile</p>
				<form action="/updateProfileUser" method="POST" class="sectionUpdate">
					<input type="text" name="name" value="<?= $user->nom ?>">
					<input type="text" name="surname" value="<?= $user->surName ?>">
					<input type="text" name="pseudo" value="<?= $user->pseudo ?>">
					<input type="email" name="email" value="<?= $user->email ?>">
					<input type="submit" name="update" value="Modifier">
				</form>

				<!-- 	UploadPrdofilePictureUser -->
				<p>Modifier ma photo de profile</p>
				<form action="/upload" method="POST" enctype="multipart/form-data">
					<input type="file" name="photo" id="photo">
					<input type="submit" name="upload" value="Upload">
				</form>
			</section>
		</div>
		<!-- ----- MIDDLE PART END -----  -->
	</div>

	<script src="./js/script.js"></script>
</body>

</html>