<!-- Header -->
<?php include('template/header.php'); ?>

<!-- Query para listado de alumnos -->
<?php
include_once "model/conexion.php";
$sentencia = $bd->query(
    "SELECT a.idAlumno, a.nombre, a.apellidoPaterno, a.apellidoMaterno, (c.matematicas+c.espanol+c.ingles+c.quimica+c.fisica+c.geografia)/6 AS promedio 
    FROM alumnos AS a 
    INNER JOIN calificaciones AS c 
    ON a.idAlumno = c.idAlumno
    ORDER BY promedio DESC
    LIMIT 1"
);
$alumnos = $sentencia->fetchAll(PDO::FETCH_OBJ);
// print_r($alumnos);
?>

<!-- Contenido principal -->
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <!-- funciones -->                
                <div class="card">
                    <div class="card-header">
                        Reportes
                    </div>
                    <div class="p4">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                General
                                <a href="index.php"><span class="badge bg-secondary badge-pill">Seleccionar</span></a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Datos de alumnos
                                <a href="datos.php"><span class="badge bg-secondary badge-pill">Seleccionar</span></a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Calificaciones de alumnos con promedio
                                <a href="calificaciones.php"><span class="badge bg-secondary badge-pill">Seleccionar</span></a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center active">
                                Mejor promedio del grupo
                                <span class="badge bg-primary badge-pill">Seleccionado</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Peor promedio del grupo
                                <a href="peorProm.php"><span class="badge bg-secondary badge-pill">Seleccionar</span></a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Promedio general del grupo
                                <a href="promedioGral.php"><span class="badge bg-secondary badge-pill">Seleccionar</span></a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Cuadro de honor (mejores 3)
                                <a href="cuadroHonor.php"><span class="badge bg-secondary badge-pill">Seleccionar</span></a>
                            </li>                            
                        </ul>                      
                    </div>
                </div>
                <br>

                <!-- Alertas -->
                <?php
                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Registrado!</strong> Se agregaron los datos.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                }
                ?>

                <?php
                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Vuelve a intentar.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                }
                ?>

                <?php
                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Cambiado!</strong> Los datos fueron actualizados.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                }
                ?>

                <?php
                if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Eliminado!</strong> Los datos fueron borrados.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                }
                ?>

                <!-- Tabla alumnos -->
                <div class="card">
                    <div class="card-header">
                        Lista de Alumnos
                    </div>
                    <div class="p-4">
                        <div class="table-responsive">
                            <table id="tabla" class="table align-middle display">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellidos</th>
                                        <th scope="col">Promedio</th>
                                        <th scope="col">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- Asignación de valores del query a la tabla -->
                                    <?php
                                    foreach ($alumnos as $dato) {
                                    ?>

                                        <tr class="">
                                            <td scope="row"><?php echo $dato->idAlumno; ?></td>
                                            <td><?php echo $dato->nombre; ?></td>
                                            <td><?php echo $dato->apellidoPaterno . " " . $dato->apellidoMaterno; ?></td>
                                            <td class="text-center"><?php echo number_format((float)$dato->promedio,2); ?></td>
                                            <td class="text-center">
                                                <a href="editar.php?idAlumno=<?php echo $dato->idAlumno; ?>"><i class="bi bi-pencil-square text-succes"></i></a>
                                                <a href="eliminar.php?idAlumno=<?php echo $dato->idAlumno; ?>"><i class="bi bi-trash text-danger"></i></a>
                                            </td>
                                        </tr>                                        

                                    <?php
                                        }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
                                   
            <!-- Formulario de registro de alumnos -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Registro de Alumnos
                    </div>
                    <form action="registrar.php" class="p-4" method="post">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">Datos Generales</th>
                                        <th scope="col">Calificaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                        <td scope="row">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Nombre:</label>
                                                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Apellido Paterno:</label>
                                                        <input type="text" class="form-control" name="txtApellidoP" required>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Apellido Materno:</label>
                                                        <input type="text" class="form-control" name="txtApellidoM" required>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Correo:</label>
                                                        <input type="text" class="form-control" name="txtCorreo" required>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Dirección:</label>
                                                        <input type="text" class="form-control" name="txtDireccion" required>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Teléfono:</label>
                                                        <input type="text" class="form-control" name="txtTelefono" required>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Ciudad:</label>
                                                        <input type="text" class="form-control" name="txtCiudad" required>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">País:</label>
                                                        <input type="text" class="form-control" name="txtPais1" required>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul class="list-unstyled">
                                                <li>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Matemáticas:</label>
                                                        <input type="number" class="form-control" name="txtMatematicas" required>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Español:</label>
                                                        <input type="number" class="form-control" name="txtEspanol" required>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Inglés:</label>
                                                        <input type="number" class="form-control" name="txtIngles" required>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Geografía:</label>
                                                        <input type="number" class="form-control" name="txtGeografia" required>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Química:</label>
                                                        <input type="number" class="form-control" name="txtQuimica" required>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Física:</label>
                                                        <input type="number" class="form-control" name="txtFisica" required>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-grid">
                            <input type="hidden" name="oculto" value="1">
                            <input type="submit" class="btn btn-primary" value="Registrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Script para la DataTable -->
<script>
    $(document).ready(function() {
        $('#tabla').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.1/i18n/es-MX.json",                
            },
            order: [[3, 'desc']],
        });
    });
</script>

<!-- Footer -->
<?php include('template/footer.php'); ?>