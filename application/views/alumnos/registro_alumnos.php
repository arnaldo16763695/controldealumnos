    <span class="d-block p-2 bg-primary text-white">Registro de Alumnos</span>

      <?php
//acá visualizamos los mensajes de error
$errors = validation_errors('<li>', '</li>');
if ($errors != "") {
    ?>
        <div class="alert alert-danger">
            <ul>
                <?php echo $errors; ?>
            </ul>
        </div>
        <?php
}
?>

                     <?php
if ($this->session->flashdata('mensaje') != '') {
    ?>
               <div class="alert alert-<?php echo $this->session->flashdata('css') ?>"><?php echo $this->session->flashdata('mensaje') ?></div>
               <?php
}
?>

                         <?php
if ($this->session->flashdata('mensaje2') != '') {
    ?>
               <div class="alert alert-danger"><?php echo $this->session->flashdata('mensaje2') ?></div>
               <?php
}
?>
  <?php echo form_open(null, array("class" => "form-horizontal", "name" => "formRegistro")); ?>


  <!--<button type="submit"  class="btn btn-primary">Enviar</button>-->


  <!--<a href="" onclick="pass();">prueba</a>-->
      <?php if (isset($noHay)) {?>

       <h4>Holaaaaaaaa</h4>

       <?php }?>
      <hr>

      <div><h5 >Datos del Representante</h5> </div>
      <div id="tabla_resultado"></div>

    <div class="form-row">

        <div class="input-group-sm col-md-2">
     <label for="cedulaRepresentante">Cédula</label>
      <input type="text" class="form-control form-control-sm number" id="cedulaRepresentante" required="true" name="cedulaRepresentante"
       onblur="buscarConAjax();" value="<?php echo set_value_input(array(), 'cedulaRepresentante', 'cedulaRepresentante') ?>">

    </div>



    <div class="input-group-sm col-md-3">
      <label for="nombreRepresentante">Nombres y Apellidos</label>
      <input type="text"  class="form-control form-control-sm firstLetterText letras"  id="nombreRepresentante" required="true" name="nombreRepresentante" value="<?php echo set_value_input(array(), 'nombreRepresentante', 'nombreRepresentante') ?>">
    </div>


      <div class="input-group-sm col-md-2">
      <label for="fechaNRepresentante">Fecha de Nacimiento</label>
    <input type="date" class="form-control form-control-sm number" id="fechaNRepresentante" required="true" name="fechaNRepresentante" value="<?php echo set_value_input(array(), 'fechaNRepresentante', 'fechaNRepresentante') ?>">
    </div>

   <div class="input-group-sm col-md-2">
     <label for="telefono">Teléfono</label>
      <input type="text" class="form-control form-control-sm" id="telefono" required="true" name="telefono" value="<?php echo set_value_input(array(), 'telefono', 'telefono') ?>">
    </div>

  <div class="input-group-sm col-md-3">
      <label for="direccion">Dirección de Habitación</label>
      <input type="text"  class="form-control form-control-sm firstLetterText_frase letras" id="direccion" required="true" name="direccion" value="<?php echo set_value_input(array(), 'direccion', 'direccion'); ?>">
    </div>
  </div>



   <hr>
     <h5>Datos del Estudiante</h5>
 <!-- -------------------------------------------------------------------------------------------->
            <div id="dymanic_field2">
                <div class="form-row" >

                  <div class="form-group col-md-3">
                  <label for="nombreEstudiante">Nombres Apellidos </label>
                  <input type="text" class="form-control form-control-sm firstLetterText letras" id="nombreEstudiante" required="true" name="nombreEstudiante[]" >
                  </div>

                  <div class="form-group col-md-2">
                  <label for="fechaNEstudiante">Fecha de Nacimiento</label>
                  <input type="date" class="form-control form-control-sm" id="fechaNEstudiante" required="true" name="fechaNEstudiante[]" >
                  </div>

                  <div class="form-group col-md-3">
                  <label for="lugarNEstudiante">Lugar de Nacimiento</label>
                  <input type="text" class="form-control form-control-sm firstLetterText" id="lugarNEstudiante" required="true" name="lugarNEstudiante[]" >
                  </div>

                  <div class="form-group col-md-2">
                  <label for="cedulaEstudiante">Cédula</label>
                  <input type="text" class="form-control form-control-sm number" id="cedulaEstudiante"  name="cedulaEstudiante[]"  >
                  </div>

                  <div class="form-group col-md-2">
                  <label for="sexo">Sexo</label>
                  <select id="selectsexo" class="form-control form-control-sm" required="true" name="sexo[]">
                  <option value="" selected>Elija...</option>
                  <option value="Masculino" >Masculino</option>
                  <option value="Femenino" >Femenino</option>
                  </select>
                  </div>
                </div>

                  <div class="form-row" >
                  <div class="form-group col-md-3">
                  <label for="nombreMadre">Nombre Apellido de la Madre</label>
                  <input type="text" class="form-control form-control-sm firstLetterText letras" id="nombreMadre" required="true" name="nombreMadre[]" value="<?php echo set_value_input(array(), 'nombreMadre[]', 'nombreMadre[]'); ?>">
                  </div>

                  <div class="input-group-sm col-md-3">
                  <label for="cedulaMadre">Cédula de la Madre</label>
                  <input type="text" class="form-control form-control-sm number" id="cedulaMadre" required="true" name="cedulaMadre[]" >
                  </div>

                  <div class="input-group-sm col-md-3">
                  <label for="nombrePadre">Nombre Apellido del Padre</label>
                  <input type="text" class="form-control form-control-sm firstLetterText letras" id="nombrePadre" required="true" name="nombrePadre[]" >
                  </div>

                  <div class="input-group-sm col-md-3">
                  <label for="cedulaPadre">Cédula del Padre</label>
                  <input type="text" class="form-control form-control-sm number" id="cedulaPadre" required="true" name="cedulaPadre[]" >
                  </div>
                  <!--<button id="remInput" class="btn btn-danger">Eliminar</button>-->
                  </div>
                  </div>

  <!-- -------------------------------------------------------------------------------------------->

     <div id="dymanic_field">




  </div>

  <hr>
     <button style="float: right;" id="addEstudiante" type="button" class="btn btn-light" data-toggle="button" aria-pressed="false" autocomplete="off">
        + Agregar más Estudiantes
     </button>
   <button  type="submit" id="guardar" class="btn btn-primary">Guardar</button>




  <?php echo form_close(); ?>












