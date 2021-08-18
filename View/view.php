<?php

function Afficheview($filenom){
	require("View/".$filenom.".php") ;
}



function afficherVue($file,array $data=array()){

	if (file_exists("View/".$file.".php")) {
				$compte=getCompte($_SESSION["user"]);
				switch($compte[0]){
				case "Technicien":
							extract($data);
							ob_start();
							$action_Page='Panel_Technicien';
							require ("View/".$file.".php");
							$page = ob_get_clean();
							
							$nbre_document=nbre_Impriment()[0];
							$nbre_email=getnbreEmail()[0];
							include ("View/Panel_T.php");	
							break;	
				case "Administrateur":
							extract($data);
							ob_start();
							$action_Page='Panel_Administrateur';
							require ("View/".$file.".php");
							$page = ob_get_clean();
							$nbre_utilisateur = nbre_Utilisateur()[0];
							$nbre_demande=nbre_Demande()[0]+ nbre_Service()[0]+nbre_Document()[0];
							$nbre_incident=nbre_Incident()[0];
							include ("View/Panel_A.php");
							break;
				default :
							extract($data);
							ob_start();
							$action_Page='Panel_Utilisateur';
							require ("View/".$file.".php");
							$page = ob_get_clean();
							$nbre_document=nbre_Document()[0];
							$nbre_service=nbre_Service()[0];
							include ("View/Panel_P.php");	
							break;
						}
			
				
	}
	else {
				throw new Exception("Fichier '$file.php' introuvable");
	}
}
?>