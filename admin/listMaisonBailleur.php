<?php 
    $title = 'Liste des maisons';

    include('include/nav_bailleur.php');
    require_once 'model/Model.php';
    //Appel de la classe Model
    $model = new Model;
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
                                            <h5 class="m-b-10">Liste des maisons </h5>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="bailleur-app"> <i class="fa fa-home"></i> </a>
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
                                                <h5>Liste de vos maisons</h5>
                                                <div class="float-right"><a href="faire-louer" class="btn btn-sm btn-success"><i class="fa fa-plus"></i>Ajouter maison</a></div>
                                            </div>
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
            url : "get_maisons_bail.php",
            type : "post",
            success : function(data){
              $("#data_list").html(data);
            }
          });
        }

        //Appel fonction qui affiche les catégories
        getMaison();

        //Suppression de la catégorie
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
