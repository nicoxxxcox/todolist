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
<link rel="stylesheet" href="app.css">

</head>
<body>
<div class="container">

    <div class="row ">

        <div class="col-sm-6 mx-auto border border-light rounded shadow  mt-5 py-5">
           <h3 class="mb-4 font-weight-bold">TodoList</h3>

            <!--ICI LA LISTE-->

                <?php

                $res = $list->getEls();
                while ($unDone = $res->fetch(PDO::FETCH_ASSOC)) {
	                echo "<form method=\"post\" action=\"functions.php\" class=\"mb-2\">
                <div class=\"input-group \">
                <div class=\"input-group-prepend\">
                    
                    
                     <button class=\"btn btn-outline-primary\" name=\"done\" type=\"submit\" value='1'>ok</button>
                    
                </div>

                <input type=\"text\" class=\"form-control\" value=\"" . $unDone['content'] . "\" readonly aria-label=\"Text input with checkbox\">
                <div class=\"input-group-append\" id=\"button-addon4\">
                    <button class=\"btn btn-outline-primary\" name=\"edit\" type=\"submit\">Editer</button>
                    <button class=\"btn btn-outline-danger\" name=\"submit\" type=\"submit\">Supprimer</button>
                </div>
            </div>
                </form>";
                }
                ?>

            <form method="post" action="functions.php" class="mb-2">
                <div class="input-group ">
                <input type="text" class="form-control" name="add_content" aria-label="Text input with checkbox" placeholder="Ajouter un element">

                    <input type="text" hidden name="add_state" value="0">

                <div class="input-group-append" id="button-addon4">
                    <button class="btn btn-outline-success" type="submit">Ajouter</button>

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
               

                <input type=\"text\" class=\"form-control\" style=\"text-decoration: line-through\" value=\"". $Done['content']."\" readonly aria-label=\"Text input with checkbox\">
                <div class=\"input-group-append\" id=\"button-addon4\">
                   
                    <button class=\"btn btn-outline-danger\" name=\"submit\" type=\"submit\">Supprimer</button>
                </div>
                </div>
                </form>";
	        }
	        ?>






        </div>


        
    </div>


</div>





</body>
</html>



