<?php
session_start();
include 'config/Database.php'; // esta wea conecta a la base de datos, el archivo de configuracion p

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $passw = $_POST['passw'];

    // 
    $sql = "SELECT * FROM usuarios WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Verificar la contraseña
        if (password_verify($passw, $user['passw'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            echo "¡Inicio de sesión exitoso! Bienvenido, " . $user['username'];
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
    

    $stmt->close();
    $conn->close();
}
?>








    <h1>Iniciar Sesión</h1>
    <form action="login.php" method="POST">
        <label for="username">Nombre de usuario o correo:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="passw" required>
        <br>
        <button type="submit" name="login">Iniciar Sesión</button>
    </form>
