<?php

$res = $list->getEls();
while ($unDone = $res->fetch(PDO::FETCH_ASSOC)) {
	echo "<form method=\"post\" action=\"functions.php\" class=\"mb-2\">
                <div class=\"input-group \">
                    <div class=\"input-group-prepend\">
                        <input hidden type='text' name='id' value='" . $unDone['id'] . "'>
                         <button class=\"btn btn-link  \" name=\"done\" type=\"submit\"  ><i class=\"far fa-square text-black-50\"></i></button>
                    </div>
                    <input type=\"text\" class=\"form-control form-control-plaintext \" name='todo' value=\"" . $unDone['content'] . "\"  aria-label=\"Text input with checkbox\">
                    <div class=\"input-group-append\" id=\"button-addon4\">
                        <button class=\"btn btn-link \" name=\"edit\" type=\"submit\"><i class=\"fas fa-edit text-secondary \"></i></button>
                    </div>
                </div>
            </form>";
    } ?>

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

            <p class="mb-4 text-black-50 font-weight-bold ">Elements cochés</p>

<?php

$res2 = $list->getElsDone();
while ($Done = $res2->fetch(PDO::FETCH_ASSOC)) {
	echo "<form method=\"post\" action=\"functions.php\" class=\"mb-2\">
            <div class=\"input-group \">
                <div class=\"input-group-prepend\">
                    <input hidden type='text' name='id' value='" . $unDone['id'] . "'>
                    <button class=\"btn btn-link \" name=\"done\" type=\"submit\"  ><i class=\"far fa-check-square text-black-50\"></i></button>
                </div>
                <input hidden type='text' name='id' value='" . $Done['id'] . "'>
                <input  type=\"text\" class=\"form-control done-field\" style=\"text-decoration: line-through\" value=\"" . $Done['content'] . "\" readonly aria-label=\"Text input with checkbox\">
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

