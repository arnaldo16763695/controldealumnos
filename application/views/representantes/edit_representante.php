    <span class="d-block p-2 bg-primary text-white">Editar Representantes</span>

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


  <?php echo form_open(null, array("class" => "form-horizontal", "name" => "editRepresentante")); ?>


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
        value="<?php echo $dato->cedula; ?>">

    </div>



    <div class="input-group-sm col-md-3">
      <label for="nombreRepresentante">Nombres y Apellidos</label>
      <input type="text"  class="form-control form-control-sm firstLetterText letras"  id="nombreRepresentante" required="true" name="nombreRepresentante" value="<?php echo $dato->nombre; ?>">
    </div>


      <div class="input-group-sm col-md-2">
      <label for="fechaNRepresentante">Fecha de Nacimiento</label>
    <input type="date" class="form-control form-control-sm number" id="fechaNRepresentante" required="true" name="fechaNRepresentante" value="<?php echo $dato->fechaNacimiento; ?>">
    </div>

   <div class="input-group-sm col-md-2">
     <label for="telefono">Teléfono</label>
      <input type="text" class="form-control form-control-sm" id="telefono" required="true" name="telefono" value="<?php echo $dato->telefono; ?>">
    </div>

  <div class="input-group-sm col-md-3">
      <label for="direccion">Dirección de Habitación</label>
      <input type="text"  class="form-control form-control-sm firstLetterText_frase " id="direccion" required="true" name="direccion" value="<?php echo $dato->direccion; ?>">
    </div>
  </div>



    <br>
   <button  type="submit" id="guardar" class="btn btn-primary">Guardar</button>
   <a href="<?php echo base_url(); ?>representantes/lista_representantes" class="btn btn-danger">Volver</a>




  <?php echo form_close(); ?>












