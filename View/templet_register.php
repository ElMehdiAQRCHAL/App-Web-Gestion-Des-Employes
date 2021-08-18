<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>S'inscrire</title>
  <link href="img/icon.png" rel="icon">
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style_login.css">
	
	
	
	
	
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
                 alert ("Error user " + xhr.status);
         }

    } 


   xhr.open( "GET", "index.php?action=testerUsername&user=" + document.myForm.user.value,  true); 

   xhr.send(null);

//************************* avec post, on devrait écrire: **************************************//***//

//***		xhr.open("POST", "testerUsername.php",  true);                                       //***//

//***           xhr.setRequestHeader("Content-Type", "application/x-www-form-urlenUsernamed");    //***//

//***  		xhr.send("Username=" + document.myForm.Username.value);                                                         //***//

//******************************************************************************************//***//




 
} 
</script>
	
	
	
	
	
	
	
</head>
<body>
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <img src="img/onepservices.png" style="margin-bottom:40px; ">
                        <form method="POST"  id="register-form" action="index.php?action=AjouterUtilisateur"  name = "myForm">
						    <div class="form-group">
                                <input type="text" name="user" id="user" placeholder="Nom d'utilisateur"  onBlur = "utiliserAjax(this.value);" required/><span id="ZoneAjax"></span> 
							</div>
                            <div class="form-group" >
                                <input type="text" name="name" id="name" placeholder="Nom" required// >
                            </div>
                            <div class="form-group">
                                <input type="text" name="prenom" id="prenom" placeholder="Prénom" required/>
                            </div>
							
							 <div class="form-group">
                                <input type="email" name="email" id="email" placeholder="nom@example.com" required/>
                            </div>
                            <div class="form-group">
                                <input type="password" name="pwd" id="pwd" placeholder="Mot de passe" required/>
                            </div>
                           
                            <div class="form-group">
								 <select style="height:30px; width:300px;" name="type_compte">
								<option>Employé</option>
                                <option>Technicien</option>
								
								
								
								</select>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="S'inscrire"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="img/signup-image.jpg" alt="sing up image" style="margin-top:30px"></figure>
                    </div>
                </div>
            </div>
        </section>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>