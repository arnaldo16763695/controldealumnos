
    <span class="d-block p-2 bg-primary text-white"><h3>Lista de Docentes</h3></span>
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
 <table class="table table-sm table-hover" <?php if (count($datos) > 9) {?> id="myTable" <?php }?>>
  <thead>
    <tr>

      <th scope="col">Cédula</th>
      <th scope="col">Nombre</th>
       <th scope="col">Fecha de Nacimiento</th>
      <th scope="col">Direccion</th>
      <th scope="col">Teléfono</th>
      <th scope="col">Fecha de Registro</th>
      <th scope="col">Acción</th>
      </tr>
  </thead>
  <tbody>
    <?php
foreach ($datos as $dato) {
    ?>

    <tr>

      <td><?php echo $dato->cedulaUsuario; ?></td>
       <td><?php echo $dato->nombreUsuario; ?></td>
        <td><?php echo date("d-m-Y", strtotime($dato->fechaNacimiento)); ?></td>
      <td><?php echo $dato->direccion; ?></td>
      <td><?php echo $dato->telefono; ?></td>
      <td><?php echo date("d-m-Y", strtotime($dato->fechaRegistro)); ?></td>
      <td>
            <div class="btn-group">
        <button type="button" class="btn btn-info btn-view" data-toggle="modal" data-target="#modal-default"  value="" ><span class="oi" data-glyph="magnifying-glass" title="Ver Detalles" aria-hidden="true"></span></button><a href="javascript:void(0);" onclick="eliminarDocente('<?php echo base_url(); ?>docentes/eliminarDocente/<?php echo $dato->id_usuario; ?>','<?php echo $dato->nombreUsuario; ?>');" class="btn btn-danger"><span class="oi" data-glyph="delete" title="Eliminar" aria-hidden="true"></span></a>
        </div>
      </td>
    </tr>

    <?php
}
?>


  </tbody>
</table>


