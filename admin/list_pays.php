<?php 
    
    require_once 'model/Model.php';
  //Appel de la classe Model
  $model = new Model;

  // code...
    $list_pays = $model->getPays();

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