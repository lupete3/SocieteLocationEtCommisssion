<?php 
    session_start();

    include('admin/model/Model.php');

    $model = new Model;

    
    $id = ((!empty($_SESSION['profile']['partenaire']['id']))?$_SESSION['profile']['partenaire']['id']:'');
    $username = ((!empty($_SESSION['profile']['partenaire']['login']))?$_SESSION['profile']['partenaire']['login']:'');
    $avatar = ((!empty($_SESSION['profile']['partenaire']['image']))?$_SESSION['profile']['partenaire']['image']:'');
    $telephone = ((!empty($_SESSION['profile']['partenaire']['telephone_partenaire']))?$_SESSION['profile']['partenaire']['telephone_partenaire']:'');
    $email = ((!empty($_SESSION['profile']['partenaire']['email_partenaire']))?$_SESSION['profile']['partenaire']['email_partenaire']:'');
    $type = ((!empty($_SESSION['profile']['partenaire']['type']))?$_SESSION['profile']['partenaire']['type']:'');

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Azenta Template">
    <meta name="keywords" content="Azenta, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title ?></title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>
        <div class="language-bar">
            <div class="language-option">
                <?php 
                    echo ((empty($type))?
                        '':
                        '<div class="language-option">
                            <img src="img/partner/'.(($avatar == "")?"user.png":$avatar).'" alt="" width="30px">
                            '.$username.' <i class="fa fa-angle-down"></i>
                            <div class="flag-dropdown">
                                <ul>
                                    <li><a href="'.(($type == "client")?"admin/client-app":"admin/bailleur-app").'">Tableau de bord</a></li>
                                    <li><a href="#">Profile</a></li>
                                    <li><a href="admin/model/deconnexion.php">Déconnexion</a></li>
                                </ul>
                            </div>
                        </div>');
                ?>
            </div>
            <div class="property-btn rounded">
                <?php 
                    echo ((!empty($type))?
                        '':
                        '<a href="admin/" class="property-sub" style="border-radius: 0px;">Connexion</a>');
                ?>
            </div>
        </div>
        <nav class="main-menu">
            <ul>
                <li class="active"><a href="./index">Accueil</a></li>
                <li><a href="./location">Location</a></li>
                <li><a href="./about">A propos</a></li>
                <li><a href="./contact">Contact</a></li>
            </ul>
        </nav>
        <div class="nav-logo-right">
            <ul>
                <li>
                    <i class="icon_phone"></i>
                    <div class="info-text">
                        <span>Phone:</span>
                        <p>(+12) 345 6789</p>
                    </div>
                </li>
                <li>
                    <i class="icon_map"></i>
                    <div class="info-text">
                        <span>Address:</span>
                        <p>16 Post Ave, <span>Ibanda</span></p>
                    </div>
                </li>
                <li>
                    <i class="icon_mail"></i>
                    <div class="info-text">
                        <span>Email:</span>
                        <p>Info@scl.com</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- Offcanvas Menu Section End -->
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="top-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <nav class="main-menu">
                            <ul>
                                <li class="active"><a href="./index">Accueil</a></li>
                                <li><a href="./location">Location</a></li>
                                <li><a href="./about">A propos</a></li>
                                <!-- <li><a href="./blog.html">News</a></li> -->
                                <!-- <li><a href="./property-details.html">Pages</a></li> -->
                                <li><a href="./contact">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-5">
                        <div class="top-right">
                            <?php 
                                echo ((empty($type))?
                                '':
                                '<div class="language-option text-white">
                                    <img src="img/partner/'.(($avatar == "")?"user.png":$avatar).'" alt="" width="30px">
                                    '.$username.' <i class="fa fa-angle-down"></i>
                                    <div class="flag-dropdown">
                                        <ul>
                                            <li><a href="'.(($type == "client")?"admin/client-app":"admin/bailleur-app").'">Tableau de bord</a></li>
                                            <li><a href="#">Profile</a></li>
                                            <li><a href="admin/model/deconnexion.php">Déconnexion</a></li>
                                        </ul>
                                    </div>
                                </div>');
                            ?>
                            <?php 
                                echo ((!empty($type))?
                                '':
                                '<a href="admin/" class="property-sub" style="border-radius: 0px;">Connexion</a>');
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-logo">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="logo">
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="nav-logo-right">
                            <ul>
                                <li>
                                    <i class="icon_phone"></i>
                                    <div class="info-text">
                                        <span>Phone:</span>
                                        <p>(+12) 345 6789</p>
                                    </div>
                                </li>
                                <li>
                                    <i class="icon_map"></i>
                                    <div class="info-text">
                                        <span>Address:</span>
                                        <p>16 Poste Ave, <span>Ibanda</span></p>
                                    </div>
                                </li>
                                <li>
                                    <i class="icon_mail"></i>
                                    <div class="info-text">
                                        <span>Email:</span>
                                        <p>Info@scl.com</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->