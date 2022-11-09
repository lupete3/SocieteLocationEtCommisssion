<?php 

include ('connex.php');
session_start();

if(isset($_POST['insc_bailleur'])){
	$name = $_POST['name'];
	$login = $_POST['login'];
	$tel = $_POST['tel'];
	$type = $_POST['type'];

	$query0 = $bd->prepare("SELECT * FROM partenaire WHERE nom_partenaire = ? ");
	$query0->execute(array($name));

	$query1 = $bd->prepare("SELECT * FROM partenaire WHERE login = ? ");
	$query1->execute(array($login));

	$query2 = $bd->prepare("SELECT * FROM partenaire WHERE telephone_partenaire = ? ");
	$query2->execute(array($tel));

    if ($done=$query0->fetch(PDO::FETCH_ASSOC)){

        header('location:../?err=Ce nom d\'utilisateur existe déjà dans le système');

    }if ($done=$query1->fetch(PDO::FETCH_ASSOC)){

        header('location:../?err=Ce pseudo existe déjà dans le système');

    }if ($done=$query2->fetch(PDO::FETCH_ASSOC)){

        header('location:../?err=Ce numéro existe déjà dans le sysyème');

    }else{

        $_SESSION['login'] = $login;
        $_SESSION['password'] = 'Scl'.rand(0,9000).'@!';

        $login = $_SESSION['login'];
        $pass = $_SESSION['password'];

        $query = "INSERT INTO partenaire (nom_partenaire,telephone_partenaire,login,password,type) VALUES (?,?,?,?,?)";

	    $sql = $bd->prepare($query);

	    if ($sql->execute(array($name,$tel,$login,$pass,$type))) {  
            
            $query1 = $bd->prepare("SELECT * FROM partenaire WHERE login = ? AND password = ? ");
            $query1->execute(array($login, $pass ));

            if ($done=$query1->fetch(PDO::FETCH_ASSOC)) {

                $_SESSION['profile']['partenaire']=$done;

                $type = $_SESSION['profile']['partenaire']['type'];

				if ($type == 'bailleur') {
					header('location:../bailleur-app?err='.$pass);
				}else{
					header('location:../../index?err='.$pass);
				}

                
                                        
            }else {

                header('location:../?err=Login ou mot de pass incorrect');
                            
            }

	    }else {

	        header('location:../compte-bailleur?err=Une erreur est survenue');
	    }

        
    }


	/*if ($done=$query1->fetch(PDO::FETCH_ASSOC)) {

		$_SESSION['profile']['admin']=$done;

		$type = $_SESSION['profile']['admin']['type'];

		if($type === "Admin"){
			header('location:../admin');
		}else{
			header('location:../gerant');
		}
								
	}else {

		header('location:../?err=Login ou mot de pass incorrect');
				  	
	} */

}

 ?>