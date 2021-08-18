
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
     
		<div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-book" aria-hidden="true"></i> Document</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php?action=<?= $action_Page ?>">Acceuil</a></li>
              <li><i class="fa fa-pencil" aria-hidden="true"></i> Demande</li>
              <li><i class="fa fa-book" aria-hidden="true"></i>Document</li>
            </ol>
          </div>
        </div>
		
		
        <!-- Form validations -->
      <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Demande de document
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" id="feedback_form" method="POST" action="index.php?action=Enregistrer_Document" >
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Destinateur:</label>
                      <div class="col-lg-10">
						<input class="form-control" id="Destinateur" type="text" value=<?=$_SESSION["user"]?>  name="destinateur" disabled>
                      </div>
                    </div>
				
				<div class="form-group ">
                      <label for="curl" class="control-label col-lg-2">Destinataire:</label>
                      <div class="col-lg-10">
                      <select class="form-control" name="Destinataire">
									
									<optgroup label = "Administrateur">
											<?php  foreach ($Administrateur as $row){?> 
                                              <option value="<?= $row[2] ?>"><?php echo $row[0].' '.$row[1]?></option>
											<?php } ?>
									</optgroup>
                  <optgroup label = "Employé">
                      <?php  foreach ($Utilisateur as $row){?> 
                                              <option value="<?= $row[5] ?>"><?php echo $row[3].' '.$row[4]?></option>
                      <?php } ?>
                  </optgroup>
                                    </select>
                    </div>
                    </div>
			
					<div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Document demandé:</label>
                      <div class="col-lg-10">
						<input class="form-control" id="document" type="text" name="document" required>
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
                        <button class="btn btn-primary" href="index.php?action=Enregistrer_Document" >Envoyer</button>
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

