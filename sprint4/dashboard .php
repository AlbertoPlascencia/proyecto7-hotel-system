<?php
 $servername = "localhost"; // Cambia a tu host de base de datos
 $username = "id21386601_roo"; // Cambia a tu nombre de usuario de base de datos
 $password = "Chachaloca12$"; // Cambia a tu contraseña de base de datos
 $dbname = "id21386601_sat"; // Cambia a tu nombre de base de datos

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
    <title>Gráfico de satisfacción</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <link rel="stylesheet" href="Cssdedashboards.css">
</head>
<body>
   
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
