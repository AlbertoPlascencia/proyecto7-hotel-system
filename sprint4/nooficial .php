<?php
$servername = "localhost"; // Cambia a tu host de base de datos
$username = "u597541443_id21386601_roo"; // Cambia a tu nombre de usuario de base de datos
$password = "Chachaloca12$"; // Cambia a tu contraseña de base de datos
$dbname = "u597541443_id21386601_sat"; // Cambia a tu nombre de base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

// Consulta para obtener los datos de calificación de hotel
$sql = "SELECT `calificacion hotel` FROM Hotel1";
$result = $conn->query($sql);

// Consulta para obtener los datos de calificación de reservaciones
$sql_reservaciones = "SELECT `calificacion reservaciones` FROM Hotel1";
$result_reservaciones = $conn->query($sql_reservaciones);

// Verificar si se encontraron resultados
if ($result && $result->num_rows > 0) {
    // Crear un array para almacenar las calificaciones de hotel
    $calificacionHotelData = array();

    while ($row = $result->fetch_assoc()) {
        // Obtener el valor de calificación de hotel y agregarlo al array
        $calificacionHotelData[] = $row['calificacion hotel'];
    }
} else {
    echo "No se encontraron resultados de calificación de hotel.";
}

// Verificar si se encontraron resultados
if ($result_reservaciones && $result_reservaciones->num_rows > 0) {
    // Crear un array para almacenar las calificaciones de reservaciones
    $calificacionReservacionesData = array();

    while ($row_reservaciones = $result_reservaciones->fetch_assoc()) {
        // Obtener el valor de calificación de reservaciones y agregarlo al array
        $calificacionReservacionesData[] = $row_reservaciones['calificacion reservaciones'];
    }
} else {
    echo "No se encontraron resultados de calificación de reservaciones.";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gráficas</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <style>   body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        margin-top: 30px;
    }

    .chart-container {
        max-width: 800px;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .chart {
        width: 380px;
        height: 300px;
        margin-bottom: 20px;
        background-color: #f8f8f8;
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
  margin-right: 20px;
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
    <h1>Gráficas</h1>
 
    <div class="chart-container">
        <canvas id="calificacion-hotel"></canvas>
        <canvas id="calificacion-reservaciones"></canvas>
    </div>

    <script>
        // Obtener los datos de las calificaciones de hotel en formato JSON desde PHP
        var calificacionHotelData = <?php echo json_encode($calificacionHotelData); ?>;

        // Obtener los datos de las calificaciones de reservaciones en formato JSON desde PHP
        var calificacionReservacionesData = <?php echo json_encode($calificacionReservacionesData); ?>;

        // Obtener el elemento canvas y el contexto para la gráfica de Calificación de Hotel
        var canvasHotel = document.getElementById("calificacion-hotel");
        var ctxHotel = canvasHotel.getContext("2d");

        // Obtener el elemento canvas y el contexto para la gráfica de Calificación de Reservaciones
        var canvasReservaciones = document.getElementById("calificacion-reservaciones");
        var ctxReservaciones = canvasReservaciones.getContext("2d");

        // Crear el array de datos para las barras de calificación de hotel
        var barDataHotel = {
            'Mayor': 0,
            'Intermedio': 0,
            'Menor': 0
        };

        // Contar la cantidad de ocurrencias de cada calificación de hotel
        calificacionHotelData.forEach(function(calificacion) {
            if (calificacion == 3) {
                barDataHotel['Mayor']++;
            } else if (calificacion == 2) {
                barDataHotel['Intermedio']++;
            } else if (calificacion == 1) {
                barDataHotel['Menor']++;
            }
        });

        // Crear el array de datos para las barras de calificación de reservaciones
        var barDataReservaciones = {
            'Mayor': 0,
            'Intermedio': 0,
            'Menor': 0
        };

        // Contar la cantidad de ocurrencias de cada calificación de reservaciones
        calificacionReservacionesData.forEach(function(calificacion) {
            if (calificacion == 3) {
                barDataReservaciones['Mayor']++;
            } else if (calificacion == 2) {
                barDataReservaciones['Intermedio']++;
            } else if (calificacion == 1) {
                barDataReservaciones['Menor']++;
            }
        });

        // Configurar gráfico para Calificación de Hotel
        new Chart(ctxHotel, {
            type: 'bar',
            data: {
                labels: Object.keys(barDataHotel), // Etiquetas del eje X
                datasets: [{
                    label: 'Calificación de Hotel',
                    data: Object.values(barDataHotel),
                    backgroundColor: ['#2ECC40', '#FF851B', '#FF4136'] // Verde, Naranja, Rojo
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        min: 0 // Valor mínimo para el eje y
                    }
                }
            }
        });

        // Configurar gráfico para Calificación de Reservaciones
        new Chart(ctxReservaciones, {
            type: 'bar',
            data: {
                labels: Object.keys(barDataReservaciones), // Etiquetas del eje X
                datasets: [{
                    label: 'Calificación de Reservaciones',
                    data: Object.values(barDataReservaciones),
                    backgroundColor: ['#2ECC40', '#FF851B', '#FF4136'] // Verde, Naranja, Rojo
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        min: 0 // Valor mínimo para el eje y
                    }
                }
            }
        });
    </script>
</body>
</html> 