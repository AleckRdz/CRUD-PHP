<?php include 'template/header.php' ?>

<?php
if (!isset($_GET['idAlumno'])) {
    header('Location: index.php?mensaje=error');
    exit();
}

include_once 'model/conexion.php';
$idAlumno = $_GET['idAlumno'];

$sentencia = $bd->prepare("select * from alumnos where idAlumno = ?;");
$sentencia->execute([$idAlumno]);
$alumno = $sentencia->fetch(PDO::FETCH_OBJ);
$sentencia = $bd->prepare("select * from calificaciones where idAlumno = ?;");
$sentencia->execute([$idAlumno]);
$calificaciones = $sentencia->fetch(PDO::FETCH_OBJ);
//print_r($alumno);
?>        

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Editar datos
                </div>
                <form action="editarProceso.php" class="p-4" method="post">
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
                                                    <input type="text" class="form-control" name="txtNombre" autofocus required value="<?php echo $alumno->nombre; ?>">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Apellido Paterno:</label>
                                                    <input type="text" class="form-control" name="txtApellidoP" required value="<?php echo $alumno->apellidoPaterno; ?>">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Apellido Materno:</label>
                                                    <input type="text" class="form-control" name="txtApellidoM" required value="<?php echo $alumno->apellidoMaterno; ?>">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Correo:</label>
                                                    <input type="text" class="form-control" name="txtCorreo" required value="<?php echo $alumno->correo; ?>">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Dirección:</label>
                                                    <input type="text" class="form-control" name="txtDireccion" required value="<?php echo $alumno->direccion; ?>">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Teléfono:</label>
                                                    <input type="text" class="form-control" name="txtTelefono" required value="<?php echo $alumno->telefono; ?>">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Ciudad:</label>
                                                    <input type="text" class="form-control" name="txtCiudad" required value="<?php echo $alumno->ciudad; ?>">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">País:</label>
                                                    <input type="text" class="form-control" name="txtPais1" required value="<?php echo $alumno->pais; ?>">
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled">
                                            <li>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Matemáticas:</label>
                                                    <input type="number" class="form-control" name="txtMatematicas" required value="<?php echo $calificaciones->matematicas; ?>">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Español:</label>
                                                    <input type="number" class="form-control" name="txtEspanol" required value="<?php echo $calificaciones->espanol; ?>">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Inglés:</label>
                                                    <input type="number" class="form-control" name="txtIngles" required value="<?php echo $calificaciones->ingles; ?>">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Geografía:</label>
                                                    <input type="number" class="form-control" name="txtGeografia" required value="<?php echo $calificaciones->geografia; ?>">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Química:</label>
                                                    <input type="number" class="form-control" name="txtQuimica" required value="<?php echo $calificaciones->quimica; ?>">
                                                </div>
                                            </li>
                                            <li>
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Física:</label>
                                                    <input type="number" class="form-control" name="txtFisica" required value="<?php echo $calificaciones->fisica; ?>">
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="idAlumno" value="<?php echo $alumno->idAlumno; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>