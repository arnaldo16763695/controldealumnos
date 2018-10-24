




<div class="table-responsive">
 <table class="table table-sm table-hover">
  <thead>
    <tr>
      <th scope="col">Inscritos</td></th>
      <th scope="col">sssss</th>
    </tr>

  </thead>
  <tbody>
    <tr>
      <?php
$cantidad = count($datos2);
$plural   = "Alumnos";
$singular = "Alumno";
if ($cantidad < 1) {
    $mensaje = "Sin Alumnos";
} elseif ($cantidad == 1) {
    $mensaje = $cantidad . ' ' . $singular;
} elseif ($cantidad > 1) {
    $mensaje = $cantidad . ' ' . $plural;
}
?>
      <td><?php echo $mensaje; ?></td>
      <td>



    </td>
    </tr>





  </tbody>
</table>
</div>
