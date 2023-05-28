<!-- Sesion -->
<?php
session_start();
$_SESSION['inicio'];
if ($_SESSION['inicio']=='activa'){
    $_SESSION['inicio']='activa';
}
else{
    header("location: index.html");
    exit;
}
include_once "conexion.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mac School</title>
    <link rel="stylesheet" href="./CSS/styleHome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="./IMG/Icono_Home.png" type="image/x-icon">
</head>
<body>
    <!-- Navbar -->
    <div class="navbar" >
        <button onclick="alumno()" class="boton">Alumnos</button>
        <button onclick="profe()" class="boton">Profesores</button>
        <button onclick="departamento()" class="boton">Departamentos</button>
        <button onclick="clase()" class="boton">Clases</button>
        <button onclick="añadir()" class="boton" id="a">Añadir</button>
        <form method="GET" action="" class="search-form">
            <input type="text" name="search" placeholder="Buscar por nombre..." class="lupa">
            <button type="submit" class="boton search-button">Buscar</button>
        </form>    
    </div>
    <!-- Tabla alumnos -->
    <div id="alumnos">
        <h1>Alumnos</h1>
        <table class="tabla">
        <thead></thead>
        <tr>
        <th><a href="?order=num_matric"  class="quitar_decoracion">Matricula</a></th>
        <th><a href="?order=nom_alu" class="quitar_decoracion">Nombre</a></th>
        <th><a href="?order=cognom1_alu" class="quitar_decoracion">Apellido 1</a> </th>
        <th><a href="?order=cognom2_alu" class="quitar_decoracion">Apellido 2 </a></th>
        <th><a href="?order=email_alu" class="quitar_decoracion">Correo</a></th>
        <th><a href="?order=dni_alu" class="quitar_decoracion">Dni</a></th>
        <th><a href="?order=telf_alu" class="quitar_decoracion">Telefono</a></th>
        <th><a href="?order=fecha_matric_alu" class="quitar_decoracion">Fecha de matriculacion</a></th>
        <th><a href="?order=nom_classe" class="quitar_decoracion">Clase</a></th>
        <th>Borrar</th>
        <th>Editar</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <div class="base">
        <?php
            require_once "conexion.php";
            $term = isset($_GET['search']) ? $_GET['search'] : '';
            $order = "num_matric";
            if (isset($_GET["order"])) {
                $order = $_GET["order"];
            }
            $sql = "SELECT ALUMNE.*, CLASSE.nom_classe FROM ALUMNE
                    INNER JOIN CLASSE ON ALUMNE.classe = CLASSE.id_classe 
                    WHERE ALUMNE.nom_alu LIKE '%$term%' OR ALUMNE.cognom1_alu LIKE '%$term%' OR ALUMNE.cognom2_alu 
                    LIKE '%$term%' OR ALUMNE.email_alu LIKE '%$term%' OR ALUMNE.dni_alu LIKE '%$term%' OR ALUMNE.telf_alu 
                    LIKE '%$term%' OR ALUMNE.fecha_matric_alu LIKE '%$term%' OR CLASSE.nom_classe LIKE '%$term%'
                    ORDER BY $order";
            $query = "SELECT COUNT(*) FROM ALUMNE";
            $lista = mysqli_query($connection,$sql);
            $contar = mysqli_num_rows($lista);
            $rs_result = mysqli_query ($connection, $sql);    
            ?>    
            <div class="container"> 
                <div class="conTexto">
                    <p>
                        <?php
                            echo "<p class='textoPequeño'>Se han devuelto $contar alumnos</p>";
                        ?> 
                    </p>
                </div> 
            </div>
        </div>
        <?php
         $sql = "SELECT ALUMNE.*, CLASSE.nom_classe FROM ALUMNE
            INNER JOIN CLASSE ON ALUMNE.classe = CLASSE.id_classe 
            WHERE ALUMNE.nom_alu LIKE '%$term%' OR ALUMNE.cognom1_alu LIKE '%$term%' OR ALUMNE.cognom2_alu 
            LIKE '%$term%' OR ALUMNE.email_alu LIKE '%$term%' OR ALUMNE.dni_alu LIKE '%$term%' OR ALUMNE.telf_alu 
            LIKE '%$term%' OR ALUMNE.fecha_matric_alu LIKE '%$term%' OR CLASSE.nom_classe LIKE '%$term%'
            ORDER BY $order";
        $listaalumnos=mysqli_query($connection, $sql);
        foreach ($listaalumnos as $alumno) {
            echo "<tr>
                    <td>{$alumno['num_matric']}</td>
                    <td>{$alumno['nom_alu']}</td>
                    <td>{$alumno['cognom1_alu']}</td>
                    <td>{$alumno['cognom2_alu']}</td>
                    <td>{$alumno['email_alu']}</td>
                    <td>{$alumno['dni_alu']}</td>
                    <td>{$alumno['telf_alu']}</td>
                    <td>{$alumno['fecha_matric_alu']}</td>
                    <td>{$alumno['nom_classe']}</td>
                    <td><button class='boton2' onclick='alertaBorrar({$alumno['num_matric']})'>Borrar</button></td>
                    <td><button onclick='ediAl(this)' class='boton3'>Editar</button></td>
             </tr>";
        }
        ?>
        </tr>
        </tbody>
        </table>
    </div>
    <!-- Tabla profesores -->
    <div id="profes">
        <h1>Profesores</h1>
        <table class="tabla">
        <thead>
        <tr>
        <th><a href="?order2=id_profe"  class="quitar_decoracion">DNI</a></th>
        <th><a href="?order2=nom_profe"  class="quitar_decoracion">Nombre</a></th>
        <th><a href="?order2=cognom1_profe"  class="quitar_decoracion">Apellido 1</a></th>
        <th><a href="?order2=cognom2_profe"  class="quitar_decoracion">Apellido 2</a></th>
        <th><a href="?order2=email_prof"  class="quitar_decoracion">Correo</a></th>
        <th><a href="?order2=telf_prof"  class="quitar_decoracion">Telefono</a></th>
        <th><a href="?order2=sal_prof"  class="quitar_decoracion">Salario</a></th>
        <th><a href="?order2=nom_dept"  class="quitar_decoracion">Departamento</a></th>
        <th>Borrar</th>
        <th>Editar</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        </thead>
        <tbody>
        <tr>
        <div>
            <?php
            require_once "conexion.php";
            $term = isset($_GET['search']) ? $_GET['search'] : '';
        $order2 = "dni_profe";
        if (isset($_GET["order2"])) {
            $order2 = $_GET["order2"];
        }
        $sql = "SELECT PROFESSOR.*, DEPARTAMENT.nom_dept FROM PROFESSOR
                INNER JOIN DEPARTAMENT ON PROFESSOR.dept_prof = DEPARTAMENT.id_dep
                WHERE PROFESSOR.dni_profe LIKE '%$term%' OR PROFESSOR.nom_profe LIKE '%$term%' OR PROFESSOR.cognom1_profe 
                LIKE '%$term%' OR PROFESSOR.cognom2_profe LIKE '%$term%' OR PROFESSOR.email_prof LIKE '%$term%' OR PROFESSOR.telf_prof 
                LIKE '%$term%' OR PROFESSOR.sal_prof LIKE '%$term%' OR DEPARTAMENT.nom_dept LIKE '%$term%'
                ORDER BY $order2";
            $query = "SELECT COUNT(*) FROM PROFESSOR";
            $lista = mysqli_query($connection,$sql);
            $contar = mysqli_num_rows($lista);
            $rs_result = mysqli_query ($connection, $sql);    
            ?>    
            <div class="container"> 
                <div class="conTexto">
                    <p>
                        <?php
                            echo "<p class='textoPequeño'>Se han devuelto $contar profesores</p>";
                        ?> 
                    </p>
                </div> 
            </div>
        </div>
        <?php
        $sql = "SELECT PROFESSOR.*, DEPARTAMENT.nom_dept FROM PROFESSOR
        INNER JOIN DEPARTAMENT ON PROFESSOR.dept_prof = DEPARTAMENT.id_dep
        WHERE PROFESSOR.dni_profe LIKE '%$term%' OR PROFESSOR.nom_profe LIKE '%$term%' OR PROFESSOR.cognom1_profe 
        LIKE '%$term%' OR PROFESSOR.cognom2_profe LIKE '%$term%' OR PROFESSOR.email_prof LIKE '%$term%' OR PROFESSOR.telf_prof 
        LIKE '%$term%' OR PROFESSOR.sal_prof LIKE '%$term%' OR DEPARTAMENT.nom_dept LIKE '%$term%'
        ORDER BY $order2";
        $listadoprf=mysqli_query($connection, $sql);
        foreach ($listadoprf as $listaprof) {
        echo "<tr>
                <td class='invisible'>{$listaprof['id_profe']}</td>
                <td>{$listaprof['dni_profe']}</td>
                <td>{$listaprof['nom_profe']}</td>
                <td>{$listaprof['cognom1_profe']}</td>
                <td>{$listaprof['cognom2_profe']}</td>
                <td>{$listaprof['email_prof']}</td>
                <td>{$listaprof['telf_prof']}</td>
                <td>{$listaprof['sal_prof']}</td>
                <td>{$listaprof['nom_dept']}</td>
                <td><button class='boton2' onclick='alertaBorrarProf({$listaprof['id_profe']})'>Borrar</button></td>
                <td><button onclick='ediPro(this)' class='boton3'>Editar</button></td>
            </tr>";
        }
        ?>
        </tr>
        </tbody>
        </table>
    </div>
    <!-- Tabla departamentos -->
    <div id="departamentos">
        <h1>Departamentos</h1>
        <table class="tabla">
        <thead>
        <tr>
        <th>Numero del departamento</th>
        <th>Nombre del departamento</th>
        <th>Editar</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <div class="base">
            <?php
            require_once "conexion.php";
            $sql = "SELECT * FROM DEPARTAMENT";
            $query = "SELECT COUNT(*) FROM DEPARTAMENT";
            $lista = mysqli_query($connection,$sql);
            $contar = mysqli_num_rows($lista);
     
     
            $rs_result = mysqli_query ($connection, $sql);    
            ?>    
            <div class="container"> 
                <div class="conTexto">
                    <p>
                        <?php
                            echo "<p class='textoPequeño'>Se han devuelto $contar departament</p>";
                        ?> 
                    </p>
                </div> 
            </div>
        </div>
        <?php
        $sql = "SELECT * FROM DEPARTAMENT";
        
        $listado=mysqli_query($connection, $sql);
        foreach ($listado as $lista) {
            echo "<tr>
                    <td class='invisible'>{$lista['id_dep']}</td>
                    <td>{$lista['codi_dept']}</td>
                    <td>{$lista['nom_dept']}</td>
                    <td><button onclick='ediDep(this)' class='boton3'>Editar</button></td>
             </tr>";
        }
        ?>
        </tr>
        </tbody>
        </table>
    </div>
    <!-- Tabla clases -->
    <div id="clases">
        <h1>Clases</h1>
        <table class="tabla">
        <thead>
        <tr>
        <th>Numero de la clase</th>
        <th>Clase</th>
        <th>Tutor</th>
        <th>Editar</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <div class="base">
            <?php
            require_once "conexion.php";
            $sql = "SELECT * FROM CLASSE";
            $query = "SELECT COUNT(*) FROM CLASSE";
            $lista = mysqli_query($connection,$sql);
            $contar = mysqli_num_rows($lista);
     
     
            $rs_result = mysqli_query ($connection, $sql);    
            ?>    
            <div class="container"> 
                <div class="conTexto">
                    <p>
                        <?php
                            echo "<p class='textoPequeño'>Se han devuelto $contar clases</p>";
                        ?> 
                    </p>
                </div> 
            </div>
        </div>
        <?php

        $sql = "SELECT CLASSE.*, PROFESSOR.nom_profe FROM CLASSE
        INNER JOIN PROFESSOR ON CLASSE.tutor = PROFESSOR.id_profe";
        
        $listado=mysqli_query($connection, $sql);
        foreach ($listado as $lista) {
            echo "<tr>
                    <td class='invisible'>{$lista['id_classe']}</td>
                    <td>{$lista['codi_classe']}</td>
                    <td>{$lista['nom_classe']}</td>
                    <td>{$lista['nom_profe']}</td>
                    <td><button onclick='ediCla(this)' class='boton3'>Editar</button></td>
             </tr>";
        }
        ?>
        </tr>
        </tbody>
        </table>
    </div>
    <!-- Lista desplegable añadir datos -->
    <div id="añado">
        <button class="boton" onclick="crearAlumno()">Nuevo Alumno</button>
        <br>
        <button class="boton" onclick="crearProfe()">Nuevo profe</button>
        <br>
        <button class="boton" onclick="crearClase()">Nueva clase</button>
        <br>
        <button class="boton" onclick="crearDep()">Nuevo departamento</button>
    </div>
    <!-- Inserts datos tablas -->
    <!-- Formulario Crear Alumnos -->
    <div id="crearAlu" class="formulario">
    <button class="botoncerrar" onclick="volver2()"><img src="IMG/close.png" class="cerrar" align="right" alt=""></button>
        <form action="inserts.php" method="post" onsubmit="return verificarAl()">
            <h2>Escriba los datos del alumno</h2>
            <label for="">Introduzca el nombre:</label>
            <br>
            <input type="text" class="tex" name="nomalu" id="nombreAlumno">
            <br>
            <label id="falloAlumno" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <label for="">Introduzca el primer apellido:</label>
            <br>
            <input type="text" class="tex" name="apellidoalu" id="primerApellidoAlumno">
            <br>
            <label id="falloPrimerApellidoAlumno" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <label for="">Introduzca el segundo apellido:</label>
            <br>
            <input type="text" name="sapellidoalu" class="tex" id="segundoApellidoAlumno" >
            <br>
            <label id="falloSegundoApellidoAlumno" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <label for="">Introduzca el correo:</label>
            <br>
            <input type="email" name="mailalu" class="tex" id="correoAlumno">
            <br>
            <label id="correoError" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <label for="">Introduzca el DNI:</label>
            <br>
            <input type="text" name="dnialu" class="tex" id="dniAlumno">
            <br>
            <label id="dniAlumnoError" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <label for="">Introduzca el numero de telefono:</label>
            <br>
            <input type="number" name="telfalu" class="tex" id="telefonoAlumno">
            <br>
            <label id="telefonoAlumnoError" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <label for="">Introduzca la clase:</label>
            <br>
            <select name="clasealu" id="">
                <?php
                $sql = "SELECT id_classe, nom_classe FROM CLASSE";
                $respuestas = mysqli_query($connection, $sql);
                foreach ($respuestas as $respuesta){
                    $id=$respuesta['id_classe'];
                    $clase=$respuesta['nom_classe'];
                    echo "<option value='$id'>$clase</option>";
                }
                ?>
            </select>
            <br>
            <br>
            <button type="submit" class="boton3" name="accion" value="1">Enviar</button>
            <br>
            <br>
        </form>
    </div>
    <!-- Formulario Crear Profesores -->
    <div id="crearProf" class="formulario">
    <button class="botoncerrar" onclick="volver2()"><img src="IMG/close.png" class="cerrar" align="right" alt=""></button>
        <form action="inserts.php" method="post" onsubmit="return verificarProfe()">
            <h2>Escriba los datos del profesor</h2>
            <label for="">Introduzca el DNI:</label>
            <br>
            <input type="text" name="dniprofe" class="tex" id="dniProfe">
            <br>
            <label id="dnifalloProfe" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <label for="">Introduzca el nombre:</label>
            <br>
            <input type="text" name="nomprofe" class="tex" id="nombreProfe">
            <br>
            <label id="falloProfe" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <label for="">Introduzca el primer apellido:</label>
            <br>
            <input type="text" name="apellidoprofe" class="tex" id="apellido1Profe">
            <br>
            <label id="falloApellido1Profe" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <label for="">Introduzca el segundo apellido:</label>
            <br>
            <input type="text" name="sapellidoprofe" class="tex" id="apellido2Profe">
            <br>
            <label id="falloApellido2Profe" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <label for="">Introduzca el correo:</label>
            <br>
            <input type="email" name="mailprofe" class="tex" id="correoProfe">
            <br>
            <label id="correoError2" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <label for="">Introduzca el numero de telefono:</label>
            <br>
            <input type="number" name="telfprofe" class="tex" id="telefonoProfe">
            <br>
            <label id="telefonoProfeError" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <label for="">Introduzca el salario:</label>
            <br>
            <input type="number" name="salprofe" class="tex" id="sal">
            <br>
            <label id="salProfeError" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <label for="">Introduzca el departamento:</label>
            <br>
            <select name="deptprofe" id="">
                <?php
                $sql = "SELECT id_dep, nom_dept FROM DEPARTAMENT";
                $respuestas = mysqli_query($connection, $sql);
                foreach ($respuestas as $respuesta){
                    $idDEP=$respuesta['id_dep'];
                    $DEP=$respuesta['nom_dept'];
                    echo "<option value='$idDEP'>$DEP</option>";
                }
                ?>
            </select>
            <br>
            <br>
            <button type="submit" class="boton3" name="accion" value="2">Enviar</button>
            <br>
            <br>
        </form>
    </div>
    <!-- Formulario Crear Deptamento -->
    <div id="crearDep" class="formulario">
    <button class="botoncerrar" onclick="volver2()"><img src="IMG/close.png" class="cerrar" align="right" alt=""></button>
        <form action="inserts.php" method="post" onsubmit="return validarDep()">
            <h2>Escriba los datos del departamento</h2>
            <label for="">Introduzca el numero:</label>
            <br>
            <input type="number" name="numdept" class="tex" id="numDep">
            <br>
            <label id="numDepError" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <label for="">Introduzca el nombre:</label>
            <br>
            <input type="text" name="nomdept" class="tex" id="nombreDep">
            <br>
            <label id="nombreDepError" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <button type="submit" class="boton3" name="accion" value="3">Enviar</button>
            <br>
            <br>
        </form>
    </div>
    <!-- Formulario Crear Clase -->
    <div id="crearClase" class="formulario">
    <button class="botoncerrar" onclick="volver2()"><img src="IMG/close.png" class="cerrar" align="right" alt=""></button>
        <form action="inserts.php" method="post" onsubmit="return validarClase()">
            <h2>Escriba los datos de la clase</h2>
            <label for="">Introduzca el numero:</label>
            <br>
            <input type="number" name="numclase" class="tex" id="numClase">
            <br>
            <label id="numClaseError" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <label for="">Introduzca el nombre:</label>
            <br>
            <input type="text" name="nomclase" class="tex" id="nombreClase">
            <br>
            <label id="nombreClaseError" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <label for="">Introduzca el tutor:</label>
            <br>
            <select name="tutor" id="">
                <?php
                $sql = "SELECT id_profe, nom_profe FROM PROFESSOR";
                $respuestas = mysqli_query($connection, $sql);
                foreach ($respuestas as $respuesta){
                    $dni_profe=$respuesta['id_profe'];
                    $tutor=$respuesta['nom_profe'];
                    echo "<option value='$dni_profe'>$tutor</option>";
                }
                ?>
            </select>
            <br>
            <br>
            <button type="submit" class="boton3" name="accion" value="4">Enviar</button>
            <br>
            <br>
        </form>
    </div>
    <!-- Editar datos tablas -->
    <!-- Editar Tabla Alumnos -->
    <div id="ediAlu" class="formulario">
    <button class="botoncerrar" onclick="volver3()"><img src="IMG/close.png" class="cerrar" align="right" alt=""></button>
        <form action="cambios/editarAlumnos.php" method="post" onsubmit="return editarAl2()">
        <input type="hidden" name="num_matric" id="num_matric" class="form-control" value="">
           <div>
                <label for="nombre">Nombre</label>
                <br>
                <input type="text" name="nombre" id="nombre" class="tex" value="">
           </div>
           <label id="EditarNombreAlumnoError" style="color:rgb(255, 15, 15)"></label></br>
           <br>
           <div>
                <label for="nombre">Apellido 1</label>
                <br>
                <input type="text" name="apellido1" id="apellido1" class="tex" value="">
           </div>
           <label id="EditarNombre2AlumnoError" style="color:rgb(255, 15, 15)"></label></br>
           <br>
           <div>
                <label for="nombre">Apellido 2</label>
                <br>
                <input type="text" name="apellido2" id="apellido2" class="tex" value="">
           </div>
           <label id="EditarNombre3AlumnoError" style="color:rgb(255, 15, 15)"></label></br>
           <br>
           <div>
                <label for="nombre">Correo</label>
                <br>
                <input type="text" name="correo" id="correo" class="tex" value="">
           </div>
           <label id="EditarcorreoAlumnoError" style="color:rgb(255, 15, 15)"></label></br>
           <br>
           <div>
                <label for="nombre">DNI</label>
                <br>
                <input type="text" name="dni" id="dni" class="tex" value="">
           </div>
           <label id="dniAlumnoErrorEditar" style="color:rgb(255, 15, 15)"></label></br>
           <br>
           <div>
                <label for="nombre">Telefono</label>
                <br>
                <input type="text" name="telf" id="telf" class="tex" value="">
           </div>
           <label id="telfAluEdiError" style="color:rgb(255, 15, 15)"></label></br>
           <br>
           <div class="form-group">
                <label for="nombre">Clase</label>
                <br>
            <select name="clase" id="clase">
                <?php
                $sql = "SELECT id_classe, nom_classe FROM CLASSE";
                $respuestas = mysqli_query($connection, $sql);
                foreach ($respuestas as $respuesta){
                    $id=$respuesta['id_classe'];
                    $clase=$respuesta['nom_classe'];
                    echo "<option value='$id'>$clase</option>";
                }
                ?>
            </select>
            </div>
           <br>
            <button type="submit" class="boton3" name="enviar" value="1">Enviar</button>
        </form>
    </div>
    <!-- Editar Tabla Profesores -->
    <div id="ediProf" class="formulario">
    <button class="botoncerrar" onclick="volver3()"><img src="IMG/close.png" class="cerrar" align="right" alt=""></button>
        <form action="cambios/editarProfesores.php" method="post" onsubmit="return verificarEdiPro()">
        <input type="hidden" name="id_profe" id="id_p" class="form-control" value="">
            <div>
                <label for="nombre">DNI</label>
                <br>
                <input type="text" name="dni_profe" id="dni_p" class="tex" value="">
            </div>
            <label id="dnifalloProfeEdi" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <div>
                <label for="nombre">Nombre</label>
                <br>
                <input type="text" name="nom_profe" id="nom_p" class="tex" value="">
            </div>
            <label id="falloProfeEdi" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <div>
                <label for="nombre">Apellido 1</label>
                <br>
                <input type="text" name="cognom1_profe" id="apellido1_p" class="tex" value="">
            </div>
            <label id="falloApellido1ProfeEdi" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <div>
                <label for="nombre">Apellido 2</label>
                <br>
                <input type="text" name="cognom2_prof" id="cognom2_p" class="tex" value="">
            </div>
            <label id="falloApellido2ProfeEdi" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <div>
                <label for="nombre">Correo</label>
                <br>
                <input type="text" name="email_prof" id="email_p" class="tex" value="">
            </div>
            <label id="correoError2Edi" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <div>
                <label for="nombre">Telefono</label>
                <br>
                <input type="text" name="telf_prof" id="telf_p" class="tex" value="">
            </div>
            <label id="telefonoProfeErrorEdi" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <div>
                <label for="nombre">Salario</label>
                <br>
                <input type="text" name="sal_prof" id="sal_p" class="tex" value="">
            </div>
            <label id="salProfeErrorEdi" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <div class="form-group">
                <label for="nombre">Departamento</label>
                <br>
                <select name="dept_prof">
                <?php
                $sql = "SELECT id_dep, nom_dept FROM DEPARTAMENT";
                $respuestas = mysqli_query($connection, $sql);
                foreach ($respuestas as $respuesta){
                    $idDEP=$respuesta['id_dep'];
                    $DEP=$respuesta['nom_dept'];
                    echo "<option value='$idDEP'>$DEP</option>";
                }
                ?>
            </select>
            </div>
            <br>
            <button type="submit" class="boton3" name="enviar" value="2">Enviar</button>
        </form>
    </div>
    <!-- Editar Tabla Departamento -->
    <div id="ediDep" class="formulario">
    <button class="botoncerrar" onclick="volver3()"><img src="IMG/close.png" class="cerrar" align="right" alt=""></button>
        <form action="cambios/editarDept.php" method="post" onsubmit="return validarEdiDep()">
        <input type="hidden" name="id_dep" id="id_d" class="form-control" value="">
            <div>
                <label for="nombre">Numero departamento</label>
                <br>
                <input type="text" name="codi_d" id="codi_d" class="tex" value="">
            </div>
            <label id="numDepErrorEdi" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <div>
                <label for="nombre">Nombre departamento</label>
                <br>
                <input type="text" name="nom_d" id="nom_d" class="tex" value="">
            </div>
            <label id="nombreDepErrorEdi" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <button type="submit" class="boton3" name="enviar" value="3">Enviar</button>
        </form>
    </div>
    <!-- Editar Tabla Clase -->
    <div id="ediClase" class="formulario">
    <button class="botoncerrar" onclick="volver3()"><img src="IMG/close.png" class="cerrar" align="right" alt=""></button>
        <form action="cambios/editarClase.php" method="post" onsubmit="return validarEdiClase()">
        <input type="hidden" name="id_classe" id="id_c" class="form-control" value="">
            <div>
                <label for="nombre">Numero clase</label>
                <br>
                <input type="text" name="codi_classe" id="codi_c" class="tex" value="">
            </div>
            <label id="numClaseErrorEdi" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <div>
                <label for="nombre">Nombre clase</label>
                <br>
                <input type="text" name="nom_classe" id="nom_c" class="tex" value="">
            </div>
            <label id="nombreClaseErrorEdi" style="color:rgb(255, 15, 15)"></label></br>
            <br>
            <div class="form-group">
                <label for="nombre">Tutor clase</label>
                <br>
                <select name="tutor">
                <?php
                $sql = "SELECT id_profe, nom_profe FROM PROFESSOR";
                $respuestas = mysqli_query($connection, $sql);
                foreach ($respuestas as $respuesta){
                    $idDEP=$respuesta['id_profe'];
                    $DEP=$respuesta['nom_profe'];
                    echo "<option value='$idDEP'>$DEP</option>";
                }
                ?>
            </select>
            <br>
            <br>
            <button type="submit" class="boton3" name="enviar" value="4">Enviar</button>
        </form>
    </div>
<script src="JS/main.js"></script>
<script src="JS/validaciones.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="JS/borrarAlerta.js"></script>
</body>
</html>
