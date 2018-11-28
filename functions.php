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
	$list->upEl($_POST['done']);
}

