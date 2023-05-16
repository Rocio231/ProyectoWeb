$(document).ready(function() {
    // Llamada AJAX a seleccionarOcupaciones
    $.ajax({
        url: '../modelo/CRUD.php',
        type: 'POST',
        data: {accion: 'seleccionarOcupaciones'},
        dataType: 'json',
        success: function(response) {
            // Si la consulta fue exitosa, llenar el select de ocupaciones
            if (response.status == 'ok') {
                // Recorrer el array de ocupaciones y agregar cada opción al select
                $.each(response.data, function(index, value) {
                    ocupaciones += '<option value="' + value.id + '">' + value.nombre + '</option>';
                });
                $('#ocupaciones').html(ocupaciones);
            } else {
                // Mostrar mensaje de error
                alert(response.message);
            }
        },
        error: function(xhr, status, error) {
            // Mostrar mensaje de error
            alert(error);
        }
    });
});
