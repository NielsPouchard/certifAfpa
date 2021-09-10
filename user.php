<?php
session_start();
include('bdd.php');

if (!$_SESSION['iduser']) {
	header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="./css/user.css">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>user</title>
</head>

<body>

	<!-- Header  -->
		<?php 
		include('./header.php');
		?>
	<!-- Header  -->

	<div class="main">
		<!-- ----- LEFT PART START (Menu Burger) -----  -->
		<?php 
		include('./menuBurger.php');
		?>
		<!-- ----- LEFT PART END -----  -->
		<!-- ----- MIDDLE PART START -----  -->
		<div class="middleSide">
			<!-- 	Post -->
			<section>
				<div class="postHeader">
					<div class="postMain">	
						<form action="" method="POST">
							<img src="<?= $_SESSION['photo']; ?>" alt="" style="width: 10%;">
							<input type="submit" name="submitPost" class="send" value="Send">
							<input type="text" name="postContent" class="post" placeholder="What's on your mind, <?= $_SESSION['pseudo']; ?> ?">							
						</form>
					</div>
					<p>File d'actualités</p>
					<!-- 	ContentPost -->
					<section>
						<div class="actuality">
							<div class="posted">
								<div class="post">
									<span class="date"></span>
									<span class="pseudo"></span>
									<span class="content"></span>
								</div>
							</div>
						</div>
					</section>
					<!-- 	ContentPictures -->
					<section>
						<div class="actuality">
							<div class="postedPictures">
								<div class="postpicture">
									<span class="date"></span>
									<span class="pseudo"></span>
									<span class="content"></span>
								</div>
							</div>
						</div>
					</section>
					<!-- 	ContentMovies -->
					<section>
						<div class="actuality">
							<div class="postedMovies">
								<div class="postMovie">
									<span class="date"></span>
									<span class="pseudo"></span>
									<span class="content"></span>
								</div>
							</div>
						</div>
					</section>
					<!-- 	ContentComments -->
					<section>
						<div class="actuality">
							<div class="postedComments">
								<div class="postComment">
									<span class="date"></span>
									<span class="pseudo"></span>
									<span class="content"></span>
								</div>
							</div>
						</div>
					</section>					
				</div>
			</section>
		</div>
	</div>	


	
<script type ="text/javascript">
    window.onload = function what(){
        document.getElementById('hello').innerHTML = 'hi';
    }
</script>   
	<script src="./js/searchUser.js"></script>
	<script src="./js/menuBurger.js"></script>
</body>

</html>