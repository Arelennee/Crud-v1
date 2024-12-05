<?php
require_once '../config/Database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $conn = $db->getConnection();

    $alum_id = $_POST['alum_id'];
    $clase_id = $_POST['clase_id'];
    $nota = $_POST['nota'];

    $query = 'INSERT INTO notas (alum_id, clase_id, nota) VALUES (:alum_id, :clase_id, :nota)';
    $stmt = $conn->prepare($query);

    $stmt->bindParam(':alum_id', $alum_id);
    $stmt->bindParam(':clase_id', $clase_id);
    $stmt->bindParam(':nota', $nota);

    if ($stmt->execute()) {
        echo "Nota registrada con éxito.";
    } else {
        echo "Hubo un error al registrar la Nota";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Notas</title>
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
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownAlumnos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Estudiantes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownAlumnos">
                            <li><a class="dropdown-item" href="../alumnos/crear.php">Crear</a></li>
                            <li><a class="dropdown-item" href="../alumnos/listar.php">Listar</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-md p-4 ">
        <h1 class="text-center">Registrar Notas</h1>
    <form action="crear.php" method="POST">
        <div class="row">
            <div class="col mb-3">
                <label for="alum_id" class="form-label">ID del Alumno</label>
                <input type="text" name="alum_id" class="form-control" required><br>
            </div>
            <div class="col mb-3">
                <label for="clase_id" class="form-label">ID de Clase</label>
                <input type="text" name="clase_id" class="form-control" required><br>
            </div>
        </div>
        <div class="mb-3">
            <label for="nota" class="form-label">Nota</label>
            <input type="number" name="nota" class="form-control" required><br>
        </div>
        <input type="submit" value="Registrar" class="btn btn-primary"> <br> <br>
        
    </form>
    <div class="row">
        <div class="col">
            <a href="./listar.php" class="text-decoration-none fs-3">Listar Notas</a>
        </div>
        <div class="col">
            <a href="../public/index.php" class="text-decoration-none fs-3">Volver al Dashboard</a>
        </div>
    </div>
</div>