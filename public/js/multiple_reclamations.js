$(function(){
    $('#moins').click(function(e){
        e.preventDefault();
        var nombre = $('#nombre').val();
        if(nombre > 1){
            $('#'+nombre).remove();
            nombre--;
            $('#nombre').val(nombre);
            if (nombre == 1){
                $('#titre').css('display', 'none');
            }
        }
    });

    $('#plus').click(function(e){
        e.preventDefault();
        var nombre = $('#nombre').val();
        nombre++;
        $('#'+(nombre - 1)).after(''+
            '<div id="'+(nombre)+'">'+
            '<br/><p>Réclamation '+(nombre)+'</p>'+
                '<div class="form-row my-4">'+
                    '<div class="col-lg-4">'+
                        '<label for="code'+nombre+'">Code</label>'+
                        '<input type="text" id="code'+nombre+'"class="form-control" name="code'+nombre+'" required>'+
                    '</div>'+
                    '<div class="col-lg-8">'+
                        '<label for="libelle'+nombre+'">Libelle</label>'+
                        '<input type="text" id="libelle'+nombre+'" class="form-control" name="libelle'+nombre+'" required>'+
                    '</div>'+
                '</div>'+
                '<div class="form-row my-4">'+
                    '<div class="col-lg-4">'+
                        '<label for="note_obtenue'+nombre+'">Note obtenue</label>'+
                        '<input type="text" class="form-control" name="note_obtenue'+nombre+'" id="note_obtenue'+nombre+'" required>'+
                    '</div>'+
                    '<div class="col-lg-8">'+
                        '<label for="note_reclame'+nombre+'">Note reclamée</label>'+
                        '<select name="note_reclame'+nombre+'" id="note_reclame'+nombre+'" class="custom-select" required>'+
                            '<option>Choisir un intervalle de note</option>'+
                            '<option>18-20</option>'+
                            '<option>16-18</option>'+
                            '<option>14-16</option>'+
                            '<option>12-14</option>'+
                            '<option>10-12</option>'+
                            '<option>8-10</option>'+
                            '<option>6-8</option>'+
                        '</select>'+
                    '</div>'+
                '</div>'+
                '<div class="form-group my-4">'+
                    '<label for="type_note'+nombre+'">Evaluation</label>'+
                    '<select name="type_note'+nombre+'" id="type_note'+nombre+'" class="custom-select" required>'+
                        '<option>Choisir une évaluation</option>'+
                        '<option>Devoir</option>'+
                        '<option>Examen</option>'+
                    '</select>'+
                '</div>'+
            '</div>'+
        '');
        $('#titre').css('display', '');
        $('#nombre').val(nombre);
    });
});
