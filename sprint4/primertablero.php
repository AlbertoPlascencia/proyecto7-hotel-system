<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="logo.png">
    <title>Dashboard de Opiniones de Hotel</title>
     <link rel="stylesheet" href="Cssdedashboards.css">
</head>

<body>
    <div class="navbar">
        <a href="primertablero.php">Tablero antiguo</a>
        <a href="Dashboard.php">Tablero principal</a>
        <a href="Dashboardhotel.php">Tablero Hotel</a>
        <a href="DashboardBalneario.php">Tablero Balneario</a>
        <a href="DashboardRestaurantes.php">Tablero Restaurantes y Bar</a>
        <a href="DashboardSpa.php">Tablero Spa</a>
        <a href="#">Totales</a>
        <a href="#">Gráficas Visitantes</a>
    </div>
    <div class="table-wrapper">
        <table id="opiniones-table">
            <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Habitación</th>
                <th>Calificación Hotel</th>
                <th>Calificación Reservaciones</th>
                <th>Calificación Balneario</th>
                <th>Calificación Restaurantes y Bares</th>
                <th>Calificación General</th>
                <th>Calificación Spa</th>
                <th>Feedback</th>
                <th>Fecha</th>
            </tr>
            <?php
   $servername = "localhost"; // Cambia a tu host de base de datos
$username = "u597541443_id21386601_roo"; // Cambia a tu nombre de usuario de base de datos
$password = "Chachaloca12$"; // Cambia a tu contraseña de base de datos
$dbname = "u597541443_id21386601_sat"; // Cambia a tu nombre de base de datos
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("La conexión falló: " . $conn->connect_error);
            }

            // Consulta para obtener los datos de la tabla
            $sql = "SELECT * FROM Hotel1";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["nombre"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["telefono"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["habitacion"]) . "</td>";
                    echo "<td class='" . getHighlightClass($row["calificacion hotel"]) . "'>" . htmlspecialchars($row["calificacion hotel"]) . "</td>";
                    echo "<td class='" . getHighlightClass($row["calificacion reservaciones"]) . "'>" . htmlspecialchars($row["calificacion reservaciones"]) . "</td>";
                    echo "<td class='" . getHighlightClass($row["calificacion_balneario"]) . "'>" . htmlspecialchars($row["calificacion_balneario"]) . "</td>";
                    echo "<td class='" . getHighlightClass($row["calificacion restaurantesybares"]) . "'>" . htmlspecialchars($row["calificacion restaurantesybares"]) . "</td>";
                    echo "<td class='" . getHighlightClass($row["calificacion general"]) . "'>" . htmlspecialchars($row["calificacion general"]) . "</td>";
                    echo "<td class='" . getHighlightClass($row["calificacion spa"]) . "'>" . htmlspecialchars($row["calificacion spa"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["feedback"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["fecha"]) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='11'>No se encontraron resultados.</td></tr>";
            }

            function getHighlightClass($value)
            {
                switch ($value) {
                    case '1':
                        return 'highlight-1';
                    case '2':
                        return 'highlight-2';
                    case '3':
                        return 'highlight-3';
                    default:
                        return '';
                }
            }

            $conn->close();
            ?>
        </table>
    </div>

    <script>
        // Ajustar la altura máxima de la tabla según el contenido
        function ajustarAlturaTabla() {
            var tabla = document.getElementById('opiniones-table');
            var wrapper = document.querySelector('.table-wrapper');
            var alturaVentana = window.innerHeight;
            var distanciaWrapper = wrapper.getBoundingClientRect().top;
            var alturaMaxima = alturaVentana - distanciaWrapper;

            tabla.style.maxHeight = alturaMaxima + 'px';
        }

        // Ajustar la altura de la tabla al cargar la página y al cambiar el tamaño de la ventana
        window.addEventListener('load', ajustarAlturaTabla);
        window.addEventListener('resize', ajustarAlturaTabla);
    </script>
</body>

</html>