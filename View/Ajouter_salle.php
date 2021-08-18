<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> <!-- SweetAlert-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
 <section id="main-content">
      <section class="wrapper">
	  <div class="row">
           <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Ajouter salle</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php?action=Panel_Administrateur">Home</a></li>
              <li><i class="fa fa-university"></i>Ajouter Salle</li>
            </ol>
          </div>
        </div>
        </div>
    
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Nouvelle salle</h2>
                    <form action="index.php?action=Enregistrer_salle" method="POST">
                        <div class="input-group">
                            <input class="input--style-11" type="text" placeholder="Numéro" name="numero">
                        </div>
                        
                             <div class="input-group">
                            <input class="input--style-11" type="text" placeholder="Capacité" name="capacite">
							</div>
                     
                        
                        
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        
    </div>
	</section>
	</section>
    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
   
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
