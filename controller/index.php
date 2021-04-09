<?php

session_start();

require_once('../model/DAO_joueur.php');
require_once('../model/DAO_partie.php');
require_once('../model/Fonction.php');

$daoJoueur=new DAOJoueur();
$daoPartie= new DAOpartie();


//initialisation module
$module="connexion";
//initialisation message qui affichera les messages d'erreurs des différents fonctions des DAO.
$message="";
//Permet de titre qui va permettre de changer le nom de la page. 
$titre= "Connexion";

//renvoie vers la page d'inscription si clique sur le boutton "s'inscrire".
if(isset($_POST['inscrire'])){
	$module="inscription";
	$titre="Inscription";
}

//Verification de su le bouton inscription a été cliqué.Si oui on lance la fonction inscription.
if (isset($_POST['Inscription']))
{
    if (isset($_POST['Nom_utilisateur']) && $_POST['Nom_utilisateur'] !=""
    &&($_POST['MDP']) && $_POST['MDP']!="")
    {
        $daoJoueur->inscription($_POST['Nom_utilisateur'],$_POST['MDP'],$message);
    }

    else $message="Pas de saisie";

    if ($message!=""){
    	$titre="Inscription";
    	$module="inscription";
    }

}


//vérification de connexion
if (isset($_POST['Envoyer']))
{

	if (isset($_POST['Nom_utilisateur']) && $_POST['Nom_utilisateur'] !=""
	&&($_POST['MDP']) && $_POST['MDP']!="")
    {
       $daoJoueur->connection($_POST['Nom_utilisateur'],$_POST['MDP'],$message);
    }
    else $message="Pas de saisie";

}

//Permet de se déconnecter en vidant la session.
if (isset($_GET['deco'])) {
	unset($_SESSION['util']);
	unset($_SESSION['argent']);
	unset($_SESSION['ID']);
}

//si connexion effectuer (=session remplie) renvoyer sur la page de la roulette. 
if (isset($_SESSION['util'])) {
	$module="roulette";
	$titre="Roulette";
}

//Afficher la page de connexion
if($module=="connexion"){

	include('../vue/start.php');
	include('../vue/connexion/startC.php');
	include('../vue/connexion/formulaireC.php');
	include('../vue/connexion/regle.php');
	include('../vue/fin.php');
}

//afficher la page d'inscription.
if($module=="inscription"){

	include('../vue/start.php');
	include('../vue/inscription/startF.php');
	include('../vue/inscription/formulaireI.php');
	include('../vue/fin.php');
}

//afficher la page du jeu de la roulette
if($module=="roulette"){

			include('../vue/start.php');
			include('../vue/roulette/startR.php');
			include('../vue/roulette/rappel_regle.php');

				

				//Traitements liés à l'appel de la Fonction "roulette"
				//Comme cette fonction fais des affichages je la met ici plutôt que les traitements simples.
             if(isset($_POST['Mise']))
            {

                $argentAvJeu=$_SESSION['argent'];

                $parite="";
                if(isset($_POST['Pair'])) $parite='pair';
                else if (isset($_POST['Impair'])) $parite='impair';
            
                $_SESSION['argent']=roulette($_POST['Somme'],$_SESSION['argent'],$_POST['Nombre'],$parite);
                 
                $daoPartie->creationPartie($_SESSION['ID'],$_POST['Somme'],$_SESSION['argent']-$argentAvJeu);

                $daoJoueur->MajArgent($_SESSION['argent'],$_SESSION['util']);
            }

			include('../vue/roulette/formulaireR.php');
			include('../vue/roulette/footer.php');
			include('../vue/fin.php');

}