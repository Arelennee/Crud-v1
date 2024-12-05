<?php
require_once '../config/Database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $conn = $db->getConnection();

    $nom_alum = $_POST['nom_alum'];
    $ape_alum = $_POST['ape_alum'];
    $fnac_alum = $_POST['fnac_alum'];
    $email_alum = $_POST['email_alum'];

    $query = 'INSERT INTO alumnos (nom_alum, ape_alum, fnac_alum, email_alum) VALUES (:nom_alum, :ape_alum, :fnac_alum, :email_alum)';
    $stmt = $conn->prepare($query);

    $stmt->bindParam(':nom_alum', $nom_alum);
    $stmt->bindParam(':ape_alum', $ape_alum);
    $stmt->bindParam(':fnac_alum', $fnac_alum);
    $stmt->bindParam(':email_alum', $email_alum);

    if ($stmt->execute()) {
        echo "Alumno registrado con éxito.";
    } else {
        echo "Hubo un error al registrar al alumno.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Alumno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="apple-touch-icon" sizes="180x180" href="../src/icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../src/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../src/icon/favicon-16x16.png">
    <link rel="icon" type="icon" href="../src/icon/favicon.ico">
</head>
<body>
<video src="../src/video/background.mp4" autoplay muted loop></video>
<div class="container bg-dark mt-4 rounded p-3" id="content">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownClases" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Clases
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownClases">
                            <li><a class="dropdown-item" href="../clases/crear.php">Crear</a></li>
                            <li><a class="dropdown-item" href="../clases/listar.php">Listar</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownInstructores" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Instructores
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownInstructores">
                            <li><a class="dropdown-item" href="../profesores/crear.php">Crear</a></li>
                            <li><a class="dropdown-item" href="../profesores/listar.php">Listar</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownAulas" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Aulas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownAulas">
                            <li><a class="dropdown-item" href="../aula/crear.php">Crear</a></li>
                            <li><a class="dropdown-item" href="../aula/listar.php">Listar</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownNotas" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Notas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownNotas">
                            <li><a class="dropdown-item" href="../notas/crear.php">Crear</a></li>
                            <li><a class="dropdown-item" href="../notas/listar.php">Listar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-md p-4 ">
        <h1 class="text-center">Registrar Alumno</h1>
    <form action="crear.php" method="POST">
        <div class="row">
            <div class="col mb-3">
                <label for="nom_alum" class="form-label">Nombre:</label>
                <input type="text" name="nom_alum" class="form-control" required><br>
            </div>
            <div class="col mb-3">
                <label for="ape_alum" class="form-label">Apellido:</label>
                <input type="text" name="ape_alum" class="form-control" required><br>
            </div>
        </div>
        <div class="mb-3">
            <label for="fnac_alum" class="form-label">Fecha de Nacimiento:</label>
            <input type="date" name="fnac_alum" class="form-control" required><br>
        </div>
        <div class="mb-3">
            <label for="email_alum" class="form-label">Email:</label>
            <input type="email" name="email_alum" class="form-control"><br>
        </div>
        <input type="submit" value="Registrar" class="btn btn-primary"> <br> <br>
        <a href="./listar.php" class="text-decoration-none fs-3">Listar Alumnos</a>
    </form>
        
    </div>
    <a href="../public/index.php" class="m-3 text-decoration-none fs-3">Volver al Dashboard</a>
    
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
