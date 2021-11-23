<?php

function chargerClasse($classe){
	require "./Class/".$classe . '.class.php'; // On inclut la classe
}

function connexion ($bdName){

	try{ 
		$db=new PDO("mysql:host=localhost;dbname=".$bdName."","root",""); 
	} 
	catch(PDOException $e){ 
		echo $e->getMessage(); 
	} 
	return $db;
}

spl_autoload_register('chargerClasse');

?>