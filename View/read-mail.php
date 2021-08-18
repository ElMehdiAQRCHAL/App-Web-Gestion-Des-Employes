  <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-envelope-open-o" aria-hidden="true"></i>Lire Email</h3>
            <ol class="breadcrumb">
               <li><i class="fa fa-home"></i><a href="index.php?action=<?= $action_Page ?>">Acceuil</a></li>
              <li><i class="fa fa-envelope-open-o" aria-hidden="true"></i>Lire Email</li>
            </ol>
          </div>
        </div

		<div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Lire Email</h3>
            </div>
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5>Sujet:<?php echo $Mail['Subject_I']; ?></h5>
                <h6 style="font-size: 1.5rem;">De: <?php echo $Mail['nom']." ".$Mail['prenom'] ?>
                  <span class="mailbox-read-time float-right"><?php echo $Mail['Date_creation']; ?></span></h6>
              </div>
            
              <div class="mailbox-read-message">
                

                <p><?php echo $Mail['Description_I'];?></p>

               
               
              </div>
            </div>
			<div class="card-footer" style="background-color: #34aadcab;">
              <div class="float-right">
              <div class="float-right">
				<a class="btn btn-danger" href="index.php?action=ReponsMail&id=<?=$Mail['ID_I']?>" ><span <i class="fa fa-reply-all" aria-hidden="true"></i></span>  Répondre</a></td>
              </div>
            </div>
			</div>
			</div>
			</div>
  </section>
  </section>
  
  
  