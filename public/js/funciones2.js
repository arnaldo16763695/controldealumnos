      $(document).ready(function(){
      		var i=1;
        $("#addEstudiante").click(function(){
        	var cedulaM = $("#cedulaMadre").val();
          var nombreM = $("#nombreMadre").val();
          var nombreP = $("#nombrePadre").val();
          var cedulaP = $("#cedulaPadre").val();
        	//alert(cedulaM);
        		 i++;
        	

           
        	var scntDiv = $('#dymanic_field');

        	   $( '<div id="dymanic_field2">'+

                '<hr>'+
        	   	  '<div class="form-row" >'+
        	      '<div class="form-group col-md-3">'+
                  '<label for="nombreEstudiante">Nombres Apellidos</label>'+
                  '<input type="text" class="form-control form-control-sm firstLetterText " onfocus="primeraLetramayuscula()" id="nombreEstudiante'+i+'" required="true" name="nombreEstudiante[]">'+
                  '</div>'+

                  '<div class="form-group col-md-2">'+
                  '<label for="fechaNEstudiante">Fecha de Nacimiento</label>'+
                  '<input type="date" class="form-control form-control-sm " id="fechaNEstudiante'+i+'" required="true" name="fechaNEstudiante[]">'+
                  '</div>'+

               	  '<div class="form-group col-md-3">'+
               	  '<label for="lugarNEstudiante">Lugar de Nacimiento</label>'+
                  '<input type="text" onfocus="primeraLetramayusculaFrase()" class="form-control form-control-sm firstLetterText_frase letras" id="lugarNEstudiante'+i+'" required="true" name="lugarNEstudiante[]">'+
                  '</div>'+

                  '<div class="form-group col-md-2">'+
                  '<label for="cedulaEstudiante">Cédula</label>'+
                  '<input type="text" class="form-control form-control-sm " id="cedulaEstudiante'+i+'"  name="cedulaEstudiante[]">'+
                  '</div>'+		
                 
                  '<div class="input-group-sm col-md-2">'+
                  '<label for="sexo">Sexo</label>'+
                  '<select  class="form-control" name="sexo[]"  id="sexo'+i+'" required="true" >'+
                  '<option value="" selected>Elija...</option>'+
                  '<option value="Masculino" >Masculino</option>'+ 
                  '<option value="Femenino" >Femenino</option>'+  
                  '</select>'+
                  '</div>'+	 

                  '</div>'+                  
                //------------------------------------------------------------------------------------
                  '<div class="form-row" >'+
                  '<div class="form-group col-md-3">'+
                  '<label for="nombreMadre">Nombre Apellido de la Madre</label>'+
                  '<input type="text" class="form-control form-control-sm firstLetterText " value="'+nombreM+'" id="nombreMadre'+i+'" onfocus="primeraLetramayuscula()" required="true" name="nombreMadre[]">'+
                  '</div>'+

                  '<div class="form-group col-md-3">'+
                  '<label for="cedulaMadre">Cédula de la Madre</label>'+
                  '<input type="text" class="form-control form-control-sm " value="'+cedulaM+'" id="cedulaMadre'+i+'" required="true" name="cedulaMadre[]">'+
                  '</div>'+

                  '<div class="form-group col-md-3">'+
                  '<label for="nombrePadre">Nombre Apellido del Padre</label>'+
                  '<input type="text" class="form-control form-control-sm firstLetterText " value="'+nombreP+'" id="nombrePadre'+i+'" onfocus="primeraLetramayuscula()" required="true" name="nombrePadre[]">'+
                  '</div>'+

                  '<div class="form-group col-md-3">'+
                  '<label for="cedulaPadre">Cédula del Padre</label>'+
                  '<input type="text" class="form-control form-control-sm " value="'+cedulaP+'" id="cedulaPadre'+i+'" required="true" name="cedulaPadre[]">'+
                  '</div>'+
                  '<button id="remInput" class="btn btn-danger">Quitar</button>'+
                  '</div>'+
                  '</div>').appendTo(scntDiv);

        	   			//document.getElementById('cedulaMadre').value = "algo";

			        return false;

        });

          $(document).on('click', '#remInput', function () {
		            $(this).parents('#dymanic_field2').remove();
			        return false;
			    });

//----------------------------------------------------------------------------------------


    $('#selectEtapa').on('change', function(){
    var selectEtapa = $('#selectEtapa').val()

  // alert(idGrado);return false;

    $.ajax({
      url: 'cargarSelectGrado',
      type: 'POST',
      dataType : 'html',
      data : { selectEtapa: selectEtapa },
    })

    .done(function(resultado){
    $("#selectGrado").html(resultado);
  })

 
   
  })


         

      // var base_url= "<?php echo base_url(); ?>";

//----------Configurción del plugin dataTable----------------------------------
       $('#myTable').DataTable({
            "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }

       });
//---------------muestra ventana modal detalle alumno-----------------------------------------------------------------------------------------
           $(".btn-view").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: "detalleAlumnoGeneral/" + id,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                //alert(resp);
            }

        });

    });

//----------------------------Cambiar primera letra a mayuscula----------------------------------------------------------------------------

//---------------muestra ventana modal detalle curso-----------------------------------------------------------------------------------------
           $(".btn-view-curso").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: "listaCursoDetalle/" + id,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                //alert(resp);
            }

        });

    });

//----------------------------Cambiar primera letra a mayuscula----------------------------------------------------------------------------

//---------------muestra ventana modal detalle representante-----------------------------------------------------------------------------------------
           $(".btn-view-det-representante").on("click", function(){
        var id = $(this).val();
        $.ajax({
            url: "listaDetalleRepresentante/" + id,
            type:"POST",
            success:function(resp){
                $("#modal-default .modal-body").html(resp);
                //alert(resp);
            }

        });

    });

//----------------------------Cambiar primera letra a mayuscula----------------------------------------------------------------------------
                var myFirstLetterText = $('.firstLetterText');
                var myFirstLetterText_frase = $('.firstLetterText_frase');

                          //cambia la primera letrade cada paralabra
                          String.prototype.capitalize = function(){
                    // \b encuentra los limites de una palabra
                    // \w solo los meta-carácter  [a-zA-Z0-9].  
                    return this.toLowerCase().replace( /\b\w/g, function (m) {
                        return m.toUpperCase();
                    });
                };

                   //cambia la primera letra de toda la frase     
                    String.prototype.firstLetterUpper = function(){
                    return this.charAt(0).toUpperCase() + this.slice(1).toLowerCase();
                };

                         //aqui estoy llamando a la función capitalize
                myFirstLetterText.focusout(function(){
                    $(this).val($(this).val().capitalize());
                }); 

                      //aqui estoy llamando a la función firstLetterUpper
                 myFirstLetterText_frase.focusout(function(){
                    $(this).val($(this).val().firstLetterUpper());
                }); 


      ///-------------Función solo numeros en las cajas de texto---------------------------------------------------
        $(".number").keydown(function (e) {
           // Permite: backspace, delete, tab, escape, enter and .
           if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
               // Permite: Ctrl+A
               (e.keyCode == 65 && e.ctrlKey === true) ||
               // Permite: home, end, left, right
               (e.keyCode >= 35 && e.keyCode <= 39)) {
               // solo permitir lo que no este dentro de estas condiciones es un return false
               return;
           }
           // Aseguramos que son numeros
           if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
               e.preventDefault();
           }
       });


      //--------------------Funcio solo letras--------------------------------------------

      $(".letras").keypress(function (key) {
            window.console.log(key.charCode)
            if ((key.charCode < 97 || key.charCode > 122)//letras mayusculas
                && (key.charCode < 65 || key.charCode > 90) //letras minusculas
                && (key.charCode != 45) //retroceso
                && (key.charCode != 241) //ñ
                 && (key.charCode != 209) //Ñ
                 && (key.charCode != 32) //espacio
                 && (key.charCode != 225) //á
                 && (key.charCode != 233) //é
                 && (key.charCode != 237) //í
                 && (key.charCode != 243) //ó
                 && (key.charCode != 250) //ú
                 && (key.charCode != 193) //Á
                 && (key.charCode != 201) //É
                 && (key.charCode != 205) //Í
                 && (key.charCode != 211) //Ó
                 && (key.charCode != 218) //Ú
 
                )
                return false;
        });

/*
      $("#pass").keypress(function(e) { 
    var s = String.fromCharCode( e.which );
    if ((s.toUpperCase() === s && s.toLowerCase() !== s && !e.shiftKey)|| //caps is on
      (s.toUpperCase() !== s && s.toLowerCase() === s && e.shiftKey)) {
        $("#CapsWarn").show();
    } else if ((s.toLowerCase() === s && s.toUpperCase() !== s && !e.shiftKey)||
      (s.toLowerCase() !== s && s.toUpperCase() === s && e.shiftKey)) { //caps is off
        $("#CapsWarn").hide();
    } //else upper and lower are both same (i.e. not alpha key - so do not hide message if already on but do not turn on if alpha keys not hit yet)
  });
*/

//-------------------------------------------------------------------------------------------------------------------
        $(function () {
            var isShiftPressed = false;
            var isCapsOn = null;
            // $("#error").hide();
            $("#pass").bind("keydown", function (e) {
                var keyCode = e.keyCode ? e.keyCode : e.which;
                if (keyCode == 16) {
                    isShiftPressed = true;
                }
            });
              $("#pass1").bind("keydown", function (e) {
                var keyCode = e.keyCode ? e.keyCode : e.which;
                if (keyCode == 16) {
                    isShiftPressed = true;
                }
            });
                     $("#pass2").bind("keydown", function (e) {
                var keyCode = e.keyCode ? e.keyCode : e.which;
                if (keyCode == 16) {
                    isShiftPressed = true;
                }
            });

            $("#pass").bind("keyup", function (e) {
                var keyCode = e.keyCode ? e.keyCode : e.which;
                if (keyCode == 16) {
                    isShiftPressed = false;
                }
                if (keyCode == 20) {
                    if (isCapsOn == true) {
                        isCapsOn = false;
                        //$("#error").hide();
                        $('#error').attr("style", 'visibility:hidden');
                    } else if (isCapsOn == false) {
                        isCapsOn = true;
                        $('#error').attr("style", 'visibility:all');
                    }
                }
            });
                $("#pass1").bind("keyup", function (e) {
                var keyCode = e.keyCode ? e.keyCode : e.which;
                if (keyCode == 16) {
                    isShiftPressed = false;
                }
                if (keyCode == 20) {
                    if (isCapsOn == true) {
                        isCapsOn = false;
                        //$("#error").hide();
                        $('#error').attr("style", 'visibility:hidden');
                    } else if (isCapsOn == false) {
                        isCapsOn = true;
                        $('#error').attr("style", 'visibility:all');
                    }
                }
            });

                       $("#pass2").bind("keyup", function (e) {
                var keyCode = e.keyCode ? e.keyCode : e.which;
                if (keyCode == 16) {
                    isShiftPressed = false;
                }
                if (keyCode == 20) {
                    if (isCapsOn == true) {
                        isCapsOn = false;
                        //$("#error").hide();
                        $('#error').attr("style", 'visibility:hidden');
                    } else if (isCapsOn == false) {
                        isCapsOn = true;
                        $('#error').attr("style", 'visibility:all');
                    }
                }
            });

            $("#pass").bind("keypress", function (e) {
                var keyCode = e.keyCode ? e.keyCode : e.which;
                if (keyCode >= 65 && keyCode <= 90 && !isShiftPressed) {
                    isCapsOn = true;
                     $('#error').attr("style", 'visibility:all');
                } else {
                     $('#error').attr("style", 'visibility:hidden');
                }
            });
                $("#pass1").bind("keypress", function (e) {
                var keyCode = e.keyCode ? e.keyCode : e.which;
                if (keyCode >= 65 && keyCode <= 90 && !isShiftPressed) {
                    isCapsOn = true;
                     $('#error').attr("style", 'visibility:all');
                } else {
                     $('#error').attr("style", 'visibility:hidden');
                }
            });

                          $("#pass1").bind("keypress", function (e) {
                var keyCode = e.keyCode ? e.keyCode : e.which;
                if (keyCode >= 65 && keyCode <= 90 && !isShiftPressed) {
                    isCapsOn = true;
                     $('#error').attr("style", 'visibility:all');
                } else {
                     $('#error').attr("style", 'visibility:hidden');
                }
            });
        });




//-----------------------------------------------------------------------------------------------------------------






      });
//______________________________________________________________________

  

  function primeraLetramayuscula(){
                
                var myFirstLetterText = $('.firstLetterText');
                

                          //cambia la primera letrade cada paralabra
                          String.prototype.capitalize = function(){
                    // \b encuentra los limites de una palabra
                    // \w solo los meta-carácter  [a-zA-Z0-9].  
                    return this.toLowerCase().replace( /\b\w/g, function (m) {
                        return m.toUpperCase();
                    });
                };

            

                         //aqui estoy llamando a la función capitalize
                myFirstLetterText.focusout(function(){
                    $(this).val($(this).val().capitalize());
                }); 

           
  }

 function primeraLetramayusculaFrase(){


                var myFirstLetterText_frase = $('.firstLetterText_frase');

             
                   //cambia la primera letra de toda la frase     
                    String.prototype.firstLetterUpper = function(){
                    return this.charAt(0).toUpperCase() + this.slice(1).toLowerCase();
                };

             
                      //aqui estoy llamando a la función firstLetterUpper
                 myFirstLetterText_frase.focusout(function(){
                    $(this).val($(this).val().firstLetterUpper());
                }); 

 }

/*
function isMayus(input){
kCode=input.keyCode?input.keyCode:input.which;
sKey=input.shiftKey?input.shiftKey:((kCode==16)?true:false);
if(((kCode>=65&&kCode<=90)&&!sKey)||((kCode>=97&&kCode<=122)&&sKey ))
    alert('El Bloq Mayus está activado.');
}
*/





    function buscarConAjax(){

    var valorBusqueda= $("#cedulaRepresentante").val();

    //alert(valorBusqueda);
		
		if (valorBusqueda!="")
	{
//alert(valorBusqueda);

//$(obtener_registros());


	$.ajax({
		url : 'buscarRepresentanteAjax',
		type : 'POST',
		dataType : 'html',
		data : { valorBusqueda: valorBusqueda },
		})

	.done(function(resultado){
		$("#tabla_resultado").html(resultado);
    //$("#nombreRepresentante").attr('disabled', 'disabled');
	})

	}	
    }

    function buscarConAjaxAdicionarAlum(){

    var valorBusqueda= $("#cedulaRepresentante").val();

   // alert(valorBusqueda);
    
    if (valorBusqueda!="")
  {
//alert(valorBusqueda);

//$(obtener_registros());


  $.ajax({
    url : 'buscarRepreAdicionarAlum',
    type : 'POST',
    dataType : 'html',
    data : { valorBusqueda: valorBusqueda },
    })

  .done(function(resultado){
    $("#resultado_busqueda").html(resultado);
    //$("#nombreRepresentante").attr('disabled', 'disabled');
  })

  } 
    }




    function deshabilitarCampos(){
      $("#nombreRepresentante").prop('disabled', 'true');
      $("#fechaNRepresentante").prop('disabled', 'true');
      $("#telefono").prop('disabled', 'true');
      $("#direccion").prop('disabled', 'true');
      $("#nombreEstudiante").prop('disabled', 'true');
      $("#fechaNEstudiante").prop('disabled', 'true');
      $("#lugarNEstudiante").prop('disabled', 'true');
      $("#cedulaEstudiante").prop('disabled', 'true');
      $("#selectsexo").prop('disabled', 'true');
      $("#nombreMadre").prop('disabled', 'true');
      $("#cedulaMadre").prop('disabled', 'true');
      $("#nombrePadre").prop('disabled', 'true');
      $("#cedulaPadre").prop('disabled', 'true');
      $("#addEstudiante").prop('disabled', 'true');
      $("#guardar").prop('disabled', 'true');
      
      
    }

       function habilitarCampos(){
      $("#nombreRepresentante").removeAttr("disabled");
      $("#fechaNRepresentante").removeAttr("disabled");
      $("#telefono").removeAttr("disabled");
      $("#direccion").removeAttr("disabled");
      $("#nombreEstudiante").removeAttr("disabled");
      $("#fechaNEstudiante").removeAttr("disabled");
      $("#lugarNEstudiante").removeAttr("disabled");
      $("#cedulaEstudiante").removeAttr("disabled");
      $("#selectsexo").removeAttr("disabled");
      $("#nombreMadre").removeAttr("disabled");
      $("#cedulaMadre").removeAttr("disabled");
      $("#nombrePadre").removeAttr("disabled");
      $("#cedulaPadre").removeAttr("disabled");
      $("#addEstudiante").removeAttr("disabled");
      $("#guardar").removeAttr("disabled");
      
    }







