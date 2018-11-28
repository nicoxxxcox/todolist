<?php

include_once "class/database.class.php";
include_once "class/todo.class.php";
include_once "functions.php";

?>

<!--HEADER-->
<?php require_once "./templates/_header.php" ?>
<!--HEADER-->

<div class="container">
    <div class="row ">
        <div class="col-sm-6 mx-auto border border-light rounded shadow  mt-5 pt-5 pb-1">
           <h3 class="mb-4 font-weight-bold text-grey">TODOLIST 📝</h3>
            <!--ICI LA LISTE-->
                <?php require "./templates/_list.php"; ?>
        </div>
    </div>
</div>

<!--FOOTER-->
<?php require_once "./templates/_footer.php";?>
<!--FOOTER-->


