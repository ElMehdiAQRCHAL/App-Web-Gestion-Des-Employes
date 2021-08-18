  <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-history" aria-hidden="true"></i>Historique</h3>
            <ol class="breadcrumb">
               <li><i class="fa fa-home"></i><a href="index.php?action=Panel_Technicien">Home</a></li>
              <li><i class="fa fa-history" aria-hidden="true"></i>Historique</li>
            </ol>
          </div>
        </div

		<section class="panel">
               <header class="panel-heading">
                Incident
              </header>
              <table class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class="icon_profile"></i> Nom Prénom</th>
					 <th><i class="fa fa-university"></i> Numéro de Salle</th>
                    <th><i class="icon_cogs"></i> Technicien</th>
					<th><i class="fa fa-calendar"></i> temps écoulé</th>
					 <th><i class="icon_cogs"></i> Action</th>
                  </tr>
				  
				  <?php  $i=0 ; foreach ($historique as $row){?>
				  <tr>
				  <td><?php echo $row[0].' '.$row[1]; ?></td>
				  <td><?php echo $row[2]; ?></td>
				   <td><?php echo $row[5]; ?></td>
				   <td>
				   
				   <?php 
  
								// Declare and define two dates 
								$date1  = strtotime($row[8]);
								$date2 = strtotime($row[3]);
								  
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

								echo "depuis ".$hours.':'.$minutes.':'.$seconds; ?>
				   </td>
				   
				   
				   
				   
				   <td> 
                         <button type="button" class="btn  btn-danger editbtn" value="<?php echo $i ;?>" > Detail </button>
				   </td>
				   
				   
				    </tr>  
				  <?php } ?>				  
				   </tbody>
              </table>
		</section>
		
		
		<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editmodal" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <h4 class="modal-title">Form Tittle</h4>
                      </div>
                      <div class="modal-body">

                        <form role="form">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="destinateur" placeholder="Enter email" >
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
                          </div>
						  
						  
						  <div class="form-group">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea type="text" class="form-control" id="exampleInputPassword3" placeholder="Password"></textarea>
                          </div>
						  
                          <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" id="exampleInputFile3">
                            <input type="hidden" id="getid" name="id" >
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
		
		
		</section>
		</section>
		
		
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
		$(document).ready(function(){
			$('.editbtn').bind('click',function(event){
				$('#editmodal').modal('show');
				var array=<?php echo json_encode($historique);?>
				var row=array[$(this).val()]
				$('destinateur').val(row[0]);
				
				
		
			});
		});
		</script>
		