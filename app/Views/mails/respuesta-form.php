<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta</title>
</head>
<body>
    <h2>Gracias por contactarnos.</h2>
    <h3>Recibimos los siguientes datos</h3>
    <ul>
        <li>Correo: <?php echo( $email ); ?></li>
        <li>Asunto: <?php echo( $subject ); ?></li>
        <p>Mensaje: </p>
        <p><?php echo( $message ); ?></p>
    </ul>
</body>
</html>