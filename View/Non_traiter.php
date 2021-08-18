  <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-cog fa-spin fa-3x fa-fw"></i>En cous d'exécution</h3>
            <ol class="breadcrumb">
               <li><i class="fa fa-home"></i><a href="index.php?action=<?= $action_Page ?>">Acceuil</a></li>
              <li><i class="fa fa-cog fa-spin fa-3x fa-fw"></i>En cous d'exécution</li>
            </ol>
          </div>
        </div

	
		 <div class="col-lg-12" >
            <section class="panel">
              <header class="panel-heading">
                Incident
              </header>
              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class="icon_profile"></i> Nom Prénom</th>
					<th><i class="icon_profile"></i> Technicien</th>
					<th><i class="fa fa-university"></i> Numéro de Salle</th>
					<th><i class="icon_documents"></i> Description</th>
                    <th><i class="fa fa-calendar"></i> temps écoulé</th>
                  </tr> 
				   <?php foreach ($non_traiter as $row){?>
				   <tr>
				   <td><?php  echo $row[0].' '.$row[1] ;?></td>
				   <td><?php  echo $row[2];?></td>
				   <td><?php  echo $row[3];?></td>
				   <td><?php  echo substr($row[4],0,20)."...";?></td>
				   <td><i class="fa fa-paperclip" aria-hidden="true"></i>
				   
				   <?php 
  
								// Declare and define two dates 
								$date1  = time();
								$date2 = strtotime($row[5]);
								  
								// Formulate the Difference between two dates 
								$diff = abs($date2 - $date1);  
								  
								  
								// To get the year divide the resultant date into 
								// total seconds in a year (365*60*60*24) 
								$years = floor($diff / (365*60*60*24));  
								  
								  
								// To get the month, subtract it with years and 
								// divide the resultant date into 
								// total seconds in a month (30*60*60*24) 
								$months = floor(($diff - $years * 365*60*60*24) 
															   / (30*60*60*24));  
								  
								  
								// To get the day, subtract it with years and  
								// months and divide the resultant date into 
								// total seconds in a days (60*60*24) 
								$days = floor(($diff - $years * 365*60*60*24 -  
											 $months*30*60*60*24)/ (60*60*24)); 
								  
								  
								// To get the hour, subtract it with years,  
								// months & seconds and divide the resultant 
								// date into total seconds in a hours (60*60) 
								$hours = floor(($diff - $years * 365*60*60*24  
									   - $months*30*60*60*24 - $days*60*60*24) 
																   / (60*60));  
								  
								  
								// To get the minutes, subtract it with years, 
								// months, seconds and hours and divide the  
								// resultant date into total seconds i.e. 60 
								$minutes = floor(($diff - $years * 365*60*60*24  
										 - $months*30*60*60*24 - $days*60*60*24  
														  - $hours*60*60)/ 60);  
								  
								  
								// To get the minutes, subtract it with years, 
								// months, seconds, hours and minutes  
								$seconds = floor(($diff - $years * 365*60*60*24  
										 - $months*30*60*60*24 - $days*60*60*24 
												- $hours*60*60 - $minutes*60)); 

								echo $hours.'h:'.$minutes.'m:'.$seconds.'s'; ?>
				   </td>
				   </tr>
				   <?php } ?>
				  </tbody>
                </table>
	 </section>
          </div>
     
		
		</section>
		</section>
		