<!DOCTYPE html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['titulo']) || !isset($_POST['descripcion']) || !isset($_POST['ubicacion']) || !isset($_POST['estado']) || !isset($_POST['ciudadano']) || !isset($_POST['telefono_ciudadano']) ||
        empty($_POST['titulo']) || empty($_POST['descripcion']) || empty($_POST['ubicacion']) || empty($_POST['estado']) || empty($_POST['ciudadano']) || empty($_POST['telefono_ciudadano'])) {
        echo "<div class='alert alert-warning'>Por favor, complete todos los campos.</div>";
    } else {
        include "modelo/modelo.php";
        $nuevo = new Denuncias();
        $resultado = $nuevo->setDenuncia($_POST["titulo"], $_POST["descripcion"], $_POST["ubicacion"], $_POST["estado"], $_POST["ciudadano"], $_POST["telefono_ciudadano"]);

        if ($resultado) {
            echo "<div class='alert alert-success'>Denuncia registrada exitosamente.</div>";
        } else {
            echo "<div class='alert alert-danger'>Error al registrar la denuncia.</div>";
        }
    }
}
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Denuncias - MVC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <header class="text-center mb-4">
            <h1 class="display-5 fw-bold text-primary">Sistema de Gestión de Denuncias</h1>
            <p class="lead text-muted">Registro de denuncias utilizando el modelo MVC</p>
            <hr />
        </header>

        <div class="row g-4">
            <!-- Formulario Nueva Denuncia -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4>Nueva Denuncia</h4>
                    </div>
                    <div class="card-body">
                        <form action="#" method="post">
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título</label>
                                <input type="text" name="titulo" id="titulo" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="ubicacion" class="form-label">Ubicación</label>
                                <input type="text" name="ubicacion" id="ubicacion" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="estado" class="form-label">Estado</label>
                                <select name="estado" id="estado" class="form-select" required>
                                    <option value="pendiente">Pendiente</option>
                                    <option value="en proceso">En Proceso</option>
                                    <option value="resuelto">Resuelto</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="ciudadano" class="form-label">Ciudadano</label>
                                <input type="text" name="ciudadano" id="ciudadano" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="telefono_ciudadano" class="form-label">Teléfono Ciudadano</label>
                                <input type="text" name="telefono_ciudadano" id="telefono_ciudadano" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-success w-100">Registrar Denuncia</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Listado de Denuncias -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h4>Listado de Denuncias</h4>
                    </div>
                    <div class="card-body text-center">
                        <p class="text-muted mb-3">Consulta las denuncias registradas en el sistema.</p>
                        <a href="controlador/controlador.php" class="btn btn-outline-primary">
                            <i class="fa fa-align-justify"></i> Ver Listado de Denuncias
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <footer class="text-center mt-5">
            <p class="text-muted">&copy; <?php echo date("Y"); ?> - HECHO POR BRAYAN GUZMAN :)</p>
        </footer>
    </div>
</body>
</html>
