

    <span class="d-block p-2 bg-primary text-white">Registro de Docentes</span>

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



      <hr>



    <div class="form-row">

             <div class="input-group-sm col-md-12">
     <label for="selectSeccion" class="alert alert-info">Escoja el usuario</label>
      <select id="selectUsuario" class="form-control" name="usuario" required="true">
       <option value="" selected>Elija...</option>
       <?php foreach ($datos as $dato) {?>
       <option value="<?php echo $dato->id; ?>"><?php echo $dato->correo . ',   Nombre: ' . $dato->nombre . ',  C.I: ' . $dato->cedula ?></option>
        <?php
}
?>
      </select>
     </div>
   </div>

  <br>
   <button type="submit" id="submit" class="btn btn-primary">Enviar</button>
  <br>
  <br>
  <br>
  <br>
   <br>
  <br>
  <br>
  <br>

  <?php echo form_close(); ?>









