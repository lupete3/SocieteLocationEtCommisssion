<?php

	session_start();

	if(!isset($_SESSION['profile']['partenaire'])){
		header('location:../index');
    }else 
    $id= $_SESSION['profile']['partenaire']['id'];
	$username= $_SESSION['profile']['partenaire']['login'];

 ?>