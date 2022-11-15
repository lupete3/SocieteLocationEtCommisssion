<?php 
  
    require_once 'model/Model.php';
    //Appel de la classe Model
    $model = new Model;

    $chat = null;

    if (isset($_POST['type']) AND $_POST['type'] == 'show_all_chats') {
        // code...
        $chat = $model->getReponseByComand($_POST['id']);
        $client = $_POST['client'];
    }

    if ($chat) {
        foreach($chat as $res){ ?>
                <blockquote class=" <?php echo (($res['type'] == "client" )?'blockquote':'blockquote blockquote-reverse') ?> ">
                    <p class="m-b-0 mb-2 "><?php echo $res['message'] ?></p>
                    <footer class="blockquote-footer" style="font-size:small;"><?php echo (($res['type'] == "client" )?$client:'admin') ?>
                        Le <cite title="Source Title text-danger"><?php echo $res['date_reponse'] ?></cite>
                    </footer>
                </blockquote>
        <?php   
        } 
    } else{
        echo'
            <div class="col-md-12">
                <h3>Aucun message !</h3>
            </div>
        ';
    }


                                                                   
