<?php 
    $title = 'Liste des nouvelles maisons';

    include('include/nav_users.php');
    require_once 'model/Model.php';
    //Appel de la classe Model
    $model = new Model;

    if(isset($_GET['id_maison'])){
        $list_single_maison = $model->getAllMaisonsById($_GET['id_maison']);
        if ($list_single_maison) {
            foreach($list_single_maison as $res){
                                                     
                $idMaison = $res['id'];
                $titre = $res['titre_annonce'];
                $prix = $res['prix'];
                $chambre = $res['chambre'];
                $douche = $res['douche'];
                $surface = $res['surface'];
                $categorie = $res['categorie'];
                $ville = $res['ville'];
                $commune = $res['commune'];
                $province = $res['province'];
                $detail = $res['detail_annonce'];
                $image = $res['image'];
                $image1 = $res['image_un'];
                $image2 = $res['image_deux'];
                $image3 = $res['image_trois'];
                $image4 = $res['image_quatre'];

                $telephone = $res['telephone_partenaire'];
                $login = $res['login'];
           
            }
        }
    }
 ?>
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?php include_once('include/aside_admin.php'); ?>
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                             <h5 class="m-b-10">Liste des maisons ajoutées récement</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="admin"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="admin">Tableau de bord</a>
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
                                            <div class="col-md-12">
                                                <div id="result"></div>
                                                <div class="card">
                                            <div class="card-header">
                                                <h5><?php echo ((isset($_GET['id_maison']))?'Détail de la maison':'Liste des maisons ajoutées récements')?> </h5>
                                                <div class="float-right"><a href="nouvellesMaisons" class="btn btn-sm btn-success"><i class="fa fa-list"></i>Liste des maisons</a></div>
                                            </div>
                                            <?php if(isset($_GET['id_maison'])){ ?>
                                                <div class="card-block">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p><b>Pseudo Propriétaire :</b> <?php  echo $login?></p>
                                                            <p><b>Télépgone Proriétaire :</b> <?php  echo $telephone?></p>
                                                            <p><b>Titre Annonce :</b> <?php  echo $titre?></p>
                                                            <p><b>Prix :</b> <?php  echo $prix?> $</p>
                                                            <p><b>Nombre des chambres  :</b> <?php  echo $chambre ?></p>
                                                            <p><b>Nombre des douches :</b> <?php  echo $douche?></p>
                                                            <p><b>Surface :</b> <?php  echo $surface?> m²</p>
                                                            <p><b>Type de maison :</b> <?php  echo $categorie?></p>
                                                            <p><b>Commune :</b> <?php  echo $commune?></p>
                                                            <p><b>Ville :</b> <?php  echo $ville?></p>
                                                            <p><b>Province :</b> <?php  echo $province?></p>
                                                            <p><b>Détail de l'annonce :</b> <?php  echo $detail?></p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="col-md-12">
                                                                <a href="../img/properties/<?php echo $image; ?>" target="_blank"><img src="../img/properties/<?php echo $image; ?>" id="previewImg" width="100%" class="mt-2"></a><br>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <?php 
                                                                    if(empty($image1)){

                                                                    }else{ ?>
                                                                        <a href="../img/properties/<?php echo $image1 ?>" target="_blank"><img src="../img/properties/<?php echo $image; ?>" id="previewImg" width="100%" class="mt-2"></a><br>
                                                                    <?php }
                                                                ?>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <?php 
                                                                    if(empty($image2)){

                                                                    }else{ ?>
                                                                        <a href="../img/properties/<?php echo $image2 ?>" target="_blank"><img src="../img/properties/<?php echo $image; ?>" id="previewImg" width="100%" class="mt-2"></a><br>
                                                                    <?php }
                                                                ?>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <?php 
                                                                    if(empty($image3)){

                                                                    }else{ ?>
                                                                        <a href="../img/properties/<?php echo $image3 ?>" target="_blank"><img src="../img/properties/<?php echo $image; ?>" id="previewImg" width="100%" class="mt-2"></a><br>
                                                                    <?php }
                                                                ?>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <?php 
                                                                    if(empty($image4)){

                                                                    }else{ ?>
                                                                        <a href="../img/properties/<?php echo $image4 ?>" target="_blank"><img src="../img/properties/<?php echo $image; ?>" id="previewImg" width="100%" class="mt-2"></a><br>
                                                                    <?php }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php }else{ ?>
                                                <div class="card-block table-border-style">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Titre Annonce</th>
                                                                    <th>Prix</th>
                                                                    <th>Chambres</th>
                                                                    <th>Douche</th>
                                                                    <th>Surface</th>
                                                                    <th>Catégorie</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="data_list">
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                            </div>
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

     <script type="text/javascript">
        //Fonction pour afficher les catégories
        function getMaison(){
          $.ajax({
            url : "get_maisons_nouvelles.php",
            type : "post",
            success : function(data){
              $("#data_list").html(data);
            }
          });
        }

        //Appel fonction qui affiche les maisons 
        getMaison();

        //Suppression de la maison
        $(document).on("click","#validBtn", function(e){
        e.preventDefault();

            if(window.confirm("Voulez-vous valider cette maison ?")){
                var id = $(this).attr("value");

                $.ajax({
                url:'valid_maison.php',
                type:'post',
                data:{
                    id:id,
                },
                success : function(data){
                    getMaison();
                    $("#result").html(data);
                }
                });

            }
        });

        //Suppression de la maison
        $(document).on("click","#deleteBtn", function(e){
        e.preventDefault();

            if(window.confirm("Voulez-vous supprimer cette maison ?")){
                var id = $(this).attr("value");

                $.ajax({
                url:'delete_maison.php',
                type:'post',
                data:{
                    id:id,
                },
                success : function(data){
                    getMaison();
                    $("#result").html(data);
                }
                });

            }
        });
       
     </script>

    
</body>

</html>
