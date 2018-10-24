
    <span class="d-block p-2 bg-primary text-white">Inicio de Sesión</span>
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
  <?php echo form_open(null, array("class" => "form-horizontal", "name" => "form")); ?>
  <div class="form-group">
    <label for="exampleInputEmail1">Correo</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="correo" aria-describedby="emailHelp" placeholder="Introduzca su correo">
    <small id="emailHelp" class="form-text text-muted">Nosotros nunca compartiremos tu dirreción de correo con terceros.</small>
  </div>
  <div class="form-group">
    <label for="pass">Contraseña </label>
    <input type="password" class="form-control" id="pass" name="pass"  placeholder="Introduzca su contraseña">

  </div>
 <div id="error" class="alert-warning" style="visibility:hidden;">La tecla mayúcula esta activada</div>
  <button type="submit" class="btn btn-primary">Enviar</button>

  <hr>
  <div class="form-group">
    <a href="<?php echo base_url(); ?>usuarios/registro_usuarios">Aún no estoy registrado</a>
  </div>

  <?php echo form_close(); ?>


