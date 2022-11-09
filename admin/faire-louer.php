<?php 
    $title = 'Faire louer une maison';

    include('include/nav_bailleur.php');

    require_once 'model/Model.php';
    //Appel de la classe Model
    $model = new Model;
  
    $list_ville = $model->getVilles();

    $list_commune = $model->getCommunes();

    if(isset($_GET['mod_maison'])){
        $list_single_maison = $model->getAllMaisonsById($_GET['mod_maison']);
        if ($list_single_maison) {
            foreach($list_single_maison as $res){
                                       
                $idMaison = $res['id'];
                $titre = $res['titre_annonce'];
                $prix = $res['prix'];
                $chambre = $res['chambre'];
                $douche = $res['douche'];
                $surface = $res['surface'];
                $categorie = $res['categorie'];
                $detail = $res['detail_annonce'];
                $image = $res['image'];
                $image1 = $res['image_un'];
                $image2 = $res['image_deux'];
                $image3 = $res['image_trois'];
                $image4 = $res['image_quetre'];
           
            }
        }
    }

    
 ?>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?php include_once('include/aside_bailleur.php'); ?>
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Location maison</h5>
                                            <p class="m-b-0">Faire louer une maison </p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="bailleur-app"> <i class="fa fa-home"></i> Tableau de bord</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="listMaisonBailleur">Liste des maisons</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">

                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                           
                                            <!-- Project statustic start -->
                                            <div class="col-xl-12">
                                                <?php 
                                                    if (isset($_GET['success'])) { ?>
                                                        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                                            <?php echo $_GET['success'] ?>
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    <?php } if (isset($_GET['info'])) { ?>
                                                        <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
                                                            <?php echo $_GET['info'] ?>
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    <?php } if (isset($_GET['danger'])) { ?>
                                                        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                                            <?php echo $_GET['danger'] ?>
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                    <?php }
                                                ?>
                                                <div class="card">
                                                
                                                    <div class="card-header">
                                                        <h5>Location Maison</h5>
                                                        <span>Complétez toules les cases demandées pour faire louer votre maison</span>
                                                        
                                                    </div>
                                                    <?php
                                                        if(!isset($_GET['mod_maison'])){
                                                    ?>
                                                        <div class="card-block">
                                                            <form method="POST" action="ajoutMaison.php" enctype="multipart/form-data">
                                                                <input type="hidden" name="idRespo" value="<?php echo $id ?>">
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Type de maison <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-10">
                                                                        <select name="typeMaison" id="" class="form-control">
                                                                            <option value="Durable">Durable</option>
                                                                            <option value="Semi-Durable">Semi-Durable</option>
                                                                            <option value="Planche">Plache</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Titre Annonce <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="titre" placeholder="Ex : Maison meublée 4 pièces 90 m²  " class="form-control">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Prix <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="prix" class="form-control" placeholder="Prix de location">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Chambre <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="chambre" class="form-control" placeholder="Nombre des chambres">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Douche <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="douche" class="form-control" placeholder="Nombre des douches">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Surface </label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" name="surface" class="form-control" placeholder="Surface de la maison">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Ville <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-10">
                                                                        <select name="ville" id="" class="form-control">
                                                                            <?php 
                                                                                if ($list_ville) {
                                                                                    foreach($list_ville as $res){ ?>
                                                                                        <option value="<?php $res['id'] ?>"><?php echo $res['nom_ville'] ?></option>
                                                                            <?php  
                                                                                    } 
                                                                                }else{
                                                                                    echo' ';
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Commune <span class="text-danger">*</span></label>
                                                                    <div class="col-sm-10">
                                                                        <select name="commune" id="" class="form-control">
                                                                            <?php 
                                                                                if ($list_commune) {
                                                                                    foreach($list_commune as $res){ ?>
                                                                                        <option value="<?php $res['id'] ?>"><?php echo $res['nom_commune'] ?></option>
                                                                            <?php  
                                                                                    } 
                                                                                }else{
                                                                                    echo' ';
                                                                                }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Description</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea rows="5" name="description" cols="5" class="form-control" placeholder="Description de la maisons"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-2">

                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group ">
                                                                                <h5>Image de la maison</h5>
                                                                                    <div class="col-sm-10">
                                                                                        <input type="file" name="image" >
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button type="submit" name="ajout_maison" class=" float-right btn waves-effect waves-light btn-success"><i class="fa fa-check-circle"></i>Enregistrer</button>
                                                            </form>
                                                        </div>
                                                    <?php }else{ ?>
                                                        <div class="card-block">
                                                        <form method="POST" action="modMaison.php" enctype="multipart/form-data">
                                                            <input type="hidden" id="idMaison" name="idMaison" value="<?php echo $idMaison ?>">
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Type de maison <span class="text-danger">*</span></label>
                                                                <div class="col-sm-10">
                                                                    <select name="typeMaison" id="" class="form-control">
                                                                        <option value="<?php echo $categorie ?>"><?php echo $categorie ?></option>
                                                                        <option value="Durable">Durable</option>
                                                                        <option value="Semi-Durable">Semi-Durable</option>
                                                                        <option value="Planche">Plache</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Titre Annonce <span class="text-danger">*</span></label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="titre" value="<?php echo $titre ?>" placeholder="Ex : Maison meublée 4 pièces 90 m²  " class="form-control">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Prix <span class="text-danger">*</span></label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="prix" value="<?php echo $prix ?>" class="form-control" placeholder="Prix de location">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Chambre <span class="text-danger">*</span></label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="chambre" value="<?php echo $chambre ?>" class="form-control" placeholder="Nombre des chambres">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Douche <span class="text-danger">*</span></label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="douche" value="<?php echo $douche ?>" class="form-control" placeholder="Nombre des douches">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Surface </label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="surface" value="<?php echo $surface ?>"  class="form-control" placeholder="Surface de la maison">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Ville <span class="text-danger">*</span></label>
                                                                <div class="col-sm-10">
                                                                    <select name="ville" id="" class="form-control">
                                                                        <?php 
                                                                            if ($list_ville) {
                                                                                foreach($list_ville as $res){ ?>
                                                                                    <option value="<?php $res['id'] ?>"><?php echo $res['nom_ville'] ?></option>
                                                                        <?php  
                                                                                } 
                                                                            }else{
                                                                                echo' ';
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Commune <span class="text-danger">*</span></label>
                                                                <div class="col-sm-10">
                                                                    <select name="commune" id="" class="form-control">
                                                                        <?php 
                                                                            if ($list_commune) {
                                                                                foreach($list_commune as $res){ ?>
                                                                                    <option value="<?php $res['id'] ?>"><?php echo $res['nom_commune'] ?></option>
                                                                        <?php  
                                                                                } 
                                                                            }else{
                                                                                echo' ';
                                                                            }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Description</label>
                                                                <div class="col-sm-10">
                                                                    <textarea rows="5" name="description" cols="5" class="form-control" placeholder="Description de la maisons"><?php echo $detail ?> </textarea>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-2">

                                                                </div>
                                                                <div class="col-md-10">
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                            <div class="form-group ">
                                                                                <h6>Image de la maison</h6>
                                                                                <div class="custom-file">
                                                                                    <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                                                                    <label class="custom-file-label" for="inputGroupFile01">Choisir image</label>
                                                                                </div>
                                                                                <div class='preview'>
                                                                                    <img src="../img/properties/<?php echo $image; ?>" id="previewImg" width="100%" class="mt-2"><br>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group ">
                                                                                <h6>Autres Images N°1 </h6>
                                                                                <div class="custom-file">
                                                                                    <input type="file" name="image0" class="custom-file-input" id="image0" onchange="previewFileOne(this);" aria-describedby="inputGroupFileAddon01">
                                                                                    <label class="custom-file-label" for="image0">Choisir image</label>
                                                                                </div>
                                                                                <div class='preview'>
                                                                                    <img src="../img/properties/<?php echo $image1; ?>" id="previewImg0" width="100%" class="mt-2"><br>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group ">
                                                                                <h6>Autres Images N°2 </h6>
                                                                                <div class="custom-file">
                                                                                    <input type="file" name="image1" class="custom-file-input" id="inputGroupFile01" onchange="previewFile(this);" aria-describedby="inputGroupFileAddon01">
                                                                                    <label class="custom-file-label" for="inputGroupFile01">Choisir image</label>
                                                                                </div>
                                                                                <div class='preview text-center'>
                                                                                    <img src="../img/properties/<?php echo $image2; ?>" id="previewImg" width="100%" class="mt-2"><br>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group ">
                                                                                <h6>Autres Images N°3 </h6>
                                                                                <div class="custom-file">
                                                                                    <input type="file" name="image2" class="custom-file-input" id="inputGroupFile01" onchange="previewFile(this);" aria-describedby="inputGroupFileAddon01">
                                                                                    <label class="custom-file-label" for="inputGroupFile01">Choisir image</label>
                                                                                </div>
                                                                                <div class='preview2'>
                                                                                    <img src="../img/properties/<?php echo $image3; ?>" id="previewImg" width="100%" class="mt-2"><br>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group ">
                                                                                <h6>Autres Images N°4 </h6>
                                                                                <div class="custom-file">
                                                                                    <input type="file" name="image3" class="custom-file-input" id="inputGroupFile01" onchange="previewFile(this);" aria-describedby="inputGroupFileAddon01">
                                                                                    <label class="custom-file-label" for="inputGroupFile01">Choisir image</label>
                                                                                </div>
                                                                                <div class='preview3'>
                                                                                    <img src="../img/properties/<?php echo $image4; ?>" id="previewImg" width="100%" class="mt-2"><br>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <button type='button' id="image_btn">Img</button>
                                                                    <button type="submit" name="mod_maison" class="float-right mt-2 btn waves-effect waves-light btn-info"><i class="fa fa-edit"></i>Enregistrer les modifications</button>
                                                                </div>
                                                            </div>
                                                            
                                                        </form>
                                                    </div>
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <!-- Project statustic end -->
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once 'include/footer.php'; ?>
</body>

</html>
<script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
   
        if(file){
            var reader = new FileReader();
   
            reader.onload = function(){
              $("#previewImg").attr("src", reader.result);
              //$("#previewImg").show();
            }
            reader.readAsDataURL(file);
        }
    }

    $("#image_btn").on("click", function(){

          var id = $("#idMaison").val();

          var fd = new FormData();
          var files = $('#image0')[0].files;

          var location = "one";

          fd.append('file',files[0]);
          fd.append('id',id);

          $.ajax({
            url: 'actions-images.php',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
              $("#result").html(response);
              $("#image0").attr("src",response); 
            },
          }); 
          
        
    });
</script>
