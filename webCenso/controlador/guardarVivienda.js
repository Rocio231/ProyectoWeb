$(document).ready(function() {
    $('#viviendas-form').submit(function(event) {
        event.preventDefault(); // Evita que se envíe el formulario de forma predeterminada

        // Obtener los valores del formulario
        var tipoVivienda = $('#tipoVivienda').val();
        var material = $('#material').val();
        var saneamiento = $('#saneamiento').val();
        var agua = $('#agua').is(':checked') ? 'SI' : 'NO';
        var luz = $('#luz').is(':checked') ? 'SI' : 'NO';
        var drenaje = $('#drenaje').is(':checked') ? 'SI' : 'NO';
        var tendencia = $('#tendencia').val();
        var direccion = $('#direccion').val();
        var habitaciones = $('#habitaciones').val();
        var banos = $('#banos').val();
        var idLocalidad = $('#selectLocalidades').val();
        var idMunicipio = $('#idMunicipio').val();

        // Enviar la solicitud AJAX para guardar el registro
        $.ajax({
            url: 'guardarRegistro.php',
            method: 'POST',
            data: {
                tipoVivienda: tipoVivienda,
                material: material,
                saneamiento: saneamiento,
                agua: agua,
                luz: luz,
                drenaje: drenaje,
                tendencia: tendencia,
                direccion: direccion,
                habitaciones: habitaciones,
                banos: banos,
                idLocalidad: idLocalidad,
                idMunicipio: idMunicipio
            },
            success: function(response) {
                // Mostrar mensaje de éxito o error según la respuesta del servidor
                alert(response);
            },
            error: function() {
                // Mostrar mensaje de error en caso de que falle la solicitud AJAX
                alert('Error al enviar la solicitud');
            }
        });
    });
});
