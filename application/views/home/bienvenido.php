
  <span class="d-block p-2 bg-primary text-white"><div class="form-row"><div class="input-group-sm col-md-6">Bienvenid@ <?php echo $this->session->userdata('nombre') ?> </div><div class="input-group-sm col-md-6" style="text-align: right;"><?php echo $this->session->userdata('nombre_rol') ?></div></div></span>
    <hr>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo base_url(); ?>public/images/aula.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url(); ?>public/images/banner3.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url(); ?>public/images/banner3.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>




</div>


  <footer style="text-align: center;">
        <strong>Copyright &copy; 2018-2020 <a href="#">Arnaldo Espinoza</a>.</strong> All rights
            reserved. <b>Version</b> 1.0
    </footer>

