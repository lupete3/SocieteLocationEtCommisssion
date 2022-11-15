
<?php 
    $title = 'Espace conversation';

    include('include/nav_users.php');

    if(!isset($_GET['id'])){
        header('location:admin');
    }
 
    $conversation = $model->getNewDemandsSingle($_GET['id']);

    if ($conversation) {
        foreach($conversation as $res){
            $client = $res['nom'];
            $message = $res['message'];
            $datePost = $res['date_demande'];
            $titre = $res['titre_annonce'];
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
                                            <h5 class="m-b-10">Tableau de bord</h5>
                                            <p class="m-b-0">Bienvenu <?php echo $username ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Tableau de bord</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5><?php echo $titre ?></h5>
                                                        <span><?php echo $datePost ?></span>
                                                    </div>
                                                    <div class="card-block" style="width: 100%;  height: 300px; overflow: auto; -ms-overflow-style:none ">
                                                        <div class="row">
                                                            <div class="col-sm-12 col-xl-12">
                                                                
                                                                <blockquote class="blockquote">
                                                                    <p class="m-b-0 mb-2"><?php echo $message ?></p>
                                                                    <footer class="blockquote-footer" style="font-size:small;"><?php echo $client ?>
                                                                         Le <cite title="Source Title"><?php echo $datePost ?></cite>
                                                                    </footer>
                                                                </blockquote>
                                                            </div>
                                                            
                                                            <input type="hidden" id="idDem" value="<?php echo $res['id']?>">
                                                            <input type="hidden" id="client" value="<?php echo $client?>">
                                                            
                                                        </div>
                                                        <div class="row" >

                                                            <!-- Affichage des messages de chats -->
                                                            <div style="border-radius: 5px; "  id="data_list" class="col-md-12">

                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <form id="form">
                                                                    <div class="input-group">
                                                                        <textarea name="" id="message" rows="1" class="form-control p-1" title="Entrer votre réponse ici" data-toggle="tooltip"></textarea>
                                                                        <button type="submit" id="add_chat" class="input-group-prepend btn btn-primary"> <i class="fa fa-send"></i></button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
    //Fonction pour afficher les pays
    function getChats(){
        let idDem = $('#idDem').val();
        let client = $('#client').val();
        $.ajax({
            url : "list_chats.php",
            type : "post",
            data:{id:idDem,client:client, type:'show_all_chats'},
            success : function(data){
                $("#data_list").html(data);

                
            }
        });

    }
    
    //Appel fonction qui affiche les conversations
    getChats();

    //Enregistrement des conversations dans la base de données
    $(document).on("click","#add_chat", function(e){
          e.preventDefault();

          let idDem = $('#idDem').val();
          let message = $("#message").val();
          let action = "add_message";
          let type = "admin";
        
          $.ajax({
            url : "actions_chats.php",
            type : "post",
            data:{id:idDem,message:message, type:type, action:action},
            success : function(data){
                $("#form")[0].reset();
                $("#message").focus();
                getChats();
            }
        });
    });

    const interval = window.setInterval(getChats,5000);

</script>
