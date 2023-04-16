<?php
    print_r($_POST);

    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $apellidoPaterno = $_POST["txtApellidoP"];
    $apellidoMaterno = $_POST["txtApellidoM"];
    $correo = $_POST["txtCorreo"];
    $direccion = $_POST["txtDireccion"];
    $telefono = $_POST["txtTelefono"];
    $ciudad = $_POST["txtCiudad"];
    $pais = $_POST["txtPais1"];
    $matematicas = $_POST["txtMatematicas"];
    $espanol = $_POST["txtEspanol"];
    $ingles = $_POST["txtIngles"];
    $geografia = $_POST["txtGeografia"];
    $quimica = $_POST["txtQuimica"];
    $fisica = $_POST["txtFisica"];
    
    $sentencia = $bd->prepare("INSERT INTO alumnos(idAlumno,nombre,apellidoPaterno,apellidoMaterno,correo,direccion,telefono,ciudad,pais) VALUES (?,?,?,?,?,?,?,?,?);");
    $resultadoA = $sentencia->execute(['',$nombre,$apellidoPaterno,$apellidoMaterno,$correo,$direccion,$telefono,$ciudad,$pais]);
    $getId = $bd->query("SELECT LAST_INSERT_ID(idAlumno) as id FROM alumnos ORDER BY idAlumno DESC LIMIT 1");
    $id = $getId->fetch(PDO::FETCH_OBJ);
    $sentencia = $bd->prepare("INSERT INTO calificaciones(idCalificaciones,idAlumno,matematicas,espanol,ingles,geografia,quimica,fisica) VALUES (?,?,?,?,?,?,?,?);");
    $resultadoB = $sentencia->execute(['',$id->id,$matematicas,$espanol,$ingles,$geografia,$quimica,$fisica]);
    if ($resultadoA === TRUE && $resultadoB === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
?>