<?php
    print_r($_POST);
    if(!isset($_POST['idAlumno'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $idAlumno = $_POST['idAlumno'];
    $nombre = $_POST['txtNombre'];
    $apellidoPaterno = $_POST['txtApellidoP'];
    $apellidoMaterno = $_POST['txtApellidoM'];
    $correo = $_POST['txtCorreo'];
    $direccion = $_POST['txtDireccion'];
    $telefono = $_POST['txtTelefono'];
    $ciudad = $_POST['txtCiudad'];
    $pais = $_POST['txtPais1'];
    $matematicas = $_POST['txtMatematicas'];
    $espanol = $_POST['txtEspanol'];
    $ingles = $_POST['txtIngles'];
    $geografia = $_POST['txtGeografia'];
    $quimica = $_POST['txtQuimica'];
    $fisica = $_POST['txtFisica'];
    
    $sentencia = $bd->prepare("UPDATE alumnos SET nombre = ?, apellidoPaterno = ?, apellidoMaterno = ?, correo = ?, direccion = ?, telefono = ?, ciudad = ?, pais = ? where idAlumno = ?;");
    $resultadoA = $sentencia->execute([$nombre, $apellidoPaterno, $apellidoMaterno, $correo, $direccion, $telefono, $ciudad, $pais, $idAlumno]);
    $sentencia = $bd->prepare("UPDATE calificaciones SET matematicas = ?, espanol = ?, ingles = ?, geografia = ?, quimica = ?, fisica = ? where idAlumno = ?;");
    $resultadoB = $sentencia->execute([$matematicas, $espanol, $ingles, $geografia, $quimica, $fisica, $idAlumno]);

    if ($resultadoA === TRUE && $resultadoB === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>