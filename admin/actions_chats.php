<?php 
  
    require_once 'model/Model.php';
    //Appel de la classe Model
    $model = new Model;

    if (isset($_POST['action']) && $_POST['action'] == "add_message"){

        if (!empty($_POST['id']) && !empty($_POST['message']) && !empty($_POST['type']) ) {
  
          $idDem = $_POST['id'];
          $type = $_POST['type'];
          $message = nl2br($_POST['message']);
  
            if ($add_data = $model->sendMessage($idDem,$type,$message)) {
                  
            }else{
  
          
            }
        }
        
    }