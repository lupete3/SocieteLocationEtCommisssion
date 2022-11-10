<?php 
  
  require_once 'admin/model/Model.php';

  //Appel de la classe Model
  $model = new Model;

  if (isset($_POST['action']) && $_POST['action'] == "send_demand"){

      if (!empty($_POST['id_maison']) && !empty($_POST['nom']) && !empty($_POST['telephone']) && !empty($_POST['message'])) {

        $id_maison = $_POST['id_maison'];
        $nom = $_POST['nom'];
        $telephone = $_POST['telephone'];
        $email = ((empty($_POST['email']))?null:$_POST['email']);
        $message = $_POST['message'];

        if ($delete_data = $model->sendDemand($id_maison,$nom,$telephone,$email,$message)) {
                
            echo '
              <div class="alert alert-success alert-dismissible" id="msg" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h6>Votre commade est envoyée ! <br> Nous vous contacterons dans un bref délai</h6>
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