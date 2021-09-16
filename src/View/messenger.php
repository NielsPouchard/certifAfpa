
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/style.css">
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Messenger</title>
</head>
<body>
<!-- HEADER START -->
<?php
include __DIR__."/part/header.php";
?>
<!-- HEADER END -->

	<div class="main">

		<?php
			include __DIR__.'/commun/menuBurger.php';
		?>
			<div class="rightSide">
				<section class="chat">
						<div class="messages">
							<div class="message">
								<span class="date"></span>
								<span class="pseudo"></span>
								<span class="content"></span>
							</div>
						</div>
						<div class="user_input">
							<form action="../../controlers/handler.php?task=write" method="POST" id="chat">
								<input type="text" name="pseudo" id="pseudo" value=<?= $_SESSION['pseudo']; ?> >
								<input type="text" name="content" id="content" placeholder="Votre message">
								<button type="submit" name="go" value="write" class="go">Send</button>
							</form>
						</div>
				</section>
			</div>
	</div>

	<script src="./js/messenger.js"></script>
</body>
</html>
