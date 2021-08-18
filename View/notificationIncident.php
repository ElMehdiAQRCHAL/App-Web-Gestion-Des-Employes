
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-pencil" aria-hidden="true"></i>Incident</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.php?action=<?= $action_Page ?>">Acceuil</a></li>
              <li><i class="icon_mail_alt" ></i>Email</li>
              <li><i class="fa fa-pencil" aria-hidden="true"></i>Incident</li>
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
                    <th><i class="icon_profile"></i> Nom Prénom</th>
					 <th><i class="fa fa-university"></i> Salle demandée</th>
                    <th><i class="fa fa-calendar"></i> Date de Création</th>
                    <th><i class="icon_documents"></i> Description</th>
                    <th><i class="icon_cogs"></i> Action</th>
                  </tr>
				   <?php foreach ($incident as $row){?> 
                  <tr>
                    <td><?php echo $row['0']." ".$row['1'];?></td>
                    <td><?php echo $row["2"];?></td>
                    <td><?php echo $row["3"];?></td>
                    <td><?php echo substr($row["4"],0,10)."...";?></td>
                    <td>
                      <div class="btn-group">
					    <input type="button" onclick="window.location.href ='index.php?action=ReponsIncident&id_Incident=<?= $row[5] ?>';" value="Répondre
						" class="btn btn-primary" style="width:110px;"/>
                      </div>
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
   