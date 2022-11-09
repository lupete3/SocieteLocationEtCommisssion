<?php 
  
  require_once 'model/Model.php';
  //Appel de la classe Model
  $model = new Model;

  if (isset($_POST['mod_maison']) ){

    if (!empty($_POST['idMaison']) && !empty($_POST['titre']) && !empty($_POST['prix']) && !empty($_POST['chambre'])) {

        $idMaison = $_POST['idMaison'];
        $typeMaison = $_POST['typeMaison'];
        $titre = $_POST['titre'];
        $prix = $_POST['prix'];
        $chambre = $_POST['chambre'];
        $douche = $_POST['douche'];
        $surface = $_POST['surface'];
        $ville = $_POST['ville'];
        $commune = $_POST['commune'];
        $description = $_POST['description'];

        if(empty($_FILES['image']['name'])){
            if ($edit_data = $model->editMaison($typeMaison,$titre,$prix,$chambre,$douche,$surface,$ville,$commune,$description,$newname = "",$idMaison)) {
                    
                header('location:faire-louer?mod_maison='.$idMaison.'&success=Maisons modifiée avec succès');

            }else{

                header('location:faire-louer?mod_maison='.$idMaison.'&danger=Une erreur est survenue');

            }
        }else{
            $filename = $_FILES['image']['name'];

            /* Location */
            $location = "../img/properties/".$filename;
            $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
            $imageFileType = strtolower($imageFileType);

            /* Valid extensions */
            $valid_extensions = array("jpg","JPG","JPEG","PNG","jpeg","png","jfif");

            /* Check file extension */
            if(in_array(strtolower($imageFileType), $valid_extensions)) {
            $newname = rand() . "." . $imageFileType;
            $location = "../img/properties/". $newname;
            /* Upload file */
            if(move_uploaded_file($_FILES['image']['tmp_name'],$location)){

                if ($edit_data = $model->editMaison($typeMaison,$titre,$prix,$chambre,$douche,$surface,$ville,$commune,$description,$newname,$idMaison)) {
                    
                    header('location:faire-louer?mod_maison='.$idMaison.'&success=Maisons modifiée avec succès');

                }else{

                    header('location:faire-louer?mod_maison='.$idMaison.'&danger=Une erreur est survenue');

                }
            }else{

                header('location:faire-louer?mod_maison='.$idMaison.'&danger=Une erreur est survenu lors de l\'importation de la photo');

            }
            }else{

                header('location:faire-louer?mod_maison='.$idMaison.'&info=Choisissez un bon format de la photo');

            } 
        }
        
    }else{

        header('location:faire-louer?mod_maison='.$idMaison.'&info=Completer tous les champs');

    }
      
  }else{

    header('location:faire-louer?mod_maison='.$idMaison.'&info=Completer tous les champs');

  }
