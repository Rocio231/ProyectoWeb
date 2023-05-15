<?php
// Abrir conexión
$root = __DIR__ . '/..'; // Carpeta principal del proyecto
$path1 = $root . '/modelo/SingeltonDB.php'; // Ruta relativa hacia SingeltonDB.php
$path2 = $root . '/../modelo/SingeltonDB.php'; // Ruta relativa hacia SingeltonDB.php desde otra ubicación

if (file_exists($path1)) {
  require_once $path1;
} elseif (file_exists($path2)) {
  require_once $path2;
} else {
  die('El archivo SingeltonDB.php no se encuentra en ninguna ruta válida.');
}


// Obtener una instancia de la base de datos 
$singeltonDB = SingeltonDB::getInstance();
$db = $singeltonDB->getDB();

// Consulta para vivienda por municipio 
$sql = "SELECT m.nombre_municipio AS nombre_municipio, COUNT(*) AS num_viviendas
FROM vivienda v
JOIN localidades l ON v.localidades_idlocalidades = l.idlocalidades
JOIN municipio m ON l.municipio_idmunicipio = m.idmunicipio
GROUP BY m.nombre_municipio";

// Ejecutar la consulta
$resultado = $db->query($sql);

// crear arreglo asociativo
$rows = $resultado->fetchAll(PDO::FETCH_ASSOC);

// crear arreglo para almacenar el nombre de los municipios
$municipios = array_column($rows, 'nombre_municipio');

// crear arreglo para almacenar numero de viviendas
$num_viviendas = array_column($rows, 'num_viviendas');

// crear string para muncipios
$labels = "'" . implode("', '", $municipios) . "'";

// Crear un string con el número de viviendas por municipio
$data = implode(', ', $num_viviendas);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Gráfico de viviendas por municipio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="myChart"></canvas>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php echo $labels; ?>],
                datasets: [{
                    label: 'Cantidad de viviendas por municipio',
                    data: [<?php echo $data; ?>],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            precision: 0
                        }
                    }]
                }
            }
        });
    </script>
    <button onclick="goBack()" class="btn btn-primary text-center">Regresar</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>