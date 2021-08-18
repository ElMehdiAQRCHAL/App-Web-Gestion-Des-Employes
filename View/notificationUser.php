
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"> <i class="fa fa-users" aria-hidden="true"></i>Utilisateur</h3>
            <ol class="breadcrumb">
               <li><i class="fa fa-home"></i><a href="index.php?action=<?= $action_Page ?>">Acceuil</a></li>
              <li><i class="icon_mail_alt" ></i>Email</li>
              <li><i class="fa fa-users" aria-hidden="true"></i>Utilisateur</li>
            </ol>
          </div>
        </div>
		
		
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Nouveau utilisateur
              </header>
              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
				  
                    <th><i class="icon_profile"></i> Nom préno,</th>
					 <th><i class="icon_profile"></i> Nom d'utilisateur</th>
                    <th><i class="icon_mail_alt"></i> Email</th>
                    <th><i class="icon_mobile"></i> Compte</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
				   <?php  foreach ($utilisateur as $row){?> 
                  <tr>
                    <td><?php echo $row[0]." ".$row[1] ?></td>
                    <td><?php echo $row[2] ?> </td>
                    <td><?php echo $row[3] ?></td>
                    <td><?php echo $row[5] ?></td>
                    <td>
                      <div class="btn-group">
						
                        <a class="btn btn-success" href="index.php?action=confirmerUser&username=<?=$row[2]?>"><i class="icon_check_alt2"></i></a>
                        <a class="btn btn-danger" href="index.php?action=supprimerUser&username=<?=$row[2]?>"><i class="icon_close_alt2"></i></a>
						
                      </div>
                    </td>
				   </tr><?php }?>
				  </tr>
                </tbody>
              </table>
            </section>
          </div>
        </div>
      </section>
    </section>
   