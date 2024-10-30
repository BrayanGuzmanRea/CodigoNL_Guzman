<?php 
if (isset($_GET["accion"]) && $_GET["accion"] === 'eliminar'){
    if (isset($_GET["id"]) && $_GET["id"] !== ''){
        $id = $_GET["id"];
        $eliminar = $denuncias->deleteDenuncia($id);  
        header("location: ../controlador/controlador.php");
    }
}
?>

<?php 
if (isset($_GET["accion"]) && $_GET["accion"] === 'actualizar'){
    if (!isset($_POST['id']) || $_POST['id'] === '' || !isset($_POST['titulo']) || $_POST['titulo'] === '' || !isset($_POST['descripcion']) || $_POST['descripcion'] === '' || !isset($_POST['ubicacion']) || $_POST['ubicacion'] === '') {
        echo "Completar todos los campos";
    }
    $actualizar = $denuncias->updateDenuncia($_POST['id'], $_POST['titulo'], $_POST['descripcion'], $_POST['ubicacion'], $_POST['estado'], $_POST['ciudadano'], $_POST['telefono_ciudadano']);
    header("location: ../controlador/controlador.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Denuncias - MVC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <header class="text-center mb-4">
            <h1 class="display-5 fw-bold text-primary">Sistema de Denuncias</h1>
            <p class="lead text-muted">Gestión eficiente de denuncias en tiempo real</p>
            <hr />
        </header>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Listado de Denuncias</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-striped" id="tabla-denuncias">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Descripción</th>
                                    <th>Ubicación</th>
                                    <th>Estado</th>
                                    <th>Ciudadano</th>
                                    <th>Teléfono</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 0; $i < count($datos); $i++) { ?>
                                    <tr>
                                        <td><?php echo $datos[$i]["id"]; ?></td>
                                        <td><?php echo $datos[$i]["titulo"]; ?></td>
                                        <td><?php echo $datos[$i]["descripcion"]; ?></td>
                                        <td><?php echo $datos[$i]["ubicacion"]; ?></td>
                                        <td><?php echo $datos[$i]["estado"]; ?></td>
                                        <td><?php echo $datos[$i]["ciudadano"]; ?></td>
                                        <td><?php echo $datos[$i]["telefono_ciudadano"]; ?></td>
                                        <td>
                                            <button class="btn btn-warning update-btn" data-index="<?php echo $i; ?>" data-bs-toggle="modal" data-bs-target="#actualizar">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <a class="btn btn-danger" href="controlador.php?accion=eliminar&id=<?php echo $datos[$i]["id"]; ?>">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <a href="../index.php" class="btn btn-outline-secondary mt-3">
                            <i class="fa fa-arrow-circle-left"></i> Volver a la página principal
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <footer class="text-center mt-5">
            <p class="text-muted">&copy; <?php echo date("Y"); ?> - Adaweb</p>
        </footer>
    </div>

    <!-- Modal Actualizar -->
    <div class="modal fade" id="actualizar" tabindex="-1" aria-labelledby="actualizarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning text-dark">
                    <h5 class="modal-title" id="actualizarLabel">Actualizar Denuncia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="controlador.php?accion=actualizar" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id" class="form-control" />

                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título:</label>
                            <input type="text" name="titulo" id="titulo" class="form-control" required />
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción:</label>
                            <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="ubicacion" class="form-label">Ubicación:</label>
                            <input type="text" name="ubicacion" id="ubicacion" class="form-control" required />
                        </div>

                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado:</label>
                            <select name="estado" id="estado" class="form-select" required>
                                <option value="pendiente">Pendiente</option>
                                <option value="en proceso">En Proceso</option>
                                <option value="resuelto">Resuelto</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="ciudadano" class="form-label">Ciudadano:</label>
                            <input type="text" name="ciudadano" id="ciudadano" class="form-control" required />
                        </div>

                        <div class="mb-3">
                            <label for="telefono_ciudadano" class="form-label">Teléfono:</label>
                            <input type="text" name="telefono_ciudadano" id="telefono_ciudadano" class="form-control" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tabla-denuncias').DataTable();

            $('.update-btn').click(function() {
                var datos = <?php echo json_encode($datos); ?>;
                var index = $(this).data('index');

                $('#id').val(datos[index]["id"]);
                $('#titulo').val(datos[index]["titulo"]);
                $('#descripcion').val(datos[index]["descripcion"]);
                $('#ubicacion').val(datos[index]["ubicacion"]);
                $('#estado').val(datos[index]["estado"]);
                $('#ciudadano').val(datos[index]["ciudadano"]);
                $('#telefono_ciudadano').val(datos[index]["telefono_ciudadano"]);
            });
        });
    </script>
</body>
</html>
