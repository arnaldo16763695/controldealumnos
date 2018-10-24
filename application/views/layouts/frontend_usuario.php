<!DOCTYPE html>
<html lang="es">
<head>
  <title>Programa</title>
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


   <link href="<?php echo base_url() ?>public/open-iconic/font/css/open-iconic.css" rel="stylesheet">

   <link href="<?php echo base_url() ?>public/css/css_bootstrap/bootstrap.min.css" rel="stylesheet">

   <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/plugin/dataTable/dataTables.bootstrap4.min.css">

</head>
<body">

<div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- <a class="navbar-brand" href="#">Alumnos</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url(); ?>">Inicio<span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Alumnos
        </a>
         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url(); ?>alumnos/lista_alumnos">Lista de Alumnos</a>


         </div>
      </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Representantes
        </a>
         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url(); ?>representantes/lista_representantes">Lista de Representante</a>

        </div>

        </li>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Usuario
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php if ($this->session->userdata('id')) {?>
         <a class="dropdown-item" href="<?php echo base_url(); ?>iniciosesion/cerrar">Cerrar Sesión</a>

         <?php } else {?>

         <a class="dropdown-item" href="<?php echo base_url(); ?>iniciosesion">Iniciar Sesión</a>

         <?php
}
?>


        </div>
      </li>

    </ul>
 <!--
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  -->
  </div>
</nav>


<!-- Contenido -->

<?php

echo $content_for_layout;

?>


  </div>





<!-- Contenido -->

<!-- footer -->


<!--fin de  footer -->


<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="<?php echo base_url(); ?>public/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/js_bootstrap-4.1.1/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/funciones2.js" ></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/js/funciones.js" ></script>


    <script src="<?php echo base_url(); ?>public/plugin/dataTable/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>public/plugin/dataTable/dataTables.bootstrap4.min.js"></script>

    <script>


    </script>


</body>
</html>