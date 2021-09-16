<?php
session_start();

if (!$_SESSION['pseudo']) {
	header('Location: index.php');
}

echo $_SESSION['pseudo'];
?>
