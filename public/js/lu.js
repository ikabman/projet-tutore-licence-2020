$(function(){
    /*
    Important pour les requêtes ajax avec Laravel
    */
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.lu').click(function(){
        //Requête ajax pour marquer la notification comme lu
        $id = $(this).attr('value');        
        $.post('/etudiants/notifications/lu', {notification_id:$id}, function(){
            location.reload();
        });
    });
});
