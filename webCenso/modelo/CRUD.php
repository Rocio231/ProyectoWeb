<?php
if (file_exists('../modelo/SingeltonDB.php')) {
    require_once '../modelo/SingeltonDB.php';
} elseif (file_exists('modelo/SingeltonDB.php')) {
    require_once 'modelo/SingeltonDB.php';
} else {
    die('El archivo SingeltonDB.php no se encuentra en ninguna ruta válida.');
}

class CRUD
{
    private $db;

    private static $instance = null;

    public function __construct()
    {
        $this->db = SingeltonDB::getInstance()->getDB();
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new CRUD();
        }

        return self::$instance;
    }

    ########################################################
    #TABLA LOGION_USUARIO#
    ########################################################


    ############################
    #VERIFICAR EL LOGIN#SIN TRY Y CATCH
    ############################
    public function verificarLogin($usuario, $password)
    {
        $pdo = SingeltonDB::getInstance()->getDB();
        $stmt = $pdo->prepare("SELECT * FROM login_usuario WHERE usuario = :usuario AND pass = :pass");
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':pass', $password);
        $stmt->execute();
        $usuarioEncontrado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuarioEncontrado) {
            // El usuario y la contraseña son correctos
            return true;
        } else {
            // El usuario o la contraseña son incorrectos
            return false;
        }
    }
    ############################
    #SELECT USUARIO#
    ############################
    public function seleccionarUsuarios()
    {
        try {
            $pdo = SingeltonDB::getInstance()->getDB();
            $stmt = $pdo->prepare("SELECT * FROM login_usuario");
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $usuarios;
        } catch (PDOException $e) {
            echo "Error en la consulta SQL: " . $e->getMessage();
            return false;
        }
    }

    ############################
    #CREAR USUARIO#
    ############################
    public function crearUsuario($usuario, $password)
    {
        try {
            $pdo = SingeltonDB::getInstance()->getDB();
            $stmt = $pdo->prepare("INSERT INTO login_usuario (usuario, pass) VALUES (:usuario, :pass)");
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':pass', $password);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error en la consulta SQL: " . $e->getMessage();
            return false;
        }
    }
    ############################
    #ACTUALIZAR USUARIO#
    ############################
    public function actualizarUsuario($id, $usuario, $password)
    {
        try {
            $pdo = SingeltonDB::getInstance()->getDB();
            $stmt = $pdo->prepare("UPDATE login_usuario SET usuario = :usuario, pass = :pass WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':pass', $password);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error en la consulta SQL: " . $e->getMessage();
            return false;
        }
    }

    ############################
    #ELIMINAR USUARIO#
    ############################
    public function eliminarUsuario($id)
    {
        try {
            $pdo = SingeltonDB::getInstance()->getDB();
            $stmt = $pdo->prepare("DELETE FROM login_usuario WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error en la consulta SQL: " . $e->getMessage();
            return false;
        }
    }

    ########################################################
    #TABLA MUNICIPIO#
    ########################################################

    ############################
    #SELECT MUNICIPIO#
    ############################
    public function seleccionarMunicipios()
    {
        try {
            $pdo = SingeltonDB::getInstance()->getDB();
            $stmt = $pdo->prepare("SELECT * FROM municipio");
            $stmt->execute();
            $municipios = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $municipios;
        } catch (PDOException $e) {
            echo "Error en la consulta SQL: " . $e->getMessage();
            return false;
        }
    }
    ########################################################
    #TABLA LOCALIDADES#
    ########################################################

    ############################
    #SELECT LOCALIDAD#
    ############################
    public function seleccionarLocalidades()
    {
        try {
            $pdo = SingeltonDB::getInstance()->getDB();
            $stmt = $pdo->prepare("SELECT * FROM localidades");
            $stmt->execute();
            $localidades = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $localidades;
        } catch (PDOException $e) {
            echo "Error en la consulta SQL: " . $e->getMessage();
            return false;
        }
    }

    public function seleccionarLocalidadesXMunicipio($idmunicipio)
{
    try {
        $pdo = SingeltonDB::getInstance()->getDB();
        $stmt = $pdo->prepare("SELECT nombre_localidad FROM localidades WHERE municipio_idmunicipio = '$idmunicipio'");
        $stmt->execute();
        $localidades = $stmt->fetchAll();

        return $localidades;

    } catch (PDOException $e) {
        echo "Error en la consulta SQL: " . $e->getMessage();
        return false;
    }
}

public function obtenerIdLocalidadPorNombre($nombre_localidad)
{
    try {
        $pdo = SingeltonDB::getInstance()->getDB();
        $stmt = $pdo->prepare("SELECT idlocalidades FROM localidades WHERE nombre_localidad = ?");
        $stmt->execute([$nombre_localidad]);
        $id_localidad = $stmt->fetchColumn();

        return $id_localidad;

    } catch (PDOException $e) {
        echo "Error en la consulta SQL: " . $e->getMessage();
        return false;
    }
}

    ########################################################
    #TABLA HABITANTE#
    ########################################################

    ############################
    #CREAR HABITANTE#
    ############################
    public function crearHabitante($idhabitante,$nombre, $edad, $sexo, $edo_civil, $nivel_educativo, $ingresos, $nacionalidad, $vivienda_id)
    {
        try {
            $pdo = SingeltonDB::getInstance()->getDB();
            $stmt = $pdo->prepare("INSERT INTO habitante (idhabitante,nombre, edad, sexo, edo_civil, nivel_educativo, ingresos, nacionalidad, vivienda_idvivienda) VALUES (:idhabitante, :nombre, :edad, :sexo, :edo_civil, :nivel_educativo, :ingresos, :nacionalidad, :vivienda_id)");
            $stmt->bindParam(':idhabitante',$idhabitante);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':edad', $edad);
            $stmt->bindParam(':sexo', $sexo);
            $stmt->bindParam(':edo_civil', $edo_civil);
            $stmt->bindParam(':nivel_educativo', $nivel_educativo);
            $stmt->bindParam(':ingresos', $ingresos);
            $stmt->bindParam(':nacionalidad', $nacionalidad);
            $stmt->bindParam(':vivienda_id', $vivienda_id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Error en la consulta SQL: " . $e->getMessage();
            return false;
        }
    }

    ############################
    #SELECT HABITANTE#
    ############################
    function seleccionarHabitantes()
    {
        try {
            $pdo = SingeltonDB::getInstance()->getDB();
            $stmt = $pdo->prepare("SELECT * FROM habitante");
            $stmt->execute();
            $habitantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $habitantes;
        } catch (PDOException $e) {
            echo "Error en la consulta SQL: " . $e->getMessage();
            return false;
        }
    }
    ############################
    #SELECT HABITANTE POR ID#
    ############################
    function seleccionarHabitantePorId($id)
    {
        try {
            $pdo = SingeltonDB::getInstance()->getDB();
            $stmt = $pdo->prepare("SELECT * FROM habitante WHERE idhabitante = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $habitante = $stmt->fetch(PDO::FETCH_ASSOC);
            return $habitante;
        } catch (PDOException $e) {
            echo "Error en la consulta SQL: " . $e->getMessage();
            return false;
        }
    }
    ############################
    #ACTUALIZAR HABITANTE POR ID#
    ############################
    function actualizarHabitante($id, $nombre, $edad, $sexo, $edo_civil, $nivel_educativo, $ingresos, $nacionalidad, $vivienda_id)
    {
        try {
            $pdo = SingeltonDB::getInstance()->getDB();
            $stmt = $pdo->prepare("UPDATE habitante SET nombre = :nombre, edad = :edad, sexo = :sexo, edo_civil = :edo_civil, nivel_educativo = :nivel_educativo, ingresos = :ingresos, nacionalidad = :nacionalidad, vivienda_idvivienda = :vivienda_id WHERE idhabitante = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':edad', $edad);
            $stmt->bindParam(':sexo', $sexo);
            $stmt->bindParam(':edo_civil', $edo_civil);
            $stmt->bindParam(':nivel_educativo', $nivel_educativo);
            $stmt->bindParam(':ingresos', $ingresos);
            $stmt->bindParam(':nacionalidad', $nacionalidad);
            $stmt->bindParam(':vivienda_id', $vivienda_id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error en la consulta SQL: " . $e->getMessage();
            return false;
        }
    }

    ############################
    #BORRAR HABITANTE POR ID#
    ############################
    function borrarHabitante($id)
    {
        try {
            $pdo = SingeltonDB::getInstance()->getDB();
            $stmt = $pdo->prepare("DELETE FROM habitante WHERE idhabitante = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error en la consulta SQL: " . $e->getMessage();
            return false;
        }
    }
    ########################################################
    #TABLA VIVIENDA_OCUPACION#
    ########################################################

    ############################
    #CREAR VIVIENDA_OCUPACION#
    ############################
    function crearViviendaOcupacion($vivienda_id, $ocupacion_id)
    {
        try {
            $pdo = SingeltonDB::getInstance()->getDB();
            $stmt = $pdo->prepare("INSERT INTO idvivienda_ocupacion (vivienda_idvivienda, ocupacion_idocupacion) VALUES (:vivienda_id, :ocupacion_id)");
            $stmt->bindParam(':vivienda_id', $vivienda_id);
            $stmt->bindParam(':ocupacion_id', $ocupacion_id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error en la consulta SQL: " . $e->getMessage();
            return false;
        }
    }
    ############################
    #ACTUALIZAR VIVIENDA_OCUPACION#
    ############################
    function actualizarViviendaOcupacion($id, $vivienda_id, $ocupacion_id)
    {
        try {
            $pdo = SingeltonDB::getInstance()->getDB();
            $stmt = $pdo->prepare("UPDATE idvivienda_ocupacion SET vivienda_idvivienda = :vivienda_id, ocupacion_idocupacion = :ocupacion_id WHERE idvivienda_ocupacion = :id");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':vivienda_id', $vivienda_id);
            $stmt->bindParam(':ocupacion_id', $ocupacion_id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error en la consulta SQL: " . $e->getMessage();
            return false;
        }
    }
    ############################
    #BORRAR ULTIMO REGISTRO DE VIVIENDA_OCUPACION#
    ############################
    public function borrarUltimaViviendaOcupacion()
    {
        try {
            $pdo = SingeltonDB::getInstance()->getDB();
            $stmt = $pdo->prepare("DELETE FROM idvivienda_ocupacion WHERE idvivienda_ocupacion = LAST_INSERT_ID()");
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error en la consulta SQL: " . $e->getMessage();
            return false;
        }
    }

    ########################################################
    #TABLA VIVIENDA#
    ########################################################


    ############################
    #AGREGAR VIVIENDA#
    ############################

    public function crearVivienda($tipo, $material, $saneamiento, $agua, $luz, $drenaje, $tendencia, $direccion, $num_habitaciones, $num_banios, $idlocalidades, $idmunicipio) {
        try {
            $pdo = SingeltonDB::getInstance()->getDB();
            $stmt = $pdo->prepare("INSERT INTO vivienda (tipo_vivienda, material, saneamiento, agua, luz, drenaje, tendencia, direccion, num_habitaciones, num_banios, localidades_idlocalidades, localidades_municipio_idmunicipio) VALUES (:tipo, :material, :saneamiento, :agua, :luz, :drenaje, :tendencia, :direccion, :num_habitaciones, :num_banios, :idlocalidades, :idmunicipio)");
            $stmt->bindParam(':tipo', $tipo);
            $stmt->bindParam(':material', $material);
            $stmt->bindParam(':saneamiento', $saneamiento);
            $stmt->bindParam(':agua', $agua);
            $stmt->bindParam(':luz', $luz);
            $stmt->bindParam(':drenaje', $drenaje);
            $stmt->bindParam(':tendencia', $tendencia);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->bindParam(':num_habitaciones', $num_habitaciones);
            $stmt->bindParam(':num_banios', $num_banios);
            $stmt->bindParam(':idlocalidades', $idlocalidades);
            $stmt->bindParam(':idmunicipio', $idmunicipio);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error en la consulta SQL: " . $e->getMessage();
            return false;
        }
    }
    ############################
    #SELECT TODAS VIVIENDA#
    ############################
    public function seleccionarViviendas() {
        try {
            $pdo = SingeltonDB::getInstance()->getDB();
            $stmt = $pdo->prepare("SELECT * FROM vivienda");
            $stmt->execute();
            $viviendas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $viviendas;
        } catch (PDOException $e) {
            echo "Error en la consulta SQL: " . $e->getMessage();
            return false;
        }
    }
    ############################
    #SELECT VIVIENDA POR ID#
    ############################
    public function seleccionarViviendaPorId($id) {
        try {
            $pdo = SingeltonDB::getInstance()->getDB();
            $stmt = $pdo->prepare("SELECT * FROM vivienda WHERE idvivienda = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $vivienda = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $vivienda;
        } catch (PDOException $e) {
            echo "Error en la consulta SQL: " . $e->getMessage();
            return false;
        }
    }
    ############################
    #ACTUALIZAR LA ULTIMA VIVIENDA#
    ############################
    public function actualizarUltimaViviendaAgregada($tipo_vivienda, $material, $saneamiento, $agua, $luz, $drenaje, $tendencia, $direccion, $num_habitaciones, $num_banios, $idlocalidades, $idmunicipio, $idvivienda)
    {
        try {
            $pdo = SingeltonDB::getInstance()->getDB();
            $stmt = $pdo->prepare("UPDATE vivienda SET tipo_vivienda = :tipo_vivienda, material = :material, saneamiento = :saneamiento, agua = :agua, luz = :luz, drenaje = :drenaje, tendencia = :tendencia, direccion = :direccion, num_habitaciones = :num_habitaciones, num_banios = :num_banios, localidades_idlocalidades = :idlocalidades, localidades_municipio_idmunicipio = :idmunicipio WHERE idvivienda = :idvivienda");
            $stmt->bindParam(':tipo_vivienda', $tipo_vivienda);
            $stmt->bindParam(':material', $material);
            $stmt->bindParam(':saneamiento', $saneamiento);
            $stmt->bindParam(':agua', $agua);
            $stmt->bindParam(':luz', $luz);
            $stmt->bindParam(':drenaje', $drenaje);
            $stmt->bindParam(':tendencia', $tendencia);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->bindParam(':num_habitaciones', $num_habitaciones);
            $stmt->bindParam(':num_banios', $num_banios);
            $stmt->bindParam(':idlocalidades', $idlocalidades);
            $stmt->bindParam(':idmunicipio', $idmunicipio);
            $stmt->bindParam(':idvivienda', $idvivienda);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error en la consulta SQL: " . $e->getMessage();
            return false;
        }
    }
    ############################
    #BORRAR LA ULTIMA VIVIENDA#
    ############################
    public function borrarUltimaViviendaAgregada()
{
    try {
        $pdo = SingeltonDB::getInstance()->getDB();
        $stmt = $pdo->prepare("DELETE FROM vivienda WHERE idvivienda = (SELECT MAX(idvivienda) FROM vivienda)");
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        echo "Error en la consulta SQL: " . $e->getMessage();
        return false;
    }
}




########################
public function seleccionarOcupaciones()
{
    try {
        $pdo = SingeltonDB::getInstance()->getDB();
        $stmt = $pdo->prepare("SELECT * FROM ocupacion");
        $stmt->execute();
        $ocupaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $ocupaciones;
    } catch (PDOException $e) {
        echo "Error en la consulta SQL: " . $e->getMessage();
        return false;
    }
}

    
}