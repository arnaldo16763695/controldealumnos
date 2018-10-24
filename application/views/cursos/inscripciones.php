
    <span class="d-block p-2 bg-primary text-white"><h4 style="text-align: center;" >Cursos Activos</h4></span>
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

if (isset($sinDatos) and $sinDatos != '') {
    ?>

        <div class="alert alert-info" role="alert"> <?php echo $sinDatos; ?></div>
    <?php
}

?>
    <?php echo form_open(null, array("class" => "form-horizontal", "name" => "formRegistro")); ?>


    <!--<button type="submit"  class="btn btn-primary">Enviar</button>-->


    <!--<a href="" onclick="pass();">prueba</a>-->


     <table class="table table-sm table-hover" <?php if (count($datos) > 9) {?> id="myTable" <?php }?> >
  <thead>
    <tr>

      <th scope="col">Curso</th>
      <th scope="col">Etapa</th>
      <th scope="col">Grado</th>
      <th scope="col">Sección</th>
      <th scope="col">Docente</th>
      <th scope="col">Cedula Docente</th>
      <th scope="col">Horario</th>
      <th scope="col">Acción</th>
  </thead>
  <tbody>
    <?php foreach ($datos as $dato) {
    ?>
    <tr>

      <td><?php echo $dato->nombre; ?></td>
      <td><?php echo $dato->etapa; ?></td>
      <td><?php echo $dato->nameGrado; ?></td>
      <td><?php echo $dato->nameSeccion; ?></td>
      <td><?php echo $dato->nombreDocente; ?></td>
      <td><?php echo $dato->cedulaDocente; ?></td>
      <td><?php echo $dato->horaEntrada . ' a ' . $dato->horaSalida ?></td>
      <td><a href="<?php echo base_url(); ?>cursos/detalle_curso/<?php echo $dato->idCurso; ?>" class="btn btn-info">Entrar</a></td>
    </tr>

   <?php

}?>


  </tbody>
</table>






   <!-- <button type="submit"   class="btn btn-primary">Siguiente</button>-->

<?php echo form_close(); ?>



