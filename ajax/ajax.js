$(function(){

    $("#form-undone").submit(function (){

        id = $(this).find("#id").val();
        content = $(this).find("#todo").val();

        $.post({
            type: "POST",
            url: './ajax/ajax.php',
            data:  '{id : id , content : content}',

            success: function(retour){
                $("#contenu").html(retour);
            }
        });

    });




});
