<?php 
	//autoload para carregar as classes dos objetos instanciados automaticamente
	spl_autoload_register(function($class){
		if(file_exists("classes/".$class.".php")){
			require "classes/".$class.".php";
		}
		
	});
	//objeto constante $PDO para fazer acessso ao BD
	GLOBAL $PDO;
	try {
		$PDO = new PDO("mysql:dbname=estoque;host=localhost", "root", "");
	} catch (PDOException $e) {
		echo "erro: ".$e->getMessage();
		exit;
	}
	session_start();

?>