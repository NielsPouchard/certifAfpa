<?php  
session_start();
include('bdd.php');
	
if (isset($_GET['user'])) {
	$user = (String) trim($_GET['user']);// Enlève les espaces dans le formulaire

	$req = $bdd->query('SELECT * FROM user WHERE email = ? LIMIT 10', array("$user%"));
	$req = $req->fetchAll();

	foreach ($req as $r) {
		?>
			<div>
				<?= $r['nom'] . "" . $r['surName'] ?>
			</div>
		<?php
	}
}



