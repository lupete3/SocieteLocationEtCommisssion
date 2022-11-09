<?php 
  
  require_once 'model/Model.php';
  //Appel de la classe Model
  $model = new Model;

  if (isset($_POST['ajout_maison']) ){

    if (!empty($_POST['idRespo']) && !empty($_POST['titre']) && !empty($_POST['prix']) && !empty($_POST['chambre'])) {

        $idRespo = $_POST['idRespo'];
        $typeMaison = $_POST['typeMaison'];
        $titre = $_POST['titre'];
        $prix = $_POST['prix'];
        $chambre = $_POST['chambre'];
        $douche = $_POST['douche'];
        $surface = $_POST['surface'];
        $ville = $_POST['ville'];
        $commune = $_POST['commune'];
        $description = $_POST['description'];

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

            if ($add_data = $model->addMaison($idRespo,$typeMaison,$titre,$prix,$chambre,$douche,$surface,$ville,$commune,$description,$newname)) {
                
                header('location:faire-louer?success=Maisons ajoutée avec succès');

            }else{

                header('location:faire-louer?danger=Une erreur est survenue');

            }
          }else{

            header('location:faire-louer?danger=Une erreur est survenu lors de l\'importation de la photo');

          }
        }else{

            header('location:faire-louer?info=Choisissez un bon format de la photo');

        } 

        
    }else{

        header('location:faire-louer?info=Completer tous les champs');

    }
      
  }else{

    header('location:faire-louer?info=Completer tous les champs');

  }
