<?php
$servername = "localhost"; // Cambia a tu host de base de datos
$username = "u597541443_id21386601_roo"; // Cambia a tu nombre de usuario de base de datos
$password = "Chachaloca12$"; // Cambia a tu contraseña de base de datos
$dbname = "u597541443_id21386601_sat"; // Cambia a tu nombre de base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión falló: " . $conn->connect_error);
}

// Preparar las variables para evitar inyección de código
$nombre = isset($_POST['firtname']) ? htmlspecialchars(trim($_POST['firtname'])) : '';
$telefono = isset($_POST['phone']) ? htmlspecialchars(trim($_POST['phone'])) : '';
$habitacion = isset($_POST['room']) ? htmlspecialchars(trim($_POST['room'])) : '';
$calificacion_hotel = isset($_POST['hotel']) ? htmlspecialchars(trim($_POST['hotel'])) : 0;
$calificacion_reservaciones = isset($_POST['reservaciones']) ? htmlspecialchars(trim($_POST['reservaciones'])) : 0;
$calificacion_balneario = isset($_POST['Balneario']) ? htmlspecialchars(trim($_POST['Balneario'])) : 0;
$calificacion_restaurantesybares = isset($_POST['Restaurantes']) ? htmlspecialchars(trim($_POST['Restaurantes'])) : 0;
$calificacion_general = isset($_POST['experiencia_general']) ? htmlspecialchars(trim($_POST['experiencia_general'])) : 0;
$calificacion_spa = isset($_POST['spa_tlalocan']) ? htmlspecialchars(trim($_POST['spa_tlalocan'])) : 0;
$feedback = isset($_POST['feedback']) ? htmlspecialchars(trim($_POST['feedback'])) : '';
$fecha = date("Y-m-d"); // Agregar la fecha actual

// Preparar la consulta preparada para evitar inyección de SQL
$stmt = $conn->prepare("INSERT INTO Hotel1 (nombre, telefono, habitacion, `calificacion hotel`, `calificacion reservaciones`, `calificacion_balneario`, `calificacion restaurantesybares`, `calificacion general`, `calificacion spa`, feedback, fecha) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssss", $nombre, $telefono, $habitacion, $calificacion_hotel, $calificacion_reservaciones, $calificacion_balneario, $calificacion_restaurantesybares, $calificacion_general, $calificacion_spa, $feedback, $fecha);

if ($stmt->execute()) {
    echo '<div style="text-align:center; font-size: 3em;">¡Gracias por compartir tu opinión!</div>';
    echo '<script>setTimeout(function(){ window.location.href = "index.html"; }, 2000);</script>';
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar la conexión y la consulta
$stmt->close();
$conn->close();
?>
