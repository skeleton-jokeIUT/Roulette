<?php

class DAOpartie{
private $bdd;

	public function __construct(){
		try{
   			$this->bdd= new PDO(
   				'mysql:host=localhost;dbname=joueur;charset=utf8',
   				'Johan',
   				'1234');
		}

		catch (Exception $e) {
     		die('Erreur'.$e->getMessage());
		}
	}

  public function getByID($i) { #permet de récupérer une ligne de le l'username passé en paramètre
    $sql = 'SELECT * FROM partie WHERE ID=?';
    $req = $this->bdd->prepare($sql);
    $req->execute([$i]);
    $data = $req->fetch(); 
    $partie = new DTOjoueur($i, $data['libelle'], $data['prix']);
    return $partie;
  }

	public function creationPartie($id,$mise,$gain_perte){

		$moment=date("d/m/y G:i:s");

        $requete = 'INSERT INTO partie VALUES (:_id, :_date, :_mise, :_gain)';
        $reponse=$this->bdd->prepare($requete);
        $reponse->execute(array(
         '_id'=>$id,
         '_date'=>$moment,
         '_mise'=>$mise,
         '_gain'=>$gain_perte)
                );
	}


}