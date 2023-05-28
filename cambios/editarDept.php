<?php
//Editar Departamento
include_once "../conexion.php";

    if(!isset($_POST['enviar'])|| empty($_POST['codi_d'])|| empty($_POST['nom_d'])){
     header('Location:../pagina2.php');
} else{
    $id=$_POST['id_dep'];
    $codi=$_POST['codi_d'];
    $nom=$_POST['nom_d'];
    //Validacion Formulario Editar Departamento
    if (strlen($codi) !=3) {
        header("location: pagina2.php");
        exit();
    }
    if (strlen($nom) > 20 or strlen($nom) < 1) {
        header("location: pagina2.php");
        exit();
    }
    $query=$connection->prepare('UPDATE DEPARTAMENT SET 
    codi_dept=?,
    nom_dept=?
    WHERE id_dep=?');
    $query->bind_param('iss',$codi,$nom,$id);
    $query->execute();
    header('Location:../pagina2.php');
};