<?php
require_once 'auth.php';

include("conexion.php");

if(isset($_POST['alumno_id'], $_POST['asignatura'], $_POST['nota'])){

    $alumno_id = $_POST['alumno_id'];
    $asignatura = $_POST['asignatura'];
    $nota = $_POST['nota'];

    $sql = "INSERT INTO notas (alumno_id, asignatura, nota) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("isd", $alumno_id, $asignatura, $nota);

    if($stmt->execute()){
        header("Location: ingreso_notas.php?id=".$alumno_id);
        exit();
    } else {
        echo "Error al guardar la nota";
    }

} else {
    echo "Datos incompletos";
}
?>