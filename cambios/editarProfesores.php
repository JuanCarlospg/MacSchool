<?php
//Editar Profesores
include_once "../conexion.php";

    if(!isset($_POST['enviar'])|| empty($_POST['dni_profe'])|| empty($_POST['nom_profe'])|| empty($_POST['cognom1_profe']) || empty($_POST['email_prof'])|| empty($_POST['telf_prof'])|| empty($_POST['sal_prof'])|| empty($_POST['dept_prof'])){
        var_dump($_POST);
        die;
        header('Location:../pagina2.php');
} else{
    $idProfe=$_POST['id_profe'];
    $dniProf=$_POST['dni_profe'];
    $nom=$_POST['nom_profe'];
    $cognom1=$_POST['cognom1_profe'];
    $cognom2=$_POST['cognom2_prof'];
    $email=$_POST['email_prof'];
    $telfProf=$_POST['telf_prof'];
    $salario=$_POST['sal_prof'];
    $dept=$_POST['dept_prof'];
    //Validacion Formulario Editar Profesores
    if (!preg_match("/^\d{8}[A-Z]$/", $dniProf)) {
        header("location: pagina2.php");
        exit();
    }
    if (strlen($nom) > 20 or strlen($nom) < 1) {
        header("location: pagina2.php");
        exit();
    }
    if (strlen($cognom1) > 20 or strlen($cognom1) < 1) {
        header("location: pagina2.php");
        exit();
    }
    if (strlen($cognom2) > 20) {
        header("location: pagina2.php");
        exit();
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("location: pagina2.php");
        exit();
    }
    if (!preg_match("/^\d{9}$/", $telfProf)) {
        header("location: pagina2.php");
        exit();
    }
    if (strlen($salario) > 5 or strlen($salario) < 4) {
        header("location: pagina2.php");
        exit();
    }
    $query=$connection->prepare('UPDATE PROFESSOR SET
    nom_profe=?,
    cognom1_profe=?,
    cognom2_profe=?,
    email_prof=?,
    telf_prof=?,
    sal_prof=?,
    dept_prof=?,
    dni_profe=?
    WHERE id_profe=?');
    $query->bind_param('ssssiiisi',$nom,$cognom1,$cognom2,$email,$telfProf,$salario,$dept,$dniProf,$idProfe);
    $query->execute();
    header('Location:../pagina2.php');
};