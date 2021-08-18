
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-pencil" aria-hidden="true"></i> Demande</h3>
            <ol class="breadcrumb">
               <li><i class="fa fa-home"></i><a href="index.php?action=<?= $action_Page ?>">Acceuil</a></li>
              <li><i class="fa fa-pencil" aria-hidden="true"></i>Demande</li>
            </ol>
          </div>
        </div
        <!-- Form validations -->
      <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Création de la demande
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="index.php?action=Enregistrer_Demande">
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Destinateur:</label>
                      <div class="col-lg-10">
						<input class="form-control" id="Destinateur" type="text" value=<?=$_SESSION["user"]?>  name="destinateur" disabled>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="curl" class="control-label col-lg-2">Destinataire</label>
                      <div class="col-lg-10">
                      <select class="form-control" name="Destinataire">
											<?php  foreach ($Professeur as $row){?> 
                                              <option value=<?php echo $row[2];?>><?php echo $row[0].' '.$row[1] ;?></option>
											<?php } ?>
                      </select>
                    </div>
                    </div>
                    <div class="form-group ">
                      <label for="ccomment" class="control-label col-lg-2">Description:</label>
                      <div class="col-lg-10">
                        <textarea class="form-control " id="ccomment" name="Description" required></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" href="index.php?action=Enregistrer_Demande" >Envoyer</button>
                        <button class="btn btn-default" type="button">Annuler</button>
                      </div>
                    </div>
                  </form>
                </div>

              </div>
            
    <!--main content end-->
  </section>
  </section>
  </section>

