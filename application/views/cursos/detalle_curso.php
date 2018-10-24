
    <span class="d-block p-2 bg-primary text-white"><h4 style="text-align: center">Estudiantes inscritos en:
    <?php echo $datos2->nameGrado . ' Sección: ' . $datos2->nameSeccion ?></h4></span>
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

echo form_open(null, array("class" => "form-horizontal", "name" => "formRegistro"));

?>


<table class="table table-sm table-hover" <?php if (count($datos) > 9) {?> id="myTable" <?php }?>  >
  <thead>
    <tr>

      <th scope="col">Nombre del Alumno</th>
      <th scope="col">Nombre Representante</th>
      <th scope="col">Cedula Representante</th>
       <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($datos as $dato) {?>
    <tr>

      <td><?php echo $dato->nameAlumno; ?></td>
      <td><?php echo $dato->nameRepre; ?></td>
      <td><?php echo $dato->ceduRepre; ?></td>
      <td>

        <div class="btn-group">
        <button type="button" class="btn btn-info btn-view" data-toggle="modal" data-target="#modal-default"  value="" ><span class="oi" data-glyph="magnifying-glass" title="Ver Detalles" aria-hidden="true"></span></button><a href="<?php echo base_url(); ?>alumnos/antropometrica/<?php echo $dato->idAlum; ?>/<?php echo $dato->idCurso; ?>" class="btn btn-warning"><span class="oi" data-glyph="file" title="Agregar datos antropométricos" aria-hidden="true"></span></a><a href="javascript:void(0);" onclick="eliminarAlumnoCurso('<?php echo base_url(); ?>cursos/eliminarAlumnoCurso/<?php echo $dato->idAlum; ?>/<?php echo $dato->idCurso; ?>', '<?php echo $dato->nameAlumno; ?>');" class="btn btn-danger"><span class="oi" data-glyph="trash" title="Eliminar" aria-hidden="true"></span></a></td>
      </div>

      </td>
    </tr>
    <input type="hidden" name="idCurso" id="idCurso" value="<?php echo $dato->idCurso; ?>">

    <input type="hidden" name="idRepre" id="idRepresentante" value="<?php echo $dato->idRepresentante; ?>">

   <?php
}?>
  </tbody>
</table>
<br>
<a class="btn btn-info" href="<?php echo base_url(); ?>cursos/agregar_alumnos_curso/<?php echo $datos2->idCurso; ?>">Inscribir alumnos</a>
 <a href="<?php echo base_url(); ?>cursos/inscripciones" class="btn btn-danger">Volver</a>
<?php echo form_close(); ?>

