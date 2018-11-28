<?php

class todo
{
	private $_db;

	private $_id ;
	private $_state ;
	private $_content ;


	public function __construct($db)
	{
		 $this->_db = $db ;
	}

	public function getEls()
	{
		$res = $this->_db->query('SELECT id , state , content FROM todo WHERE state = 0');
		return $res;
	}

	public function getElsDone()
	{
		$res = $this->_db->query('SELECT id , state , content FROM todo WHERE state = 1');
		return $res;
	}

	public function setNewEl($content)
	{
		$req = $this->_db->prepare('INSERT INTO todo (state , content) VALUES (:state , :content)');

		$req->bindValue(':state' , $content['add_state'], PDO::PARAM_INT);
		$req->bindValue(':content' , $content['add_content'] , PDO::PARAM_STR);

		$req->execute();

		header("location:index.php");

	}

	public function upEl($state)
	{

	}


	public function __get($name)
	{
		return $this->$name;
	}

}