function valida_usuarios(){
	

	var passw1 = document.getElementById("pass1").value;
	var passw2 = document.getElementById("pass2").value;
	var nombre = document.getElementById("nom").value;
	var cedula = document.getElementById("cedula").value;
	var telef = document.getElementById("tel").value;
	var direccion = document.getElementById("direccion").value;
	var fNacimiento = document.getElementById("fNacimiento").value;
	var correo = document.getElementById("email").value;
	var correo2 = document.getElementById("email2").value;

	if(correo==""){

			alert("El E-mail no debe estar vacío");
			document.getElementById("email").focus();
	}else if(correo2==""){

			alert("El E-mail 2 no debe estar vacío");
			document.getElementById("email2").focus();

	}else if(correo!=correo2){	

			alert("Los correos no coinciden");
			document.getElementById("email").focus();

	}else if(nombre==""){

			alert("El nombre no puede estar vacío");

			document.getElementById("nom").focus();
	}else if(cedula==""){

			alert("El cedula no puede estar vacío");

			document.getElementById("cedula").focus();
	}else if(telef==""){

			alert("El teléfono no puede estar vacío");
			document.getElementById("tel").focus();
	}else if(direccion==""){

			alert("La dirección no puede estar vacía");
			document.getElementById("direccion").focus();
	}else if(fNacimiento==""){

			alert("La Fecha de nacimiento no puede estar vacía");
			document.getElementById("fNacimiento").focus();
	}else if(passw1==""){

			alert("La contraseña no debe estar vacia");
			document.getElementById("pass1").focus();
	}else if(passw2==""){

			alert("La contraseña 2 no debe estar vacia");
			document.getElementById("pass2").focus();
	}else if(passw1 != passw2){

		alert("Las Contraseñas no coinciden");
	
	}else{

		document.formRegistro.submit();
	}

	

}


function validaRegistroAlumno(){

var nombre = document.getElementById("nom").value;
var fechaN = document.getElementById("fechaN").value;
var nombreR = document.getElementById("nombreR").value;
		
	if(nombre==""){

			alert("Debe introducir el nombre del alumno");
			document.getElementById("nom").focus();
	}else if(fechaN==""){
			alert("Debe introducir la fecha de nacimiento del alumno");
			document.getElementById("fechaN").focus();
	}else if(nombreR==""){
			alert("Debe introducir el nombre del representante");
			document.getElementById("nombreR").focus();
	}else{
		document.formRegistro.submit();
	}

}

function eliminarAlumnos(url, nombre){

/*	if(confirm('Realmente desea eliminar este registro')){

			window.location=url;
	}

*/
swal({
  title: "Estas Seguro?",
  text: "Vas a eliminar a " + nombre,
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
     window.location.replace(url);
  } 
});
}

function eliminarRepresentante(url, nombre){

/*	if(confirm('Realmente desea eliminar este registro')){

			window.location=url;
	}
*/

swal({
  title: "Estas Seguro?",
  text: "Vas a eliminar a "+ nombre,
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
     window.location.replace(url);
  } 
});
}

function eliminarCurso(url, nombre){

swal({
  title: "Estas Seguro?",
  text: "Vas a eliminar a "+ nombre,
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
     window.location.replace(url);
  } 
});
}

function eliminarAlumnoCurso(url, nombre){

swal({
  title: "Estas Seguro?",
  text: "Vas a eliminar a "+ nombre,
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
     window.location.replace(url);
  } 
});
}

function eliminarDocente(url,nombre){

swal({
  title: "Estas Seguro?",
  text: "Vas a eliminar a "+ nombre,
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
     window.location.replace(url);
  } 
});
}







  
 