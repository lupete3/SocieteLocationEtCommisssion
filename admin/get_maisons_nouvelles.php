<?php 
    
    require_once 'model/Model.php';
    require_once 'model/security_adm.php';
    //Appel de la classe Model
    $model = new Model;

    $list_pays = $model->getAllMaisonsNouvelles(0);

    if ($list_pays) {
        foreach($list_pays as $res){ ?>
                                                                                             
        <tr style="font-size: 13px;">
            <td><?php echo $res['id'] ?></td>
            <td><?php echo $res['titre_annonce'] ?></td>
            <td><?php echo $res['prix'] ?></td>
            <td><?php echo $res['chambre'] ?></td>
            <td><?php echo $res['douche'] ?></td>
            <td><?php echo $res['surface'] ?></td>
            <td><?php echo $res['categorie'] ?></td>
            <td>
                <a href="faire-louer?mod_maison=<?php echo $res['id'] ?>" id="validBtn" value="<?php echo $res['id'] ?>" class="btn btn-success btn-sm " title=""><i class="fa fa-check-circle"></i>Valider</a> 
                <a href="" id="deleteBtn" value="<?php echo $res['id'] ?>" class="btn btn-danger btn-sm " title=""><i class="fa fa-trash"></i>Annuler</a> 
                <a href="?id_maison=<?php echo $res['id'] ?>" class="btn btn-primary btn-sm mt-1" title=""><i class="fa fa-eye"></i>Détail</a> 
            </td>
        </tr>                                                            
    <?php  
        } 
    }else{
        echo'
            <tr>
                <td colspan="7" class="text-center" headers="">
                    <h3>Aucune donné trouvée !</h3>
                </td>
            </tr>
        ';
    }
?>