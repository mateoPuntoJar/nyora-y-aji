<?php
// http://localhost/nyora-y-aji/php/index.php
?>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombre = $_POST['nombre'];  # Dentro de los corchetes hay que indicar el valor del atributo name de los inputs del formulario
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $message = $_POST['message'];
                $check = isset($_POST['check']) ? "Aceptado" : "No aceptado";

                $mensaje = "Este mensaje fue enviado por " . $nombre . "<br>";
                $mensaje .= "Su e-mail es: " . $email . "<br>";
                $mensaje .= "Su teléfono es: " . $phone ."<br>";
                $mensaje .= "Mensaje: " . $message ."<br>";
                $mensaje .= $check ."<br>";

                $destinatario = "manuelprra@gmail.com";
                $asunto = "Mail enviado desde Contacto Eventos";

                mail($destinatario, $asunto, $mensaje, $header);

                header("Location:http://localhost/nyora-y-aji/exito.html");
            }
?>