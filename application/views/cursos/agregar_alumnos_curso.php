
    <span class="d-block p-2 bg-primary text-white"><h4 style="text-align: center">Insribir alumnos en:
    <?php echo $datos->nameGrado . ' Sección: ' . $datos->nameSeccion ?></h4></span>
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

    <div class="input-group mb-3">
  <input type="text" class="form-control" name="cedulaRepresentante" placeholder="Cedula del Representante" aria-label="Cedula del Representante" aria-describedby="basic-addon2" id="cedulaRepresentante" required="true">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="submit" name="buscar" >Buscar</button>
    </div>
    </div>
    <input type="hidden" value="<?php echo $datos->idCurso; ?>" name="idCurso">
     <a href="<?php echo base_url(); ?>cursos/detalle_curso/<?php echo $datos->idCurso; ?>" class="btn btn-danger">Volver</a>
    <?php echo form_close(); ?>


