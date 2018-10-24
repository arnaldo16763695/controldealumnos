
    <span class="d-block p-2 bg-primary text-white">Registro de Usuario</span>
    <hr>
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
  <?php echo form_open(null, array("class" => "form-horizontal", "name" => "formRegistro")); ?>


  <!--<button type="submit"  class="btn btn-primary">Enviar</button>-->


  <!--<a href="" onclick="pass();">prueba</a>-->


   <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="email" placeholder="" name="correo" value="<?php echo set_value_input(array(), 'correo', 'correo') ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail42">Repita Email</label>
      <input type="email" class="form-control" id="email2" placeholder="" name="correo2" value="<?php echo set_value_input(array(), 'correo2', 'correo2') ?>">
    </div>
  </div>

   <div class="form-row ">
  <div class="form-group col-md-6">
    <label for="nombre">Nombre y Apellido</label>
    <input type="text" class="form-control" id="nom" placeholder="" name="nombre"  value="<?php echo set_value_input(array(), 'nombre', 'nombre') ?>">
  </div>
     <div class="form-group col-md-3">
    <label for="cedula">Cedula</label>
    <input type="text" class="form-control" id="cedula" placeholder="" name="cedula"  value="<?php echo set_value_input(array(), 'cedula', 'cedula') ?>">
  </div>
   <div class="form-group col-md-3">
    <label for="telefono">Teléfono</label>
    <input type="text" class="form-control" id="tel" placeholder="" name="telefono"  value="<?php echo set_value_input(array(), 'telefono', 'telefono') ?>">
  </div>
  </div>

   <div class="form-row ">
    <div class="form-group col-md-6">
    <label for="direccion">Dirección</label>
    <input type="text" class="form-control" id="direccion" placeholder="" name="direccion"  value="<?php echo set_value_input(array(), 'direccion', 'direccion') ?>">
    </div>
     <div class="form-group col-md-6">
    <label for="Fnacimiento">Fecha de Nacimiento</label>
    <input type="date" class="form-control" id="fNacimiento" placeholder="" name="fNacimiento"  value="<?php echo set_value_input(array(), 'Fnacimiento', 'Fnacimiento') ?>">
    </div>
  </div>



    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="pass">Contraseña</label>
      <input type="password"  class="form-control" id="pass1" placeholder="" name="pass">
    </div>
    <div class="form-group col-md-6">
      <label for="pass2">Repita Contraseña</label>
      <input type="password"  class="form-control" id="pass2" placeholder="" name="pass2">
    </div>
  </div>
<div id="error" class="alert-warning" style="visibility:hidden;">La tecla mayúcula esta activada</div>
   <button type="button" onclick="valida_usuarios();"  class="btn btn-primary">Registrar</button>

  <?php echo form_close(); ?>


