<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir datos del formulario
    
    
    if (
        !isset($_POST['nombre']) ||
        !isset($_POST['apellido']) ||
        !isset($_POST['correo']) ||
        !isset($_POST['solucion'])
    ) {
        $respuesta = array('exito' => false, 'error' => 'Faltan campos obligatorios en la solicitud.');
        echo json_encode($respuesta);
        exit();
    }
    
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '-';
    $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '-';
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '-';
    $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : '-';
    $solucion = isset($_POST['solucion']) ? $_POST['solucion'] : '-';
    $celular = isset($_POST['celular']) ? $_POST['celular'] : '-';
    $mensaje = isset($_POST['mensaje']) ? $_POST['mensaje'] : '-';
    $terminos = isset($_POST['terminos']) ? $_POST['terminos'] : '-';
    $remitente = $_POST['remitente'];
    $asunto = $_POST['asunto'];

    // Construir cuerpo del correo HTML
    $cuerpoCorreo = "
        <html>
        <body>
            <p><strong>Nombre:</strong> $nombre</p>
            <p><strong>Apellido:</strong> $apellido</p>
            <p><strong>Correo:</strong> $correo</p>
            <p><strong>Cargo:</strong> $cargo</p>
            <p><strong>Solución:</strong> $solucion</p>
            <p><strong>Celular:</strong> $celular</p>
            <p><strong>Mensaje:</strong> $mensaje</p>
        </body>
        </html>
    ";

    // Configurar cabeceras para enviar un correo HTML
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $cabeceras .= 'From: ' . $remitente . "\r\n";

    // Enviar correo electrónico
    $destinatario = 'irwinvalera@grupoverdandi.com';  // Cambiar con tu dirección de correo

    if (mail($destinatario, $asunto, $cuerpoCorreo, $cabeceras)) {
        // Éxito en el envío
        $respuesta = array('exito' => true);
        echo json_encode($respuesta);
    } else {
        // Error en el envío
        $respuesta = array('exito' => false, 'error' => 'Error al enviar el correo');
        echo json_encode($respuesta);
    }
} else {
    // Acceso no permitido
    $respuesta = array('exito' => false, 'error' => 'Acceso no permitido');
    echo json_encode($respuesta);
}
?>
