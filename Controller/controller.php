
<?php
function AfficheTemplet($filenom){
	Afficheview($filenom);
}

function authentifierUser($data){
	if(!empty($data["username"]) && !empty($data["pwd"])){
			if(getloginuser($data["username"],$data["pwd"])){
			$_SESSION["user"]=$data["username"];
			$compte=getCompte($data["username"]);
			switch($compte[0]){
				case "Technicien":
								header("location:index.php?action=Panel_Technicien");
								break;
				case "Administrateur":
								header("location:index.php?action=Panel_Administrateur");
								break;
				Default :
								header("location:index.php?action=Panel_Utilisateur");
								break;
			}
			
		}elseif(loginNotConfirmer($data["username"],$data["pwd"])){
			header("location:index.php?action=Confirmation_user");
		}else{
			header("location:index.php?action=login"); 
			}
	}
	else{
		header("location:index.php?action=login"); 
		echo '<script type="text/javascript">';
		echo ' alert("Veuillez remplir tous les champs ")';  //not showing an alert box.
        echo '</script>';
		
		//header("location:index.php?action=login");
	}
}

function AjouterUtilisateur($data){
		if(ajouter_utilisateur($data)){
			header("location:index.php?action=Confirmation_user");
		}else{
			header("location:index.php?action=template");
		}
}

function detail($Profile){
	if(!empty($_SESSION['user'])){
	$data["utilisateur"] = getInfo($_SESSION["user"]);
	afficherVue($Profile,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}

function Demande($Demande){
	if(!empty($_SESSION['user'])){
	$data["Salle"] = GetListeSalle();
	$data["Salle_TP"] = GetListeSalle_TP();
	afficherVue($Demande,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}

function Incident($Panel_Incident){
	if(!empty($_SESSION['user'])){
	$data["Salle"] = GetListeSalle();
	$data["Salle_TP"] = GetListeSalle_TP();
	afficherVue($Panel_Incident,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}

function modifier($user,$data){
	if(!empty($_SESSION['user'])){
		modifier_Info($data,$user);
		$_SESSION["user"]=$data['User'];
		detail('Profile');
	}else{
		header("location:index.php?action=login"); 
	}
}

function Enregistrer_Demande_S($data){
	if(!empty($_SESSION['user'])){
	Enregistrer_Data_DS($data);
	header("location: index.php?action=Demande");
	}else{
		header("location:index.php?action=login"); 
	}
}

function afficherPanel_A($fichier){
	if(!empty($_SESSION['user'])){
	$data['nbre_Service']=nbre_Service_Creer()[0];
    $data['nbre_document']=nbre_Document_Creer()[0];
	$data['nbre_Incident']=nbre_Incident_Creer()[0];
	$data["nbre_utilisateur"]=getnbre_user();
	$data["nbre_Salle"]=getnbre_salle();
	$data["nbre_Salle_TP"]=getnbre_salle_TP();
	AfficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}

function afficherPanel_T($fichier){
	if(!empty($_SESSION['user'])){
	$data["nbre_email"]=getnbre_email();
	$data["DocumentImprimer"]=getNbreDocumentImprimer();
	AfficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}


function afficherPanel_D($fichier){
	if(!empty($_SESSION['user'])){
	$data['nbre_Service']=nbre_Service_Creer()[0];
    $data['nbre_demande']=nbre_Demande_Creer()[0];
    $data['nbre_document']=nbre_Document_Creer()[0];
	$data['nbre_Incident']=nbre_Incident_Creer()[0];
	AfficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}


function Enregistrer_Incident($data){
	if(!empty($_SESSION['user'])){
	Enregistrer_Data_I($data);
	header("location: index.php?action=Incident");
	}else{
		header("location:index.php?action=login"); 
	}
}

function affcherNofificationUser(){
	if(!empty($_SESSION['user'])){
$data["utilisateur"] =listeUser();
AfficherVue('notificationUser',$data);
}else{
		header("location:index.php?action=login"); 
	}
}

function affcherNofificationDemande(){
	if(!empty($_SESSION['user'])){
$data["demande"]=listeDemande();
$data["Service"]=ListeService();
$data["document"]=getAllDocument();
AfficherVue('notificationDemande',$data);
}else{
		header("location:index.php?action=login"); 
	}
}

function afficherNotificationIncident(){
if(!empty($_SESSION['user'])){
$data["incident"]=listeIncident();
AfficherVue('notificationIncident',$data);
}else{
		header("location:index.php?action=login"); 
	}
}

//cette fonction permet au administrateur de confirmer les compte des utilisateur.
function confirmerUser($user){
	confirmer($user);
	header("location:index.php?action=NewUser");
}

function supprimerUser($user){
	if(!empty($_SESSION['user'])){
	supprimer($user);
	header("location:index.php?action=NewUser");
	}else{
		header("location:index.php?action=login"); 
	}
}

function ReponsIncident($fichier,$id){
	if(!empty($_SESSION['user'])){
	$data["incident"]=getIncident($id);
	$data["id"]=$id;
	$data["technicien"]=getTechnicien();
	afficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}


function ReponsDemande($fichier,$id){
	if(!empty($_SESSION['user'])){
	$data["demande"]=getDemandeD($id);
	$data["id"]=$id;
	afficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}

//cette fonction pour affecter un technicien afin de realiser un travail
function affecterT($data,$id){
	if(!empty($_SESSION['user'])){
	affecterTe($data,$id);
	header("location: index.php?action=ListeIncident");
	 }else{
		header("location:index.php?action=login"); 
	}
}

//cette fonction permet de repons a une demande par oui ou non
function EnvoyerRepons($data,$id){
	if(!empty($_SESSION['user'])){
	 EnvoyerRepon($data,$id);
	 affcherNofificationDemande();
	 }else{
		header("location:index.php?action=login"); 
	}
}



function Enregistrer_salle_TP($data){
	if(!empty($_SESSION['user'])){
	Enregistrer_salle_T($data);
	header("location:index.php?action=Ajouter_salle_TP");
	}else{
		header("location:index.php?action=login"); 
	}
}


function AfficherEmail($user){
	if(!empty($_SESSION['user'])){
	$data['Mail']=getEmail($user);
	afficherVue("mailbox",$data);
	}else{
		header("location:index.php?action=login"); 
	}
}

function LireMail($id){
	if(!empty($_SESSION['user'])){
	$data['Mail']=getIncidentEmail($id);
	afficherVue("read-mail",$data);
	}else{
		header("location:index.php?action=login"); 
	}
}

function ReponsMail($id){
	if(!empty($_SESSION['user'])){
	$data['Mail']=getIncidentEmail($id);
	afficherVue("compose",$data);
	}else{
		header("location:index.php?action=login"); 
	}
}

function EnregisterHistorique($data,$id){
	if(!empty($_SESSION['user'])){
	EnregistrerRepons($data,$id);
	header("location: index.php?action=AfficherEmail");
	}else{
		header("location:index.php?action=login"); 
	}
}


function Afficher_historique(){
	if(!empty($_SESSION['user'])){
	$data['Historique']=Afficher_historique_E();
	afficherVue('Historique',$data);
	}else{
		header("location:index.php?action=login"); 
	}
}

function Afficher_notification(){
	if(!empty($_SESSION['user'])){
	$data['Demande']=get_demande($_SESSION['user']);
	$data['incident']=get_incident($_SESSION['user']);
	afficherVue('notification_P',$data);
	}else{
		header("location:index.php?action=login"); 
	}
}

function EmailIncident($user){
	if(!empty($_SESSION['user'])){
	$data['incident']=get_incident($user);
	afficherVue('EmailIncident',$data);
	}else{
		header("location:index.php?action=login"); 
	}
}

function EmailDemande($user){
	if(!empty($_SESSION['user'])){
	$data['Demande']=get_demande($_SESSION['user']);
	$data["Service"]=get_Service($_SESSION['user']);
	$data["Document"]=MyDocument($_SESSION['user']);
	afficherVue('EmailDemande',$data);
	}else{
		header("location:index.php?action=login"); 
	}
}


function EmailDemandeP($user){
	if(!empty($_SESSION['user'])){
	$data['Demande']=get_demande($_SESSION['user']);
	$data["Service"]=get_Service($_SESSION['user']);
	$data["Document"]=MyDocument($_SESSION['user']);
	afficherVue('EmailDemandeP',$data);
	}else{
		header("location:index.php?action=login"); 
	}
}
	
	//----------------------------modification de l'administrateur----------------------------//
function Demande_A($fichier){
	if(!empty($_SESSION['user'])){
	$data['Professeur']=getProfesseur();
	afficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}
	

function Incident_A($fichier){
	if(!empty($_SESSION['user'])){
	$data["Salle"] = GetListeSalle();
    $data["Salle_TP"] = GetListeSalle_TP();
	$data['Technicien']=getTechnicien();
	afficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}
	
function Afficher_Incident($fichier){
	if(!empty($_SESSION['user'])){
	$data['historique']=Afficher_historique_I();
	afficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}

function DetailIncidentHistorique($fichier,$id){
	if(!empty($_SESSION['user'])){
	$data['row']=getDetailIncidentHistorique($id);
	afficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}

function Afficher_Incident_Non($fichier){
	if(!empty($_SESSION['user'])){
	$data['non_traiter']=getIncidentNomTraiter();
	afficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}

function Enregistrer_Demande_A($data){
	if(!empty($_SESSION['user'])){
	Enregistrer_Data_D($data);
	header("location: index.php?action=Demande_A");
	}else{
		header("location:index.php?action=login"); 
	}
}


function Enregistrer_Incident_A($data){
	if(!empty($_SESSION['user'])){
	Enregistrer_Data_I_A($data);
	header("location: index.php?action=Incident_A");
	}else{
		header("location:index.php?action=login"); 
	}
}

function document_Panel($fichier){
	if(!empty($_SESSION['user'])){
		$data['Professeur']=getProfesseur();
		$data['Etudiant']=getEtudiant();
		$data['Administrateur']=getAdministrateur();
		$data['Technicien']=getTechnicien();
		afficherVue($fichier,$data);
	}
	else{
		header("location:index.php?action=login"); 
	}
	
}

function ImprimerDocument($fichier){
	if(!empty($_SESSION['user'])){
	$data['Technicien']=getTechnicien();
	afficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}

function EnregisterFile($file,$data){
	if(!empty($_SESSION['user'])){
	EnregisterFileData($file,$data);
	header("location: index.php?action=ImprimerDocument");
	}else{
		header("location:index.php?action=login"); 
	}
}

function Service_Panel($fichier){
	if(!empty($_SESSION['user'])){
	$data['Professeur']=getProfesseur();
	$data['Etudiant']=getEtudiant();
	$data['Administrateur']=getAdministrateur();
	afficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}

function Enregistrer_Document($fichier,$data,$file){
	if(!empty($_SESSION['user'])){
	Enregistrer_Data_Document($data,$file);
	header("location: index.php?action=".$fichier);
	}else{
		header("location:index.php?action=login"); 
	}
}

function Enregistrer_Service($fichier,$data){
	if(!empty($_SESSION['user'])){
	Enregistrer_Data_Service($data);
	header("location: index.php?action=".$fichier);
	}else{
		header("location:index.php?action=login"); 
	}
}

function AfficherDocument($fichier){
	if(!empty($_SESSION['user'])){
	$data['Document']=getAllDocument();
	afficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}


function AfficherService($fichier){
	if(!empty($_SESSION['user'])){
	$data['Service']=ListeService();
	afficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}



function ReponsDocument($fichier,$id){
	if(!empty($_SESSION['user'])){
	$data["Document"]=getDocument($id);
	$data["id"]=$id;
	afficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}

function ReponsDocumentU($fichier,$id){
	if(!empty($_SESSION['user'])){
	$data["Document"]=getDocument($id);
	$data["id"]=$id;
	afficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}



function ReponsService($fichier,$id){
	if(!empty($_SESSION['user'])){
	$data["Service"]=getService($id);
	$data["id"]=$id;
	afficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}

function ReponsServiceU($fichier,$id){
	if(!empty($_SESSION['user'])){
	$data["Service"]=getService($id);
	$data["id"]=$id;
	afficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}



function EnvoyerDocument($id,$file){
	if(!empty($_SESSION['user'])){
	EnregisterFichier($id,$file);
	header("location: index.php?action=ListeDemande");
	}else{
		header("location:index.php?action=login"); 
	}
}


function EnvoyerDocumentU($id,$file){
	if(!empty($_SESSION['user'])){
	EnregisterFichier($id,$file);
	header("location: index.php?action=AfficherDocument");
	}else{
		header("location:index.php?action=login"); 
	}
}


function AfficherReponsDocument($fichier){
	if(!empty($_SESSION['user'])){
	$data['Document']=MyDocument($_SESSION['user']);
	afficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}


function AfficherReponsService($fichier){
	if(!empty($_SESSION['user'])){
	$data['Service']=get_Service($_SESSION['user']);
	afficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}

function AfficherReponsImprimer($fichier){
	if(!empty($_SESSION['user'])){
	$data['Document']=getDocumentImprimer();
	afficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}

function EnvoyerService($data,$id){
	if(!empty($_SESSION['user'])){
	 Envoyer_Service_Date($data,$id);
	 header("location: index.php?action=ListeDemande");
	 }else{
		header("location:index.php?action=login"); 
	}
}



function EnvoyerServiceU($data,$id){
	if(!empty($_SESSION['user'])){
	 Envoyer_Service_Date($data,$id);
	 header("location: index.php?action=AfficherService");
	 }else{
		header("location:index.php?action=login"); 
	}
}



function DetailService($id){
	if(!empty($_SESSION['user'])){
	$data['row']=GetOneService($id);
	afficherVue('AllDetailService',$data);
	}else{
		header("location:index.php?action=login"); 
	}
	}
	
function DetailServicePostHistorique($id){
	if(!empty($_SESSION['user'])){
	$data['row']=GetHistoriquePostService($id);
	afficherVue('AllDetailServicePost',$data);
	}else{
		header("location:index.php?action=login"); 
	}
	}
	
function DetailServiceP($id){
	if(!empty($_SESSION['user'])){
	$data['row']=GetServicenotification($id);
	afficherVue('DetailServiceP',$data);
	}else{
		header("location:index.php?action=login"); 
	}
	}
	
	
	
function DetailServiceGetHistorique($id){
	if(!empty($_SESSION['user'])){
	$data['row']=GetHistoriqueGetService($id);
	afficherVue('AllDetailServiceGet',$data);
	}else{
		header("location:index.php?action=login"); 
	}
	}
	
function DetailDemande($id){
	if(!empty($_SESSION['user'])){
	$data['row']=getDemande($id);
	afficherVue('AllDetailDemande',$data);
	}else{
		header("location:index.php?action=login"); 
	}
}


function AfficherHistoriqueDocument($fichier){
	if(!empty($_SESSION['user'])){
	$data['Document']=getHistoriqueDocument();
	afficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}

	
function AfficherHistoriqueService(){
	if(!empty($_SESSION['user'])){
	$data['Service']=getHistoriqueService();
	afficherVue('HistoriqueService',$data);
	}else{
		header("location:index.php?action=login"); 
	}
}
	
function DetailEmail($fichier,$id){
	if(!empty($_SESSION['user'])){
	$data['row']=getDetailIncidentHistorique($id);
	afficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}


function Liste_Professeur($fichier){
	if(!empty($_SESSION['user'])){
	$data['Professeur']=getAllProfesseur($_POST);
	afficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}

function Liste_Etudiant($fichier){
	if(!empty($_SESSION['user'])){
	$data['Etudiant']=getAllEtudiant($_POST);
	afficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}

function Liste_Technicien($fichier){
	if(!empty($_SESSION['user'])){
	$data['Technicien']=getAllTechnicien($_POST);
	afficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}


function Liste_Salle($fichier){
	if(!empty($_SESSION['user'])){
	$data['Salle']=getAllSalle($_POST);
	afficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}

function Liste_Salle_TP($fichier){
	if(!empty($_SESSION['user'])){
	$data['Salle']=getAllSalleTP($_POST);
	afficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}


function Supprimer_Utilisateur($user,$a){
	if(!empty($_SESSION['user'])){
	deleteUser($user);
	header("location:index.php?action=".$a);
	}else{
		header("location:index.php?action=login"); 
	}
}

function Supprimer_Salle($numero,$a){
	if(!empty($_SESSION['user'])){
	deleteSalle($numero);
	header("location:index.php?action=".$a);
	}else{
		header("location:index.php?action=login"); 
	}
}

function Supprimer_SalleTP($numero){
	if(!empty($_SESSION['user'])){
	deleteSalleTP($numero);
	header("location:index.php?action=Liste_salle_TP");
	}else{
		header("location:index.php?action=login"); 
	}
}

	

function Ajouter_Etudiant($data){
	if(!empty($_SESSION['user'])){
	addEtudiant($data);
	header("location:index.php?action=Liste_Etudiant");
	}else{
		header("location:index.php?action=login"); 
	}
}

function Ajouter_Technicien($data){
	if(!empty($_SESSION['user'])){
	addTechnicien($data);
	header("location:index.php?action=Liste_Technicien");
	}else{
		header("location:index.php?action=login"); 
	}
}

function Ajouter_Professeur($data){
	if(!empty($_SESSION['user'])){
	addProfesseur($data);
	header("location:index.php?action=Liste_Professeur");
	}else{
		header("location:index.php?action=login"); 
	}
}

function Ajouter_Salle($data){
	if(!empty($_SESSION['user'])){
	addSalle($data);
	header("location:index.php?action=Liste_salle");
	}else{
		header("location:index.php?action=login"); 
	}
}

function Ajouter_Salle_TP($data){
	if(!empty($_SESSION['user'])){
	addSalleTP($data);
	header("location:index.php?action=Liste_salle_TP");
	}else{
		header("location:index.php?action=login"); 
	}
}


function testerUsername($user){
	TestUser($user);
}


function testerSalle($numero){
	if(!empty($_SESSION['user'])){
	TestSalle($numero);
	}else{
		header("location:index.php?action=login"); 
	}
}

function testerSalleTP($numero){
	if(!empty($_SESSION['user'])){
	TestSalleTP($numero);
	}else{
		header("location:index.php?action=login"); 
	}
}

function Imprimer(){
	if(!empty($_SESSION['user'])){
	$data['Document']=DocumentImprimer();
	AfficherVue('Imprimer',$data);
	}else{
		header("location:index.php?action=login"); 
	}
}

function DocumentEffectue($id){
	if(!empty($_SESSION['user'])){
	DocumentEffectueF($id);
	header("location: index.php?action=Imprimer");
	}else{
		header("location:index.php?action=login"); 
	}
}


function HistoriqueImprimer($fichier){
	if(!empty($_SESSION['user'])){
	$data['Document']=GetHistoriqueImprimer();
	afficherVue($fichier,$data);
	}else{
		header("location:index.php?action=login"); 
	}
}

function deconnexion(){
	session_destroy();
	header("location: index.php?action=login");
}


?>