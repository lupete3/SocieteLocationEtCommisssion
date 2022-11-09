<?php 
  
  require_once 'model/Model.php';
  //Appel de la classe Model
  $model = new Model;

  if (isset($_POST['add_pays']) ){

      if (!empty($_POST['designation'])) {

        $designation = $_POST['designation'];

        $pays_exists = $model->paysExists($designation);

        if (!empty($pays_exists)) {
          echo '
            <div class="alert alert-info alert-dismissible" id="msg" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h6>Ce pays existe déjà dans le système</h6>
            </div> ';
        }else{

          if ($add_data = $model->addPays($designation)) {
                
            echo '
              <div class="alert alert-success alert-dismissible" id="msg" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h6>Pays ajouté avec succès</h6>
              </div> ';

          }else{

            echo '
              <div class="alert alert-danger alert-dismissible" id="msg" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h6>Une erreur est survenue</h6>
              </div> ';

          }
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

  //Appel de la classe Model
  $model = new Model;

  $list_pays = null;

  if (isset($_POST['type']) AND $_POST['type'] == 'show_all_pays') {
      // code...
     $list_pays = $model->getPays();
  }

  if ($list_pays) {
    foreach($list_pays as $res){ ?>
                               
      <tr style="font-size: 13px;">
        <td><?php echo $res['id'] ?></td>
        <td><?php echo $res['nom_pays'] ?></td>
        <td>
          <a href="" id="editBtn" value="<?php echo $res['id'] ?>" class="btn btn-primary btn-sm " title=""><i class="fa fa-edit"></i></a> 
          <a href="" id="deleteBtn" value="<?php echo $res['id'] ?>" class="btn btn-danger btn-sm " title=""><i class="fa fa-trash"></i></a> 
        </td>
      </tr>
    <?php  
    } 
  }else{
    echo'
      <tr>
        <td colspan="4" class="text-center" headers="">
          <h3>Aucune donné trouvée !</h3>
        </td>
      </tr>
    ';
  }
?>