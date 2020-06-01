$(function(){
    /*
    Important pour les requêtes ajax avec Laravel
    */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /*
    Action unique selectionné => checkbox caché, bouton passage global caché
    Action groupée selectionné => checkbox non caché, bouton passage global non caché, bouton passage unique caché
    */
    $('.action_admin_selection').change(function (){
        var action = $('.action_admin_selection option:selected').val();

        if(action == 'Action unique'){
            $('.action_groupe_checkbox').css('display', 'none');
            $('.passer_etape_groupe_btn').css('display', 'none');
            $('.passer_etape_unique_btn').css('display', '');
        }else if(action == 'Action groupée'){
            $('.action_groupe_checkbox').css('display', '');
            $('.passer_etape_groupe_btn').css('display', '');
            $('.passer_etape_unique_btn').css('display', 'none');
        }
    });

    /*
    Selection de tous les checkbox selectionnés
    Parcours
    Récupération des values
    Séparation (séparateur :)
    Requête ajax pour chaque itération
    Suppression de la ligne en cas de succès
    */
    $('.passer_etape_groupe_btn').click(function(e){
        $('.action_groupe_checkbox:checked').each(function(){
            var infos = $(this).val().split(':');
            $.post('/utilisateurs/actions',
                    {type:infos[0], id:infos[1], etape:infos[2],etudiant:infos[3]},
                    function(){
                        $('#'+infos[1]).remove();
                        location.reload();
                    });
        });
    });


    /*
    Récupération de value
    Séparation (séparateur :)
    Requête ajax
    Suppression de la ligne en cas de succès
    */
    $('.passer_etape_unique_btn').click(function(e){
        var infos = $(this).val().split(':');
        $.post('/utilisateurs/actions',{type:infos[0], id:infos[1], etape:infos[2], etudiant:infos[3]}, function(){
            $('#'+infos[1]).remove();
            location.reload();
        });
    });
});
