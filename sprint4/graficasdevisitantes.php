<?php
$servername = "localhost"; // Cambia a tu host de base de datos
$username = "u597541443_id21386601_roo"; // Cambia a tu nombre de usuario de base de datos
$password = "Chachaloca12$"; // Cambia a tu contraseña de base de datos
$dbname = "u597541443_id21386601_sat"; // Cambia a tu nombre de base de datos
// Crear una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultar la tabla "Satisfaccion"
$sql = "SELECT calificaciones, fecha FROM Satisfaccion";
$result = $conn->query($sql);

// Crear un array para los datos del gráfico
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = array(
        "fecha" => $row["fecha"],
        "calificaciones" => $row["calificaciones"]
    );
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
      <link rel="shortcut icon" href="logo.png"> 
    <title>Gráfico de satisfacción</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

.container {
  max-width: 800px;
  margin: 0 auto;
}

.header {
  text-align: center;
  margin-bottom: 20px;
}

canvas {
  margin-top: 20px;
}

.chart-container {
  background-color: #fff;
  padding: 20px;
  border-radius: 4px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.chart-title {
  font-size: 24px;
  margin-bottom: 10px;
}

.chart-wrapper {
  position: relative;
  height: 400px;
  margin-bottom: 20px;
}

.chart-info {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

.chart-info span {
  display: block;
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 5px;
}

.chart-summary {
  background-color: #fff;
  padding: 20px;
  border-radius: 4px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.chart-summary h2 {
  font-size: 20px;
  margin-bottom: 10px;
}

.chart-summary ul {
  list-style: none;
  padding-left: 0;
  margin-top: 0;
}

.chart-summary li {
  margin-bottom: 5px;
}

.chart-summary li span {
  font-weight: bold;
  margin-left: 10px;
}

.chart-legend {
  display: flex;
  justify-content: center;
  margin-bottom: 20px;
}

.chart-legend-item {
  display: flex;
  align-items: center;
  margin-right: 20px;
}

.chart-legend-item span {
  display: inline-block;
  width: 12px;
  height: 12px;
  border-radius: 50%;
  margin-right: 5px;
}

.chart-legend-item.green span {
  background-color: #2ECC40;
}

.chart-legend-item.yellow span {
  background-color: #FFDC00;
}

.chart-legend-item.red span {
  background-color: #FF4136;
}
.navbar {
  background-color: #333;
  padding: 10px;
  display: flex;
  align-items: center;
}

.navbar a {
  color: #fff;
  text-decoration: none;
  margin-right: 10px;
}


</style>
</head>
<body>
        <div class="navbar">
        <a href="https://formulariodesatisfaccionparahabitaciones.000webhostapp.com/primertablero.php">Tablero antiguo</a>
        
        <a href="https://formulariodesatisfaccionparahabitaciones.000webhostapp.com/Dashboard.php">Tablero principal</a>
        <a href="https://formulariodesatisfaccionparahabitaciones.000webhostapp.com/Dashboardhotel.php">Tablero Hotel</a>
        <a href="https://formulariodesatisfaccionparahabitaciones.000webhostapp.com/DashboardBalneario.php">Tablero Balneario</a>
        <a href="https://formulariodesatisfaccionparahabitaciones.000webhostapp.com/DashboardRestaurantes.php">Tablero Restaurantes y Bar</a>
        <a href="https://formulariodesatisfaccionparahabitaciones.000webhostapp.com/DashboardSpa.php">Tablero Spa</a>
        <a href="https://formulariodesatisfaccionparahabitaciones.000webhostapp.com/nooficial.php">Totales</a>
        <a href="https://formulariodesatisfaccionparahabitaciones.000webhostapp.com/graficasdevisitantes.php">Gráficas Visitantes</a>
    </div>
   <center><h1>Satisfacción de Visitantes</h1></center>
    <div class="chart-container">
        <div class="chart-wrapper">
            <canvas id="barChart"></canvas>
        </div>
        <div class="chart-wrapper">
            <canvas id="pieChart"></canvas>
        </div>
    </div>

    <script>
        // Obtener los datos del PHP
        var data = <?php echo json_encode($data); ?>;

        // Crear un objeto para almacenar los valores por color
        var valuesByColor = {
            green: [],
            yellow: [],
            red: []
        };

        // Recorrer los datos y agregarlos al objeto correspondiente
        data.forEach(function(item) {
            if (item.calificaciones == 3) {
                valuesByColor.green.push({x: item.fecha, y: 3});
            } else if (item.calificaciones == 2) {
                valuesByColor.yellow.push({x: item.fecha, y: 2});
            } else {
                valuesByColor.red.push({x: item.fecha, y: 1});
            }
        });

        // Crear los arrays de valores y etiquetas para cada color
        var greenValues = valuesByColor.green;
        var yellowValues = valuesByColor.yellow;
        var redValues = valuesByColor.red;

        var labels = Object.keys(valuesByColor);

        // Configurar el gráfico de barras
        var ctxBar = document.getElementById('barChart').getContext('2d');
        var barChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Calificaciones de satisfacción',
                    data: [greenValues.length, yellowValues.length, redValues.length],
                    backgroundColor: [getBackgroundColor('green'), getBackgroundColor('yellow'), getBackgroundColor('red')],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    },
                    x: {
                        stacked: true
                    }
                }
            }
        });

        // Configurar el gráfico de pastel
        var ctxPie = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: ['Valor 1', 'Valor 2', 'Valor 3'],
                datasets: [{
                    label: 'Calificaciones de satisfacción',
                    data: [redValues.length, yellowValues.length, greenValues.length],
                    backgroundColor: [getBackgroundColor('red'), getBackgroundColor('yellow'), getBackgroundColor('green')],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });

        // Función para obtener el color de fondo según el color seleccionado
        function getBackgroundColor(color) {
            if (color === 'green') {
                return '#2ECC40'; // Verde
            } else if (color === 'yellow') {
                return '#FFDC00'; // Amarillo
            } else if (color === 'red') {
                return '#FF4136'; // Rojo
            }
        }
    </script>
</body>
</html>
