<?php
//  clase SingletonDB
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

//  instancia de la base de datos usando Singleton
$singeltonDB = SingeltonDB::getInstance();
$db = $singeltonDB->getDB();
// consulta tipo de materiales
$sql = "SELECT material, COUNT(idvivienda) AS num_viviendas
FROM vivienda
GROUP BY material";
$resultado = $db->query($sql);
?>
<?php
// Paso 4: Crear los datos para la gráfica de barras
$labels = array();
$data = array();
while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
$labels[] = $row['material'];
$data[] = $row['num_viviendas'];
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Gráfico de materiales de vivienda</title>
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
labels: <?php echo json_encode($labels); ?>,
datasets: [{
label: 'Cantidad de viviendas ',
data: <?php echo json_encode($data); ?>,
backgroundColor: 'rgba(255, 99, 132, 0.2)',
borderColor: 'rgba(255, 99, 132, 1)',
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