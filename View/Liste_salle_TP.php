<section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-list" aria-hidden="true"></i>Lister</h3>
            <ol class="breadcrumb">
               <li><i class="fa fa-home"></i><a href="index.php?action=<?= $action_Page ?>">Acceuil</a></li>
              <li><i class="fa fa-list" aria-hidden="true"></i>Lister</li>
			  <li><i class="fa fa-university" aria-hidden="true"></i>Salle</li>
            </ol>
          </div>
        </div

		
          <div class="col-lg-12" >
            <section class="panel">
			<div class='card'>
			<div  align="right" class="card-body">
			<button type="button" class="btn class="btn btn-danger" data-toggle="modal" data-target="#myModal"  style="background-color: #6f3d3d;color: #ffffff;">
			<span><i class="fa fa-plus-square-o" aria-hidden="true"></i><span>  Ajouter
			</button>
			
			<div class="nav search-row" id="top_menu">
				<!--  search form start -->
				<ul class="nav top-menu">
				  <li>
					<form class="navbar-form" role="form" action="index.php?action=Liste_salle_TP" method="POST">
					  <input name="search" class="form-control" placeholder="chercher" type="text">
					</form>
				  </li>
				</ul>
				<!--  search form end -->
		    </div>
			</div>
			</div>
              
              <table  id="dtBasicExample" class="table table-striped table-advance table-hover">
                <tbody>
                  <tr>
                    <th><i class="fa fa-university" aria-hidden="true"></i> Numéro</th>
					<th><i class="fa fa-users" aria-hidden="true"></i> Capacité</th>
					<th><i class="fa fa-laptop" aria-hidden="true"></i> Nombre d'équipement</th>
					<th><i class="icon_cogs" ></i> Action</th>
                  </tr>
				 <?php  foreach ($Salle as $row){?> 
                      <tr>
				  <td><?php echo $row[0];?></td>
				  <td><?php echo $row[1];?></td>
				  <td><?php echo $row[2];?></td>
				 
				<td>
				<button type="button" class="btn btn-danger deletebtn"  style="padding-left: 10px;padding-right: 10px;"><span><i class="fa fa-trash-o" aria-hidden="true"></i></span> Supprimer</button>
				</td>
				
				  </tr>  
				   <?php } ?>
				 			  
				   </tbody>
              </table>
	 </section>
          </div>
     
		
	
		 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
                        <h4 class="modal-title">Ajouter Salle</h4>
                      </div>
                      <div class="modal-body">

                        <form role="form" action="index.php?action=Ajouter_Salle_TP" method="POST" name = "myForm">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Numéro</label>
                            <input type="text" class="form-control" name="numero" placeholder="Numéro" onBlur = "utiliserAjax(this.value);" required/><span id="ZoneAjax"></span> 
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Capacité</label>
                            <input type="text" class="form-control" name="capacite" placeholder="Capacité" required>
                          </div>
						  <div class="form-group">
                            <label for="exampleInputPassword1">Nombre d'équipement</label>
                            <input type="text" class="form-control" name="nbre_equipement" placeholder="Nombre d'équipement" required>
                          </div>
						
                          <button type="submit" class="btn btn-primary ">Envoyer</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
               
				
				
				
				
				 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="deletmodal" class="modal fade">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">x</button>
                        <h4 class="modal-title">Supprimer Salle</h4>
                      </div>
                      <div class="modal-body">

                        <form role="form" action="index.php?action=Supprimer_SalleTP" method="POST"  >
                            <div class="form-group">
								<input type="hidden" name="delete_user" id="delete_user">
								<h4>Voulez-vous supprimer ce Salle</h4>
							</div>
							<div class="modal-footer">
							  <button type="button" class="btn btn-secondary" data-dismiss="modal" >Non</button>
							  <button type="submit" name="deletedata" class="btn btn-primary">Oui Supprime-le</button>
						    </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
               
				
		</section>
		</section>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		
		<script>
		$(document).ready(function(){
			$('.deletebtn').on('click',function(){
				$('#deletmodal').modal('show');
				$tr=$(this).closest('tr');
				var data = $tr.children("td").map(function(){
					return $(this).text();
				}).get();
				console.log(data);
				$('#delete_user').val(data[0]);
			});
		});
		</script>
		
		<script>
		$(document).ready(function(){
			$('.deletebtn').on('click',function(){
				$('#deletmodal').modal('show');
				$tr=$(this).closest('tr');
				var data = $tr.children("td").map(function(){
					return $(this).text();
				}).get();
				console.log(data);
				$('#delete_user').val(data[1]);
			});
		});
		</script>
		
			<script>
			function utiliserAjax(str)
			{ 
			  

			//*******************  afficher une Annimation  ********************************//***//

			document.getElementById("ZoneAjax").innerHTML=  "<img src = 'img/ajax-loader.gif' />";      //***//

			//****************************************************************************//***//


			/**************** Créer un objet XMLHttpRequest /********************************
			/********************************************************************************
			*********************************************************************************/
			 var xhr; 
				try {  xhr = new ActiveXObject('Msxml2.XMLHTTP');   }
				catch (e) 
				{
					try {   xhr = new ActiveXObject('Microsoft.XMLHTTP');    }
					catch (e2) 
					{
					  try {  xhr = new XMLHttpRequest();      }
					  catch (e3) {  xhr = false;   }
					}
				 }




			//*************************** Attendre la réception de la réponse,
			//*************************** quand elle est prête (readyState = 4) 
			//*************************** et sans erreurs (status = 200), 
			//*************************** on consomme le texte reçu (responseText)
			//***************************



			 
				xhr.onreadystatechange  = function()

				{ 
					 if(xhr.readyState  == 4)
					 {
						  if(xhr.status  == 200)
			 
							 document.getElementById("ZoneAjax").innerHTML=  xhr.responseText;
						  else 
							 alert ("Error Username " + xhr.status);
					 }

				} 


			   xhr.open( "GET", "index.php?action=testerSalleTP&numero=" + document.myForm.numero.value,  true); 

			   xhr.send(null);

			//************************* avec post, on devrait écrire: **************************************//***//

			//***		xhr.open("POST", "testerUsername.php",  true);                                       //***//

			//***           xhr.setRequestHeader("Content-Type", "application/x-www-form-urlenUsernamed");    //***//

			//***  		xhr.send("Username=" + document.myForm.Username.value);                                                         //***//

			//******************************************************************************************//***//




			 
			} 
			</script>
					