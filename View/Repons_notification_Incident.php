
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-pencil" aria-hidden="true"></i>Incident</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php?action=<?= $action_Page ?>">Acceuil</a></li>
              <li><i class="icon_mail_alt" ></i>Email</li>
			  <li><i class="fa fa-pencil" aria-hidden="true"></i>Incident</li>
			  <li><i class="fa fa-reply-all" aria-hidden="true"></i>Répondre</li>
            </ol>
          </div>
        </div
        <!-- Form validations -->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Répondre
              </header>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal" method="POST" action="index.php?action=affecterTechnicien&id=<?=$id?>">
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Destinateur:</label>
                      <div class="col-lg-10">
						<input class="form-control" id="Destinateur" value="<?php echo $incident['0'].' '.$incident['1'];?>" type="text"  disabled>
                      </div>
                    </div>
                    
                    
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Date de création:</label>
                      <div class="col-lg-10">
                        <input class="form-control" id="date" name="date"  type="datetime" value="<?php echo $incident[3];?> " disabled />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="ccomment" class="control-label col-lg-2" >Description:</label>
                      <div class="col-lg-10">
                        <textarea class="form-control " id="ccomment" name="Description" type="text" disabled ><?php echo $incident[4];?></textarea>
                      </div>
                    </div>
					
					 <div class="form-group ">
                      <label for="ccomment" class="control-label col-lg-2" >Technicien:</label>
                    <div class="col-lg-10">
					 
                      <select class="form-control" name="technicien">
							<?php  foreach ($technicien as $row){?> 
                                              <option value="<?= $row['2'] ?>"><?php echo $row['0'].' '.$row['1']; ?></option>
							<?php }  ?>
                       </select>
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

