<?php
require_once '../config/Database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $conn = $db->getConnection();

    $num_aula = $_POST['num_aula'];
    $ubicacion_aula = $_POST['ubicacion_aula'];

    $query = 'INSERT INTO aula (num_aula, ubicacion_aula) VALUES (:num_aula, :ubicacion_aula)';
    $stmt = $conn->prepare($query);

    $stmt->bindParam(':num_aula', $num_aula);
    $stmt->bindParam(':ubicacion_aula', $ubicacion_aula);

    if ($stmt->execute()) {
        echo "Aula registrada con éxito.";
    } else {
        echo "Hubo un error al registrar al aula.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Aula</title>
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
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownAlumnos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Estudiantes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownAlumnos">
                            <li><a class="dropdown-item" href="../alumnos/crear.php">Crear</a></li>
                            <li><a class="dropdown-item" href="../alumnos/listar.php">Listar</a></li>
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
        <h1 class="text-center">Registrar Aula</h1>
    <form action="crear.php" method="POST">
        <div class="mb-3">
            <label for="num_aula" class="form-label">Numero de Aula</label>
            <input type="text" name="num_aula" class="form-control" required><br>
        </div>
        <div class="mb-3">
            <label for="ubicacion_aula" class="form-label">Ubicacion del Aula:</label>
            <input type="text" name="ubicacion_aula" class="form-control" required><br>
        <input type="submit" value="Registrar" class="btn btn-primary">
    </form>
        
    </div>
    <div class="row">
        <div class="col">
        <a href="./listar.php" class="m-3 text-decoration-none fs-3">Listar Aulas</a>
        </div>
        <div class="col">
            <a href="../public/index.php" class="m-3 text-decoration-none fs-3">Volver al Dashboard</a>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>