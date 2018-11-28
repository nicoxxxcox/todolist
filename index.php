<?php

include_once "class/database.class.php";
include_once "class/todo.class.php";
include_once "functions.php";


?>

<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>TodoList</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="app.css">

</head>
<body>
<div class="container">

    <div class="row ">

        <div class="col-sm-6 mx-auto border border-light rounded shadow  mt-5 pt-5 pb-1">
           <h3 class="mb-4 font-weight-bold text-grey">TODOLIST 📝</h3>

            <!--ICI LA LISTE-->

                <?php

                $res = $list->getEls();
                while ($unDone = $res->fetch(PDO::FETCH_ASSOC)) {
	                echo "<form method=\"post\" action=\"functions.php\" class=\"mb-2\">
                <div class=\"input-group \">
                <div class=\"input-group-prepend\">
                    
                    <input hidden type='text' name='id' value='". $unDone['id'] ."'>
                    
                     <button class=\"btn btn-link  \" name=\"done\" type=\"submit\"  ><i class=\"far fa-square text-black-50\"></i></button>
                   
                    
                </div>

                <input type=\"text\" class=\"form-control form-control-plaintext \" name='todo' value=\"" . $unDone['content'] . "\"  aria-label=\"Text input with checkbox\">
                <div class=\"input-group-append\" id=\"button-addon4\">
                    <button class=\"btn btn-link \" name=\"edit\" type=\"submit\"><i class=\"fas fa-edit text-secondary \"></i></button>
                    <!--<button class=\"btn btn-link\" name=\"delete\" type=\"submit\"><i class=\"fas fa-trash text-danger \"></i></button>-->
                </div>
            </div>
                </form>";
                }
                ?>

            <form method="post" action="functions.php" class="mb-2 mt-4">
                <div class="input-group ">
                <input type="text" autofocus class="form-control add-field" name="add_content" aria-label="Text input with checkbox" placeholder="Ajouter un element">

                    <input type="text" hidden name="add_state" value="0">

                <div class="input-group-append" id="button-addon4">
                    <button class="btn btn-link" type="submit"><i class="fas fa-plus text-secondary"></i></button>

                </div>
            </div>
            </form>

            <hr>

            <p class="mb-4 text-secondary ">Elements cochés</p>

	        <?php

	        $res2 = $list->getElsDone();
	        while ($Done = $res2->fetch(PDO::FETCH_ASSOC))
	        {
		        echo "<form method=\"post\" action=\"functions.php\" class=\"mb-2\">
                <div class=\"input-group \">
                
                <div class=\"input-group-prepend\">
                    
                    <input hidden type='text' name='id' value='". $unDone['id'] ."'>
                    
                     <button class=\"btn btn-link \" name=\"done\" type=\"submit\"  ><i class=\"far fa-check-square text-black-50\"></i></button>
                   
                    
                </div>
               
                <input hidden type='text' name='id' value='". $Done['id'] ."'>
                <input  type=\"text\" class=\"form-control done-field\" style=\"text-decoration: line-through\" value=\"". $Done['content']."\" readonly aria-label=\"Text input with checkbox\">
                <div class=\"input-group-append\" id=\"button-addon4\">
                   
                    <button class=\"btn btn-link\" name=\"delete\" type=\"submit\"><i class=\"fas fa-trash text-secondary\"></i></button>
                </div>
                </div>
                </form>";
	        }
	        ?>

            <form method="post" action="functions.php" class="mt-4">
              <button class="btn btn-block btn-outline-danger" name="delete_alldone" type="submit">Supprimer tous les elements cochés</button>
            </form>

            <p class="text-center mt-5">Fait avec ❤️ par TYUIOP </p>

        </div>
        
    </div>


</div>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>



