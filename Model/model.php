<?php
function ouvrirconnexion(){
	$host = "localhost";
	$db_name = "ONEP_SERVICES";
	$username = "root";
	$password = "";
	try {
		$con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
	}
	catch(PDOException $exception){
		echo "Connection error: " . $exception->getMessage();
	}
	return $con;
}


function getCompte($user){
	$conn=ouvrirconnexion();
	$Rq = "select compte from utilisateur where username='" . $user .  "'";
	return $conn->query($Rq)->fetch();
}
function ajouter_utilisateur($info){
	$conn=ouvrirconnexion();
	$Rq = "insert into utilisateur values ('" . $info["name"] . "','" . $info["prenom"] .  "','" . $info["user"] . "','" .$info['email'] . "','" .$info['pwd'] . "', '" .$info['type_compte'] . "')";
	$Rq1= "insert into notification_user values ('" . $info["user"] . "','" .$info['type_compte'] . "')";
	return $conn->exec($Rq) && $conn->exec($Rq1);
	
}

function nbre_Utilisateur(){
	$conn=ouvrirconnexion();
	$Rq = "select count(Username) from notification_user";
	return $conn->query($Rq)->fetch();
}

function listeUser(){
	$conn=ouvrirconnexion();
	$Rq = "select * from utilisateur where username in (select username from notification_user)";
	return $conn->query($Rq)->fetchAll();
}

function getloginuser($user,$pass){
	$conn=ouvrirconnexion();
	$sql="select Username from utilisateur WHERE username='$user' and pwd='$pass' and username NOT IN(select Username from notification_user)" ;
	return $conn->query($sql)->rowCount();
}

function loginNotConfirmer($user,$pass){
	$conn=ouvrirconnexion();
	$sql="select Username from utilisateur WHERE username='$user' and pwd='$pass'";
	return $conn->query($sql)->rowCount();
}


function GetListeSalle(){
	$conn=ouvrirconnexion();
	$sql= "select *from salle";
	return $conn->query($sql)->fetchAll();
}

function GetListeSalle_TP(){
	$conn=ouvrirconnexion();
	$sql= "select *from salle_tp";
	return $conn->query($sql)->fetchAll();
}

function getInfo($user){
	$conn=ouvrirconnexion();
	$sql="select * from utilisateur WHERE username='$user'";
	return $conn->query($sql)->fetch();
}


function modifier_Info($info,$user){
	$conn=ouvrirconnexion();
	$Rq1= "update utilisateur set  nom='" . $info['nom'] . "',prenom='" . $info['prenom'] . "',username='" . $info['User'] . "',email='" . $info['email'] . "',pwd='" . $info['pwd'] . "' where username='$user' ";
	$Rq2="update demande set Destinateur_D='" . $info['User'] . "' where Destinateur_D='$user'";
	$Rq3="update service set Destinataire='" . $info['User'] . "' where Destinataire='$user'";
	$Rq4="update service set Destinateur='" . $info['User'] . "' where Destinateur='$user'";
	$Rq5="update incident set Destinateur_I='" . $info['User'] . "' where Destinateur_I='$user'";
	$Rq6="update incident set technicien='" . $info['User'] . "' where technicien='$user'";
	$Rq7="update document set Destinataire='" . $info['User'] . "' where Destinataire='$user'";
	$Rq8="update document set Destinateur='" . $info['User'] . "' where Destinateur='$user'";
	$Rq6="update historique set technicien='" . $info['User'] . "' where technicien='$user'";
	$Rq6="update imprimer set technicien='" . $info['User'] . "' where technicien='$user'";
	$Rq6="update imprimer set destinateur='" . $info['User'] . "' where destinateur='$user'";
	if($conn->query($Rq1) && $conn->query($Rq2) && $conn->query($Rq3) && $conn->query($Rq4) && $conn->query($Rq5) && $conn->query($Rq6) && $conn->query($Rq7) && $conn->query($Rq8) ){
		$_SESSION['status']='votre compte est mis à jour';
		$_SESSION['status_code']='success';
	}
	
}

function Enregistrer_Data_DS($info){
	$conn=ouvrirconnexion();
	$date=date('Y-m-d H:i:s');
	$Rq= 'insert into demande(Destinateur_D,Numero_salle_D,Date_creation_D,Description_D) values ("' . $_SESSION['user'] . '","' . $info['Numero_salle'] .  '","'.$date.'","' .$info["Description"] . '")';
	if($conn->exec($Rq)){
	$_SESSION['status']='Demande envoyée';
		$_SESSION['status_code']='success';
	}
}




function Enregistrer_Data_I_A($info){
	$conn=ouvrirconnexion();
	$date=date('Y-m-d H:i:s');
	$Rq= "insert into incident(Destinateur_I,Subject_I,Numero_salle_I,Date_creation,Description_I,Technicien) values ('" . $_SESSION["user"] . "','" . $info["subject"] .  "','" . $info["Numero_salle"] .  "','$date','" .$info['Description'] . "','" .$info['technicien'] . "')";
	if($conn->exec($Rq)){
	$_SESSION['status']='l\'incident est envoyée';
		$_SESSION['status_code']='success';
	}
}

function Enregistrer_Data_I($info){
	$conn=ouvrirconnexion();
	$date=date('Y-m-d H:i:s');
	$Rq= 'insert into incident(Destinateur_I,Subject_I,Numero_salle_I,Date_creation,Description_I) values ("' . $_SESSION['user'] . '","' . $info['subject'] .  '","' . $info['Numero_salle'] .  '","'.$date.'","' .$info['Description'] . '")';
	if($conn->exec($Rq)){
	$_SESSION['status']='l\'incident est envoyée';
		$_SESSION['status_code']='success';
	}
}

function confirmer($user){
	$conn=ouvrirconnexion();
	$sql="delete from notification_user where username='".$user."'";
	if($conn->exec($sql)){
	$_SESSION['status']='compte est  accepté';
		$_SESSION['status_code']='success';
	}
}

function supprimer($user){
	$conn=ouvrirconnexion();
	$sql1="delete from notification_user where username='".$user."'";
	$sql2="delete from utilisateur where username='".$user."'";
	if($conn->exec($sql1)&& $conn->exec($sql2)){
	$_SESSION['status']='compte est rejeté';
		$_SESSION['status_code']='success';
	}
}


function listeDemande(){
	$conn=ouvrirconnexion();
	$sql="select nom , prenom ,Numero_salle_D,Date_creation_D,Description_D ,ID_D from demande D , utilisateur U  where D.Destinateur_D=U.username and repons is NULL;";
	return $conn->query($sql)->fetchAll();
}


function ListeService(){
	$conn=ouvrirconnexion();
	$sql="select nom , prenom ,S.Description,S.Date_creation , ID_S from service S , utilisateur U where Destinataire='".$_SESSION['user']."' and Destinateur=U.username and S.Repons is  NULL";
	return $conn->query($sql)->fetchAll();
}

function getAllDocument(){
	$conn=ouvrirconnexion();
	$sql="select nom , prenom ,document,D.Date_creation ,D.Description, ID_Document from utilisateur U , document D where Destinataire='".$_SESSION['user']."' and Destinateur=U.username and ID_Document not in(select ID_Document from files)" ;
	return $conn->query($sql)->fetchAll();
}

function listeIncident(){
	$conn=ouvrirconnexion();
	$sql="select nom , prenom ,Numero_salle_I,Date_creation,Description_I ,ID_I from incident I , utilisateur U  where I.Destinateur_I=U.username and technicien is NULL";
	return $conn->query($sql)->fetchAll();
}












function nbre_Service_Creer(){
	$conn=ouvrirconnexion();
	$sql="SELECT count(ID_S) from service WHERE Destinateur='".$_SESSION['user']."'";
	return $conn->query($sql)->fetch();
}


function nbre_Demande_Creer(){
	$conn=ouvrirconnexion();
	$Rq = "select count(Id_D) from demande where Destinateur_D='".$_SESSION['user']."' ";
	return $conn->query($Rq)->fetch();			
}

function nbre_Document_Creer(){
	$conn=ouvrirconnexion();
	$sql="select count(ID_Document) from document where Destinateur='".$_SESSION['user']."'" ;
	return $conn->query($sql)->fetch();					
}


function nbre_Incident_Creer(){
	$conn=ouvrirconnexion();
	$Rq = "select count(Id_I) from incident where Destinateur_I='".$_SESSION['user']."'";
	return $conn->query($Rq)->fetch();						
}




function nbre_Demande(){
	$conn=ouvrirconnexion();
	$Rq = "select count(Id_D) from demande where repons is NULL";
	return $conn->query($Rq)->fetch();
}


function nbre_Document(){
	$conn=ouvrirconnexion();
	$sql="select count(ID_Document) from  document  where Destinataire='".$_SESSION['user']."' and ID_Document not in(select ID_Document from files)" ;
	return $conn->query($sql)->fetch();
	
}
function nbre_Service(){
	$conn=ouvrirconnexion();
	$sql="select count(ID_S) from service where Destinataire='".$_SESSION['user']."' and Repons is  NULL";
	return $conn->query($sql)->fetch();
}
function nbre_Incident(){
	$conn=ouvrirconnexion();
	$Rq = "select count(Id_I) from incident where technicien is NULL";
	return $conn->query($Rq)->fetch();
}


function getIncident($id){
	$conn=ouvrirconnexion();
	$Rq = "select nom , prenom ,Numero_salle_I,Date_creation,Description_I from incident I , utilisateur U  where I.Destinateur_I=U.username and ID_I='".$id."'";
	return $conn->query($Rq)->fetch();
}

function getDemandeD($id){
	$conn=ouvrirconnexion();
	$Rq = "select nom , prenom ,Numero_salle_D,Date_creation_D,Description_D from demande D , utilisateur U  where D.Destinateur_D=U.username and ID_D='".$id."'";
	return $conn->query($Rq)->fetch();
}

function getDemande($id){
	$conn=ouvrirconnexion();
	$Rq = "select *from demande where ID_D='".$id."'";
	return $conn->query($Rq)->fetch();
}


function affecterTe($data,$id){
	$conn=ouvrirconnexion();
	$date=date('Y-m-d H:i:s');
	$sql="update incident set technicien='".$data['technicien']."' ,Date_Affectation='$date' where id_i=$id";
	if($conn->exec($sql)){
	$_SESSION['status']="L'incident affectée";
		$_SESSION['status_code']='success';
	}
}


function EnvoyerRepon($data,$id){
	$conn=ouvrirconnexion();
	$date=date('Y-m-d H:i:s');
	if(!strcmp($data["repons"],'Non'))
	$sql="update demande set repons='la salle est occupé',Date_Repons='$date' where id_d=$id";
	else{
		$sql="update demande set Repons='la réservation est effectué',Date_Repons='$date' where id_d=$id";
	}
	if($conn->exec($sql)){
	$_SESSION['status']='Message envoyé';
		$_SESSION['status_code']='success';
	}
}




function Enregistrer_salle_T($data){
	$conn=ouvrirconnexion();
	$sql1="select * from salle_tp where Numero_TP='".$data['numero']."'";
	$sql="insert into salle_tp(Numero_TP,Capacite_TP,Nbre_equipement) values ('".$data['numero']."',".$data['capacite'].",".$data['nbre_equipement'].")";
	$resultat=$conn->query($sql1)->rowCount();
	if($resultat!=0){
	$_SESSION['status']='la salle est déjà existé';
		$_SESSION['status_code']='error';
	}
	else if($conn->exec($sql)){
	$_SESSION['status']='la salle est ajoutée';
		$_SESSION['status_code']='success';
	}
}

function getTechnicien(){
	$conn=ouvrirconnexion();
	$sql="select * from utilisateur where compte='Technicien'";
	return $conn->query($sql)->fetchAll();
}


function getProfesseur(){
	$conn=ouvrirconnexion();
	$sql="select * from utilisateur where compte='Professeur' and username not like '".$_SESSION['user']."' and username not in(select username from notification_user)";
	return $conn->query($sql)->fetchAll();
}

function getAdministrateur(){
	$conn=ouvrirconnexion();
	$sql="select * from utilisateur where compte='Administrateur' and username not like '".$_SESSION['user']."'";
	return $conn->query($sql)->fetchAll();
}

function getEtudiant(){
	$conn=ouvrirconnexion();
	$sql="select * from utilisateur where compte='Etudiant' and username not like '".$_SESSION['user']."' and username not in(select username from notification_user)";
	return $conn->query($sql)->fetchAll();
}


function getnbre_user(){
	$conn=ouvrirconnexion();
	$sql="select count(*) from utilisateur";
	return $conn->query($sql)->fetch();
}

function getnbre_salle(){
	$conn=ouvrirconnexion();
	$sql="select count(*) from salle";
	return $conn->query($sql)->fetch();
}

function getnbre_salle_TP(){
	$conn=ouvrirconnexion();
	$sql="select count(*) from salle_tp";
	return $conn->query($sql)->fetch();
}

function getEmail($user){
	$conn=ouvrirconnexion();
	$sql="select I.ID_I,I.Destinateur_I,I.Subject_I,I.Date_creation,I.Description_I,U.nom,U.prenom from incident I,utilisateur U where I.technicien='".$user."' and I.Destinateur_I=U.username and I.ID_I NOT IN (select ID_I from historique)";
	return $conn->query($sql)->fetchAll();
}


function getnbreEmail(){
	$conn=ouvrirconnexion();
	$sql="select count(I.ID_I) from incident I,utilisateur U where I.technicien='".$_SESSION['user']."' and I.Destinateur_I=U.username and I.ID_I NOT IN (select ID_I from historique)";
	return $conn->query($sql)->fetch();
}

function getIncidentEmail($id){
	$conn=ouvrirconnexion();
	$sql="select ID_I,Destinateur_I,Subject_I,Date_creation,Description_I,nom,prenom from incident join utilisateur on (Destinateur_I=username) where ID_I=$id";
	return $conn->query($sql)->fetch();
}

function EnregistrerRepons($data,$id){
	$conn=ouvrirconnexion();
	$date=date('Y-m-d H:i:s');
	$sql='insert into historique (ID_I,Repons_I,Date_Repons,Technicien) values('.$id.',"'.$data["Repons"].'","'.$date.'","'.$_SESSION['user'].'")';
	if($conn->exec($sql)){
		$_SESSION['status']='Réponse envoyée';
		$_SESSION['status_code']='success';
	}
}

function Afficher_historique_E(){
	$conn=ouvrirconnexion();
	$sql="select nom,prenom,Subject_I,Description_I,Repons_I,H.ID_I ,H.Date_Repons from historique H ,incident I,utilisateur U where H.ID_I=I.ID_I and I.technicien='".$_SESSION['user']."' and U.username=I.Destinateur_I";
    return $conn->query($sql)->fetchAll();
	
}

function getnbre_email(){
	$conn=ouvrirconnexion();
	$sql="select count(Technicien) from historique where Technicien='".$_SESSION['user']."'";
	return $conn->query($sql)->fetch();
}


function get_demande($user){
	$conn=ouvrirconnexion();
	$sql="select * from demande where Destinateur_D='".$user."' and Repons is NOT NULL";
	return $conn->query($sql)->fetchAll();
}

function get_Service($user){
	$conn=ouvrirconnexion();
	$sql="select nom,prenom,S.Date_creation,S.Description,S.Repons, S.ID_S from service S ,utilisateur U where S.Repons is NOT NULL and S.Destinateur='".$user."' and S.Destinataire=U.username ";
	return $conn->query($sql)->fetchAll();
}

function GetOneService($id){
	$conn=ouvrirconnexion();
	$sql="select nom,prenom,S.Date_creation,S.Description,S.Repons, S.ID_S from service S ,utilisateur U where S.Repons is NOT NULL and S.Destinateur='".$_SESSION['user']."' and S.Destinataire=U.username and ID_S=$id";
	return $conn->query($sql)->fetch();
}

function get_incident($user){
	$conn=ouvrirconnexion();
	$sql="select Numero_salle_I,Date_creation,Description_I,Repons_I from incident I , historique H where I.ID_I= H.ID_I and Destinateur_I='".$user."' order by Date_creation desc";
	return $conn->query($sql)->fetchAll();
}


function Enregistrer_Data_D($info){
	$conn=ouvrirconnexion();
	$date=date('Y-m-d H:i:s');
	$Rq= "insert into demande(Destinateur_D,Destinataire,Date_creation_D,Description_D) values ('" . $_SESSION["user"] . "','" .$info['Destinataire'] . "','$date','" .$info['Description'] . "')";
	if($conn->exec($Rq)){
	$_SESSION['status']='demande envoyée';
		$_SESSION['status_code']='success';
	}
}

function getIncidentNomTraiter(){
	$conn=ouvrirconnexion();
	$date=date('Y-m-d H:i:s');
	$Rq= "select nom,prenom,I.technicien,I.numero_salle_I,I.Description_I,I.Date_Affectation from incident I , utilisateur U where I.technicien is not NULL and I.Destinateur_I=U.username and I.ID_I not in (select ID_I from historique)";
	return $conn->query($Rq)->fetchAll();
	
}

function Afficher_historique_I(){
	$conn=ouvrirconnexion();
	$sql="select nom,prenom,Numero_salle_I,Date_creation,Description_I,I.technicien,Repons_I,H.ID_I ,H.Date_Repons from historique H ,incident I,utilisateur U where H.ID_I=I.ID_I and I.Destinateur_I=U.username" ;
	return $conn->query($sql)->fetchAll();
}


function getDetailIncidentHistorique($id){
	$conn=ouvrirconnexion();
	$sql="select nom,prenom,Numero_salle_I,Date_creation,Description_I,I.technicien,Repons_I,H.ID_I ,H.Date_Repons from historique H ,incident I,utilisateur U where I.ID_I=$id and H.ID_I=I.ID_I and I.Destinateur_I=U.username" ;
	return $conn->query($sql)->fetch();
}




function Enregistrer_Data_Service($info){
	$conn=ouvrirconnexion();
	$date=date('Y-m-d H:i:s');
	$Rq= 'insert into service(Destinateur,Destinataire,Description,Date_creation) values ("' . $_SESSION['user'] . '","' .$info["Destinataire"] . '","' .$info["Description"] . '","'.$date.'")';
	if($conn->exec($Rq)){
	$_SESSION['status']='Demande envoyée';
		$_SESSION['status_code']='success';
	}
}

function Enregistrer_Data_Document($info,$file){
	$conn=ouvrirconnexion();
	$date=date('Y-m-d H:i:s');
	$Rq='insert into document(Destinateur,Destinataire,Document,Description,Date_creation) values ("'.$_SESSION["user"].'","'.$info["Destinataire"].'","'.$info["document"].'","'.$info["Description"].'","'.$date.'")';
	if($conn->exec($Rq)){
	$_SESSION['status']='Demande envoyée';
		$_SESSION['status_code']='success';
	}
}




function MyDocument($user){
	$conn=ouvrirconnexion();
	$sql="select nom , prenom ,document,D.Date_creation , name , file_url , D.ID_Document from utilisateur U ,files F, document D where Destinateur='".$user."' and Destinataire=U.username and D.ID_Document = F.ID_Document";
	return $conn->query($sql)->fetchAll();
}

function getDocument($id){
	$conn=ouvrirconnexion();
	$sql="select nom , prenom ,document,D.Date_creation ,D.Description, ID_Document from utilisateur U , document D where ID_Document=$id and Destinateur=U.username;" ;
	return $conn->query($sql)->fetch();
}


function getService($id){
	$conn=ouvrirconnexion();
	$sql="select nom , prenom , S.Date_creation,S.Description, ID_S from utilisateur U , service S where ID_S=$id and S.Destinateur=username" ;
	return $conn->query($sql)->fetch();
}


function EnregisterFichier($id,$file){
	$conn=ouvrirconnexion();
	if(!empty($file)){
	$file_name=$file['fichier']['name'];
	$file_extension =strrchr($file_name,".");
	
	$file_tmp_name =$file['fichier']['tmp_name'];
	$file_dest = 'files/'.$file_name;
	
	$extensions_autorisees=array('php','.PHP');
	if(! in_array($file_extension , $extensions_autorisees)){
		if(move_uploaded_file($file_tmp_name,$file_dest)){
			$date=date('Y-m-d H:i:s');
			$rq="insert into files (ID_Document,name,file_url,Date_Repons) values ($id,'$file_name','$file_dest','$date')";
			if($conn->exec($rq)){
					$_SESSION['status']='Fichier envoyé';
						$_SESSION['status_code']='success';
					}
		}
	}else {$_SESSION['status']='ext';
						$_SESSION['status_code']='error';

	}
	}
}


function EnregisterFileData($file,$data){
	$conn=ouvrirconnexion();
	if(!empty($file)){
	$file_name=$file['fichier']['name'];
	$file_extension =strrchr($file_name,".");
	
	$file_tmp_name =$file['fichier']['tmp_name'];
	$file_dest = 'files/'.$file_name;
	
	$extensions_autorisees=array('php','.PHP');
	if(! in_array($file_extension , $extensions_autorisees)){
		if(move_uploaded_file($file_tmp_name,$file_dest)){
			$date=date('Y-m-d H:i:s');
			$rq="insert into imprimer (name,file_url,Technicien,Destinateur,Date_envoi) values ('$file_name','$file_dest','".$data['Destinataire']."','".$_SESSION['user']."','$date')";
			if($conn->exec($rq)){
					$_SESSION['status']='Fichier envoyé';
						$_SESSION['status_code']='success';
					}
		}
	}else {$_SESSION['status']='ext';
						$_SESSION['status_code']='error';

	}
	}
}



function Envoyer_Service_Date($data,$id){
	$conn=ouvrirconnexion();
	$date=date('Y-m-d H:i:s');
	$sql='update service set Repons="'.$data["repons"].'", Date_repons="'.$date.'" where ID_S= '.$id.'';
	if($conn->exec($sql)){
	$_SESSION['status']='Message Envoyé';
		$_SESSION['status_code']='success';
	}
}


function getHistoriqueDocument(){
	$conn=ouvrirconnexion();
	$sql="select nom , prenom ,document, D.ID_Document, F.name,F.file_url ,Date_Repons from utilisateur U , document D, files F where Destinataire='".$_SESSION['user']."' and Destinateur=U.username and D.ID_Document=F.ID_Document" ;
	return $conn->query($sql)->fetchAll();
}


function getDocumentImprimer(){
	$conn=ouvrirconnexion();
	$sql="select nom,prenom ,I.Date_Repondre,F.name,F.file_url from utilisateur U, imprimer F , documentimprimer I where Destinateur='".$_SESSION['user']."' and Technicien=username and F.ID_FILE =I.ID_FILE " ;
	return $conn->query($sql)->fetchAll();
}


function DocumentImprimer(){
	$conn=ouvrirconnexion();
	$sql="select nom,prenom ,F.name,F.file_url ,Date_envoi , F.ID_FILE from utilisateur U, imprimer F  where Technicien='".$_SESSION['user']."' and Destinateur=username and F.ID_FILE not in(select ID_FILE from documentimprimer)" ;
	return $conn->query($sql)->fetchAll();
}


function nbre_Impriment(){
	$conn=ouvrirconnexion();
	$sql="select count(F.ID_FILE) from imprimer F  where Technicien='".$_SESSION['user']."' and F.ID_FILE not in(select ID_FILE from documentimprimer)" ;
	return $conn->query($sql)->fetch();
}

function GetHistoriqueImprimer(){
	$conn=ouvrirconnexion();
	$sql="select nom,prenom ,Date_Repondre,F.name,F.file_url  from utilisateur U, imprimer F NATURAL JOIN(documentimprimer) where Technicien='".$_SESSION['user']."' and Destinateur=username " ;
	return $conn->query($sql)->fetchAll();
}

function getNbreDocumentImprimer(){
	$conn=ouvrirconnexion();
	$sql="select count(F.ID_FILE) from utilisateur U, imprimer F NATURAL JOIN(documentimprimer) where Technicien='".$_SESSION['user']."' and Destinateur=username " ;
	return $conn->query($sql)->fetch();
}

function DocumentEffectueF($id){
	$conn=ouvrirconnexion();
	$date=date('Y-m-d H:i:s');
	$sql="insert into documentimprimer (ID_FILE,Date_Repondre) values ($id,'$date')";
    return $conn->exec($sql);
}



function getHistoriqueService(){
	$conn=ouvrirconnexion();
	$sql="select nom,prenom,S.Description,S.Repons, S.Date_creation , Date_repons , S.ID_S from service S ,utilisateur U where S.Repons is NOT NULL and S.Destinataire='".$_SESSION['user']."' and S.Destinateur=U.username ";
	return $conn->query($sql)->fetchAll();
}


function GetHistoriquePostService($id){
	$conn=ouvrirconnexion();
	$sql="select nom,prenom,S.Date_creation,S.Description,S.Repons,S.Date_Repons, S.ID_S from service S ,utilisateur U where S.Repons is NOT NULL and S.Destinataire='".$_SESSION['user']."' and S.Destinateur=U.username and ID_S=$id";
	return $conn->query($sql)->fetch();
}



function GetServicenotification($id){
	$conn=ouvrirconnexion();
	$sql="select nom,prenom,S.Date_creation,S.Description,S.Repons,S.Date_Repons, S.ID_S from service S ,utilisateur U where S.Repons is NOT NULL and S.Destinateur='".$_SESSION['user']."' and S.Destinataire=U.username and ID_S=$id";
	return $conn->query($sql)->fetch();
}


function GetHistoriqueGetService($id){
	$conn=ouvrirconnexion();
	$sql="select nom,prenom,S.Date_creation,S.Description,S.Repons,S.Date_Repons, S.ID_S from service S ,utilisateur U where S.Repons is NOT NULL and S.Destinateur='".$_SESSION['user']."' and S.Destinataire=U.username and ID_S=$id";
	return $conn->query($sql)->fetch();
}

function getAllProfesseur($data){
	$conn=ouvrirconnexion();
	if(isset($data['search'])){
		$searchKey=$data['search'];
		$sql="select * from utilisateur where compte='Professeur' and nom like '%$searchKey%'";
		$searchKey='';
	}else{
		$sql="select * from utilisateur where compte='Professeur'";
	}
	return $conn->query($sql)->fetchAll();
}

function getAllEtudiant($data){
	$conn=ouvrirconnexion();
	if(isset($data['search'])){
		$searchKey=$data['search'];
		$sql="select * from utilisateur where compte='Etudiant' and nom like '%$searchKey%'";
		$searchKey='';
	}else{
		$sql="select * from utilisateur where compte='Etudiant'";
	}
	return $conn->query($sql)->fetchAll();
}


function getAllTechnicien($data){
	$conn=ouvrirconnexion();
	if(isset($data['search'])){
		$searchKey=$data['search'];
		$sql="select * from utilisateur where compte='Technicien' and nom like '%$searchKey%'";
		$searchKey='';
	}else{
		$sql="select * from utilisateur where compte='Technicien'";
	}
	return $conn->query($sql)->fetchAll();
}


function getAllSalle($data){
	$conn=ouvrirconnexion();
	if(isset($data['search'])){
		$searchKey=$data['search'];
		$sql="select *from salle where numero_S like '%$searchKey%'";
		$searchKey='';
	}else{
		$sql="select *from salle";
	}
	return $conn->query($sql)->fetchAll();
}


function getAllSalleTP($data){
	$conn=ouvrirconnexion();
	if(isset($data['search'])){
		$searchKey=$data['search'];
		$sql="select *from salle_tp where numero_TP like '%$searchKey%'";
		$searchKey='';
	}else{
		$sql= "select *from salle_tp";
	}
	return $conn->query($sql)->fetchAll();
}

function deleteUser($user){
	$conn=ouvrirconnexion();
	$Rq= "delete from utilisateur where username='".$user."'";
	return $conn->exec($Rq);	
}


function deleteSalle($numero){
	$conn=ouvrirconnexion();
	$Rq= "delete from salle where Numero_S='".$numero."'";
	return $conn->exec($Rq);	
}

function deleteSalleTP($numero){
	$conn=ouvrirconnexion();
	$Rq= "delete from salle_tp where Numero_TP='".$numero."'";
	return $conn->exec($Rq);	
}

function addProfesseur($info){
	$conn=ouvrirconnexion();
	$Rq = 'insert into utilisateur values ("' . $info['nom'] . '","' . $info['prenom'] .  '","' . $info['user'] . '","' .$info['email'] . '","' .$info['pass'] . '", "Professeur")';
	return $conn->exec($Rq);
}

function addEtudiant($info){
	$conn=ouvrirconnexion();
	$Rq = 'insert into utilisateur values ("' . $info['nom'] . '","' . $info['prenom'] .  '","' . $info['user'] . '","' .$info['email'] . '","' .$info['pass'] . '", "Etudiant")';
	return $conn->exec($Rq);
}

function addTechnicien($info){
	$conn=ouvrirconnexion();
	$Rq = 'insert into utilisateur values ("' . $info['nom'] . '","' . $info['prenom'] .  '","' . $info['user'] . '","' .$info['email'] . '","' .$info['pass'] . '", "Technicien")';
	return $conn->exec($Rq);
}

function addSalle($data){
	$conn=ouvrirconnexion();
	$sql="insert into salle(Numero_S,Capacite_S) values ('".$data['numero']."',".$data['capacite'].")";
	return $conn->exec($sql);
}

function addSalleTP($data){
	$conn=ouvrirconnexion();
	$sql="insert into salle_tp (Numero_TP,Capacite_TP,Nbre_equipement) values ('".$data['numero']."',".$data['capacite'].",".$data['nbre_equipement'].")";
	return $conn->exec($sql);
}

function TestUser($user){
	$conn=ouvrirconnexion();
	$Rq = "select count(*) from utilisateur where Username = '$user' ";
	$resultat = $conn->query($Rq)->fetch();
if($resultat[0]) {
	echo "<b><font color= 'red'> Ce mot d'utilisateur existe déjà !! </font></b>";
	}
}


function TestSalle($numero){
	$conn=ouvrirconnexion();
	$Rq = "select count(*) from salle where Numero_S = '$numero' ";
	$resultat = $conn->query($Rq)->fetch();
if($resultat[0]) {
	echo "<b><font color= 'red'> Cette salle existe déjà !! !! </font></b>";
	}
}

function TestSalleTP($numero){
	$conn=ouvrirconnexion();
	$Rq = "select count(*) from salle_tp where Numero_TP = '$numero' ";
	$resultat = $conn->query($Rq)->fetch();
if($resultat[0]) {
	echo "<b><font color= 'red'> Cette salle existe déjà !! !! </font></b>";
	}
}


?>