<?php
session_start();
require_once('../../controlers/bdd.php');
require_once('./controlers/utils.php');
$bdd = getBdd(); 
echo "Find friends here";
?>