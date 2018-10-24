



<?php if (count((array) $dato2) > 0) {
    $fotoAlumno = $dato2->nombre_Foto;
}
?>
<div class="table-responsive">
 <table class="table table-sm table-hover">
  <thead>
    <tr>
      <th scope="col"><img height="100" width="100" src="<?php echo base_url(); ?>public/fotos/<?php if (isset($fotoAlumno) and $fotoAlumno !== '') {echo $dato2->nombre_Foto;} else {echo 'fotoDefault.png';}?>" class="img-thumbnail" alt="foto_alumno"></td></th>
      <th scope="col"><?php echo $dato->nombre; ?></th>
    </tr>







  </thead>
  <tbody>
    <tr>
      <td>
      </td>
      <td>



    </td>
    </tr>





  </tbody>
</table>
</div>

