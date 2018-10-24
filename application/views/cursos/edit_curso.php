
    <span class="d-block p-2 bg-primary text-white">Editar de Cursos</span>
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



       <div class="input-group-sm col-md-2">
     <label for="selectEtapa">Etapa</label>
      <select id="selectEtapa" class="form-control" name="etapa" required="true">
        <option value="" selected>Elija...</option>

        <?php if ($dato->etapa === "Preescolar") {
    ?>
        <option value="Preescolar" selected="true">Preescolar</option>
        <option value="Primaria">Primaria</option>
        <?php } elseif ($dato->etapa === "Primaria") {
    ?>
        <option value="Preescolar" >Preescolar</option>
        <option value="Primaria" selected="true">Primaria</option>
<?php }?>
      </select>
  </div>
      <div class="input-group-sm col-md-1">
     <label for="selectGrado">Grado</label>
     <?php $seleccionPrevia = $dato->nameGrado;?>
      <select id="select_Grado" class="form-control" name="grado" required="true">
      <option value="" >Elija...</option>
      <?php foreach ($grados as $grado) {?>

      <option value="<?php echo $grado->id; ?>" <?php if ($seleccionPrevia === $grado->nombreGrado) {?> selected="true" <?php }?> ><?php echo $grado->nombreGrado; ?></option>

      <?php
}?>

      </select>
  </div>

      <div class="input-group-sm col-md-1">
     <label for="selectSeccion">Sección</label>
     <?php $seleccionPrevia2 = $dato->nameSeccion;?>
      <select id="selectSeccion" class="form-control" name="seccion" required="true">
      <option value="" selected>Elija...</option>
      <?php foreach ($secciones as $seccion) {?>

      <option value="<?php echo $seccion->id; ?>" <?php if ($seleccionPrevia2 === $seccion->nombreSeccion) {?> selected="true" <?php }?> ><?php echo $seccion->nombreSeccion; ?></option>

      <?php
}?>
      </select>
  </div>

      <div class="input-group-sm col-md-2">
     <label for="inputState">Docente</label>
      <select id="selectDocente" class="form-control" name="docente" required="true">
        <?php $seleccionPrevia3 = $dato->nombreDocente?>
        <option value="" selected>Elija...</option>
       <?php foreach ($docentes as $docente) {
    ?>
          <option value="<?php echo $docente->id_usuario; ?>" <?php if ($seleccionPrevia3 === $docente->nombreUsuario) {?> selected="true" <?php }?> ><?php echo $docente->nombreUsuario; ?><?php echo $docente->nombreUsuario . ', C.I: ' . $docente->cedulaUsuario . ', Rol: ' . $docente->nombreRol; ?></option>
       <?php
}?>






    </select>
  </div>



   <div class="input-group-sm col-md-2">
    <label for="nombre">Hora de Entrada</label>
 <input type="time" class="form-control" id="nom" placeholder="" required="true" name="Hentrada"  value="<?php echo $dato->horaEntrada; ?>">
  </div>

     <div class="input-group-sm col-md-2">
    <label for="nombre">Hora de Salida</label>
    <input type="time" class="form-control" id="nom" placeholder="" name="Hsalida"required="true"  value="<?php echo $dato->horaSalida; ?>">
  </div>

    <div class="input-group-sm col-md-2">
    <label for="descripcionCurso">Descripción del Curso</label>
    <input type="text" class="form-control firstLetterText_frase" id="descripcionCurso" placeholder="" required="true" name="descripcionCurso"  value="<?php echo $dato->nameCurso; ?>">
  </div>

  </div>

  <br>

   <button type="submit"   class="btn btn-primary">Enviar</button>
   <a href="<?php echo base_url(); ?>cursos/listaCursos" class="btn btn-danger">Volver</a>
  <?php echo form_close(); ?>


