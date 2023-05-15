<!DOCTYPE html>
<html>
<head>
<title>Gráfico de viviendas por localidad</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body>
<canvas id="myChart"></canvas>
<?php
// manda llamar clase conexion.php
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

$singeltonDB = SingeltonDB::getInstance();/// crea la instancia
$db = $singeltonDB->getDB();
///consulta vivienda por localidades
$sql = "SELECT l.nombre_localidad, COUNT(*) as cantidad_viviendas
FROM vivienda v
INNER JOIN localidades l ON v.localidades_idlocalidades =
l.idlocalidades
AND v.localidades_municipio_idmunicipio =
l.municipio_idmunicipio
GROUP BY l.nombre_localidad";
$resultado = $db->query($sql);
$labels = array();
$data = array();
while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
$labels[] = $row['nombre_localidad'];
$data[] = $row['cantidad_viviendas'];
}
?>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
labels: <?php echo json_encode($labels); ?>,
datasets: [{
label: 'Cantidad de viviendas por localidad',
data: <?php echo json_encode($data); ?>,
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
