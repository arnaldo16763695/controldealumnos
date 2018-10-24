
<div class="table-responsive">
 <table class="table table-sm table-hover">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Cantidad de Alumnos</th>
    </tr>







  </thead>
  <tbody>

   <tr>
      <td><?php echo $dato->nombre; ?></td>
      <td><a href="<?php echo base_url(); ?>alumnos/listaDetalleAlumnos/<?php echo $dato->id; ?>"><?php if (count($dato2) > 1) {echo count($dato2) . ' ' . 'Alumnos';} else {echo count($dato2) . ' ' . 'Alumno';}?></a></td>
  </tr>







  </tbody>
</table>
</div>
