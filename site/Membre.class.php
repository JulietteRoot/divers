<?php

class Membre
{
	private $pseudo;
	public function __construct($nom)
	{
		$this->pseudo=$nom;
	}
	public function getPseudo()
	{
		echo 'Salut '.$this->pseudo;
		return $this->pseudo;
	}
	public function choisir_nom_famille($nom_famille)
	{
		echo 'Tu t\'appelles désormais '.$this->pseudo.' '.$nom_famille.' !';
	}
}
