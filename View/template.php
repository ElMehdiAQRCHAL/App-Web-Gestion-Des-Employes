<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>ONEP Services</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/icon.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  
  <!-- Main Stylesheet File -->
  <link href="css/style_template.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: NewBiz
    Theme URL: https://bootstrapmade.com/newbiz-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

  <!--==========================
  Header
  ============================-->
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <h1 class="text-light"><a href="#header"><span>NewBiz</span></a></h1> -->
        <a href="#intro" class="scrollto"><img src="img/onepservices.png" alt="" class="img-fluid"></a>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="#intro">Accueil</a></li>
          <li><a href="#services">Fonctionnalité </a></li>
          <li><a href="#contact">Contactez-nous</a></li>
		   
        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container">

      <div class="intro-img">
        <img src="img/intro-img.svg" alt="" class="img-fluid">
      </div>

      <div class="intro-info">
		<h3>Bienvenue à notre application</h3></br>
        <div>
          <a href="index.php?action=login" class="btn-get-started scrollto">S'identifier</a>
          <a href="index.php?action=templet_register" class="btn-services scrollto">S'inscrire</a>
        </div>
      </div>

    </div>
  </section><!-- #intro -->

  <main id="main">

    
    </section><!-- #about -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services" class="section-bg">
      <div class="container">

        <header class="section-header">
          <h3>Fonctionnalité</h3>
          <p>notre site permet une communication entre les employeés et l'administration et facilite la demande et la réception des différents services administratifs.</p>
        </header>

        
    </section><!-- #services -->

   

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container-fluid">

        <div class="section-header">
          <h3>Contactez-nous</h3>
        </div>

        <div class="row wow fadeInUp">

          <div class="col-lg-6">
            <div class="map mb-4 mb-lg-0">
			
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3489.68299235696!2d-10.052365617692827!3d28.996763411487827!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe3843e84d3b7779b!2sONEE%2FBE!5e0!3m2!1sfr!2sma!4v1597523432031!5m2!1sfr!2sma" frameborder="0" style="border:0; width: 100%; height: 312px;" allowfullscreen></iframe>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="row">
              <div class="col-md-4 info">
                <i class="ion-ios-email-outline"></i>
                <p>admin@onep.ma</p>
              </div>
			  <div class="col-md-4 info">
                <i class="ion-ios-telephone-outline"></i>
                <p>0693294641</p>
              </div>
              
            </div>

            <div class="form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Entrez Votre Nom" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Entrez Votre Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Votre Sujet" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="Messege" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit" title="Send Message">Envoyer le message</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>ONEP SERVICES</strong>
      </div>
      <div class="credits">
        <p>Réalisé par : AQRCHAL EL-MEHDI</p>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
