//Validacion Login
function sesion() {
    var user = document.getElementById('username').value
    var respuesta1 = document.getElementById('res1')
    if (user != 'admin') {
        respuesta1.innerHTML = 'Usuario incorrecto'
        return false
    }
    else{
        respuesta1.innerHTML = ''
    }
    var pwd = document.getElementById('password').value
    var respuesta2 = document.getElementById('res2')
    if (pwd != '1234') {
        respuesta2.innerHTML = 'Contraseña incorrecta'
        return false
    }
    else{
        respuesta2.innerHTML = ''
    }
}

//Validacion Alta Alumno
function verificarAl() {
    var nombre = document.getElementById('nombreAlumno').value
    var falloAlumno = document.getElementById('falloAlumno')
    if (nombre.length > 20 || nombre.length < 1) {
        falloAlumno.innerHTML = 'El nombre no esta bien'
        return false
    }
    else{
        falloAlumno.innerHTML = ''
    }
    var apellido1 = document.getElementById('primerApellidoAlumno').value
    var apellidoError1 = document.getElementById('falloPrimerApellidoAlumno')
    if (apellido1.length > 20 || apellido1.length < 1) {
        apellidoError1.innerHTML = 'El apellido no esta bien'
        return false
    }
    else{
        apellidoError1.innerHTML = ''
    }
    var apellidoError2 = document.getElementById('falloSegundoApellidoAlumno')
    var apellido2 = document.getElementById('segundoApellidoAlumno').value
    if (apellido2.length > 20) {
        apellidoError1.innerHTML = 'El apellido no esta bien'
        return false
    }
    else{
        apellidoError2.innerHTML = ''
    }
    var correoAlumno = document.getElementById('correoAlumno').value
    var correoExpresion = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    var correoError = document.getElementById('correoError')
    if (!correoExpresion.test(correoAlumno)) {
        correoError.innerHTML = 'El correo no existe'
        return false
    }
    else{
        correoError.innerHTML = ''
    }
    var dniError = document.getElementById('dniAlumnoError')
    var dniExpresion = /^\d{8}[A-Z]$/
    var dniAlumno = document.getElementById('dniAlumno').value

    if (!dniExpresion.test(dniAlumno)) {
        dniError.innerHTML = 'Por favor, ingresa un DNI válido (8 dígitos seguidos de una letra mayuscula).'
        return false
    }
    else{
        dniError.innerHTML = ''
    }
    var telefonoAlumno = document.getElementById('telefonoAlumno').value
    var telefonoAlumnoError = document.getElementById('telefonoAlumnoError')
    var telefonoExpresion = /^\d{9}$/
    if (!telefonoExpresion.test(telefonoAlumno)) {
        telefonoAlumnoError.innerHTML = decodeURIComponent('Por favor, ingresa un número de teléfono válido (9 dígitos sin espacios ni guiones).')
        return false
    }
    else{
        telefonoAlumnoError.innerHTML = ''
    }
}

//Validacion Alta Profesores
function verificarProfe() {
    var dnifalloProfe = document.getElementById('dnifalloProfe')
    var dniExpresion = /^\d{8}[A-Z]$/
    var dniProfe = document.getElementById('dniProfe').value

    if (!dniExpresion.test(dniProfe)) {
        dnifalloProfe.innerHTML = 'Por favor, ingresa un DNI válido (8 dígitos seguidos de una letra mayuscula).'
        return false
    }
    else{
        dnifalloProfe.innerHTML = ''

    }
    var nombre = document.getElementById('nombreProfe').value
    var falloProfe = document.getElementById('falloProfe')
    if (nombre.length > 20 || nombre.length < 1) {
        falloProfe.innerHTML = 'El nombre no esta bien'
        return false
    }
    else{
        falloProfe.innerHTML = ''
    }
    var apellido1Profe = document.getElementById('apellido1Profe').value
    var falloApellido1Profe = document.getElementById('falloApellido1Profe')
    if (apellido1Profe.length > 20 || apellido1Profe.length < 1) {
        falloApellido1Profe.innerHTML = 'El nombre no esta bien'
        return false
    }
    else{
        falloApellido1Profe.innerHTML = ''
    }
    var apellido2Profe = document.getElementById('apellido2Profe').value
    var falloApellido2Profe = document.getElementById('falloApellido2Profe')
    if (apellido2Profe.length > 20) {
        falloApellido2Profe.innerHTML = 'El nombre no esta bien'
        return false
    }
    else{
        falloApellido2Profe.innerHTML = ''
    }
    var correoProfe = document.getElementById('correoProfe').value
    var correoExpresion = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    var correoError2 = document.getElementById('correoError2')
    if (!correoExpresion.test(correoProfe)) {
        correoError2.innerHTML = 'El correo no existe'
        return false
    }
    else{
        correoError2.innerHTML = ''
    }
    var telefonoProfe = document.getElementById('telefonoProfe').value
    var telefonoProfeError = document.getElementById('telefonoProfeError')
    var telefonoExpresion = /^\d{9}$/
    if (!telefonoExpresion.test(telefonoProfe)) {
        telefonoProfeError.innerHTML = decodeURIComponent('Por favor, ingresa un número de teléfono válido (9 dígitos sin espacios ni guiones).');
        return false
    }
    else{
        telefonoProfeError.innerHTML = ''
    }
    var sal = document.getElementById('sal').value
    var salProfeError = document.getElementById('salProfeError')
    if (sal.length > 5 || sal.length < 4) {
        salProfeError.innerHTML = 'El salario no es correcto'
        return false
    }
    else{
        salProfeError.innerHTML = ''
    }
}

//Validacion Alta Departamento
function validarDep(){
    var numDep = document.getElementById('numDep').value
    var numDepError = document.getElementById('numDepError')
    if (numDep.length != 3) {
        numDepError.innerHTML = 'El numero de departamento no tiene tres digitos'
        return false
    }
    else{
        numDepError.innerHTML = ''
    }
    var nombreDep = document.getElementById('nombreDep').value
    var nombreDepError = document.getElementById('nombreDepError')
    if (nombreDep.length > 20 || nombreDep.length < 1) {
        nombreDepError.innerHTML = 'El nombre de departamento no es correcto'
        return false
    }
    else{
        nombreDepError.innerHTML = ''
    }
}

//Validacion Alta Clase
function validarClase(){
    var numClase = document.getElementById('numClase').value
    var numClaseError = document.getElementById('numClaseError')
    if (numClase.length != 3) {
        numClaseError.innerHTML = 'El numero de departamento no tiene tres digitos'
        return false
    }
    else{
        numClaseError.innerHTML = ''
    }
    var nombreClase = document.getElementById('nombreClase').value
    var nombreClaseError = document.getElementById('nombreClaseError')
    if (nombreClase.length > 20 || nombreDep.length < 1) {
        nombreClaseError.innerHTML = 'El nombre de departamento no es correcto'
        return false
    }
    else{
        nombreClaseError.innerHTML = ''
    }
}

//Validacion Editar Alumno
function editarAl2() {
    var nombre = document.getElementById('nombre').value
    var falloAlumno = document.getElementById('EditarNombreAlumnoError')
    if (nombre.length > 20 || nombre.length < 1) {
        falloAlumno.innerHTML = 'El nombre no esta bien'
        return false
    }
    else{
        falloAlumno.innerHTML = ''
    }
    var apellido1 = document.getElementById('apellido1').value
    var apellidoError1 = document.getElementById('EditarNombre2AlumnoError')
    if (apellido1.length > 20 || apellido1.length < 1) {
        apellidoError1.innerHTML = 'El apellido no esta bien'
        return false
    }
    else{
        apellidoError1.innerHTML = ''
    }
    var apellidoError2 = document.getElementById('EditarNombre3AlumnoError')
    var apellido2 = document.getElementById('apellido2').value
    if (apellido2.length > 20) {
        apellidoError1.innerHTML = 'El apellido no esta bien'
        return false
    }
    else{
        apellidoError2.innerHTML = ''
    }
    var correoAlumno = document.getElementById('correo').value
    var correoExpresion = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    var correoError = document.getElementById('EditarcorreoAlumnoError')
    if (!correoExpresion.test(correoAlumno)) {
        correoError.innerHTML = 'El correo no existe'
        return false
    }
    else{
        correoError.innerHTML = ''
    }
    var dniError = document.getElementById('dniAlumnoErrorEditar')
    var dniExpresion = /^\d{8}[A-Z]$/
    var dniAlumno = document.getElementById('dni').value

    if (!dniExpresion.test(dniAlumno)) {
        dniError.innerHTML = 'Por favor, ingresa un DNI válido (8 dígitos seguidos de una letra mayuscula).'
        return false
    }
    else{
        dniError.innerHTML = ''
    }
    var telefonoAlumno = document.getElementById('telf').value
    var telefonoAlumnoError = document.getElementById('telfAluEdiError')
    var telefonoExpresion = /^\d{9}$/
    if (!telefonoExpresion.test(telefonoAlumno)) {
        telefonoAlumnoError.innerHTML = decodeURIComponent('Por favor, ingresa un número de teléfono válido (9 dígitos sin espacios ni guiones).')
        return false
    }
    else{
        telefonoAlumnoError.innerHTML = ''
    }
}

//Validacion Editar Profesores
function verificarEdiPro() {
    var dnifalloProfe = document.getElementById('dnifalloProfeEdi')
    var dniExpresion = /^\d{8}[A-Z]$/
    var dniProfe = document.getElementById('dni_p').value

    if (!dniExpresion.test(dniProfe)) {
        dnifalloProfe.innerHTML = 'Por favor, ingresa un DNI válido (8 dígitos seguidos de una letra mayuscula).'
        return false
    }
    else{
        dnifalloProfe.innerHTML = ''

    }
    var nombre = document.getElementById('nom_p').value
    var falloProfe = document.getElementById('falloProfeEdi')
    if (nombre.length > 20 || nombre.length < 1) {
        falloProfe.innerHTML = 'El nombre no esta bien'
        return false
    }
    else{
        falloProfe.innerHTML = ''
    }
    var apellido1Profe = document.getElementById('apellido1_p').value
    var falloApellido1Profe = document.getElementById('falloApellido1ProfeEdi')
    if (apellido1Profe.length > 20 || apellido1Profe.length < 1) {
        falloApellido1Profe.innerHTML = 'El nombre no esta bien'
        return false
    }
    else{
        falloApellido1Profe.innerHTML = ''
    }
    var apellido2Profe = document.getElementById('cognom2_p').value
    var falloApellido2Profe = document.getElementById('falloApellido2ProfeEdi')
    if (apellido2Profe.length > 20) {
        falloApellido2Profe.innerHTML = 'El nombre no esta bien'
        return false
    }
    else{
        falloApellido2Profe.innerHTML = ''
    }
    var correoProfe = document.getElementById('email_p').value
    var correoExpresion = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    var correoError2 = document.getElementById('correoError2Edi')
    if (!correoExpresion.test(correoProfe)) {
        correoError2.innerHTML = 'El correo no existe'
        return false
    }
    else{
        correoError2.innerHTML = ''
    }
    var telefonoProfe = document.getElementById('telf_p').value
    var telefonoProfeError = document.getElementById('telefonoProfeErrorEdi')
    var telefonoExpresion = /^\d{9}$/
    if (!telefonoExpresion.test(telefonoProfe)) {
        telefonoProfeError.innerHTML = decodeURIComponent('Por favor, ingresa un número de teléfono válido (9 dígitos sin espacios ni guiones).');
        return false
    }
    else{
        telefonoProfeError.innerHTML = ''
    }
    var sal = document.getElementById('sal_p').value
    var salProfeError = document.getElementById('salProfeErrorEdi')
    if (sal.length > 5 || sal.length < 4) {
        salProfeError.innerHTML = 'El salario no es correcto'
        return false
    }
    else{
        salProfeError.innerHTML = ''
    }
}

//Validacion Editar Departamento
function validarEdiDep(){
    var numDep = document.getElementById('codi_d').value
    var numDepError = document.getElementById('numDepErrorEdi')
    if (numDep.length != 3) {
        numDepError.innerHTML = 'El numero de departamento no tiene tres digitos'
        return false
    }
    else{
        numDepError.innerHTML = ''
    }
    var nombreDep = document.getElementById('nom_d').value
    var nombreDepError = document.getElementById('nombreDepErrorEdi')
    if (nombreDep.length > 20 || nombreDep.length < 1) {
        nombreDepError.innerHTML = 'El nombre de departamento no es correcto'
        return false
    }
    else{
        nombreDepError.innerHTML = ''
    }
}

//Validacion Editar Clase
function validarEdiClase(){
    var numClase = document.getElementById('codi_c').value
    var numClaseError = document.getElementById('numClaseErrorEdi')
    if (numClase.length != 3) {
        numClaseError.innerHTML = 'El numero de departamento no tiene tres digitos'
        return false
    }
    else{
        numClaseError.innerHTML = ''
    }
    var nombreClase = document.getElementById('nom_c').value
    var nombreClaseError = document.getElementById('nombreClaseErrorEdi')
    if (nombreClase.length > 20 || nombreDep.length < 1) {
        nombreClaseError.innerHTML = 'El nombre de departamento no es correcto'
        return false
    }
    else{
        nombreClaseError.innerHTML = ''
    }
}