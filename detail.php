<?php 
    $title = "SCL";
    include('header.php');

    $id = (($_GET['id'] > 0)?$_GET['id']:'');


    $list_maison = null;
    $list_maison = $model->getAllMaisonsById($id);

    if(!empty($list_maison)){
        foreach($list_maison as $res):
            $idMaison = $res['id'];
            $typeMaison = $res['categorie'];
            $titre = $res['titre_annonce'];
            $prix = $res['prix'];
            $chambre = $res['chambre'];
            $douche = $res['douche'];
            $surface = $res['surface'];
            $ville = $res['ville'];
            $commune = $res['commune'];
            $description = $res['detail_annonce'];
            $image = $res['image'];
            $image1 = $res['image_un'];
            $image2 = $res['image_deux'];
            $image3 = $res['image_trois'];
            $image4 = $res['image_quatre'];
        endforeach;
    }else{
        header('location:./');
    }
?>

    <!-- Property Details Section Begin -->
    <section class="property-details-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="pd-details-text">
                        <div class="pd-details-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-send"></i></a>
                            <a href="#"><i class="fa fa-star"></i></a>
                            <a href="#"><i class="fa fa-print"></i></a>
                            <a href="#"><i class="fa fa-cloud-download"></i></a>
                        </div>
                        <div class="property-more-pic">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="img/properties/<?php echo $image ?>" alt="">
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    <?php 
                                        if(empty($image1)){}else{?>
                                            <div class="pt" data-imgbigurl="img/properties/<?php echo $image1 ?>"><img
                                            src="img/properties/<?php echo $image1 ?>" alt=""></div>
                                    <?php }?>
                                    <?php 
                                        if(empty($image2)){}else{?>
                                            <div class="pt" data-imgbigurl="img/properties/<?php echo $image2 ?>"><img
                                            src="img/properties/<?php echo $image2 ?>" alt=""></div>
                                    <?php }?>
                                    <?php 
                                        if(empty($image3)){}else{?>
                                            <div class="pt" data-imgbigurl="img/properties/<?php echo $image3 ?>"><img
                                            src="img/properties/<?php echo $image3 ?>" alt=""></div>
                                    <?php }?>
                                   <?php 
                                        if(empty($image4)){}else{?>
                                            <div class="pt" data-imgbigurl="img/properties/<?php echo $image4 ?>"><img
                                            src="img/properties/<?php echo $image4 ?>" alt=""></div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="pd-desc">
                            <h4>Description</h4>
                            <p><?php echo $description ?></p>
                        </div>
                        <div class="pd-details-tab">
                            <div class="tab-item">
                                <ul class="nav" role="tablist">
                                    <li>
                                        <a class="active" data-toggle="tab" href="#tab-1" role="tab">Aper??u</a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#tab-2" role="tab">Description</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-item-content">
                                <div class="tab-content">
                                    <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                        <div class="property-more-table">
                                            <table class=" " width="100%">
                                                <tbody>
                                                    <tr>
                                                        <td class="pt-name">Prix</td>
                                                        <td class="p-value"><?php echo $prix ?> $</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-name">Type Maison</td>
                                                        <td class="p-value"><?php echo $typeMaison ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-name">Salle de bain</td>
                                                        <td class="p-value"><?php echo $douche ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-name">Chambres</td>
                                                        <td class="p-value"><?php echo $chambre ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pt-name">Superficie</td>
                                                        <td class="p-value"><?php echo $surface ?> m??</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                        <div class="pd-table-desc">
                                            <p><?php echo $description ?>.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="property-map">
                            <h4>Map</h4>
                            <div class="map-inside">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2942.5524090066037!2d-71.10245469994108!3d42.47980730490846!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e3748250c43a43%3A0xe1b9879a5e9b6657!2sWinter%20Street%20Public%20Parking%20Lot!5e0!3m2!1sen!2sbd!4v1577299251173!5m2!1sen!2sbd"
                                    height="320" style="border:0;" allowfullscreen=""></iframe>
                                <div class="icon">
                                    <i class="fa fa-home"></i>
                                </div>
                            </div>
                        </div>
                        <div class="property-contactus">
                            <h4>Nous contacter</h4>
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="agent-desc">
                                        <img src="img/logo-blue.png" alt="">
                                        <div class="agent-title">
                                            <h5>Adam Smith</h5>
                                            <span>Saler Marketing</span>
                                        </div>
                                        <div class="agent-social">
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                            <a href="#"><i class="fa fa-google-plus"></i></a>
                                            <a href="#"><i class="fa fa-envelope"></i></a>
                                        </div>
                                        <p>Cpml??tez les champs du fomulaire pour nous faire part de vote besoin de location. 
                                            Nous sommes ?? votre ??coute 24/24 pour toute pr??ocupation.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-6 offset-lg-1">
                                    <form  class="agent-contact-form">
                                        <input type="hidden" id="id_maison" value="<?php echo $idMaison ?>" placeholder="Id Maison*">
                                        <input type="text" id="nom" placeholder="Nom*">
                                        <input type="text" id="telephone" placeholder="T??l??phone*">
                                        <input type="email" id="email" placeholder="Email">
                                        <textarea id="message" placeholder="Messages"></textarea>
                                        <button type="button" id="envoyer_message" class="site-btn">Envoyer le message</button>
                                    </form><br>
                                    <div id="result">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="best-agents">
                        <h4><b>Maisons Disponibles</b></h4><br>
                        <?php 
                            $list_maisonsLimit = $model->getAllMaisonsLimit($limit = 8);
                            if (!empty($list_maisonsLimit)) {
                                foreach($list_maisonsLimit as $res){
                        ?>
                        <div class="card p-2 mb-2">

                        
                            <a href="detail?id=<?php echo $res['id'] ?>" class="ba-item">
                                <div class="" style="width:100%">
                                    <img src="img/properties/<?php echo $res['image'] ?>" alt="">
                                </div>
                                <div class="ba-text">
                                    <h6><b><?php echo $res['titre_annonce'] ?></b></h6>
                                    
                                    <p class="property-items"><span class="float-right"><b><?php echo $res['prix'] ?> $</b></span> <?php echo $res['categorie'] ?> </p>
                                </div>
                            </a></div>
                        <?php  
                                } 
                            }else{
                                echo'
                                    <div class="text-center">
                                        <h3>Aucune donn?? trouv??e !</h3>
                                    </div>
                                ';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Property Details Section End -->

    <!-- Partner Carousel Section Begin -->
    <div class="partner-section">
        <div class="container">
            <div class="partner-carousel owl-carousel">
                <a href="#" class="partner-logo">
                    <div class="partner-logo-tablecell">
                        <img src="img/partner/partner-1.png" alt="">
                    </div>
                </a>
                <a href="#" class="partner-logo">
                    <div class="partner-logo-tablecell">
                        <img src="img/partner/partner-2.png" alt="">
                    </div>
                </a>
                <a href="#" class="partner-logo">
                    <div class="partner-logo-tablecell">
                        <img src="img/partner/partner-3.png" alt="">
                    </div>
                </a>
                <a href="#" class="partner-logo">
                    <div class="partner-logo-tablecell">
                        <img src="img/partner/partner-4.png" alt="">
                    </div>
                </a>
                <a href="#" class="partner-logo">
                    <div class="partner-logo-tablecell">
                        <img src="img/partner/partner-5.png" alt="">
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Partner Carousel Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer-section set-bg" data-setbg="img/footer-bg.jpg">
        <div class="container">
            <div class="footer-text">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="footer-logo">
                            <div class="logo">
                                <a href="#"><img src="img/footer-logo.png" alt=""></a>
                            </div>
                            <p>Subscribe our newsletter gor get notification about new updates.</p>
                            <form action="#" class="newslatter-form">
                                <input type="text" placeholder="Enter your email...">
                                <button type="submit"><i class="fa fa-location-arrow"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="footer-widget">
                            <h4>Property City</h4>
                            <ul>
                                <li><i class="fa fa-caret-right"></i> <a href="#">Florida</a></li>
                                <li><i class="fa fa-caret-right"></i> <a href="#">New York</a></li>
                                <li><i class="fa fa-caret-right"></i> <a href="#">Washington</a></li>
                                <li><i class="fa fa-caret-right"></i> <a href="#">Los Angeles</a></li>
                            </ul>
                            <ul>
                                <li><i class="fa fa-caret-right"></i> <a href="#">St Louis</a></li>
                                <li><i class="fa fa-caret-right"></i> <a href="#">Jacksonville</a></li>
                                <li><i class="fa fa-caret-right"></i> <a href="#">San Jose</a></li>
                                <li><i class="fa fa-caret-right"></i> <a href="#">San Diego</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="footer-widget">
                            <h4>Social</h4>
                            <ul class="social">
                                <li><i class="ti-facebook"></i> <a href="#">Facebook</a></li>
                                <li><i class="ti-instagram"></i> <a href="#">Instagram</a></li>
                                <li><i class="ti-twitter-alt"></i> <a href="#">Twitter</a></li>
                                <li><i class="ti-google"></i> <a href="#">Google+</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="footer-widget">
                            <h4>Contact Us</h4>
                            <ul class="contact-option">
                                <li><i class="fa fa-map-marker"></i> 16 Creek Ave. Farming, NY</li>
                                <li><i class="fa fa-phone"></i> (+88) 666 121 4321</li>
                                <li><i class="fa fa-envelope"></i> info.colorlib@gmail.com</li>
                                <li><i class="fa fa-clock-o"></i> Mon - Sat, 08 AM - 06 PM</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-text">
                <p><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></p>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <script>
        $("#envoyer_message").click(function(){
            let id_maison = $("#id_maison").val();
            let nom = $("#nom").val();
            let telephone = $("#telephone").val();
            let email = $("#email").val();
            let message = $("#message").val();
            let action = "send_demand";

            $.ajax({
              url:'actions_clients.php',
              type:'post',
              data:{
                id_maison:id_maison,
                nom:nom,
                telephone:telephone,
                email:email,
                message:message,
                action:action
              },
              success : function(data){
                $("#result").html(data);
              }
            });

        });
    </script>
</body>

</html>