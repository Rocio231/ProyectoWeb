
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
        $(document).ready(function() {
            $('#municipio').change(function() {
                $('#idMunicipio').val($(this).val());
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
        document.getElementById("btnSalir").addEventListener("click", function() {
            // Redireccionar a la pantalla menuOpciones.php
            window.location.href = "../vista/menuOpciones.php";
        });
    </script>


    <div class="container">
        <div class="row p-4">
            <div class="col">
                <div class="card">
                    <div class="card-body"></div>
                    <form id="viviendas-form">
                        <div class="form-group">
                        <h4>Datos generales de la vivienda</h4>
                        <label>Municipio</label>
                        <input type="text" id="idMunicipio" placeholder="ID Municipio" class="form-control my-2" readonly>
                        </div>
                        <div class="form-group">
                        <select id="municipio" name="municipio" placeholder="Seleccionar Municipio" class="form-control my-2">
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

                        <div id ="selectLocalidades">
                            
                        </div>
                        <h4>Datos particulares de la vivienda</h4>
                        <label>Tipo Vivienda</label>
                        <div id=selectTipoVivienda>
                        <select id="tipoVivienda" name="tipoVivienda" placeholder="Seleccionar Tipo de vivienda" class="form-control my-2">
                                <option value="1">Casa</option>
                                <option value="2">Departamento</option>
                                <option value="3">Hacienda</option>
                            </select>
                        </div>
                        <label>Material</label>
                        <div id=selectMaterial>
                        <select id="material" name="material" placeholder="Seleccionar Material" class="form-control my-2">
                                <option value="1">Concreto</option>
                                <option value="2">Adobe (Antiguo)</option>
                                <option value="3">Adobe (Moderno)</option>
                                <option value="4">Carton</option>
                                <option value="5">Piedra</option>
                                <option value="6">Ladrillo</option>
                                <option value="7">Ecológico</option>
                                <option value="8">Paja, ramas o caña</option>
                                <option value="9">Prefabricada</option>
                        </select>
                        </div>
                        <label>Saneamiento</label>
                        <div id=selectSaneamiento>
                        <select id="saneamiento" name="saneamiento" placeholder="Seleccionar Saneamiento" class="form-control my-2">
                                <option value="1">Drenaje</option>
                                <option value="2">Fosa séptica</option>
                                <option value="3">Letrina</option>
                            </select>
                        </div>
                        <label>Tendencia</label>
                        <div id=selectTendencia>
                        <select id="tendencia" name="tendencia" placeholder="Seleccionar Tendencia" class="form-control my-2">
                                <option value="1">Propia</option>
                                <option value="2">Renta</option>
                        </select>
                        </div>
                        <div id=textDireccion>
                            <label>Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingresar direccion">
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
                            <input type="text" class="form-control" id="habitaciones" name="habitaciones" placeholder="Ingresar Num de Habitaciones">
                        </div>

                        <div id=numBanos>
                            <label>Número de Baños</label>
                            <input type="text" class="form-control" id="banos" name="banos" placeholder="Ingresar Num de Baños">
                        </div>
                        <button type="submit" class="btn btn-primary text-center w-100">Agregar Vivienda</button>
                        <button type="submit" class="btn btn-primary text-center w-100">Modificar Vivienda</button>                        
                    </form>                    
            </div>  
        </div>        
    </div>

    <div class="container">
        <div class="row p-4">
            <div class="col">
                <div class="card">
                    <div class="card-body"></div>
                    <form id="habitantes-form">
                        <div class="form-group">
                        <h4>Datos de los Habitantes de la Vivienda</h4>
                        <label>Id Habitante</label>
                        <input type="text" id="idHabitante" placeholder="Ingresar el ID del Habitante" class="form-control my-2">
                        </div>

                        <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" id="nombre" placeholder="Ingresar nombre completo" class="form-control my-2">
                        </div>

                        <div class="form-group">
                        <label>Edad</label>
                        <input type="text" id="edad" placeholder="Ingresar edad" class="form-control my-2">
                        </div>

                        <div class="form-group">
                        <label>Sexo</label>
                        <select id="sexo" name="sexo" placeholder="Seleccionar Sexo" class="form-control my-2">
                            <option value="1">M</option>
                            <option value="2">F</option>
                        </select>
                        </div>

                        <div class="form-group">
                        <label>Estado Civil</label>
                        <select id="edoCivil" name="edoCivil" placeholder="Seleccionar Estado Civil" class="form-control my-2">
                            <option value="1">Soltero</option>
                            <option value="2">Casado</option>
                            <option value="3">Divorciado</option>
                        </select>
                        </div>

                        <div class="form-group">
                        <label>Nivel Educativo</label>
                        <select id="nivEducativo" name="nivEducativo" placeholder="Seleccionar Nivel Educativo" class="form-control my-2">
                            <option value="1">No estudia</option>
                            <option value="2">Kinder</option>
                            <option value="3">Primaria</option>
                            <option value="4">Secundaria</option>
                            <option value="5">Preparatoria</option>
                            <option value="6">Licenciatura</option>
                            <option value="7">Posgrado</option>
                        </select>
                        </div>

                        <div class="form-group">
                        <label>Ingresos</label>
                        <input type="text" id="ingresos" placeholder="Ingresar ingresos" class="form-control my-2">
                        </div>

                        <div class="form-group">
                        <label>Nacionalidad</label>
                        <input type="text" id="nacionalidad" placeholder="Ingresar nacionalidad" class="form-control my-2">
                        </div>
                        <button type="submit" class="btn btn-primary text-center w-100">Agregar Habitante</button>
                        <button type="submit" class="btn btn-primary text-center w-100">Modificar Habitante</button>                        
                    </form>                    
            </div>  
        </div>        
    </div>

    <div class="container">
        <div class="row p-4">
            <div class="col">
                <div class="card">
                    <div class="card-body"></div>
                    <form id="viviendas-form">
                        <div class="form-group">
                        <h4>Ocupaciones de la Vivienda</h4>
                        <label>Id Ocupacion</label>
                        <input type="text" id="idOcupacion" placeholder="ID Ocupacion" class="form-control my-2" readonly>
                        <select id="ocupaciones" name="ocupaciones" class="form-control">
                      
                            <option value="1">No estudia</option>
                            <option value="2">Kinder</option>
                            <option value="3">Primaria</option>
                            <option value="4">Secundaria</option>
                            <option value="5">Preparatoria</option>
                            <option value="6">Licenciatura</option>
                            <option value="7">Posgrado</option>
                       
                        </select>

                        <button type="submit" class="btn btn-primary text-center w-100">Agregar Ocupacion a Habitante</button>                
                    </form>                    
            </div>  
        </div>        
    </div>
</body>
</html>

<script type="text/javascript" src="../controlador/VerificarMunicipio.js"></script>
<script type="text/javascript" src="../controlador/VerificarOcupacion.js"></script>