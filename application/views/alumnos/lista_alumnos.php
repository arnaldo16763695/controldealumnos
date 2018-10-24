
    <span class="d-block p-2 bg-primary text-white">Lista de Alumnos</span>
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
 <table  class="table table-sm table-hover" <?php if (count((array) $datos) > 9) {?> id="myTable" <?php }?>>
  <thead>
    <tr>

      <th scope="col">Estudiante</th>

      <th scope="col">F. de Nacimiento</th>
      <th scope="col">Sexo</th>
      <th scope="col">Edad</th>
      <th scope="col">Representante</th>
      <th scope="col">Cédula Representante</th>

      <th scope="col">Acción</th>

    </tr>
  </thead>
  <tbody>
    <?php
foreach ($datos as $dato) {
    $factual = date("Y-m-d");
    // $fnaci= $dato->fechaNacimiento;

    $diff = abs(strtotime($factual) - strtotime($dato->fechaNacimiento));
    $edad = floor($diff / (365 * 60 * 60 * 24));
    ?>

    <tr>

      <td><?php echo $dato->nombre; ?></td>

      <td><?php echo date("d-m-Y", strtotime($dato->fechaNacimiento)); ?></td>
      <td><?php echo $dato->sexo ?></td>
      <td><?php echo $edad; ?> Años</td>
      <td><?php echo $dato->nombreR; ?></td>
      <td><?php echo $dato->cedulaR; ?></td>

      <td>
        <div class="btn-group">
        <button type="button" class="btn btn-info btn-view" data-toggle="modal" data-target="#modal-default"  value="<?php echo $dato->idAlumn; ?>" ><span class="oi" data-glyph="magnifying-glass" title="Ver Detalles" aria-hidden="true"></span></button><a href="<?php echo base_url(); ?>alumnos/edit/<?php echo $dato->idAlumn; ?>" class="btn btn-warning"><span class="oi" data-glyph="pencil" title="Editar" aria-hidden="true"></span></a><a href="javascript:void(0);" onclick="eliminarAlumnos('<?php echo base_url(); ?>alumnos/eliminarAlumnos/<?php echo $dato->idAlumn; ?>','<?php echo $dato->nombre; ?>');" class="btn btn-danger"><span class="oi" data-glyph="delete" title="Eliminar" aria-hidden="true"></span></a>
        </div>
      </td>
          </tr>

    <?php
}
?>


  </tbody>
</table>
 <button type="button" class="btn btn-info btn-view-listados" data-toggle="modal" data-target="#modal-default-2"  value="" >
<span class="oi" data-glyph="document" title="Generar PDF" aria-hidden="true"></span></button>
<!--  <a href="<?php // base_url()?>lista_alumnos_pdf" target="_blank" class="btn btn-danger"><span class="oi" data-glyph="document" title="Generar PDF" aria-hidden="true"></span></a> -->
 </div>




<!-- Modal -->
<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Datos del Estudiante</h5>
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

<!-- Modal -->
<div class="modal fade" id="modal-default-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Exportar a:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <div class="modal-body">
        <div style="text-align: center;">
             <a href="<?php base_url();?>lista_alumnos_excel" class="btn btn-danger"><img width="16" height="16" src="<?php echo base_url(); ?>/public/images/icons/excel.ico"> EXCEL</a>

             <a href="<?php base_url()?>lista_alumnos_pdf" target="_blank"  class="btn btn-danger"><img width="16" height="16" src="<?php echo base_url(); ?>/public/images/icons/pdf.ico"> PDF</a>
        </div>

     </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>
