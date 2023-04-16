<?php 
    if(!isset($_GET['idAlumno'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';
    $idAlumno = $_GET['idAlumno'];

    $sentencia = $bd->prepare("DELETE FROM calificaciones where idAlumno = ?;");
    $resultadoA = $sentencia->execute([$idAlumno]);
    $sentencia = $bd->prepare("DELETE FROM alumnos where idAlumno = ?;");
    $resultadoB = $sentencia->execute([$idAlumno]);

    if ($resultadoA === TRUE && $resultadoB === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }
    
?>