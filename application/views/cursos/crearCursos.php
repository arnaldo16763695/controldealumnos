
    <span class="d-block p-2 bg-primary text-white">Registro de Cursos</span>
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



       <div class="input-group-sm col-md-1">
     <label for="selectEtapa">Etapa</label>
      <select id="selectEtapa" class="form-control" name="etapa" required="true">
        <option value="" selected>Elija...</option>

        <option value="Preescolar">Preescolar</option>
        <option value="Primaria">Primaria</option>

      </select>
  </div>
      <div class="input-group-sm col-md-1">
     <label for="selectGrado">Grado</label>
      <select id="selectGrado" class="form-control" name="grado" required="true">
      <option value="" selected>Elija...</option>
      </select>
  </div>

      <div class="input-group-sm col-md-1">
     <label for="selectSeccion">Sección</label>
      <select id="selectSeccion" class="form-control" name="seccion" required="true">
       <option value="" selected>Elija...</option>
       <?php foreach ($datos2 as $dato2) {?>
       <option value="<?php echo $dato2->id; ?>"><?php echo $dato2->nombreSeccion ?></option>
        <?php
}
?>
      </select>
  </div>

      <div class="input-group-sm col-md-2">
     <label for="inputState">Docente</label>
      <select id="inputState" class="form-control" name="docente" required="true">
        <option value="" selected>Elija...</option>
       <?php foreach ($datos3 as $dato3) {
    ?>
          <option value="<?php echo $dato3->id_usuario; ?>"><?php echo $dato3->nombreUsuario . ', C.I: ' . $dato3->cedulaUsuario . ', Rol: ' . $dato3->nombreRol; ?></option>
       <?php
}?>






    </select>
  </div>



   <div class="input-group-sm col-md-2">
    <label for="nombre">Hora de Entrada</label>
 <input type="time" class="form-control" id="nom" placeholder="" required="true" name="Hentrada"  value="<?php echo set_value_input(array(), 'Hentrada', 'Hentrada') ?>">
  </div>

     <div class="input-group-sm col-md-2">
    <label for="nombre">Hora de Salida</label>
    <input type="time" class="form-control" id="nom" placeholder="" name="Hsalida"required="true"  value="<?php echo set_value_input(array(), 'Hsalida', 'Hsalida') ?>">
  </div>

    <div class="input-group-sm col-md-2">
    <label for="descripcionCurso">Descripción del Curso</label>
    <input type="text" class="form-control firstLetterText_frase" id="descripcionCurso" placeholder="" required="true" name="descripcionCurso"  value="<?php echo set_value_input(array(), 'descripcionCurso', 'descripcionCurso') ?>">
  </div>

  </div>

  <br>

   <button type="submit"   class="btn btn-primary">Enviar</button>
    <a href="<?php echo base_url(); ?>" class="btn btn-danger">Cancelar</a>
  <?php echo form_close(); ?>


