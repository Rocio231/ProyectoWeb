<?php

require_once "../modelo/CRUD.php";


$id_municipio = $_POST['id_municipio'];

$CRUD = new CRUD();
$local = $CRUD->seleccionarLocalidadesXMunicipio($id_municipio);


$cadena="
<label>Localidad</label>
            <select id='idlocalidad' name='nombre_localidad' class='form-control'>";
foreach($local as $cw){

    $cadena.='<option value='.$cw['nombre_localidad'].'>'.$cw['nombre_localidad'].'</option>';
}

echo $cadena."</select>";