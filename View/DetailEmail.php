<section id="main-content">
      <section class="wrapper">
        <!--overview start-->
      
          <div class="row">
       <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-history" aria-hidden="true"></i>Historique</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php?action=<?= $action_Page ?>">Acceuil</a></li>
              <li><i class="fa fa-history" aria-hidden="true"></i>Historique</li>
			  <li><i class="fa fa-pencil" aria-hidden="true"></i>Incident</li>
			   <li><i class="fa fa-info-circle" ></i>Détail</li>
            </ol>
          </div>
        </div>
      
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Détail de l'incident
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" >
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Destinateur:</label>
                      <div class="col-lg-10">
						<input class="form-control" id="Destinateur" value="<?php echo $row['nom']." ".$row['prenom'];?>" type="text"  disabled>
                      </div>
                    </div>
					
					
					
					
                    <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-2" >Date de création:</label>
                      <div class="col-lg-10">
                        <input class="form-control "  type="datime" name="date de creation" value="<?php echo $row["3"];?>" type="text" disabled />
                      </div>
                    </div>
              
                    <div class="form-group ">
                      <label for="ccomment" class="control-label col-lg-2" >Description:</label>
                      <div class="col-lg-10">
                        <textarea class="form-control " name="Description" type="text" disabled ><?php echo $row["4"]; ?></textarea>
                      </div>
                    </div>
					
					<div class="form-group ">
                      <label for="ccomment" class="control-label col-lg-2" >Réponse:</label>
                      <div class="col-lg-10">
                        <textarea class="form-control " name="Repons" type="text" disabled ><?php echo $row["6"];?></textarea>
                      </div>
                    </div>
					 <div class="form-group ">
                      <label for="cemail" class="control-label col-lg-2" >Date de Réponse:</label>
                      <div class="col-lg-10">
                        <input class="form-control "  type="datime"  value="<?php echo $row["8"];?>" type="text" disabled />
                      </div>
                    </div>
		            <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
					  
					  <a href="index.php?action=Afficher_historique" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Retour </a>

                      </div>
                    </div>
					
					
					
                    
                  </form>
                </div>
              </div>
  </section>
  </section>
  </section>

