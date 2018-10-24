
    <span class="d-block p-2 bg-primary text-white">Lista de Cursos</span>
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


<div class="table-responsive">
 <table class="table table-sm table-hover " <?php if (count($datos) > 9) {?> id="myTable" <?php }?>>
  <thead>
    <tr>

      <th scope="col">Descripción del Curso</th>
      <th scope="col">Etapa</th>
      <th scope="col">Grado</th>
      <th scope="col">Sección</th>
      <th scope="col">Docente</th>
       <th scope="col">Cédula Docente</th>
      <th scope="col">Horario</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
    <?php
foreach ($datos as $dato) {
    ?>

    <tr>

      <td><?php echo $dato->nombre; ?></td>
       <td><?php echo $dato->etapa; ?></td>
      <td><?php echo $dato->nameGrado; ?></td>
      <td><?php echo $dato->nameSeccion; ?></td>
      <td><?php echo $dato->nombreDocente; ?></td>
       <td><?php echo $dato->cedulaDocente; ?></td>
      <td><?php echo $dato->horaEntrada; ?>  <b>  a  </b>  <?php echo $dato->horaSalida; ?> </td>
      <td>
          <div class="btn-group">
        <button type="button" class="btn btn-info btn-view-curso" data-toggle="modal" data-target="#modal-default"  value="<?php echo $dato->idCurso; ?>" ><span class="oi" data-glyph="magnifying-glass" title="Ver Detalles" aria-hidden="true"></span></button><a href="<?php echo base_url(); ?>cursos/edit_curso/<?php echo $dato->idCurso; ?>" class="btn btn-warning"><span class="oi" data-glyph="pencil" title="Editar" aria-hidden="true"></span></a><a href="javascript:void(0);" onclick="eliminarCurso('<?php echo base_url(); ?>cursos/eliminarCurso/<?php echo $dato->idCurso; ?>','<?php echo $dato->nombre; ?>');" class="btn btn-danger"><span class="oi" data-glyph="delete" title="Eliminar" aria-hidden="true"></span></a>
        </div>
      </td>
      </tr>

    <?php
}
?>


  </tbody>

</table>

<!-- Modal -->
<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalles del Curso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div class="modal-body">

     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>




