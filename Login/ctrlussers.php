<?php
	@session_start();
	include("Clase_BD.php");
	$DB=new DB();
	
	
	if ($_GET["Salida"]){
		unset($_SESSION["iduss"],$_SESSION["nombre"],$_SESSION["tipo"]);
		$_SESSION["iduss"]=NULL;
		$_SESSION["nombre"]=NULL;
		$_SESSION["tipo"]=NULL;
		$DB->ir_a_pagina("index.php");
		exit;
	}
?>
