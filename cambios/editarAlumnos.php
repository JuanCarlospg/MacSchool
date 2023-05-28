<?php
//Editar Alumnos
include_once "../conexion.php";

    if(!isset($_POST['enviar'])|| empty($_POST['nombre'])|| empty($_POST['apellido1'])|| empty($_POST['correo'] || empty($_POST['dni'])|| empty($_POST['telf'])|| empty($_POST['fecha'])|| empty($_POST['clase'])|| empty($_POST['num_matric']))){
        var_dump($_POST);
        die;
        header('Location:../pagina2.php');
} else{
    $nombre=$_POST['nombre'];
    $apellido1=$_POST['apellido1'];
    $apellido2=$_POST['apellido2'];
    $correo=$_POST['correo'];
    $dni=$_POST['dni'];
    $telf=$_POST['telf'];
    $clase=$_POST['clase'];
    $num=$_POST['num_matric'];
    //Validacion Formulario Editar Alumno
    if (strlen($nombre) > 20 or strlen($nombre) < 1) {
        header("location: pagina2.php");
        exit();
    }
    if (strlen($apellido1) > 20 or strlen($apellido1) < 1) {
        header("location: pagina2.php");
        exit();
    }
    if (strlen($apellido2) > 20) {
        header("location: pagina2.php");
        exit();
    }
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        header("location: pagina2.php");
        exit();
    }
    if (!preg_match("/^\d{8}[A-Z]$/", $dni)) {
        header("location: pagina2.php");
        exit();
    }
    if (!preg_match("/^\d{9}$/", $telf)) {
        header("location: pagina2.php");
        exit();
    }
    $query=$connection->prepare('UPDATE ALUMNE SET 
    nom_alu=?,
    cognom1_alu=?,
    cognom2_alu=?,
    email_alu=?,
    dni_alu=?,
    telf_alu=?,
    classe=?
    WHERE num_matric=?');
    $query->bind_param('sssssiii',$nombre,$apellido1,$apellido2,$correo,$dni,$telf,$clase,$num);
    $query->execute();
    header('Location:../pagina2.php');
};