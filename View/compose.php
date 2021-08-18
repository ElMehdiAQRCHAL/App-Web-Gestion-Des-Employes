  <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-reply-all" aria-hidden="true"></i> REPONDRE</h3>
            <ol class="breadcrumb">
               <li><i class="fa fa-home"></i><a href="index.php?action=<?= $action_Page ?>">Acceuil</a></li>
			   <li><i class="fa fa-envelope-open-o" aria-hidden="true"></i>Lire Email</li>
              <li><i class="fa fa-reply-all" aria-hidden="true"></i>Répondre</li>
            </ol>
          </div>
        </div

		<div class="col-sm-9 mail-w3agile">
                <section class="panel">
                    <header class="panel-heading-1 wht-bg-1">
                       <h4 class="gen-case">Répondre</h4>
                    </header>
                    <div class="panel-body">
                        <div class="compose-mail">
                            <form role="form-horizontal" method="POST" action="index.php?action=EnregisterHistorique&id=<?= $Mail['ID_I'] ?>">
                                <div class="form-group1">
                                    <label for="to" class="">À:</label>
                                    <input type="text" tabindex="1" id="to" class="form-control" value='<?php echo $Mail['nom']." ".$Mail['prenom'] ?>'>
                                </div>
								<div class="form-group1">
                                    <label for="subject" class="">Sujet:</label>
                                    <input type="text" tabindex="1" id="subject" class="form-control" value="<?= $Mail['Subject_I'] ?>">
                                </div>

                                <div class="compose-editor">
                                    <textarea class="wysihtml5 form-control" rows="9" name="Repons" ></textarea>
                                </div>
                                <div class="compose-btn">
                                    <button class="btn btn-primary btn-sm" href="index.php?action=EnregisterHistorique&id=<?= $Mail['ID_I'] ?>" ><i class="fa fa-check"></i> Envoyer </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </section>
            </div>
  </section>
  </section>
  