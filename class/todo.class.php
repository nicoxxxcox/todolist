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

	public function __get($name)
	{
		return $this->$name;
	}

	public function getNotes()
	{
		// if state = 0 the task stay active
		$res = $this->_db->query('SELECT id , state , content FROM todo WHERE state = 0');
		return $res;
	}

	public function getNotesDone()
	{
		// if state = 1 the task is set to inactive
		$res = $this->_db->query('SELECT id , state , content FROM todo WHERE state = 1');
		return $res;
	}

	public function setNewNote($content)
	{
		$req = $this->_db->prepare('INSERT INTO todo (state , content) VALUES (:state , :content)');

		$req->bindValue(':state' , $content['add_state'], PDO::PARAM_INT);
		$req->bindValue(':content' , $content['add_content'] , PDO::PARAM_STR);
		$req->execute();

	}

	public function setStateNote($id)
	{
		$req = $this->_db->prepare('UPDATE todo SET state = 1 WHERE id = :id ');
		$req->bindValue(':id' , $id , PDO::PARAM_INT);
		$req->execute();
	}

	public function setEditNote($content , $id)
	{
		$req = $this->_db->prepare('UPDATE todo SET content = :content WHERE id = :id ');

		$req->bindValue(':content', $content , PDO::PARAM_STR );
		$req->bindValue(':id' , $id , PDO::PARAM_INT);
		$req->execute();


	}

	public function setDelNote($id)
	{
		$req = $this->_db->prepare('DELETE FROM todo WHERE id = :id');

		$req->bindValue(':id', $id , PDO::PARAM_INT);
		$req->execute();


	}

	public function setDelAllNotes()
	{
		$req = $this->_db->prepare('DELETE FROM todo WHERE state = 1');
		$req->execute();
	}



}