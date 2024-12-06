<?php
require_once 'config/Database.php'; // Incluye el archivo de la conexión PDO

// Crear una instancia de la clase Database y obtener la conexión
$database = new Database();
$conn = $database->getConnection();

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $passw = password_hash($_POST['passw'], PASSWORD_DEFAULT); // Encriptar la contraseña

    try {
        // Verificar si el usuario o email ya existe
        $sql_check = "SELECT * FROM usuarios WHERE username = :username OR email = :email";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bindParam(':username', $username);
        $stmt_check->bindParam(':email', $email);
        $stmt_check->execute();

        if ($stmt_check->rowCount() > 0) {
            echo "El nombre de usuario o el correo electrónico ya están en uso.";
        } else {
            // Insertar el nuevo usuario en la base de datos
            $sql = "INSERT INTO usuarios (username, email, passw) VALUES (:username, :email, :passw)";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':passw', $passw);

            if ($stmt->execute()) {
                // Redirigir al login después de registrarse
                header('Location: index.php');
                exit(); // Detener la ejecución después de la redirección
            } else {
                echo "Error en el registro.";
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
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
        <div class="row">
            <div class="col">
                <h1>Registro de Usuario</h1>
                <form action="register.php" method="POST">
                    <div class="row">
                        <div class="col m-1">
                            <label for="username" class="form-label">Nombre de usuario:</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="col m-1">
                            <label for="email" class="form-label">Correo electrónico:</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="col m-1">
                        <label for="passw" class="form-label">Contraseña:</label>
                        <input type="password" name="passw" class="form-control" required>
                        <button type="submit" name="register" class="btn btn-primary mt-3">Registrarse</button>
                    </div>
                </form>
            </div>
            <div class="col">
                <img src="" alt="">
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
