<?php 
  
  require_once 'model/Model.php';

  //Appel de la classe Model
  $model = new Model;

  if (isset($_POST['id'])){

      if (!empty($_POST['id']) ) {

        $id = $_POST['id'];

        if ($delete_data = $model->deleteMaison($id)) {
                
            echo '
              <div class="alert alert-success alert-dismissible" id="msg" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h6>Maison supprimée avec succès</h6>
              </div> ';

          }else{

            echo '
              <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h6>Une erreur est survenue</h6>
              </div> ';

          }
      }else{

        echo '
          <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h6>Completer tous les champs</h6>
          </div> ';
      }
      
  }else{

    echo '
      <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h6>Completer tous les champs</h6>
      </div> ';
  }
?>