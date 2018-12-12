<?php
/**
 * Created by PhpStorm.
 * User: nicolas.grissi
 * Date: 21/11/2018
 * Time: 10:18
 */

include_once "inc/config.php";

class database
{

	/*
	 *
	 */
	private $_bdd;
	static public $bdd;


	static public function pdo()
	{
		try {
			self::$bdd = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD,
				array
				(PDO::ATTR_ERRMODE
				=> PDO::ERRMODE_EXCEPTION)); // tester la connexion à la bdd
		} catch (Exception $e) {
			die('Erreur : ' . $e->getMessage()); // si ratée affichée la connexion à la bdd
		}
	}

	public function __construct()
	{
		try {
			$this->_bdd = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD,
				array
				(PDO::ATTR_ERRMODE
				=> PDO::ERRMODE_EXCEPTION)); // tester la connexion à la bdd
		} catch (Exception $e) {
			die('Erreur : ' . $e->getMessage()); // si ratée affichée la connexion à la bdd
		}
	}

	public function __get($name)
	{
		return $this->$name;
	}





}