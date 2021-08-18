<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link href="img/icon.png" rel="icon">
  <title>Administrateur</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

<body>
 <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
	  <a href="index.html" class="logo">ONEP <span class="lite">Services</span></a>
      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/avatar1_small.png">
                            </span>
                            <span class="username"><?php if (isset($_SESSION["user"])) echo $_SESSION["user"]?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="index.php?action=Profile"><i class="icon_profile"></i> Mon Profil</a>
              </li>
              <li>
                <a href="index.php?action=deconnexion"><i class="icon_key_alt"></i> Se déconnecter</a>
              </li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
			<a href="index.php?action=Panel_Administrateur"><i class="icon_house_alt" ></i>Tableau de bord</a>
          </li>
		
		  <li class="sub-menu">
            <a href="javascript:;" class="">
                         <i class="fa fa-pencil" aria-hidden="true"></i>
                          <span>Demande</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a  href="index.php?action=document">document</a></li>
              <li><a  href="index.php?action=Service">Service</a></li>
			  <li><a  href="index.php?action=ImprimerDocument">Imprimer</a></li>
            </ul>
          </li>
		  
		  
		  <li class="sub-menu">
		  <a href="index.php?action=Incident_A"><i class="fa fa-pencil" aria-hidden="true"></i>Incident</a>
          </li>
		  
		  
		   <li class="sub-menu">
            <a href="javascript:;" class="">
                        <i class="icon_mail_alt" ></i>
                          <span>Email</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a  href="index.php?action=ListeIncident">Incident<span  class="notification" style="margin-left: 88px;"><?=$nbre_incident?></span></a></li>
              <li><a  href="index.php?action=ListeDemande">Demande<span class="notification" style="margin-left: 75px;"><?=$nbre_demande?></span></a></li>
              <li><a  href="index.php?action=NewUser">Utilisateur<span class="notification" style="margin-left: 73px;"><?=$nbre_utilisateur?></span></a></li>
            </ul>
          </li>
		  
		  
		   <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="fa fa-bell" aria-hidden="true"></i>
                          <span>Notification</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a  href="index.php?action=AfficherReponsDocument">document</a></li>
              <li><a  href="index.php?action=AfficherReponsService">Service</a></li>
			  <li><a  href="index.php?action=AfficherReponsImprimer">Imprimer</a></li>
            </ul>
          </li>
		 
		  
		  
		  <li class="sub-menu">
            <a href="javascript:;" class="">
                         <i class="fa fa-history" aria-hidden="true"></i>
                          <span>Historique</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
			  <li><a href="index.php?action=HistoriqueIncident">Incident</a></li>
              <li><a  href="index.php?action=HistoriqueDocument">Document</a></li>
              <li><a  href="index.php?action=HistoriqueService">Service</a></li>
            </ul>
          </li>
		  
          <li>
		  <a href="index.php?action=Profile"><i class="icon_profile"></i>Profil</a>
		  </li>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
	
	<?php echo $page; ?>

  <!-- container section start -->
	 <!-- javascripts -->
	  <script src="js/sweetalert.min.js"></script> <!-- SweetAlert-->
	<?php
     if(isset($_SESSION['status']) && isset($_SESSION['status'])!='')
	 {?>
		 <script type="text/javascript"> swal("<?php echo $_SESSION['status'];?>", "cliquer sur le bouton!", "<?php echo $_SESSION['status_code'] ;?>")</script>
	<?php unset($_SESSION['status']);}  ?>

  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
 
  <script src="js/owl.carousel.js"></script>
 
  <script src="js/scripts.js"></script>
  </body>

</html>

