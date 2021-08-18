
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
      
          <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-print" aria-hidden="true"></i>Imprimer</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php?action=<?= $action_Page ?>">Acceuil</a></li>
              <li><i class="icon_mail_alt" ></i>Email</li>
              <li><i class="fa fa-print" aria-hidden="true"></i>Imprimer</li>
		   </ol>
          </div>
        </div>
       
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Imprimer
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" method="POST" action="index.php?action=EnregisterFile"  enctype="multipart/form-data">
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Destinateur:</label>
                      <div class="col-lg-10">
						<input class="form-control" id="Destinateur" value="<?php echo $_SESSION['user'] ;?>" type="text"  disabled>
                      </div>
                    </div>
                  
				  
				   <div class="form-group ">
                      <label for="curl" class="control-label col-lg-2">Destinataire:</label>
                      <div class="col-lg-10">
                      <select class="form-control" name="Destinataire">
									
									<optgroup label = "Technicien">
											<?php  foreach ($Technicien as $row){?> 
                                              <option value="<?= $row[2] ?>"><?php echo $row[0].' '.$row[1]?></option>
											<?php } ?>
									</optgroup>
                                    </select>
                    </div>
                    </div>
                    
                   
					 <div class="form-group ">
                      <label for="ccomment" class="control-label col-lg-2" ></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="exampleInputFile" name="fichier" type="file"  />
                      </div>
                    </div>
					
					
					<div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <button class="btn btn-primary" type="submit">Envoyer</button>
                      </div>
                    </div>
                  </form>
                </div>

              </div>
  </section>
  </section>
  </section>

