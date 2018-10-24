  <option value="0" selected>Elija...</option>
  <?php
  
  foreach($datosSelect as $dato){ ?>

   <option value="<?php echo $dato->id; ;?>"><?php echo $dato->nombreGrado; ?></option> 

  <?php

  }
  

 ?> 
