<?php
//Editar Clase
include_once "../conexion.php";

    if(!isset($_POST['enviar'])|| empty($_POST['codi_classe'])|| empty($_POST['nom_classe'])|| empty($_POST['tutor'])){
        header('Location:../pagina2.php');
} else{
    $id=$_POST['id_classe'];
    $codi=$_POST['codi_classe'];
    $nom=$_POST['nom_classe'];
    $tutor=$_POST['tutor'];
    //Validacion Formulario Editar Clase
    if (strlen($codi) !=3) {
        header("location: pagina2.php");
        exit();
    }
    if (strlen($nom) > 20 or strlen($nom) < 1) {
        header("location: pagina2.php");
        exit();
    }
    $query=$connection->prepare('UPDATE CLASSE SET 
    codi_classe=?,
    nom_classe=?,
    tutor=?
    WHERE id_classe=?');
    $query->bind_param('issi',$codi,$nom,$tutor,$id);
    $query->execute();
    header('Location:../pagina2.php');
};