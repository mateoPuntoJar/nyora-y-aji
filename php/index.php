<?php
// http://localhost/nyora-y-aji/php/index.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $message = $_POST['message'] ?? '';
    $check = isset($_POST['check']) ? "Aceptado" : "No aceptado";

    // Construir el cuerpo del correo
    $mensaje = "Este mensaje fue enviado por: " . htmlspecialchars($nombre) . "\n";
    $mensaje .= "Su e-mail es: " . htmlspecialchars($email) . "\n";
    $mensaje .= "Su teléfono es: " . htmlspecialchars($phone) . "\n";
    $mensaje .= "Mensaje: " . htmlspecialchars($message) . "\n";
    $mensaje .= "Acepta términos: " . $check . "\n";

    // Encabezados para el correo
    $header = "From: $email\r\n";
    $header .= "Reply-To: $email\r\n";
    $header .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Destinatario y asunto
    $destinatario = "manuelprra@gmail.com";
    $asunto = "Mail enviado desde Contacto Eventos";

    // Enviar el correo
    if (mail($destinatario, $asunto, $mensaje, $header)) {
        // Redirigir si el correo fue enviado correctamente
        header("Location: http://localhost/nyora-y-aji/exito.html");
        exit();
    } else {
        echo "Error al enviar el correo.";
    }
}
?>
