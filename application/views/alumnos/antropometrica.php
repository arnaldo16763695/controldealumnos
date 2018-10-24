    <span class="d-block p-2 bg-primary text-white"> <h5 style="text-align: center;">Características Antropométricas del Alumno</h5></span>

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
  <?php echo form_open(null, array("class" => "form-horizontal", "name" => "formRegistro", "enctype" => "multipart/form-data")); ?>

        <br>
<?php
$fotoDefault = "fotoDefault.png";
if (count((array) $dato3) > 0) {
    //echo "gggg";exit;
    $fotoAlumno = $dato3->nombre_Foto;
    //echo $fotoAlumno;exit;

}
?>


      <div class="form-row">
                  <div class="form-group col-md-6">
                     <img height="150" width="150" src="<?php echo base_url(); ?>public/fotos/<?php if (isset($fotoAlumno) and !empty(trim($fotoAlumno))) {echo $dato3->nombre_Foto;} else {echo $fotoDefault;}?>" class="img-thumbnail" alt="foto_alumno">
                  </div>
          <div class="custom-file form-group col-md-6">
            <div class="custom-file">
               <input type="file" class="custom-file-input" id="inputGroupFile01" name="foto" aria-describedby="inputGroupFileAddon01">
               <label class="custom-file-label" for="inputGroupFile01">Elija Foto</label>
           </div>

          </div>




      </div>


      <div class="form-row">
          <div class="form-group col-md-4">
            <label for="edad">Nombre Alumno</label>
            <input type="text" class="form-control" id="nom_alumno" value="<?php echo $datos->nombre; ?>"  name="nom_alumno" readonly="true">
          </div>
          <div class="form-group col-md-4">
            <label for="edad">Nombre Representante</label>
            <input type="text" class="form-control" id="nom_representante" value="<?php echo $datos->nombreRepresentante; ?>"   name="nom_representante" readonly="true">
          </div>
            <div class="form-group col-md-4">
            <label for="edad">Cédula Representante</label>
            <input type="text" class="form-control" id="ced_representante" value="<?php echo $datos->cedulaRepresentante; ?>"   name="ced_representante" readonly="true">
          </div>
      </div>

      <hr>
      <div class="form-row">


       <div class="form-group col-md-2">
      <label for="edad">Edad</label>
      <input type="text" class="form-control" id="edad" value="<?php if (count((array) $dato3) > 0) {echo $dato3->edad . ' años';} else {echo "";}?>" name="edad" readonly="true" >
    </div>
    <div class="form-group col-md-2">
      <label for="peso">Peso</label>
      <input type="text" class="form-control" id="peso" value="<?php if (count((array) $dato3) > 0) {echo $dato3->peso;} else {echo "";}?>" name="peso" required="true"  placeholder="">
    </div>
           <div class="form-group col-md-2">
      <label for="tCamisa">Talla Camisa</label>
      <input type="text" class="form-control" id="tCamisa" value="<?php if (count((array) $dato3) > 0) {echo $dato3->tallaCamisa;} else {echo "";}?>" name="tCamisa" required="true"  placeholder="">
    </div>
    <div class="form-group col-md-2">
      <label for="tPantalones">Talla de Pantolones</label>
      <input type="text" class="form-control" id="tPantalones" value="<?php if (count((array) $dato3) > 0) {echo $dato3->tallaPantalon;} else {echo "";}?>" name="tPantalones" required="true"  placeholder="">
    </div>

        <div class="form-group col-md-2">
      <label for="tCalzado">Talla de Calzado</label>
      <input type="text" class="form-control" id="tCalzado" value="<?php if (count((array) $dato3) > 0) {echo $dato3->tallaCalzado;} else {echo "";}?>" name="tCalzado" required="true"  placeholder="">
    </div>
      <div class="form-group col-md-2">
      <label for="altura">Altura</label>
      <input type="text" class="form-control" id="altura" value="<?php if (count((array) $dato3) > 0) {echo $dato3->altura;} else {echo "";}?>" name="altura" required="true"  placeholder="">
    </div>
  </div>

        <div class="form-row">


       <div class="form-group col-md-12">
      <label for="observaciones">Observaciones</label>
      <input type="text" class="form-control" id="observaciones" value="<?php if (count((array) $dato3) > 0) {echo $dato3->observaciones;} else {echo "";}?>" name="observaciones" required="true"  placeholder="">
    </div>

  </div>

  <button type="submit"  class="btn btn-primary">Guardar</button>

  <a href="<?php echo base_url(); ?>cursos/detalle_curso/<?php echo $datos2->idCurso; ?>" class="btn btn-danger">Volver</a>


   <?php echo form_close(); ?>












