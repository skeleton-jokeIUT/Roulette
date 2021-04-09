<?php
class DTOjoueur
{
	private $id;
	private $name;
	private $password;
	private $argent;

	public function __construct($id,$name,$pass,$arg) {
		$this->id=$id;
		$this->name=$name;
		$this->password=$pass;
		$this->argent=$arg;

	}

	public function __get($attribut){

		switch ($attribut){
			case 'id' : 
			return $this->id;
			break;

			case 'name' : 
			return $this->name;
			break;

			case 'password' : 
			return $this->password;
			break;

			case 'argent' : 
			return $this->argent;
			break;


		}

	}

	public function __set($attribut, $valeur){

			switch($attribut){

			case 'id' : 
			$this->id = $valeur;
			break;

			case 'name' : 
			$this->name = $valeur;
			break;

			case 'password' : 
			$this->password = $valeur;
			break;

			case 'argent' : 
			$this->argent = $valeur;
			break;
		}

	}

}