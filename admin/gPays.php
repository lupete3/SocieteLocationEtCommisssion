<?php 
    $title = 'Espace Admin';

    include('include/nav_users.php');
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
                                            <h5 class="m-b-10">Gestion Pays</h5>
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
                                            <div class="col-md-5">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Ajouter un pays</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <div id="notif"></div>
                                                        <form class="form-material">
                                                            <div class="form-group form-default">
                                                                <input type="text" id="designation" class="form-control">
                                                                <span class="form-bar"></span>
                                                                <label class="float-label">Désignation</label>
                                                            </div>
                                                            <div class="form-group form-default">
                                                                <button id="add_pays" class="btn btn-sm waves-effect waves-light btn-success"><i class="icofont icofont-check-circled"></i>Ajouter</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="card">
                                            <div class="card-header">
                                                <h5>Liste des pays</h5>
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Désignation</th>
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
        //Fonction pour afficher les pays
        function getPays(){
          $.ajax({
            url : "list_pays.php",
            type : "post",
            data:{type:'show_all_pays'},
            success : function(data){
              $("#data_list").html(data);
            }
          });
        }

        //Appel fonction qui affiche les pays
        getPays();

        //Enregistrement des pays dans la base de données
        $(document).on("click","#add_pays", function(e){
          e.preventDefault();

          var designation = $("#designation").val();

          var add_pays = $("#add_pays").val();
        
          $.ajax({
            url: 'actions_pays.php',
            type: 'post',
            data: {
              designation:designation,
              add_pays:add_pays,
            },
            success: function(response){
              
              $("#notif").html(response);
              $("#form")[0].reset();
              getPays();
            },
          });
        });
     </script>

    
</body>

</html>
