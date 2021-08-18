
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
		<div class="row" >
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-md"></i>Profil</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php?action=<?= $action_Page ?>">Acceuil</a></li>
              <li><i class="fa fa-user-md"></i>Profil</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <!-- profile-widget -->
          <div class="col-lg-12" style="  padding-left: 6px; padding-right: 6px;">
            <div class="profile-widget profile-widget-info"  style="margin-left:20px; margin-right:20px;">
              <div class="panel-body"  style="background-color:red;">
                <div class="col-lg-2 col-sm-2">
                  <h4><?= $utilisateur["username"] ?></h4>
                  <div class="follow-ava">
                    <img src="img/avatar1_small.png" alt="">
                  </div>
                  <h6><?= $utilisateur["compte"] ?></h6>
                </div>
             
              </div>
            </div>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading tab-bg-info" style="background-color:red;" >
                <ul class="nav nav-tabs">
                  <li class="active">
                    <a data-toggle="tab" href="#recent-activity">
                                          <i class="icon-home"></i>
                                          Profil
                                      </a>
                  </li>
                 
                  <li class="">
                    <a data-toggle="tab" href="#edit-profile">
                                          <i class="icon-envelope"></i>
                                          Editer le profil
                                      </a>
                  </li>
                </ul>
              </header>
              <div class="panel-body">
                <div class="tab-content">
                  <div id="recent-activity" class="tab-pane active"  >
                    <div class="profile-activity" >
                      <div class="act-time">
                        <div class="activity-body act-in">
                          <span class="arrow"></span>
                           <div class="panel-body bio-graph-info">
                        <h1>Biographie</h1>
                        <div class="row">
                          <div class="bio-row">
                            <p><span>Nom</span>: <?= $utilisateur["nom"] ?> </p>
                          </div>
                          <div class="bio-row">
                            <p><span>Prénom</span>: <?= $utilisateur["prenom"] ?></p>
                          </div>
                          <div class="bio-row">
                            <p><span>Utilisateur</span>: <?= $utilisateur["username"] ?></p>
                          </div>
                          <div class="bio-row">
                            <p><span>Email </span>: <?= $utilisateur["email"] ?></p>
                          </div>
                        </div>
                      </div>
                        </div>
                      </div>
                     
                    </div>
                  </div>
                  
                  <!-- edit-profile -->
                  <div id="edit-profile" class="tab-pane">
                    <section class="panel">
                      <div class="panel-body bio-graph-info">
                        <h1> Informations sur le profil</h1>
                        <form method="POST" class="form-horizontal"  action="index.php?action=modifier_Info&user=<?= $utilisateur["username"] ?>">
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Nom d'utilisateur:</label>
                            <div class="col-lg-10">
                              <input type="text" class="form-control" name="User"  value=<?= $utilisateur["username"] ?>>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Nom:</label>
                            <div class="col-lg-10">
                              <input type="text" class="form-control" name="nom" value=<?= $utilisateur["nom"] ?>>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Prénom:</label>
                            <div class="col-lg-10">
                              <input type="text" class="form-control" name="prenom"  value=<?= $utilisateur["prenom"] ?>>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Email:</label>
                            <div class="col-lg-10">
                              <input type="email" class="form-control" name="email" value=<?= $utilisateur["email"] ?>>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Mot de passe:</label>
                            <div class="col-lg-10">
                              <input type="passe" class="form-control" name="pwd" value=<?= $utilisateur["pwd"] ?>>
                            </div>
                          </div>

                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
    <!--main content end-->
  </section>
  </section>
  <!-- container section start -->