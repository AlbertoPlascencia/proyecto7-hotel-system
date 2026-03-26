<?php
$servername = "localhost"; // Cambia a tu host de base de datos
$username = "u597541443_id21386601_roo"; // Cambia a tu nombre de usuario de base de datos
$password = "Chachaloca12$"; // Cambia a tu contraseña de base de datos
$dbname = "u597541443_id21386601_sat"; // Cambia a tu nombre de base de datos
function conectarBD() {
    global $servername, $username, $password, $dbname;
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    return $conn;
}

// Ruta para guardar el color de un jacuzzi en la base de datos
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["jacuzziId"]) && isset($_POST["color"])) {
    $jacuzziId = intval($_POST["jacuzziId"]);
    $color = $_POST["color"];

    $conn = conectarBD();
    $stmt = $conn->prepare("INSERT INTO jacuzzi_colors (jacuzziId, color) VALUES (?, ?) ON DUPLICATE KEY UPDATE color = ?");
    $stmt->bind_param("iss", $jacuzziId, $color, $color);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    echo json_encode(["message" => "Color guardado exitosamente"]);
    exit();
}

// Ruta para obtener los colores de todos los jacuzzis de la base de datos
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $conn = conectarBD();
    $sql = "SELECT * FROM jacuzzi_colors ORDER BY jacuzziId";
    $result = $conn->query($sql);
    $colors = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $colors[$row["jacuzziId"]] = $row["color"];
        }
    }
    $result->free_result();
    $conn->close();
    echo json_encode($colors);
    exit();
}
?>
