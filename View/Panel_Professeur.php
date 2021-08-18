
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
  
		  <div class="row">
          <div class="col-lg-12">
             <h3 class="page-header"><i class="fa fa-laptop"></i> Tableau de bord</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php?action=<?= $action_Page ?>">Acceuil</a></li>
              <li><i class="fa fa-laptop"></i>Tableau de bord</li>
            </ol>
          </div>
        </div
     
		 <div class="row" >
			  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<div class="info-box blue-bg" style="background-color: #a9b71c;">
				 <i class="fa fa-pencil" aria-hidden="true"></i>
				  <div class="count"><?=$nbre_Incident[0]?></div>
				  <div class="title">Création d'Incident</div>
				</div>
				<!--/.info-box-->
			  </div>
			 			  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<div class="info-box brown-bg" style="background-color: #5a805c;">
				 <i class="fa fa-cog" aria-hidden="true"></i>
				  <div class="count"><?= $nbre_Service[0]?></div>
				  <div class="title">Demande Service</div>
				</div>
				<!--/.info-box-->
			  </div>
			  
			  
			  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<div class="info-box blue-bg">
				<i class="fa fa-book" aria-hidden="true"></i>
				  <div class="count"><?=$nbre_document[0]?></div>
				  <div class="title">Demande Document</div>
				</div>
				<!--/.info-box-->
			  </div>
			  
			  </div>
		</section>
  </section>
 