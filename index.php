<?php 
    $title = "SCL";
    include('header.php') 
?>

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <?php
                $list_maisons = null;
                $list_maisonsLimit = null;

                $list_maisons = $model->getAllMaisons();
                $list_maisonsLimit = $model->getAllMaisonsLimit($limit = 4);
              
                if (!empty($list_maisonsLimit)) {
                  foreach($list_maisonsLimit as $res){ ?>
                      <div class="single-hero-item set-bg" data-setbg="img/properties/<?php echo $res['image'] ?>" width="100%">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 offset-lg-2">
                                    <div class="hero-text">
                                        <p class="room-location"><i class="icon_pin"></i> 9721 Glen Creek Ave. Ballston Spa, NY</p>
                                        <h2><?php echo $res['titre_annonce'] ?></h2>
                                        <div class="room-price">
                                            <span>Prix mensuel:</span>
                                            <p><?php echo $res['prix'] ?>$</p>
                                        </div>
                                        <ul class="room-features">
                                            <li>
                                                <i class="fa fa-arrows"></i>
                                                <p>Superficie: <?php echo ((!$res['surface'] == "")?$res['surface']:'-') ?> m²</p>
                                            </li>
                                            <li>
                                                <i class="fa fa-bed"></i>
                                                <p>Chambres: <?php echo ((!$res['chambre'] == "")?$res['chambre']:'-') ?> </p>
                                            </li>
                                            <li>
                                                <i class="fa fa-bath"></i>
                                                <p>Salle de bain: <?php echo ((!$res['douche'] == "")?$res['douche']:'-') ?></p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                       
                   
                  <?php  
                  } 
                }else{
                  echo'
                    <div class="text-center">
                        <h3>Aucune donné trouvée !</h3>
                    </div>
                  ';
                }
            ?>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Search Form Section Begin -->
    <div class="search-form">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="search-form-text">
                        <div class="search-text">
                            <i class="fa fa-search"></i>
                            Trouver une maison
                        </div>
                        <div class="home-text">
                            <i class="fa fa-home"></i>
                            Critères de recherche
                        </div>
                    </div>
                    <form action="#" class="filter-form">
                        <div class="first-row">
                            <select>
                                <option value="">Villa & Pool</option>
                            </select>
                            <select>
                                <option value="">Title</option>
                            </select>
                            <select>
                                <option value="">Ani City</option>
                            </select>
                            <select>
                                <option value="">Any Bithrooms</option>
                            </select>
                        </div>
                        <div class="second-row">
                            <select>
                                <option value="">Any Bedrooms</option>
                            </select>
                            <div class="price-range-wrap">
                                <div class="price-text">
                                    <label for="priceRange">Price:</label>
                                    <input type="text" id="priceRange" readonly>
                                </div>
                                <div id="price-range" class="slider"></div>
                            </div>
                            <div class="room-size-range">
                                <div class="price-text">
                                    <label for="roomsizeRange">Size:</label>
                                    <input type="text" id="roomsizeRange" readonly>
                                </div>
                                <div id="roomsize-range" class="slider"></div>
                            </div>
                            <button type="button" class="search-btn">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Form Section End -->


    <!-- Feature Section Begin -->
    <section class="top-properties-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Liste des maisons</span>
                        <h2>Meilleurs maisons pour vous </h2>
                    </div><a href="#" class="top-property-all">Afficher toutes les maisons</a>
                    
                </div>
            </div>
            <div class="row">
                <div class="feature-carousel owl-carousel">
                    <?php 
                        
                        $list_maisonsLimit = $model->getAllMaisonsLimit($limit = 8);
                      
                        if (!empty($list_maisonsLimit)) {
                            foreach($list_maisonsLimit as $res){
                    ?>
                        <a href="detail?id=<?php echo $res['id'] ?>">
                                <div class="col-lg-4">
                                    <div class="feature-item">
                                        <div class="fi-pic set-bg" data-setbg="img/properties/<?php echo $res['image'] ?>">
                                            <div class="pic-tag">
                                                <div class="f-text"><?php echo $res['categorie'] ?></div>
                                                <div class="s-text"><?php echo $res['prix'] ?> $</div>
                                            </div>
                                            <div class="feature-author">
                                                <div class="fa-pic">
                                                    <img src="img/feature/f-author-1.jpg" alt="">
                                                </div>
                                                <div class="fa-text">
                                                    <span>Rena Simmons</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fi-text">
                                            <div class="inside-text">
                                                <h4><?php echo $res['titre_annonce'] ?></h4>
                                                <ul>
                                                    <li><i class="fa fa-map-marker"></i> 180 York Road, London, UK</li>
                                                    <li><i class="fa fa-tag"></i> Villa</li>
                                                </ul>
                                                <h5 class="price"><?php echo $res['prix'] ?>$<span>/mois</span></h5>
                                            </div>
                                            <ul class="room-features">
                                            <li>
                                                <i class="fa fa-arrows"></i>
                                                <p><?php echo ((!$res['surface'] == "")?$res['surface']:'-') ?> m²</p>
                                            </li>
                                            <li>
                                                <i class="fa fa-bed"></i>
                                                <p><?php echo ((!$res['chambre'] == "")?$res['chambre']:'-') ?> </p>
                                            </li>
                                            <li>
                                                <i class="fa fa-bath"></i>
                                                <p><?php echo ((!$res['douche'] == "")?$res['douche']:'-') ?></p>
                                            </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                </a>
                    <?php  
                            } 
                        }else{
                        echo'
                            <div class="text-center">
                                <h3>Aucune donné trouvée !</h3>
                            </div>
                        ';
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Partner Carousel Section Begin -->
    <div class="partner-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Nos Partenaires</h2>
                    </div>
                </div>
            </div>
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
                            <p>Souscrivez aux newslette pour recevoir les notifications des nouvelles mises à jour.</p>
                            <form action="#" class="newslatter-form">
                                <input type="text" placeholder="Entrer votre email...">
                                <button type="submit"><i class="fa fa-location-arrow"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="footer-widget">
                            <h4>Ville Couvertes</h4>
                            <ul>
                                <li><i class="fa fa-caret-right"></i> <a href="#">Bukavu</a></li>
                                <li><i class="fa fa-caret-right"></i> <a href="#">Kamituga</a></li>
                                <li><i class="fa fa-caret-right"></i> <a href="#">Uvira</a></li>
                                <li><i class="fa fa-caret-right"></i> <a href="#">Goma</a></li>
                            </ul>
                            <ul>
                                <li><i class="fa fa-caret-right"></i> <a href="#">Kindu</a></li>
                                <li><i class="fa fa-caret-right"></i> <a href="#">Kisangani</a></li>
                                <li><i class="fa fa-caret-right"></i> <a href="#">Lubumbashi</a></li>
                                <li><i class="fa fa-caret-right"></i> <a href="#">Maniema</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="footer-widget">
                            <h4>Réseaux Sociaux</h4>
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
                            <h4>Nous Contacter</h4>
                            <ul class="contact-option">
                                <li><i class="fa fa-map-marker"></i> 16 Poste Ave. Bukavu, Ibanda</li>
                                <li><i class="fa fa-phone"></i> (+88) 666 121 4321</li>
                                <li><i class="fa fa-envelope"></i> info@scl.com</li>
                                <li><i class="fa fa-clock-o"></i> Mon - Sat, 08 AM - 06 PM</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-text">
                <p><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous drois réservés | Société de Commussion et Location</a>
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
</body>

</html>