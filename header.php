<?php 

$searchBar = $bdd->query('SELECT * FROM user ORDER BY iduser DESC LIMIT 5');

if (isset($_GET['searchBar']) && !empty($_GET['searchBar'])) {

	$search =  htmlspecialchars($_GET['searchBar']);

	$searchBar = $bdd->query('SELECT * FROM user WHERE email LIKE "%'.$search.'%" ORDER BY iduser');	

	if ($searchBar->rowCount() === 0) {
		$searchBar = $bdd->query('SELECT * FROM user WHERE CONCAT(nom, surName, pseudo) LIKE "%'.$search.'%" ORDER BY iduser DESC');
	}
}
?>

<header>
	<div class="navigation">
		<div class="logo_fk">
			<span>Fakebook</span>
		</div>

		<div class="bar_search">
			<form action=""  method="GET">
				<input type="search" name="searchBar" placeholder="Chercher un ami" >
				<input type="submit" placeholder="Chercher" class="search" value="search">
			</form>

			<div class="searchResults">
				<ul>
					<?php while($results = $searchBar->fetch()){ ?>						
					<li> <?= $results['surName']?> <?= $results['nom']?> <?= $results['pseudo']?></li> 	
					<?php } ?>
				</ul>		
			</div>		
		</div>

		
		<div class="pseudoUser">	
			<?= $_SESSION['pseudo']; ?>
			<img src="<?= $_SESSION['photo']; ?>" alt="">
		</div>

		<a href="logout.php"><button class="logout">Déconnexion</button></a>
	</div>
</header>

