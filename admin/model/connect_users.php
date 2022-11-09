<?php 

include ('connex.php');
session_start();

if(isset($_POST['log_in'])){
	$user = $_POST['login'];
	$pwd = $_POST['password'];

	$query1 = $bd->prepare("SELECT * FROM users WHERE login = ? AND password = ? ");
	$query1->execute(array($user, $pwd ));

	$query2 = $bd->prepare("SELECT * FROM partenaire WHERE login = ? AND password = ? ");
	$query2->execute(array($user, $pwd ));


	if ($done=$query1->fetch(PDO::FETCH_ASSOC)) {

		$_SESSION['profile']['admin']=$done;

		$type = $_SESSION['profile']['admin']['type'];

		if($type === "Admin"){
			header('location:../admin');
		}else{
			header('location:../gerant');
		}
								
	}else if ($done1=$query2->fetch(PDO::FETCH_ASSOC)) {

		$_SESSION['profile']['partenaire']=$done1;

		$type = $_SESSION['profile']['partenaire']['type'];

		if($type === "bailleur"){
			header('location:../bailleur-app');
		}else{
			header('location:../../');
		}
								
	}else {

		header('location:../?err=Login ou mot de pass incorrect');
				  	
	}

}

 ?>