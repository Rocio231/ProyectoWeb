$(document).ready(function() {
    $('#municipio').change(function() {
        recargarLista();
    });
});

function recargarLista() {
    $.ajax({
        type: "POST",
        url: "../controlador/getLocalidades.php",
        data: "id_municipio=" + $('#municipio').val(),
        success: function(r) {
            $('#selectLocalidades').html(r);
            $('#nombreLocalidad').val($('#selectLocalidades').val()); // agregar esta línea
        }
    });
}

