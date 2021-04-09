<?php

require_once('DTO_joueur.php');

class DAOjoueur
{
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

	public function getByUsername($i) { #permet de récupérer une ligne de le l'username passé en paramètre
 		$sql = 'SELECT * FROM player WHERE name=?';
		$req = $this->bdd->prepare($sql);
		$req->execute([$i]);
		$data = $req->fetch(); 
		$joueur = new DTOjoueur($i, $data['libelle'], $data['prix']);
		return $joueur;
	}


	public function connection($util,$mdp,&$message){

		$requete = 'Select name from player where name= :_name';
        $reponse = $this->bdd->prepare($requete);
        $reponse->execute( array('_name'=>$util));
        $data = $reponse->fetch();
        
        

		if ($util==$data['name'])
        {


            $requete = 'Select password from player where name= :_name';
            $reponse = $this->bdd->prepare($requete);
            $reponse ->execute( array('_name'=>$util));
            $verif = $reponse->fetch();

		      if ($mdp==$verif['password'])
                {
                    $requete = 'Select * from player where name= :_name';
                    $reponse = $this->bdd->prepare($requete);
                    $reponse ->execute( array('_name'=>$util));
                    $data = $reponse->fetch();

                    $_SESSION['util']=$data['name'];
                    $_SESSION['argent']=$data['Argent'];
                    $_SESSION['ID']=$data['ID'];
                }

              else $message="votre mot de passe est incorrect.";    
		}

		else $message="Nom d'utilisateur inconnu ou erroné. Merci de reéssayer";
	}


	public function inscription($util,$mdp,&$message){

		$requete = 'select name from player where name = :_nom';
        $reponse = $this->bdd->prepare($requete);
        $reponse->execute(array('_nom'=>$util));

        $data=$reponse->fetch();

        if ($data['name']) {
            $message="Ce nom d'utilisateur existe déjà, merci d'en saisir un autre";
        }
        else{

        $name =$util;
        $mdp = $mdp;

        $requete = 'insert into player(name,password,argent) values (:t_name, :t_password, :argent)';

        $req = $this->bdd->prepare($requete);

        $req->execute( array(
            't_name' =>$name,
            't_password' =>$mdp,
            'argent' =>'1000',
            ));
			   $message="";
        }
    }

    public function MajArgent($argent,$util){

		 $requete = 'UPDATE player SET Argent = :_argent where name = :_name';
         $reponse=$this->bdd->prepare($requete);
         $reponse->execute(array(
                 '_argent'=>$argent,
                 '_name'=>$util)
                );
	}

}