
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-pencil" aria-hidden="true"></i>Incident</h3>
            <ol class="breadcrumb">
               <li><i class="fa fa-home"></i><a href="index.php?action=<?= $action_Page ?>">Acceuil</a></li>
              <li <i class="fa fa-bell" aria-hidden="true"></i>Notification</li>
              <li><i class="fa fa-pencil" aria-hidden="true"></i> Incident</li>
            </ol>
          </div>
        </div>
		
		<div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Incident
              </header>
              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    
					 
                    <th><i class="fa fa-calendar"></i> Date de Création</th>
                    <th><i class="icon_documents"></i> Description</th>
                    <th><i class="fa fa-reply-all" aria-hidden="true"></i> Réponse </th>
                  </tr>
				   <?php foreach ($incident as $row){?> 
                  <tr>
                   
                   
                    <td><?php echo $row["Date_creation"];?></td>
                    <td><?php echo $row["Description_I"];?></td>
                   
                       <td><?php echo $row["Repons_I"];?></td>
                   
                  </tr>
				   <?php } ?>
                </tbody>
              </table>
            </section>
          </div>
        </div>
      </section>
    </section>
   