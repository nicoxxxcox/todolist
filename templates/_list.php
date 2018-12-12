<?php

$res = $list->getNotes();
while ($unDone = $res->fetch(PDO::FETCH_ASSOC)) {
	echo "<form method=\"post\" action=\"functions.php\" id='form-undone' class=\"mb-2\">
                <div class=\"input-group \">
                    <div class=\"input-group-prepend\">
                        <input hidden type='text' name='id' id='id' value='" . $unDone['id'] . "'>
                         <button class=\"btn btn-list  btn-square \" name=\"done\" type=\"submit\"  ><i class=\"far fa-square \"></i></button>
                    </div>
                    <input type=\"text\" id='todo' class=\"form-control form-control-plaintext input-edit \" data-control='". $unDone['id'] . "' name='todo' value=\"" . $unDone['content'] . "\"  aria-label=\"Text input with checkbox\">
                    <div class=\"input-group-append\" id=\"button-addon4\">
                        <button class=\"btn btn-list btn-edit data-control='". $unDone['id'] . "' \" name=\"edit\" type=\"submit\"><i class=\"fas fa-edit \"></i></button>
                    </div>
                </div>
            </form>";
    } ?>

            <form method="post" action="functions.php" class="mb-2 mt-4">
                <div class="input-group ">
                    <input type="text" autofocus class="form-control add-field" id="field" name="add_content" aria-label="Text input with checkbox" placeholder="Ajouter un element">
                    <input type="text" hidden name="add_state" value="0">
                    <div class="input-group-append" id="button-addon4">
                        <button class="btn btn-list btn-plus " type="submit"><i class="fas fa-plus"></i></button>
                    </div>
                </div>
            </form>

            <hr class="my-4">

            <p class="mb-4 text-black-50 font-weight-bold ">Elements cochés</p>

<?php

$res2 = $list->getNotesDone();
while ($Done = $res2->fetch(PDO::FETCH_ASSOC)) {
	echo "<form method=\"post\" action=\"functions.php\" class=\"mb-2\">
            <div class=\"input-group \">
                <div class=\"input-group-prepend\">
                    <input hidden type='text' name='id' value='" . $unDone['id'] . "'>
                    <button class=\"btn btn-list btn-square  \" name=\"done-check\" type=\"submit\"  ><i class=\"far fa-check-square \"></i></button>
                </div>
                <input hidden type='text' name='id' value='" . $Done['id'] . "'>
                <input  type=\"text\" class=\"form-control done-field\" style=\"text-decoration: line-through\" value=\"" . $Done['content'] . "\" readonly aria-label=\"Text input with checkbox\">
                <div class=\"input-group-append\" id=\"button-addon4\">
                    <button class=\"btn btn-list btn-trash \" name=\"delete\" type=\"submit\"><i class=\"fas fa-trash \"></i></button>
                </div>
            </div>
          </form>";
}
?>

    <form method="post" action="functions.php" class="mt-4">
        <button class="btn btn-block btn-outline-danger" name="delete_alldone" type="submit">Supprimer tous les elements cochés</button>
    </form>

<p class="text-center mt-5">Fait avec ❤️ par TYUIOP </p>

