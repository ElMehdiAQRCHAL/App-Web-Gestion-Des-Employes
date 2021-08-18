
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
	   <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-print" aria-hidden="true"></i>Imprimer</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php?action=<?= $action_Page ?>">Acceuil</a></li>
              <li> <i class="fa fa-history" aria-hidden="true"></i> Historique</li>
              <li><i class="fa fa-print" aria-hidden="true"></i> Imprimer</li>
            </ol>
          </div>
        </div>
	  
       <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                 Document Imprimé
              </header>
              <table class="table table-striped table-advance table-hover">
               <tbody>
                  <tr>
                    <th><i class="icon_profile"></i> Nom Prénom</th>
                    <th><i class="fa fa-calendar"></i> Date de réponse</th>
                    <th><i class="fa fa-print" aria-hidden="true"></i> Document Imprimé</th>
                  </tr>
				  <?php  foreach ($Document as $row){?> 
                  <tr>
                    <td><?php echo $row['0']." ".$row['1'];?> </td>
                    <td><?php echo $row["2"];?></td>
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
   