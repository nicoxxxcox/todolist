<?php

include_once "class/database.class.php";
include_once "class/todo.class.php";

// bdd
database::pdo();
$list = new todo(database::$bdd);

//INSERT
if(isset($_POST['add_state']) && isset($_POST['add_content'])){
	$list->setNewNote($_POST);
	header("location:index.php");
}

//DONE
if(isset($_POST['done'])){

	$id = $_POST['id'];
	$list->setStateNote($id);
	header("location:index.php");
}

//UNDONE
if(isset($_POST['done-check'])){

	$id = $_POST['id'];
	$list->setStateUnNote($id);
	header("location:index.php");
}


//EDIT
if(isset($_POST['edit'])){

	$id = $_POST['id'];
	$content = $_POST['todo'];
	$list->setEditNote( $content , $id);
	header("location:index.php");
}

//DELETE
if(isset($_POST['delete'])){
	$id = $_POST['id'];
	$list->setDelNote($id);
	header("location:index.php");
}

//DELETE ALL CHECKED NOTES
if(isset($_POST['delete_alldone'])){
	$list->setDelAllNotes();

	header("location:index.php");
}