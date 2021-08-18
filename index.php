<?php 
session_start();
include './View/view.php';
include './Controller/controller.php';
include './Model/model.php';
$action=(empty($_GET["action"]))?"template":$_GET["action"];
switch($action){
	
	case 'template':
	AfficheTemplet("template");
	break;
	
	case 'login':
	AfficheTemplet("templet_login");
	break;
	
	case'Confirmation_user':
	Afficheview('Confirmation_user');
	break;

	case 'VerifierLogin':
		authentifierUser($_POST);
	break;
	
	case 'templet_register':
	AfficheTemplet("templet_register");
	break;
    
	case 'AjouterUtilisateur':
	AjouterUtilisateur($_POST);
	break;
	
	case 'Panel_Utilisateur':
	afficherPanel_D('Panel_Professeur');
	break;
	
	
	case 'Panel_Technicien':
	afficherPanel_T("Panel_Technicien");
	break;
	
	case 'Panel_Administrateur':
	afficherPanel_A('Panel_Administrateur');
	break;
	
	case 'deconnexion':
	deconnexion();
	break;
	
	case 'Profile':
	detail('Profile');
	break;
	
	case 'Incident':
	Incident('Incident');
	break;
	
	case 'Demande':
	Demande('Demande');
	break;
	
	case 'modifier_Info':
	modifier($_GET['user'],$_POST);
	break;
	
	case 'Enregistrer_Demande_S':
	Enregistrer_Demande_S($_POST);
	break;
	
	
	case 'Enregistrer_Incident':
	Enregistrer_Incident($_POST);
	break;
	
	
	
	case 'NewUser':
	affcherNofificationUser();
	break;
	
	case 'ListeDemande':
	affcherNofificationDemande();
	break;
	
	case 'ListeIncident':
	afficherNotificationIncident();
	break;
	
	case 'ReponsIncident':
	ReponsIncident("Repons_notification_Incident",$_GET['id_Incident']);
	break;
	
	case 'ReponsDemande':
	ReponsDemande("Repons_notification_Demande",$_GET['id_Demande']);
	break;
	
	
	
	case 'Enregistrer_salle':
	Enregistrer_salle($_POST);
	break;
	
	case 'Enregistrer_salle_TP':
	Enregistrer_salle_TP($_POST);
	break;
	
	case'Ajouter_salle_TP':
	afficherVue("Ajouter_salle_TP");
	break;
	
	
	
	//cette fonction permet d'ajouter un utilisateur
	case'confirmerUser':
	confirmerUser($_GET['username']);
	break;
	
	//cette fonction permet de supprimer un utilisateur
	case'supprimerUser':
	supprimerUser($_GET['username']);
	break;
	
	case 'affecterTechnicien':
	affecterT($_POST,$_GET['id']);
	break;
	
	case 'EnvoyerRepons':
	EnvoyerRepons($_POST,$_GET['id']);
	break;
	
	//les actions de technicien-----------------------------------
	case'AfficherEmail':
	AfficherEmail($_SESSION['user']);
	break;
	
	
	case'LireMail':
	LireMail($_GET['id']);
	break;
	
	
	case'ReponsMail':
	ReponsMail($_GET['id']);
	break;
	
	case'EnregisterHistorique':
	EnregisterHistorique($_POST,$_GET['id']);
	break;
	
	case'Afficher_historique':
	Afficher_historique();
	break;
	
	case 'notification':
	Afficher_notification();
	break;
	
	
	case 'EmailIncident':
	EmailIncident($_SESSION['user']);
	break;
	
	case 'EmailDemande':
	EmailDemande($_SESSION['user']);
	break;
	
	
	case 'EmailDemandeP':
	EmailDemandeP($_SESSION['user']);
	break;
	
	//----------------------------modification de l'administrateur----------------------------//
	case 'Demande_A':
	Demande_A('Demande_A');
	break;
	
	case 'Incident_A':
	Incident_A('Incident_A');
	break;
	
	case'HistoriqueIncident':
	Afficher_Incident('HistoriqueIncident');
	break;
	
	case'En_Cours_Execution':
	Afficher_Incident_Non('Non_traiter');
	break;
	
	
	case 'Enregistrer_Demande':
	Enregistrer_Demande_A($_POST);
	break;
	
	case 'Enregistrer_Incident_A':
	Enregistrer_Incident_A($_POST);
	break;
	
	
	case 'document':
	document_Panel('document');
	break;
	
	
	case 'Service':
	Service_Panel('Service');
	break;
	
	
	case 'Enregistrer_Document':
	Enregistrer_Document('document',$_POST,$_FILES);
	break;
	
	case 'Enregistrer_Service':
	Enregistrer_Service('Service',$_POST);
	break;
	
	
	case 'ReponsDocument' :
	ReponsDocument("Repons_notification_Document",$_GET['id_document']);
	break;
	
	
	case 'ReponsDocumentU' :
	ReponsDocumentU("Repons_notification_DocumentU",$_GET['id_document']);
	break;
	
	
	
	case 'ReponsService':
	ReponsService("Repons_notification_Service",$_GET['id_service']);
	break;
	
	
	
	case 'ReponsServiceU':
	ReponsServiceU("Repons_notification_ServiceU",$_GET['id_service']);
	break;
	
	//----------------------------------------------------------------------------
	
	case 'AfficherDocument':
	AfficherDocument('Lire_document');
	break;
	
	
	case 'EnvoyerDocument':
	EnvoyerDocument($_GET['id_document'],$_FILES);
	break;
	
	
	
	case 'EnvoyerDocumentU':
	EnvoyerDocumentU($_GET['id_document'],$_FILES);
	break;
	
	case 'AfficherReponsDocument':
	AfficherReponsDocument('AfficherReponsDocument');
	break;
	
	
	
	case 'AfficherReponsService':
	AfficherReponsService('AfficherReponsService');
	break;
	
	case 'DetailService':
	DetailService($_GET['id_Service']);
	break;
	
	
	case 'DetailServicePostHistorique':
	DetailServicePostHistorique($_GET['id_service']);
	break;
	
	case 'DetailServiceGetHistorique':
	DetailServiceGetHistorique($_GET['id_service']);
	break;
	
	
	
	case 'DetailDemande':
	DetailDemande($_GET['id_demande']);
	break;
	
	case 'EnvoyerService':
	EnvoyerService($_POST,$_GET['id_Service']);
	break;
	
	case 'EnvoyerServiceU':
	EnvoyerServiceU($_POST,$_GET['id_Service']);
	break;
	
	case 'AfficherService':
	AfficherService('Lire_service');
	break;
	
	
	case 'HistoriqueDocument':
	AfficherHistoriqueDocument('HistoriqueDocument');
	break;
	
	case 'HistoriqueService':
	AfficherHistoriqueService('HistoriqueService');
	break;
	
	case 'DetailIncidentHistorique':
	DetailIncidentHistorique('DetailIncidentHistorique',$_GET['id_incident']);
	break;
	
	
	case 'DetailServiceP':
	DetailServiceP($_GET['id_Service']);
	break;
	
	
	case 'DetailEmail':
	DetailEmail('DetailEmail',$_GET['id']);
	break;
	
	
	case 'Liste_Professeur':
	Liste_Professeur('Liste_Professeur',$_POST);
	break;
	
	case 'Liste_Etudiant':
	Liste_Etudiant('Liste_Etudiant',$_POST);
	break;
	
	case 'Liste_salle':
	Liste_Salle('Liste_salle',$_POST);
	break;
	
	case 'Ajouter_Etudiant':
	Ajouter_Etudiant($_POST);
	break;
	
	case 'Ajouter_Professeur':
	Ajouter_Professeur($_POST);
	break;
	
	case 'Liste_Technicien':
	Liste_Technicien('Liste_Technicien',$_POST);
	break;
	
	case 'Liste_salle_TP':
	Liste_Salle_TP('Liste_salle_TP',$_POST);
	break;
	
	
	case 'Ajouter_Technicien':
	Ajouter_Technicien($_POST);
	break;
	
	case'Ajouter_Salle':
	Ajouter_Salle($_POST);
	break;
	
	case'Ajouter_Salle_TP':
	Ajouter_Salle_TP($_POST);
	break;
	
	case 'Supprimer_Utilisateur':
	Supprimer_Utilisateur($_POST['delete_user'],$_GET['a']);
	break;
	
	case 'Supprimer_Salle':
	Supprimer_Salle($_POST['delete_user'],$_GET['a']);
	break;
	
	case 'Supprimer_SalleTP':
	Supprimer_SalleTP($_POST['delete_user']);
	break;
	
	
	case 'testerUsername':
	testerUsername($_GET['user']);
	break;
	
	case 'testerSalle':
	testerSalle($_GET['numero']);
	break;
	
	case 'testerSalle':
	testerSalle($_GET['numero']);
	break;
	
	case 'testerSalleTP':
	testerSalleTP($_GET['numero']);
	break;

	case 'Imprimer':
	Imprimer();
	break;
	
	case 'ImprimerDocument':
	ImprimerDocument('DocumentImprimer');
	break;
	
	
	case 'EnregisterFile':
	EnregisterFile($_FILES,$_POST);
	break;
	
	case 'DocumentEffectue':
	DocumentEffectue($_GET['id_file']);
	break;
	
	
	case 'HistoriqueImprimer':
	HistoriqueImprimer('HistoriqueImprimer');
	break;
	
	case 'AfficherReponsImprimer':
	AfficherReponsImprimer('AfficherReponsImprimer');
	break;
	
	default:
	AfficheTemplet("template");
	break;
}



?>

