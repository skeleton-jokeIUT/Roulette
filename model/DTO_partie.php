<?php

class DTOpartie{
	private $ID;
	private $DAT;
	private $Mise;
	private $Gain;

	public function __construct($id, $date, $mise, $gain){

		$this->ID=$id;
		$this->DAT=$date;
		$this->Mise=$mise;
		$this->Gain=$gain;
	}

	public function __get($attribut){

		switch ($attribut){
			case 'id' : 
			return $this->ID;
			break;

			case 'date' : 
			return $this->DAT;
			break;

			case 'mise' : 
			return $this->Mise;
			break;

			case 'gain' : 
			return $this->Gain;
			break;


		}

	}

	public function __set($attribut, $valeur){

			switch($attribut){

			case 'id' : 
			$this->ID = $valeur;
			break;

			case 'date' : 
			$this->DAT = $valeur;
			break;

			case 'mise' : 
			$this->Mise = $valeur;
			break;

			case 'gain' : 
			$this->Gain = $valeur;
			break;
		}

	}



}