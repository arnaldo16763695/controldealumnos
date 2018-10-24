    <span class="d-block p-2 bg-primary text-white">Registro de Alumnos</span>

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
  <?php echo form_open(null, array("class" => "form-horizontal", "name" => "formRegistro")); ?>


  <!--<button type="submit"  class="btn btn-primary">Enviar</button>-->


   <hr>
     <h5>Datos del Estudiante</h5>
 <!-- -------------------------------------------------------------------------------------------->
            <div id="dymanic_field2">
                <div class="form-row" >

                  <div class="form-group col-md-3">
                  <label for="nombreEstudiante">Nombres Apellidos </label>
                  <input type="text" class="form-control form-control-sm firstLetterText letras" id="nombreEstudiante" required="true" name="nombreEstudiante" value="<?php echo $dato->nombre ?>" >
                  </div>

                  <div class="form-group col-md-2">
                  <label for="fechaNEstudiante">Fecha de Nacimiento</label>
                  <input type="date" class="form-control form-control-sm" id="fechaNEstudiante" required="true" name="fechaNEstudiante" value="<?php echo $dato->fechaNacimiento; ?>" >
                  </div>

                  <div class="form-group col-md-3">
                  <label for="lugarNEstudiante">Lugar de Nacimiento</label>
                  <input type="text" class="form-control form-control-sm firstLetterText" id="lugarNEstudiante" required="true" name="lugarNEstudiante" value="<?php echo $dato->lugarNacimiento ?>" >
                  </div>

                  <div class="form-group col-md-2">
                  <label for="cedulaEstudiante">Cédula</label>
                  <input type="text" class="form-control form-control-sm number" id="cedulaEstudiante"   name="cedulaEstudiante"
                   value="<?php if ($dato->cedula === 'No tiene') {echo '';} else {echo $dato->cedula;}?>"  >
                  </div>

                  <div class="form-group col-md-2">
                  <label for="sexo">Sexo</label>
                  <select id="selectsexo" class="form-control form-control-sm" required="true" name="sexo">
                  <option value="" selected>Elija...</option>
                  <?php if ($dato->sexo === "Masculino") {?>
                  <option value="Masculino" selected="true" >Masculino</option>
                  <option value="Femenino" >Femenino</option>
                  <?php } elseif ($dato->sexo === "Femenino") {?>
                  <option value="Femenino" selected="true" >Femenino</option>
                  <option value="Masculino" >Masculino</option>
                  <?php }?>
                  </select>
                  </div>
                </div>

                  <div class="form-row" >
                  <div class="form-group col-md-3">
                  <label for="nombreMadre">Nombre Apellido de la Madre</label>
                  <input type="text" class="form-control form-control-sm firstLetterText letras" id="nombreMadre" required="true" name="nombreMadre" value="<?php echo $dato->nombreMadre; ?>" value="<?php echo $dato->nombreMadre; ?>">
                  </div>

                  <div class="input-group-sm col-md-3">
                  <label for="cedulaMadre">Cédula de la Madre</label>
                  <input type="text" class="form-control form-control-sm number" id="cedulaMadre" required="true" name="cedulaMadre"
                  value="<?php echo $dato->cedulaMadre; ?>">
                  </div>

                  <div class="input-group-sm col-md-3">
                  <label for="nombrePadre">Nombre Apellido del Padre</label>
                  <input type="text" class="form-control form-control-sm firstLetterText letras" id="nombrePadre" required="true" name="nombrePadre" value="<?php echo $dato->nombrePadre; ?> " >
                  </div>

                  <div class="input-group-sm col-md-3">
                  <label for="cedulaPadre">Cédula del Padre</label>
                  <input type="text" class="form-control form-control-sm number" id="cedulaPadre" required="true" name="cedulaPadre" value=" <?php echo $dato->cedulaPadre; ?>" >
                  </div>
                  <!--<button id="remInput" class="btn btn-danger">Eliminar</button>-->
                  </div>
                  </div>

  <!-- -------------------------------------------------------------------------------------------->


  <hr>

   <button  type="submit" id="guardar" class="btn btn-primary">Guardar</button>

   <a href="<?php echo base_url(); ?>alumnos/lista_alumnos" class="btn btn-danger">Volver</a>



  <?php echo form_close(); ?>












