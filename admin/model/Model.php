<?php 
	
	class Model {

		private $server = 'localhost';
	    private $user = 'root';
	    private $pass = '';
	    private $db = 'balmuz';
	    private $conn;

	    public function __construct(){
	    	try{
	    		$this->conn = new PDO('mysql:dbname='.$this->db.';host='.$this->server, $this->user, $this->pass);
	    	}catch(Exception $e){
	    		echo 'Echec de connexion '.$e->getMessage();
	    	}
	    }

	    //Methode pour tester si le pays n'existe pas encore dans le système
	    public function paysExists($designation){

	    	$query = "SELECT * FROM pays WHERE nom_pays = ?";

	      	$sql = $this->conn->prepare($query);

	      	$req = $sql->execute(array($designation));

	      	$res = $sql->fetch(PDO::FETCH_ASSOC);

	      	return $res;

	    }


	    //Méthode pour afficher tous les pays
	    public function getPays(){

	    	$data = null;

	      	$query = "SELECT * FROM pays";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Méthode pour afficher toutes les villes
	    public function getVilles(){

	    	$data = null;

	      	$query = "SELECT * FROM ville";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Méthode pour afficher toutes les maisons 
	    public function getAllMaisons(){

	    	$data = null;

	      	$query = "SELECT * FROM bien";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }
	    //Méthode pour afficher les maisons mais limitées selon le nombre 
	    public function getAllMaisonsLimit($limit){

	    	$data = null;

	      	$query = "SELECT * FROM bien LIMIT 0, $limit";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }


	    //Méthode pour afficher toules les maisons selon le bailleur 
	    public function getAllMaisonsByBail($id){

	    	$data = null;

	      	$query = "SELECT * FROM bien WHERE id_respo = ?";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($id));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Méthode pour afficher une seule maison 
	    public function getAllMaisonsById($id){

	    	$data = null;

	      	$query = "SELECT telephone_partenaire, login, a.id,	
			  categorie,
			  prix,
			  type_personne	,
			  type_bien	,
			  titre_annonce	,
			  detail_annonce,	
			  surface	,
			  chambre	,
			  douche,	
			  etat_bien	,
			  pays,	
			  province,	
			  ville,
			  commune,	
			  a.image,
			  email_respo,	
			  nom_respo	,
			  civilite_respo,	
			  telephone_respo,	
			  image_un	,
			  image_deux	,
			  image_trois,	
			  image_quatre,	
			  valide,	
			  id_respo FROM bien as a, partenaire as b WHERE b.id = a.id_respo AND a.id = ?";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($id));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Méthode pour afficher des maisons récement publiées par les bailleurs  
	    public function getAllMaisonsNouvelles($etat){

	    	$data = null;

	      	$query = "SELECT * FROM bien WHERE valide = ?";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($etat));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Méthode pour afficher toutes les villes
	    public function getCommunes(){

	    	$data = null;

	      	$query = "SELECT * FROM commune";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Méthode pour ajouter un pays dans la base de données
	    public function addPays($designation){

	    	$query = "INSERT INTO pays (nom_pays) VALUES (?)";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($designation,))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

	    //Méthode pour ajouter une maison dans la base de données
	    public function addMaison($idRespo,$typeMaison,$titre,$prix,$chambre,$douche,$surface,$ville,$commune,$description,$newname){

	    	$query = "INSERT INTO bien (id_respo,categorie,titre_annonce,prix,chambre,douche,surface,ville,commune,detail_annonce,image) VALUES (?,?,?,?,?,?,?,?,?,?,?)";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($idRespo,$typeMaison,$titre,$prix,$chambre,$douche,$surface,$ville,$commune,$description,$newname))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

		//Méthode pour modifier une maisons dans ala base de données
	    public function editMaison($typeMaison,$titre,$prix,$chambre,$douche,$surface,$ville,$commune,$description,$newname,$idMaison){

	    	if (!empty($newname)) {
	    		$query = "UPDATE bien SET categorie = ?,titre_annonce = ?,prix = ?,chambre = ?,douche = ?,surface = ?,ville = ?,commune = ?,detail_annonce = ?,image = ? WHERE id = ?";
	    		$sql = $this->conn->prepare($query);

		        if ($sql->execute(array($typeMaison,$titre,$prix,$chambre,$douche,$surface,$ville,$commune,$description,$newname,$idMaison))) {          
		        	return 1;

		        }else {

		        	return 2;
		        }
	    	}else{
	    		$query = "UPDATE bien SET categorie = ?,titre_annonce = ?,prix = ?,chambre = ?,douche = ?,surface = ?,ville = ?,commune = ?,detail_annonce = ? WHERE id = ?";
	    		$sql = $this->conn->prepare($query);

		        if ($sql->execute(array($typeMaison,$titre,$prix,$chambre,$douche,$surface,$ville,$commune,$description,$idMaison))) {          
		        	return 1;

		        }else {

		        	return 2;
		        }
	    	}
	    	
		}
		
	    //Méthode pour supprimer une maison dans la base de données
	    public function deleteMaison($id){

	    	$query = "DELETE FROM bien WHERE id = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($id))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}
		
	    //Méthode pour valider une maison dans la base de données
	    public function validMaison($id){

	    	$query = "UPDATE bien SET valide = ? WHERE id = ?";

	    	$sql = $this->conn->prepare($query);

		    if ($sql->execute(array(1,$id))) {          
		        return 1;

		    }else {

		        return 2;
		    }
	    	
		}

	    //Méthode pour ajouter envoyer une demande de maison
	    public function sendDemand($id_maison,$nom,$telephone,$email,$message){

	    	$query = "INSERT INTO demande (id_maison,nom,telephone,email,message,etat) VALUES (?,?,?,?,?,?)";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($id_maison,$nom,$telephone,$email,$message,'non_lu'))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}


















	    //Methode pour tester si la catégorie n'existe pas encore dans le système
	    public function categoryExists($designation){

	    	$query = "SELECT * FROM categorie WHERE libelle = ? ";

	      	$sql = $this->conn->prepare($query);

	      	$req = $sql->execute(array($designation));

	      	$res = $sql->fetch(PDO::FETCH_ASSOC);

	      	return $res;

	    }

	    //Methode pour tester si la catégorie n'existe pas encore dans le système
	    public function userExists($nom){

	    	$query = "SELECT * FROM gerant WHERE nom_complet = ? ";

	      	$sql = $this->conn->prepare($query);

	      	$req = $sql->execute(array($nom));

	      	$res = $sql->fetch(PDO::FETCH_ASSOC);

	      	return $res;

	    }

	    //Méthode pour séléctionner toutes les onnées de la table categorie
	    public function getCategory(){

	    	$data = null;

	      	$query = "SELECT * FROM categorie";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }


	    //Méthode pour séléctionner une seule donnée de la table categorie
	    public function getCategorySingle($id){

	    	$data = null;

	      	$query = "SELECT * FROM categorie WHERE id = ?";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($id));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Méthode pour séléctionner une seule donnée de la table categorie
	    public function getUserSingle($id){

	    	$data = null;

	      	$query = "SELECT * FROM gerant WHERE id = ?";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($id));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Méthode pour séléctionner toutes les onnées de la table produit
	    public function getAllProduct(){

	    	$data = null;

	      	$query = "SELECT COUNT(*) as tot_prod FROM produit, categorie WHERE id_cat = categorie.id AND disponible = 'Oui' ";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Méthode pour séléctionner toutes les données de la table produit coté admin
	    public function getAllProductAdmin(){

	    	$data = null;

	      	$query = "SELECT produit.id, designation,libelle,prix,quantite,disponible,description,image,date_ajout FROM produit, categorie WHERE id_cat = categorie.id ORDER BY date_ajout DESC ";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }
	    //Méthode pour séléctionner toutes les données de la table produit coté admin
	    public function getAllProductAdminTri($cat){

	    	$data = null;

	      	$query = "SELECT produit.id, designation,libelle,prix,quantite,disponible,description,image,date_ajout FROM produit, categorie WHERE id_cat = categorie.id AND categorie.id = ? ORDER BY date_ajout DESC ";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($cat));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }


	    //Méthode pour séléctionner toutes les données de la table produit selon la limite
	    public function getAllProductLimit($depart,$articleparPage){

	    	$data = null;

	      	$query = "SELECT produit.id, designation,libelle,prix,quantite,disponible,description,image,date_ajout FROM produit, categorie WHERE id_cat = categorie.id AND disponible = 'Oui' ORDER BY date_ajout DESC LIMIT $depart, $articleparPage";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Méthode pour séléctionner un article selon la recher de l'utilisateur
	    public function getProductSearch($text,$type){

	    	$data = null;

	      	(($type == 'text')?
	      		$query = "SELECT produit.id, designation,libelle,prix,quantite,disponible,description,image,date_ajout FROM produit, categorie WHERE id_cat = categorie.id AND designation LIKE '%$text%' "
	      		:
	      		$query = "SELECT produit.id, designation,libelle,prix,quantite,disponible,description,image,date_ajout FROM produit, categorie WHERE id_cat = categorie.id AND id_cat = '$text' "
	      	);

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Méthode pour séléctionner une donnée de la table categorie
	    public function getProduct($id){

	    	$data = null;

	      	$query = "SELECT produit.id, designation,libelle,prix,quantite,disponible,description,image,id_cat FROM produit, categorie WHERE id_cat = categorie.id AND produit.id = ?";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($id));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Méthode pour séléctionner une donnée de la table categorie
	    public function getProductCategory($id){

	    	$data = null;

	      	$query = "SELECT COUNT(*) as tot_prod FROM produit, categorie WHERE id_cat = categorie.id AND produit.id_cat = ?";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($id));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }


	    //Méthode pour séléctionner toutes les données de la table categorie
	    public function getApprov(){

	    	$data = null;

	      	$query = "SELECT approv.id, designation,approv.prix,approv.quantite,date_approv,nom_four,id_prod FROM produit, approv WHERE id_prod = produit.id ";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }
	    //Méthode pour séléctionner toutes les données de la table categorie
	    public function getApprovSearch($debut,$fin){

	    	$data = null;

	      	$query = "SELECT approv.id, designation,approv.prix,approv.quantite,date_approv,nom_four,id_prod FROM produit, approv WHERE id_prod = produit.id AND date_approv BETWEEN ? AND ?";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($debut,$fin));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }
	    //Méthode pour séléctionner toutes les données de la table vente_admin
	    public function getVentesAdminSearch($debut,$fin){

	    	$data = null;

	      	$query = "SELECT vente_admin.id, designation,vente_admin.prix,vente_admin.quantite,date_vente,id_prod,client FROM produit, vente_admin WHERE id_prod = produit.id AND date_vente BETWEEN ? AND ? ";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($debut,$fin));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	     public function getVentesAdmin(){

	    	$data = null;

	      	$query = "SELECT vente_admin.id, designation,vente_admin.prix,vente_admin.quantite,date_vente,id_prod,client FROM produit, vente_admin WHERE id_prod = produit.id ";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Méthode pour séléctionner toutes les données de la table categorie
	    public function getApprovSingle($id){

	    	$data = null;

	      	$query = "SELECT approv.id, designation,approv.prix,approv.quantite,date_approv,nom_four,id_prod FROM produit, approv WHERE id_prod = produit.id AND approv.id = ?";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($id));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Méthode pour séléctionner un renregistrement dans la table vente_admin
	    public function getVenteAdminSingle($id){

	    	$data = null;

	      	$query = "SELECT vente_admin.id, designation,vente_admin.prix,vente_admin.quantite,date_vente,id_prod,client FROM produit, vente_admin WHERE id_prod = produit.id AND vente_admin.id = ?";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($id));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Méthode pour ajouter un article dans ala base de données
	    public function insertData($designation,$prix,$qte,$categorie,$disponible,$detail,$newname){

	    	$query = "INSERT INTO produit (designation,prix,quantite,id_cat,disponible,description,image) VALUES (?,?,?,?,?,?,?)";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($designation,$prix,$qte,$categorie,$disponible,$detail,$newname))) {          
	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

	    



	    //Méthode pour ajouter une catégorie dans ala base de données
	    public function insertCategorie($designation,$detail){

	    	$query = "INSERT INTO categorie (libelle,detail) VALUES (?,?)";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($designation,$detail))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

	    //Méthode pour ajouter une catégorie dans ala base de données
	    public function insertUser($nom,$email,$telephone,$login,$password,$type){

	    	$query = "INSERT INTO gerant (nom_complet,email,telephone,login,password,type) VALUES (?,?,?,?,?,?)";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($nom,$email,$telephone,$login,$password,$type))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

	    //Méthode pour modifier une catégorie dans ala base de données
	    public function editCategorie($designation,$detail,$id){

	    	$query = "UPDATE categorie SET libelle = ?,detail = ? WHERE id = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($designation,$detail,$id))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}
	    //Méthode pour modifier une catégorie dans ala base de données
	    public function editUser($nom,$email,$telephone,$login,$password,$id){

	    	$query = "UPDATE gerant SET nom_complet = ?,email = ?,telephone = ?, login = ?, password = ? WHERE id = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($nom,$email,$telephone,$login,$password,$id))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

	    //Méthode pour supprimer une catégorie dans ala base de données
	    public function deleteCategorie($id){

	    	$query = "DELETE FROM categorie WHERE id = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($id))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

	    //Méthode pour supprimer une catégorie dans ala base de données
	    public function deleteUser($id){

	    	$query = "DELETE FROM gerant WHERE id = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($id))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

		//Méthode pour ajouter un approvisionnement dans ala base de données
	    public function insertApprov($produit,$qte,$prix,$fournisseur,$date){

	    	$query = "INSERT INTO approv (id_prod,quantite,prix,nom_four,date_approv) VALUES (?,?,?,?,?)";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($produit,$qte,$prix,$fournisseur,$date))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

		//Méthode pour ajouter une vente dans la table vente_admin dans ala base de données
	    public function insertVente($qte,$prix,$date,$produit,$client){

	    	$query = "INSERT INTO vente_admin (quantite,prix,date_vente,id_prod,client	) VALUES (?,?,?,?,?)";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($qte,$prix,$date,$produit,$client))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

		//Méthode pour modifier la quantité du produit après approvisionnement ou apres suppression de l'approvisionnement dans la base de données
	    public function updateQte($produit,$qte,$action){

	    	$data = $this->getProduct($produit);

	    	foreach($data as $res){

	    		$id = $res['id'];
	    		if ($action == 'add') {
	    			$newQte = $res['quantite']+$qte;
	    		}else{
	    			$newQte = $res['quantite']-$qte;
	    		}

	    	}

	    	$query = "UPDATE produit SET quantite = ? WHERE id = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($newQte,$id))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

		//Méthode pour supprimer un mouvement approvisionnement dans ala base de données
	    public function deleteApprov($id){

	    	$query = "DELETE FROM approv WHERE id = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($id))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

		//Méthode pour supprimer un mouvement approvisionnement dans ala base de données
	    public function deleteventeAdmin($id){

	    	$query = "DELETE FROM vente_admin WHERE id = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($id))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

		//Méthode pour tester si le produit existe déjà dans le panier
	    public function productExistInCart($id,$ip){

	    	$data = null;

	      	$query = "SELECT id_produit FROM cart WHERE id_produit = ? AND etat = 0 AND ip = ?";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($id,$ip));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    	
		}

	    //Méthode pour ajouter un article dans le panier
	    public function insertInCart($designation,$prix,$qte,$image,$tot,$id,$ip){

	    	$query = "INSERT INTO cart (nom_produit,prix_produit,qte_produit,img_produit,prix_tot,id_produit,ip) VALUES (?,?,?,?,?,?,?)";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($designation,$prix,$qte,$image,$tot,$id,$ip))) {          
	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

	    //Méthode pour récuperer le nombre des articles dans le panier
	    public function getItemCount($ip){

	    	$data = null;

	      	$query = "SELECT COUNT(*) as total FROM cart WHERE etat = 0 AND ip = ?";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($ip));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    	
		}

	    //Méthode pour récuperer tous les articles dans le panier
	    public function getItems($ip){

	    	$data = null;

	      	$query = "SELECT id,nom_produit,prix_produit,qte_produit,img_produit,prix_tot,id_produit FROM cart WHERE etat = 0 AND ip = ?";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute([$ip]);

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    	
		}

	    //Méthode pour supprimer un article dans le panier
	    public function deleteItemCart($id,$ip){

	    	$query = "DELETE FROM cart WHERE id = ? AND ip = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($id,$ip))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

	    //Méthode pour supprimer tous les articles dans le panier
	    public function deleteAllItemCart($ip){

	    	$query = "DELETE FROM cart WHERE ip = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($ip))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

		//Méthode pour modifier la quantité et le prix total du produit dans le panier
	    public function updateCart($qte,$total,$id){

	    	$query = "UPDATE cart SET qte_produit = ?, prix_tot = ? WHERE id = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($qte,$total,$id))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

		//Méthode pour additionner toutes les quabtités des articles dans le panier
	    public function getAllProductInCart(){

	    	$data = null;

	    	$query = "SELECT CONCAT(nom_produit, '(',qte_produit,')') as qteItems, prix_tot FROM cart WHERE etat = 0";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    	
		}


	    //Méthode pour enregistrer dans la table vente
	    public function addOrder($name,$email,$tel,$mode_paie,$items,$prix_tot,$adresse,$id_client){

	    	$query = "INSERT INTO vente (nom,email,phone,paye_mode,produits,prix_total,adresse,livraison,id_cli) VALUES (?,?,?,?,?,?,?,?,?)";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($name,$email,$tel,$mode_paie,$items,$prix_tot,$adresse,'encours',$id_client))) {          
	        	$query = "UPDATE cart SET etat = ?";

	        	$sql = $this->conn->prepare($query);

	        	$sql->execute(array(1));
	        		
	        	return 1;
	        	

	        }else {

	        	return 2;
	        }
	    	
		}

		// Chercher si le numéro de téléphone existe
		public function phoneExists($telephone){

	    	$data = null;

	      	$query = "SELECT * FROM client WHERE telephone_client = ?";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute([$telephone]);

	      	if($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	return true;
	      	}else

	      	return false;
	    	
		}

		// Connexion du client
		public function clientExists($telephone){

	    	$data = null;

	      	$query = "SELECT * FROM client WHERE telephone_client = ? ";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($telephone));

	      	if($res = $sql->fetch(PDO::FETCH_ASSOC)){

	      		$data[] = $res;

	        	return $data;
	      	}else

	      	return false;
	    	
		}

	    //Méthode pour enregistrer dans la table vente
	    public function addClient($nom,$telephone,$avenue,$quartier,$commune,$ville,$password){

	    	if ($this->phoneExists($telephone)) {
	    		return 3;
	    	}else{
	    		$query = "INSERT INTO client (nom_client,telephone_client,avenue,quartier,commune,ville,password) VALUES (?,?,?,?,?,?,?)";

	        	$sql = $this->conn->prepare($query);

	        	if ($sql->execute(array($nom,$telephone,$avenue,$quartier,$commune,$ville,$password))) {          
	        		return 1;

		        }else {

		        	return 2;
		        }
	    	}
	    	
		}

	    //Méthode pour calculer le nombre des toutes ventes effectuées qui ne sont pas encore validées
	    public function getCountAllVentesCritere($etat){

	    	$data = null;

	      	$query = "SELECT COUNT(*) AS tot FROM vente WHERE livraison = ? ORDER BY date_vente ASC";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($etat));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Méthode pour séléctionner toutes ventes effectuées qui ne sont pas encore validées
	    public function getAllVentesCritere($etat){

	    	$data = null;

	      	$query = "SELECT * FROM vente WHERE livraison = ? ORDER BY date_vente ASC";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($etat));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Méthode pour séléctionner toutes ventes effectuées qui ne sont pas encore validées
	    public function getAllVentes(){

	    	$data = null;

	      	$query = "SELECT * FROM vente ORDER BY date_vente DESC";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Méthode pour séléctionner toutes ventes effectuées par un client 
	    public function getAllVentesClient($id){

	    	$data = null;

	      	$query = "SELECT * FROM vente WHERE id_cli = ? ORDER BY date_vente DESC";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($id));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Méthode pour séléctionner une seule vente effectuée par un client 
	    public function getSingleVentesClient($idCli,$idVente){

	    	$data = null;

	      	$query = "SELECT * FROM vente WHERE id_cli = ? AND id = ? ORDER BY date_vente DESC";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($idCli,$idVente));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }



	    //Méthode pour ajouter un code de transaction dans la table vente si le client a envoyé via Airtel money
	    public function insertCodeVente($code,$id){

	    	$query = "UPDATE vente SET num_transaction = ? WHERE id = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($code,$id))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

		//Méthode pour ajouter la remise sur une vente base de données
	    public function updateRemise($id_com,$remise){

	    	$query = "UPDATE vente SET remise = ? WHERE id = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($remise,$id_com))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

		//Méthode pour une vente une vente base de données
	    public function accepteVente($id_com,$etat){

	    	$query = "UPDATE vente SET livraison = ? WHERE id = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($etat,$id_com))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

		//Méthode pour afficher tous les clients se trouvant dans le système
	    public function getAllClients(){

	    	$data = null;

	      	$query = "SELECT * FROM client ORDER BY nom_client ASC";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    	
		}

		//Méthode pour afficher le nombre total des clients se trouvant dans le système
	    public function getAllClientsCount(){

	      	$data = null;

	      	$query = "SELECT count(*) as total FROM client";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    	
		}

		//Méthode pour afficher le détail de l'entreprise
	    public function getEntrepriseInfo(){

	      	$data = null;

	      	$query = "SELECT * FROM entreprise";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    	
		}

	    //Méthode pour modifier le détail de l'entreprise dans ala base de données
	    public function editEntreprise($nom,$adresse,$telephone,$email,$newname){
	    	
	    	if (!empty($newname)) {
	    		$query = "UPDATE entreprise SET nom = ?,adresse = ? ,contact_phone = ? ,contact_email = ?,logo = ? ";

		        $sql = $this->conn->prepare($query);

		        if ($sql->execute(array($nom,$adresse,$telephone,$email,$newname))) {          

		        	return 1;

		        }else {

		        	return 2;
		        }
	    	}else{
	    		$query = "UPDATE entreprise SET nom = ?,adresse = ? ,contact_phone = ? ,contact_email = ? ";

		        $sql = $this->conn->prepare($query);

		        if ($sql->execute(array($nom,$adresse,$telephone,$email))) {          

		        	return 1;

		        }else {

		        	return 2;
		        }
	    	}
	    	
		}

	    //Méthode pour ajouter un article à la liste des favoris
	    public function addFavoris($idP,$idC){

	    	$query = "INSERT INTO favoris (id_pro,id_cli) VALUES (?,?)";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($idP,$idC))) {          
	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

		//Méthode pour tester si un produit existe dans la table favoris
	    public function productExistInfav($idP,$idC){

	      	$data = null;

	      	$query = "SELECT favoris.id FROM favoris,produit,client WHERE favoris.id_cli = client.id AND favoris.id_pro = produit.id AND favoris.id_pro = ? AND favoris.id_cli = ?";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($idP,$idC));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    	
		}

		//Méthode pour séléctionner les produits selon la liste des favoris du client dans la table favoris
	    public function getAllProductFavoris($idC){

	      	$data = null;

	      	$query = "SELECT produit.id, produit.designation, produit.prix, produit.image FROM favoris,produit,client WHERE favoris.id_cli = client.id AND favoris.id_pro = produit.id AND favoris.id_cli = ?";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($idC));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    	
		}

		//Méthode pour supprimer un produit dans la table favoris
	    public function deleteFavoris($idF){

	      	$data = null;

	      	$query = "DELETE FROM favoris WHERE id = ?";

	      	$sql = $this->conn->prepare($query);

	      	if ($sql->execute(array($idF))) {          
	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

	    //Méthode pour envoyer un message à l'administrateur
	    public function addMessageClient($nom,$postnom,$email,$objet,$message){

	    	$query = "INSERT INTO contact (nom,postnom,email,objet,message) VALUES (?,?,?,?,?)";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($nom,$postnom,$email,$objet,$message))) {          
	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

	    //Methode pour tester si le produit stock maison n'existe pas encore dans le système
	    public function prodMaisonExists($designation){

	    	$query = "SELECT * FROM stock_maison WHERE libelle = ? ";

	      	$sql = $this->conn->prepare($query);

	      	$req = $sql->execute(array($designation));

	      	$res = $sql->fetch(PDO::FETCH_ASSOC);

	      	return $res;

	    }


	    //Méthode pour ajouter un produit du stock maison dans ala base de données
	    public function insertProdMaison($designation,$qte){

	    	$query = "INSERT INTO stock_maison (libelle,stock) VALUES (?,?)";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($designation,$qte))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}


	    //Méthode pour séléctionner toutes les onnées de la table categorie
	    public function getProdMaison(){

	    	$data = null;

	      	$query = "SELECT * FROM stock_maison";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }


	    //Méthode pour séléctionner une seule donnée de la table categorie
	    public function getProdMaisonSingle($id){

	    	$data = null;

	      	$query = "SELECT * FROM stock_maison WHERE id = ?";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($id));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }


	    //Méthode pour modifier un produit du stock maison dans ala base de données
	    public function editProdMaison($designation,$qte,$id){

	    	$query = "UPDATE stock_maison SET libelle = ?,stock = ? WHERE id = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($designation,$qte,$id))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}


	    //Méthode pour supprimer un produit dans le stock de la maison dans ala base de données
	    public function deleteProdMaison($id){

	    	$query = "DELETE FROM stock_maison WHERE id = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($id))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

		//Méthode pour ajouter un approvisionnement dans ala base de données
	    public function insertApprovProdMaison($produit,$qte,$prix,$fournisseur){

	    	$query = "INSERT INTO entree_stock_maison (id_produit,qte,prix_achat,fournisseur) VALUES (?,?,?,?)";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($produit,$qte,$prix,$fournisseur))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}


		//Méthode pour modifier la quantité du produit après approvisionnement ou apres suppression de l'approvisionnement dans la base de données
	    public function updateQteProdMaison($produit,$qte,$action){

	    	$data = $this->getProdMaisonSingle($produit);

	    	foreach($data as $res){

	    		$id = $res['id'];
	    		if ($action == 'add') {
	    			$newQte = $res['stock']+$qte;
	    		}else{
	    			$newQte = $res['stock']-$qte;
	    		}

	    	}

	    	$query = "UPDATE stock_maison SET stock = ? WHERE id = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($newQte,$id))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

	    //Méthode pour séléctionner toutes les données de la table categorie
	    public function getApprovProdMaison(){

	    	$data = null;

	      	$query = "SELECT entree_stock_maison.id, libelle,entree_stock_maison.prix_achat,entree_stock_maison.qte,entree_stock_maison.date_entree,fournisseur,id_produit FROM stock_maison, entree_stock_maison WHERE id_produit = stock_maison.id ";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Méthode pour séléctionner toutes les données de la table categorie
	    public function getApprovProdMaisonSearch($debut,$fin){

	    	$data = null;

	      	$query = "SELECT entree_stock_maison.id, libelle,entree_stock_maison.prix_achat,entree_stock_maison.qte,entree_stock_maison.date_entree,fournisseur,id_produit FROM stock_maison, entree_stock_maison WHERE id_produit = stock_maison.id AND entree_stock_maison.date_entree BETWEEN ? AND ? ";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($debut,$fin));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }


	    //Méthode pour séléctionner une donnée de la table approvisionnement
	    public function getApprovProdMaisonSingle($id){

	    	$data = null;

	      	$query = "SELECT entree_stock_maison.id, libelle,entree_stock_maison.prix_achat,entree_stock_maison.qte,entree_stock_maison.date_entree,fournisseur,id_produit FROM stock_maison, entree_stock_maison WHERE id_produit = stock_maison.id AND entree_stock_maison.id = ?";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($id));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Méthode pour séléctionner toutes les données de la table vente_admin
	    public function getTransfertsAll(){

	    	$data = null;

	      	$query = "SELECT sortie_stock_maison.id,qte,date_sortie,id_produit,libelle FROM sortie_stock_maison, stock_maison WHERE id_produit = stock_maison.id ";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Méthode pour séléctionner toutes les données de la table vente_admin
	    public function getTransfertsAllSearch($debut,$fin){

	    	$data = null;

	      	$query = "SELECT sortie_stock_maison.id,qte,date_sortie,id_produit,libelle FROM sortie_stock_maison, stock_maison WHERE id_produit = stock_maison.id AND date_sortie BETWEEN ? AND ?";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($debut,$fin));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

		//Méthode pour modifier la quantité du produit après approvisionnement ou apres suppression de l'approvisionnement dans la base de données
	    public function updateQteTransfert($produit,$qte,$action){

	    	$data = $this->getProdMaisonSingle($produit);

	    	foreach($data as $res){

	    		$id = $res['id'];
	    		if ($action == 'add') {
	    			$newQte = $res['stock']+$qte;
	    		}else{
	    			$newQte = $res['stock']-$qte;
	    		}

	    	}

	    	$query = "UPDATE stock_maison SET stock = ? WHERE id = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($newQte,$id))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}


		//Méthode pour ajouter une vente dans la table vente_admin dans ala base de données
	    public function insertTransfert($qte,$produit){

	    	$query = "INSERT INTO sortie_stock_maison (qte,id_produit) VALUES (?,?)";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($qte,$produit))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

	    //Méthode pour séléctionner un renregistrement dans la table vente_admin
	    public function getTransfertSingle($id){

	    	$data = null;

	      	$query = "SELECT sortie_stock_maison.id,qte,date_sortie,id_produit,libelle FROM sortie_stock_maison, stock_maison WHERE id_produit = stock_maison.id AND sortie_stock_maison.id = ?";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($id));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }


		//Méthode pour supprimer un mouvement approvisionnement dans ala base de données
	    public function deleteTransfert($id){

	    	$query = "DELETE FROM sortie_stock_maison WHERE id = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($id))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

		//Méthode pour supprimer un mouvement approvisionnement stock maison dans ala base de données
	    public function deleteApprovProdMaison($id){

	    	$query = "DELETE FROM entree_stock_maison WHERE id = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($id))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}
		

		//Méthode pour afficher tous les messages des clients
	    public function getAllMessages(){

	    	$data = null;

	      	$query = "SELECT * FROM contact ORDER BY date_pub DESC";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    	
		}
		
		//Méthode pour afficher le nombre total messages recus
	    public function getAllMessagesCount(){

			$data = null;

			$query = "SELECT count(*) as total FROM contact";

			$sql = $this->conn->prepare($query);

			$sql->execute();

			while($res = $sql->fetch(PDO::FETCH_ASSOC)){

			  $data[] = $res;
			}

			return $data;
		  
	  	}
	  
	    //Méthode pour séléctionner toutes les données de la table produit coté admin
	    public function getAllPublicites(){

	    	$data = null;

	      	$query = "SELECT * FROM publicite ";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }

	    //Méthode pour séléctionner une donnée de la table publicité
	    public function getPublicite($id){

	    	$data = null;

	      	$query = "SELECT * FROM publicite WHERE id = ?";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($id));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }
		

	    //Méthode pour modifier une publicite dans ala base de données
	    public function editPublicite($designation,$detail,$newname,$id){

	    	if (!empty($newname)) {
	    		$query = "UPDATE publicite SET titre = ?,detail = ?,image = ? WHERE id = ?";
	    		$sql = $this->conn->prepare($query);

		        if ($sql->execute(array($designation,$detail,$newname,$id))) {          
		        	return 1;

		        }else {

		        	return 2;
		        }
	    	}else{
	    		$query = "UPDATE publicite SET titre = ?,detail = ? WHERE id = ?";
	    		$sql = $this->conn->prepare($query);

		        if ($sql->execute(array($designation,$detail,$id))) {          
		        	return 1;

		        }else {

		        	return 2;
		        }
	    	}
	    	
		}

		//Méthode pour ajouter une vente dans la table vente_admin dans ala base de données
	    public function addSubscription($email){

	    	$query = "INSERT INTO subscriber (email) VALUES (?)";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($email))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}

	    //Méthode pour ajouter un témoignage dans la table témoignage dans la base de données 
	    public function insertTemoignage($nom,$fonction,$message,$newname){

	    	if (!empty($newname)) {
				$query = "INSERT INTO temoignage (nom,fonction,message,image) VALUES (?,?,?,?)";

				$sql = $this->conn->prepare($query);

				if ($sql->execute(array($nom,$fonction,$message,$newname))) {          
					return 1;

				}else {

					return 2;
				}

			}else{
				$query = "INSERT INTO temoignage (nom,fonction,message,image) VALUES (?,?,?,?)";

				$sql = $this->conn->prepare($query);

				if ($sql->execute(array($nom,$fonction,$message,$newname='avatar.png'))) {          
					return 1;

				}else {

					return 2;
				}
			}
	    	
		}

	    //Méthode pour séléctionner toutes les données de la table témoignage
	    public function getTemoignage(){

	    	$data = null;

	      	$query = "SELECT * FROM temoignage ORDER BY date_pub DESC";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }
		

	    //Méthode pour supprimer un témoignage dans ala base de données
	    public function deleteTemoignage($id){

	    	$query = "DELETE FROM temoignage WHERE id = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($id))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}
		

	    //Méthode pour ajouter un article dans la table blog dans la base de données 
	    public function insertArticle($id,$titre,$detail,$description,$newname){

	    	if (!empty($newname)) {
				$query = "INSERT INTO blog (id_admin,titre,detail,description,image) VALUES (?,?,?,?,?)";

				$sql = $this->conn->prepare($query);

				if ($sql->execute(array($id,$titre,$detail,$description,$newname))) {          
					return 1;

				}else {

					return 2;
				}

			}else{
				$query = "INSERT INTO blog (id_admin,titre,detail,description,image) VALUES (?,?,?,?,?)";

				$sql = $this->conn->prepare($query);

				if ($sql->execute(array($id,$titre,$detail,$description,$newname='New_Center.jpg'))) {          
					return 1;

				}else {

					return 2;
				}
			}
	    	
		}
		

	    //Méthode pour séléctionner toutes les données de la table blog
	    public function getBlog($debut,$fin){

	    	$data = null;

	      	if (empty($debut) && empty($fin)) {
				$query = "SELECT blog.id, titre, detail, description, image, date_pub,nom_complet FROM blog, gerant  WHERE blog.id_admin = gerant.id ORDER BY date_pub DESC ";
			}else{
				$query = "SELECT blog.id, titre, detail, description, image, date_pub,nom_complet FROM blog, gerant  WHERE blog.id_admin = gerant.id ORDER BY date_pub DESC LIMIT $debut,$fin";
			}

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute();

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }
		
	    //Méthode pour séléctionner une seule donnée de la table blog
	    public function getBlogSingle($id){

	    	$data = null;

	      	$query = "SELECT blog.id, titre, detail, description, image, date_pub,nom_complet FROM blog, gerant  WHERE blog.id_admin = gerant.id AND blog.id = ? ";

	      	$sql = $this->conn->prepare($query);

	      	$sql->execute(array($id));

	      	while($res = $sql->fetch(PDO::FETCH_ASSOC)){

	        	$data[] = $res;
	      	}

	      	return $data;
	    }
		
	    //Méthode pour supprimer un témoignage dans ala base de données
	    public function deleteBlog($id){

	    	$query = "DELETE FROM blog WHERE id = ?";

	        $sql = $this->conn->prepare($query);

	        if ($sql->execute(array($id))) {          

	        	return 1;

	        }else {

	        	return 2;
	        }
	    	
		}
		
		


	}


