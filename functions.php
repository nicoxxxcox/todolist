<?php

include_once "class/database.class.php";
include_once "class/todo.class.php";

// bdd
database::pdo();
$list = new todo(database::$bdd);



//INSERT
if(isset($_POST['add_state']) && isset($_POST['add_content'])){
	$list->setNewEl($_POST);
}

//DONE
if(isset($_POST['done'])){

	$id = $_POST['id'];
	$list->upEl($id);
}

//EDIT
if(isset($_POST['edit'])){

	$id = $_POST['id'];
	$content = $_POST['todo'];
	$list->editEl( $content , $id);
}

//DELETE
if(isset($_POST['delete'])){
	$id = $_POST['id'];
	$list->delEl($id);
}
