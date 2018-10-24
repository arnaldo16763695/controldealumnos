<div class="container">
    <span class="d-block p-2 bg-primary text-white">Registro de Reppresentantes</span>
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



  <div class="form-group">
    <label for="nombre">Nombre y Apellido del Representante</label>
    <input type="text" class="form-control" id="nom" placeholder="" name="nombre"  value="<?php echo set_value_input(array(), 'nombre', 'nombre') ?>">
  </div>
  <div class="form-group">
    <label for="fechaN">Fecha de Nacimiento</label>
    <input type="date" min="1900-01-01" max="2050-05-25" step="1" class="form-control" id="fechaN" placeholder="" name="fecha_N"  value="<?php echo set_value_input(array(), 'fecha_N', 'fecha_N') ?>">
  </div>

    <div class="form-group">
      <label for="nombreRepresentante">Cédula</label>
      <input type="text" class="form-control" id="cedula_R" placeholder="" name="cedula" value="<?php echo set_value_input(array(), 'cedula', 'cedula') ?>">
    </div>

     <div class="form-group">
      <label for="nombreRepresentante">Teléfono</label>
      <input type="text" class="form-control" id="telefono_R" placeholder="" name="telefono" value="<?php echo set_value_input(array(), 'telefono', 'telefono') ?>">
    </div>

    <div class="form-group">
      <label for="nombreRepresentante">Dirección</label>
      <input type="text" class="form-control" id="direccion_R" placeholder="" name="direccion" value="<?php echo set_value_input(array(), 'direccion', 'direccion') ?>">
    </div>

   <button type="submit"   class="btn btn-primary">Enviar</button>

  <?php echo form_close(); ?>

</div>
