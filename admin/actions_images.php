<?php 
  
  require_once 'model/Model.php';
  //Appel de la classe Model
  $model = new Model;

  if (isset($_POST['location']) && $_POST['location'] == "one" ){

    if (!empty($_POST['id']) && !empty($_FILES['image']['name'])) {

        echo $idMaison = $_POST['id'];

        echo $filename = $_FILES['file']['name'];

        
    
        
    }else{

        header('location:faire-louer?mod_maison='.$idMaison.'&info=Completer tous les champs');

    }
      
  }else{

    header('location:faire-louer?mod_maison='.$idMaison.'&info=Completer tous les champs');

  }
