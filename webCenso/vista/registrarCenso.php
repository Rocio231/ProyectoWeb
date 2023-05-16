<?php
include('../modelo/CRUD.php');
$crud_vivienda = new CRUD;
$crud_habitante = new CRUD;
$crud_ochab= new CRUD;


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["agregarVivienda"])) {
    if (isset($_POST["idMunicipio"])) {
        $idMunicipio = $_POST["idMunicipio"];
    }
    $municipio = $_POST["municipio"];
    //$localidad = $_POST["nombreLocalidad"];
    //$idLocalidad = $crud_vivienda->obtenerIdLocalidadPorNombre($localidad);
    $idLocalidad =4;
    $tipoVivienda = $_POST["tipoVivienda"];
    $material = $_POST["material"];
    $saneamiento = $_POST["saneamiento"];
    $tendencia = $_POST["tendencia"];
    $direccion = $_POST["direccion"];
    $agua = isset($_POST["agua"]) ? $_POST["agua"] : "NO";
    $luz = isset($_POST["luz"]) ? $_POST["luz"] : "NO";
    $drenaje = isset($_POST["drenaje"]) ? $_POST["drenaje"] : "NO";
    $habitaciones = $_POST["habitaciones"];
    $banos = $_POST["banos"];

    $crud_vivienda->crearVivienda($tipoVivienda, $material, $saneamiento, $agua, $luz, $drenaje, $tendencia, $direccion, $habitaciones, $banos, $idLocalidad, $idMunicipio);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["modificarVivienda"])) {
    if (isset($_POST["idMunicipio"])) {
        $idMunicipio = $_POST["idMunicipio"];
    }
    $municipio = $_POST["municipio"];
    //$localidad = $_POST["nombreLocalidad"];
    //$idLocalidad = $crud_vivienda->obtenerIdLocalidadPorNombre($localidad);
    $idLocalidad =20;
    $tipoVivienda = $_POST["tipoVivienda"];
    $material = $_POST["material"];
    $saneamiento = $_POST["saneamiento"];
    $tendencia = $_POST["tendencia"];
    $direccion = $_POST["direccion"];
    $agua = isset($_POST["agua"]) ? $_POST["agua"] : "NO";
    $luz = isset($_POST["luz"]) ? $_POST["luz"] : "NO";
    $drenaje = isset($_POST["drenaje"]) ? $_POST["drenaje"] : "NO";
    $habitaciones = $_POST["habitaciones"];
    $banos = $_POST["banos"];

    $crud_vivienda->actualizarUltimaViviendaAgregada($tipoVivienda, $material, $saneamiento, $agua, $luz, $drenaje, $tendencia, $direccion, $habitaciones, $banos, $idLocalidad, $idMunicipio);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["agregarHabitante"])) {
    $idhabitante = $_POST["idhabitante"];
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $sexo = $_POST["sexo"];
    $edoCivil = $_POST["edoCivil"];
    $nivel_educativo = $_POST["nivEducativo"];
    $ingresos = $_POST["ingresos"];
    $nacionalidad = $_POST["nacionalidad"];

    $crud_habitante->crearHabitante($idhabitante, $nombre, $edad, $sexo, $edoCivil, $nivel_educativo, $ingresos, $nacionalidad);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["modificarHabitante"])) {
    $idhabitante = $_POST["idhabitante"];
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $sexo = $_POST["sexo"];
    $edoCivil = $_POST["edoCivil"];
    $nivel_educativo = $_POST["nivEducativo"];
    $ingresos = $_POST["ingresos"];
    $nacionalidad = $_POST["nacionalidad"];

    $crud_habitante->actualizarHabitante($nombre, $edad, $sexo, $edoCivil, $nivel_educativo, $ingresos, $nacionalidad);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["agregarOcupacionVivienda"])) {
    $idocupacion = $_POST["idocupacion"];

    $crud_ochab->crearViviendaOcupacion($idocupacion);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registro Censo</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#municipio').change(function () {
                $('#idMunicipio').val($(this).val());
            });
        });

    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#ocupaciones').change(function () {
                $('#idocupacion').val($(this).val());
            });
        });
    </script>
</head>

<body>
    <nav class="navbar bg-primary">
        <div class="container">
            <a href="registrarCenso.php" class="navbar-brand fw-bold text-light">Registro Censo</a>
            <form class="d-flex">
                <button type="button" class="btn btn-warning" id="btnSalir">Salir</button>
            </form>
        </div>
    </nav>

    <script>
        // Agregar evento click al botón "Salir"
        document.getElementById("btnSalir").addEventListener("click", function () {
            // Redireccionar a la pantalla menuOpciones.php
            window.location.href = "../vista/menuOpciones.php";
        });
    </script>


    <div class="container">
        <div class="row p-4">
            <div class="col">
                <div class="card">
                    <div class="card-body"></div>
                    <form id="viviendas-form" method="POST">
                        <div class="form-group">
                            <h4>Datos generales de la vivienda</h4>
                            <label>Municipio</label>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="idMunicipio" id="idMunicipio" value="">
                            <select id="municipio" name="municipio" placeholder="Seleccionar Municipio"
                                class="form-control my-2">
                                <option value="1">Abasolo</option>
                                <option value="2">Acuña</option>
                                <option value="3">Allende</option>
                                <option value="4">Arteaga</option>
                                <option value="5">Candela</option>
                                <option value="6">Castaños</option>
                                <option value="7">Cuatro Ciénegas</option>
                                <option value="8">Escobedo</option>
                                <option value="9">Francisco I. Madero</option>
                                <option value="10">Frontera</option>
                                <option value="11">General Cepeda</option>
                                <option value="12">Guerrero</option>
                                <option value="13">Hidalgo</option>
                                <option value="14">Jiménez</option>
                                <option value="15">Juárez</option>
                                <option value="16">Lamadrid</option>
                                <option value="17">Matamoros</option>
                                <option value="18">Monclova</option>
                                <option value="19">Morelos</option>
                                <option value="20">Múzquiz</option>
                                <option value="21">Nadadores</option>
                                <option value="22">Nava</option>
                                <option value="23">Ocampo</option>
                                <option value="24">Parras</option>
                                <option value="25">Piedras Negras</option>
                                <option value="26">Progreso</option>
                                <option value="27">Ramos Arizpe</option>
                                <option value="28">Sabinas</option>
                                <option value="29">Sacramento</option>
                                <option value="30">Saltillo</option>
                                <option value="31">San Buenaventura</option>
                                <option value="32">San Juan de Sabinas</option>
                                <option value="33">San Pedro</option>
                                <option value="34">Sierra Mojada</option>
                                <option value="35">Torreón</option>
                                <option value="36">Viesca</option>
                                <option value="37">Villa Unión</option>
                                <option value="38">Zaragoza</option>
                            </select>
                        </div>
                        <input type="hidden" name="nombreLocalidad" id="nombreLocalidad" value="">
                        <div id="selectLocalidades">
                       
                        </div>
                        <h4>Datos particulares de la vivienda</h4>
                        <label>Tipo Vivienda</label>
                        <div id=selectTipoVivienda>
                            <select id="tipoVivienda" name="tipoVivienda" placeholder="Seleccionar Tipo de vivienda"
                                class="form-control my-2">
                                <option value="Casa">Casa</option>
                                <option value="Departamento">Departamento</option>
                                <option value="Hacienda">Hacienda</option>
                            </select>
                        </div>
                        <label>Material</label>
                        <div id=selectMaterial>
                            <select id="material" name="material" placeholder="Seleccionar Material"
                                class="form-control my-2">
                                <option value="Concreto">Concreto</option>
                                <option value="Adobe (Antiguo)">Adobe (Antiguo)</option>
                                <option value="Adobe (Moderno)">Adobe (Moderno)</option>
                                <option value="Carton">Carton</option>
                                <option value="Piedra">Piedra</option>
                                <option value="Ladrillo">Ladrillo</option>
                                <option value="Ecológico">Ecológico</option>
                                <option value="Paja, ramas o caña">Paja, ramas o caña</option>
                                <option value="Prefabricada">Prefabricada</option>
                            </select>
                        </div>
                        <label>Saneamiento</label>
                        <div id=selectSaneamiento>
                            <select id="saneamiento" name="saneamiento" placeholder="Seleccionar Saneamiento"
                                class="form-control my-2">
                                <option value="Drenaje">Drenaje</option>
                                <option value="Fosa séptica">Fosa séptica</option>
                                <option value="Letrina">Letrina</option>
                            </select>
                        </div>
                        <label>Tendencia</label>
                        <div id=selectTendencia>
                            <select id="tendencia" name="tendencia" placeholder="Seleccionar Tendencia"
                                class="form-control my-2">
                                <option value="Propia">Propia</option>
                                <option value="Renta">Renta</option>
                            </select>
                        </div>
                        <div id=textDireccion>
                            <label>Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion"
                                placeholder="Ingresar direccion">
                        </div>
                        <label>Marque si cuenta con los siguientes servicios:</label>
                        <div id="servicios">
                            <input type="checkbox" id="agua" name="agua" value="SI" checked>
                            <label for="suscribe">Agua</label>
                            <input type="checkbox" id="luz" name="luz" value="SI" checked>
                            <label for="suscribe">Luz</label>
                            <input type="checkbox" id="drenaje" name="drenaje" value="SI" checked>
                            <label for="suscribe">Drenaje</label>
                        </div>

                        <div id=numHabitaciones>
                            <label>Número de Habitaciones</label>
                            <input type="text" class="form-control" id="habitaciones" name="habitaciones"
                                placeholder="Ingresar Num de Habitaciones">
                        </div>

                        <div id=numBanos>
                            <label>Número de Baños</label>
                            <input type="text" class="form-control" id="banos" name="banos"
                                placeholder="Ingresar Num de Baños">
                        </div>
                        <button type="submit" class="btn btn-primary text-center w-100" name="agregarVivienda">Agregar
                            Vivienda</button>
                        <button type="submit" class="btn btn-primary text-center w-100" name="modificarVivienda">Modificar Vivienda</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row p-4">
                <div class="col">
                    <div class="card">
                        <div class="card-body"></div>
                        <form id="habitantes-form" method="POST">
                        <div class="form-group">
                            <h4>Datos de los Habitantes de la Vivienda</h4>
                            <label for="idhabitante">Id Habitante</label>
                            <input type="text" id="idhabitante" name="idhabitante" placeholder="Ingresar el ID del Habitante" class="form-control my-2" required>
                        </div>

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" placeholder="Ingresar nombre completo" class="form-control my-2" required>
                        </div>

                        <div class="form-group">
                            <label for="edad">Edad</label>
                            <input type="text" id="edad" name="edad" placeholder="Ingresar edad" class="form-control my-2" required>
                        </div>

                        <div class="form-group">
                            <label for="sexo">Sexo</label>
                            <select id="sexo" name="sexo" class="form-control my-2" required>
                                <option value="">Seleccionar Sexo</option>
                                <option value="M">M</option>
                                <option value="F">F</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="edoCivil">Estado Civil</label>
                            <select id="edoCivil" name="edoCivil" class="form-control my-2" required>
                                <option value="">Seleccionar Estado Civil</option>
                                <option value="Soltero">Soltero</option>
                                <option value="Casado">Casado</option>
                                <option value="Divorciado">Divorciado</option>
                            </select>
                        </div>

                            <div class="form-group">
                                <label>Nivel Educativo</label>
                                <select id="nivEducativo" name="nivEducativo" placeholder="Seleccionar Nivel Educativo"
                                    class="form-control my-2">
                                    <option value="No estudia">No estudia</option>
                                    <option value="Kinder">Kinder</option>
                                    <option value="Primaria">Primaria</option>
                                    <option value="Secundaria">Secundaria</option>
                                    <option value="Preparatoria">Preparatoria</option>
                                    <option value="Licenciatura">Licenciatura</option>
                                    <option value="Posgrado">Posgrado</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Ingresos</label>
                                <input type="text" id="ingresos" name="ingresos" placeholder="Ingresar ingresos"
                                    class="form-control my-2">
                            </div>

                            <div class="form-group">
                                <label>Nacionalidad</label>
                                <input type="text" id="nacionalidad" name="nacionalidad" placeholder="Ingresar nacionalidad"
                                    class="form-control my-2">
                            </div>
                            <button type="submit" class="btn btn-primary text-center w-100"name="agregarHabitante">Agregar Habitante</button>
                            <button type="submit" class="btn btn-primary text-center w-100"name="modificarHabitante">Modificar Habitante</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row p-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-body"></div>
                            <form id="viviendas-form" method="POST">
                                <div class="form-group">
                                    <h4>Ocupaciones de la Vivienda</h4>
                                    <label>Id Ocupacion</label>
                                    <input type="text" id="idocupacion" name="idocupacion" placeholder="ID Ocupacion"
                                        class="form-control my-2" readonly>
                                    <select id="ocupaciones" name="ocupaciones" class="form-control">

                                        <option value="1">Profesionista</option>
                                        <option value="2">Tecnicos</option>
                                        <option value="3">Trabajadores de la educacion</option>
                                        <option value="4">Trabajadores del arte</option>
                                        <option value="5">Funcionarios publicos</option>
                                        <option value="6">Funcionarios privados</option>
                                        <option value="7">Trabajador agricola</option>
                                        <option value="8">Artesano</option>
                                        <option value="9">Operador</option>
                                        <option value="10">Conductor</option>
                                        <option value="11">Supervusor</option>
                                        <option value="12">Comerciante</option>
                                        <option value="13">Vendedor ambulante</option>
                                        <option value="14">Proteccion</option>
                                        <option value="15">No especificado</option>


                                    </select>

                                    <button type="submit" class="btn btn-primary text-center w-100"name="agregarOcupacionVivienda">Agregar Ocupacion a Vivienda</button>
                            </form>
                        </div>
                    </div>
                </div>
</body>

</html>

<script type="text/javascript" src="../controlador/VerificarMunicipio.js"></script>