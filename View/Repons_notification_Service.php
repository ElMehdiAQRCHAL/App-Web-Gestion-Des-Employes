<section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
             <h3 class="page-header"> <i class="fa fa-cog" aria-hidden="true"></i>Service</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php?action=<?= $action_Page ?>">Acceuil</a></li>
              <li><i class="icon_mail_alt" ></i>Email</li>
			<li> <i class="fa fa-cog" aria-hidden="true"></i>Service</li>
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
                  <form class="form-validate form-horizontal" method="POST" action="index.php?action=EnvoyerService&id_Service=<?=$id?>">
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Destinateur:</label>
                      <div class="col-lg-10">
						<input class="form-control" id="Destinateur" value="<?php echo $Service['0'].' '.$Service['1'];?>" type="text"  disabled>
                      </div>
                    </div>
                   
                    
                    <div class="form-group ">
                      <label for="cname" class="control-label col-lg-2">Date de création:</label>
                      <div class="col-lg-10">
                        <input class="form-control" id="date" name="date"  type="datetime" value='<?php echo $Service[2]; ?>' disabled  />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="ccomment" class="control-label col-lg-2" >Description:</label>
                      <div class="col-lg-10">
                        <textarea class="form-control " id="ccomment" name="Description" type="text" disabled ><?php echo $Service[3];?></textarea>
                      </div>
                    </div>
					
					
					  <div class="form-group ">
                      <label for="ccomment" class="control-label col-lg-2" >Répondre:</label>
                      <div class="col-lg-10">
                        <textarea class="form-control " id="ccomment" name="repons" type="text"  ></textarea>
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
   