<section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-pencil" aria-hidden="true"></i>Incident</h3>
            <ol class="breadcrumb">
               <li><i class="fa fa-home"></i><a href="index.php?action=<?= $action_Page ?>">Acceuil</a></li>
              <li><i class="fa fa-history" aria-hidden="true"></i>Historique</li>
			  <li><i class="fa fa-pencil" aria-hidden="true"></i>Incident</li>
            </ol>
          </div>
        </div


	 

          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
               Historique
              </header>
              <table class="table table-striped table-advance table-hover">
                <tbody>
                    <tr>
						<th><i class="icon_profile"></i> Nom Prénom</th>
						<th><i class="icon_documents"></i> Sujet:Description</th>
					   <th><i class="fa fa-calendar"></i> Date de réponse</th>
					   <th><i class="icon_documents"></i> Réponse</th>
					   <th><i class="icon_cogs"></i> Action</th>
                  </tr>
				     <?php foreach ($Historique as $row){?>
                  <tr>
				  
                    <td class="mailbox-name"><?php echo $row['nom']." ".$row['prenom'] ?></td>
					
                    <td class="mailbox-subject"><b><?= substr($row['Subject_I'],0,20) ?>:&nbsp &nbsp </b><?= substr($row['Description_I'],0,20) ?>...</td>
					<td class="mailbox-attachment"><i class="fa fa-paperclip" aria-hidden="true"></i><?php echo ' '.$row['Date_Repons']; ?></td>
					<td class="mailbox-subject"><?= substr($row['Repons_I'],0,20) ?>...</td>
                     <td>
                      <a href="index.php?action=DetailEmail&id=<?=$row['ID_I']?>" data-toggle="modal" class="btn  btn-danger">
									  Détail
					   </a>
                    </td>
                  </tr>
				  <?php }?>
                </tbody>
              </table>
            </section>
          </div>
       
		</section>
    </section>
   
		
		
		
		
		
		
		

		