<?php
require_once '../config/Database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $conn = $db->getConnection();

    $nom_clase = $_POST['nom_clase'];
    $detalles = $_POST['detalles'];
    $prof_id = $_POST['prof_id'];
    $aula_id = $_POST['aula_id'];

    $query = 'INSERT INTO clases (nom_clase, detalles, prof_id, aula_id) VALUES (:nom_clase, :detalles, :prof_id, :aula_id)';
    $stmt = $conn->prepare($query);

    $stmt->bindParam(':nom_clase', $nom_clase);
    $stmt->bindParam(':detalles', $detalles);
    $stmt->bindParam(':prof_id', $prof_id);
    $stmt->bindParam(':aula_id', $aula_id);

    if ($stmt->execute()) {
        echo "Clase registrada con éxito.";
    } else {
        echo "Hubo un error al registrar la clase.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Clase</title>
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
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownEstudiantes" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Estudiantes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownEstudiantes">
                            <li><a class="dropdown-item" href="../alumnos/crear.php">Crear</a></li>
                            <li><a class="dropdown-item" href="../alumnos/listar.php">Listar</a></li>
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
    <div class="container">
        <h1 class="text-center m-3">Registrar Clase</h1>
        <form action="crear.php" method="POST">
            <div class="row">
                <div class="col">
                    <label for="nom_clase" class="form-label">Nombre de la Clase:</label>
                    <input type="text" name="nom_clase" class="form-control" required><br>
                </div>
                <div class="col">
                    <label for="aula_id" class="form-label">Numero de Aula:</label>
                    <input type="text" name="aula_id" class="form-control" required><br>
                </div>
                <div class="col">
                    <label for="prof_id" class="form-label">Profesor ID:</label>
                    <input type="text" name="prof_id" class="form-control" required><br>
                </div>
            </div>
            <div class="col">
                <label for="detalles" class="form-label">Detalles:</label>
                <input name="detalles" class="form-control"></input><br>
                <input type="submit" value="Registrar" class="btn btn-primary">
            </div> <br>
        </form>
    </div>
    <div class="row">
        <div class="col">
            <a href="./listar.php" class="m-3 text-decoration-none fs-3">Listar las Clases</a>
        </div>
        <div class="col">
            <a href="../public/index.php" class="m-3 text-decoration-none fs-3">Volver al Dashboard</a>
        </div>
    </div>
    
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
