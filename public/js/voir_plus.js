/*
* Ce script permer à l'administrateur d'avoir toutes les informations supplémentaires
* sur une demande de releve ou de réclamation en clik
*/
$(function(){
    $('.voirPlusMoins').click(function(){
        var id = $(this).attr('id');
        id = id.split('_')[1];
        if($(this).text() == 'Voir plus'){
            $('#esclave_'+id).css('display','');
            $(this).text('Voir moins');
        }else{
            $(this).text('Voir plus');
            $('#esclave_'+id).css('display','none');
        }
    });
});
