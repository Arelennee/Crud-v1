<?php
session_start();
require 'config/Database.php'; // Conexión a la base de datos usando PDO

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $passw = $_POST['passw'];

    // Consulta con PDO
    $sql = "SELECT * FROM usuarios WHERE username = :username OR email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $username);
    $stmt->execute();

    if ($stmt->rowCount() === 1) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($passw, $user['passw'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Redirigir al dashboard
            header('Location: /academy-app/public/index.php');
            exit(); // Asegúrate de detener el script después de redirigir
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">
    <link rel="apple-touch-icon" sizes="180x180" href="src/icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="src/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="src/icon/favicon-16x16.png">
    <link rel="icon" type="icon" href="src/icon/favicon.ico">
</head>
<body>
    <video src="src/video/background.mp4" autoplay muted loop></video>
    <div class="container bg-dark mt-5 p-4 rounded" id="content">
        <h1 class="text-center">Iniciar Sesión</h1>
        <div class="row">
            <div class="col">
                <form action="login.php" method="POST">
                    <label for="username" class="form-label">Nombre de usuario o correo:</label>
                    <input type="text" name="username" class="form-control" required>
                    <br>
                    <label for="password" class="form-label">Contraseña:</label>
                    <input type="password" name="passw" class="form-control" required>
                    <br>
                    <button type="submit" name="login" class="btn btn-primary">Iniciar Sesión</button>
                </form>
            </div>
            <a href="./register.php" class="fs-3 text-decoration-none mt-4">Registrarse</a>
        </div>
    </div>
</body>
</html>