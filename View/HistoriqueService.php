
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-cog" aria-hidden="true"></i>  Service</h3>
            <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php?action=<?= $action_Page ?>">Acceuil</a></li>
              <li> <i class="fa fa-history" aria-hidden="true"></i> Historique</li>
              <li> <i class="fa fa-cog" aria-hidden="true"></i>Service</li>
            </ol>
          </div>
        </div>


	 
	  <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Demande de Service
              </header>
              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class="icon_profile"></i> Nom Prénom</th>
                    <th><i class="icon_documents"></i> Description</th>
                    <th><i class="fa fa-reply-all" aria-hidden="true"></i> Réponse</th>
					<th><i class="fa fa-calendar"></i> Date de réponse </th>
					<th><i class="icon_cogs"></i> Action</th>
                  </tr>
				  <?php  foreach ($Service as $row){?> 
                  <tr>
				    <td><?php echo $row['0']." ".$row['1'];?></td>
                   
                    <td><?php echo substr($row["2"],0,10)."..."; ?></td>
					<td><?php echo substr($row["3"],0,10)."...";?></td>
					   
					   <td><?php echo $row["5"];?></td>
					
                    <td> 
						<a href="index.php?action=DetailServicePostHistorique&id_service=<?php echo $row["6"];?>" data-toggle="modal" class="btn  btn-danger">
									  Détail
					   </a>
				   </td>
                  </tr>
				  <?php } ?>
                </tbody>
              </table>
            </section>
          </div>
        </div>
		
		
		 
     </section>
    </section>
   