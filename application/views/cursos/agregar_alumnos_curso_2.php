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
    <h5>Representante: <?php echo $datos3->nombre; ?> </h5>
    <?php
echo form_open(null, array("class" => "form-horizontal", "name" => "formRegistro"));

?>


        <div>
         <table  class="table table-sm">
            <thead>
             <tr>
           <th>Estudiante</th>
           <th>Cédula</th>
           <th>Cedula Escolar</th>
             </tr>
            </thead>
            <tbody>

        <?php foreach ($datos2 as $key => $dato2) {?>
                <tr>
       <td>
       <div class="form-check">
       <input name="checkboxIdAlumno[]" class="form-check-input" type="checkbox" value="<?php echo $dato2->idAlumno; ?>"  id="checkboxIdAlumno<?php echo $dato2->idAlumno; ?>">
       <label class="form-check-label" for="defaultCheck1">
       <?php echo $dato2->nameAlumno; ?>
       </label>
       </div>
        </td>
        <td>
            <?php echo $dato2->cedula; ?>
        </td>
           <td>
            <?php echo $dato2->cedulaEscolar; ?>
        </td>
               </tr>

   <?php
# code...
}

    ?>

            </tbody>


       </table>
        </div>




    <input type="submit" class="btn btn-primary" value="Inscribir" name="">
    <input type="hidden" value="<?php echo $datos3->id; ?>" name="idRepre">
    <input type="hidden" value="<?php echo $idCurso; ?>" name="idCurso">
    <a href="<?php echo base_url(); ?>cursos/agregar_alumnos_curso/<?php echo $datos->idCurso; ?>" class="btn btn-danger">Volver</a>

    <?php echo form_close(); ?>


