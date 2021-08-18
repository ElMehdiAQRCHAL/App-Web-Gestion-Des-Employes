
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-book" aria-hidden="true"></i> Document</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php?action=<?= $action_Page ?>">Acceuil</a></li>
              <li><i class="fa fa-bell" aria-hidden="true"></i>Notification</li>
              <li><i class="fa fa-book" aria-hidden="true"></i>Document</li>
            </ol>
          </div>
        </div>

		 <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Demande
              </header>
              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class="icon_profile"></i> Nom Prénom</th>
					 <th><i class="fa fa-book" aria-hidden="true"></i> Document demandée</th>
                    <th><i class="fa fa-calendar"></i> Date de Création</th>
                    <th><i class="fa fa-cloud-download" aria-hidden="true"></i> Télécharger</th>
                  </tr>
				  <?php  foreach ($Document as $row){?> 
                  <tr>
				  
                    <td><?php echo $row['0']." ".$row['1'];?> </td>
                    <td><?php echo $row["2"];?></td>
                    <td><?php echo $row["3"];?></td>
                    <td><a href="<?php echo $row['file_url']; ?>"><?= $row['name'] ?></a></td>
                  </tr>
				  <?php } ?>
                </tbody>
              </table>
            </section>
          </div>
        </div>

      </section>
    </section>
   