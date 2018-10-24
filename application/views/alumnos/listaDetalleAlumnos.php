
    <span class="d-block p-2 bg-primary text-white">Estudiantes del Representante: <strong><?php echo $datos2->nombre; ?>-<?php echo $datos2->cedula; ?></strong></span>
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
      <th scope="col">Estudiante</th>
      <th scope="col">Cédula</th>
      <th scope="col">Cédula Escolar</th>
      <th scope="col">F. de Nacimiento</th>
      <th scope="col">Sexo</th>
      <th scope="col">Edad</th>



    </tr>
  </thead>
  <tbody>
    <?php
foreach ($datos as $dato) {

    $factual = date("Y-m-d");
    $diff    = abs(strtotime($factual) - strtotime($dato->fechaNacimiento));
    $edad    = floor($diff / (365 * 60 * 60 * 24));
    ?>

    <tr>
      <td><?php echo $dato->nombre; ?></td>
      <td><?php echo $dato->cedula; ?></td>
      <td><?php echo $dato->cedulaEscolar; ?></td>
      <td><?php echo $dato->fechaNacimiento; ?></td>
      <td><?php echo $dato->sexo; ?></td>
      <td><?php echo $edad; ?> Años</td>

      <td>

      </td>
    </tr>

    <?php
}
?>


  </tbody>
</table>
<br>
<a href="<?php echo base_url(); ?>representantes/lista_representantes" class="btn btn-danger">Volver</a>



