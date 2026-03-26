<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $estrellas = $_POST['estrellas'];
  
    // Obtener la fecha actual
    $fecha = date('Y-m-d');
  
    //$estrellas
    // ...
  
$servername = "localhost"; // Cambia a tu host de base de datos
$username = "u597541443_id21386601_roo"; // Cambia a tu nombre de usuario de base de datos
$password = "Chachaloca12$"; // Cambia a tu contraseña de base de datos
$dbname = "u597541443_id21386601_sat"; // Cambia a tu nombre de base de datos

  
    $conn = new mysqli($servername, $username, $password, $dbname);
  
    
    if ($conn->connect_error) {
      die("Conexión fallida: " . $conn->connect_error);
    }
  
    //  SQL
    $sql = "INSERT INTO `Satisfaccion` (`calificaciones`, `fecha`) VALUES ('$estrellas', '$fecha')";
  
    if ($conn->query($sql) === TRUE) {
      // Configurar la notificación
      $message = "Formulario enviado exitosamente";
      $link = "index.html";
      echo '<script>
        if ("Notification" in window) {
          if (Notification.permission === "granted") {
            var notification = new Notification("Formulario enviado", {
              body: "' . $message . '"
            });
            notification.onclick = function() {
              window.open("' . $link . '");
              notification.close();
            };
            setTimeout(function() {
              notification.close();
            }, 3000);
          } else if (Notification.permission !== "denied") {
            Notification.requestPermission().then(function(permission) {
              if (permission === "granted") {
                var notification = new Notification("Formulario enviado", {
                  body: "' . $message . '"
                });
                notification.onclick = function() {
                  window.open("' . $link . '");
                  notification.close();
                };
                setTimeout(function() {
                  notification.close();
                }, 3000);
              }
            });
          }
        }
        setTimeout(function() {
          window.location.href = "' . $link . '";
        }, 1000);
      </script>';
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  if ($conn->query($sql) === TRUE) {
    echo '<div style="text-align:center; font-size: 3em;">¡Gracias por compartir tu opinión!</div>';
    echo '<script>setTimeout(function(){ window.location.href = "index.html"; }, 2000);</script>';
} else {
    echo "Error: " . $stmt->error;
}

  
    $conn->close();
  
    exit();
  }
