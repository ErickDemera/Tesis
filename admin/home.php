<h1>Bienvenido a <?php echo $_settings->info('name') ?></h1>
<hr>

<div class="row">
        <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box" style="background-color: #46BEFF;">
              <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-newspaper"></i></span>
              <div class="info-box-content">
              <span class="info-box-text" style="color: dark; font-size: 20px;">Tipos de bienes y raices</span>
                <span class="info-box-number" style="color: dark;">
                  <?php 
                    $types = $conn->query("SELECT * FROM type_list")->num_rows;
                    echo format_num($types);
                  ?>
                  <?php ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box" style="background-color: #FFE672;">
              <span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-tools"></i></span>

              <div class="info-box-content">
                <span class="info-box-text" style="color: dark; font-size: 20px;">Servicios totales</span>
                <span class="info-box-number" style="color: dark;">
                  <?php 
                    $amenities = $conn->query("SELECT * FROM amenity_list ")->num_rows;
                    echo format_num($amenities);
                  ?>
                  <?php ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box" style="background-color: #01ff70;">
              <span class="info-box-icon bg-gradient-teal elevation-1"><i class="fas fa-home"></i></span>
              <div class="info-box-content">
                <span class="info-box-text" style="color: dark; font-size: 20px;">Disponible</span>
                <span class="info-box-number" style="color: dark;">
                  <?php 
                    $available = $conn->query("SELECT * FROM real_estate_list where `status` = 1")->num_rows;
                    echo format_num($available);
                  ?>
                  <?php ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box" style="background-color: #dc3545">
              <span class="info-box-icon bg-gradient-teal elevation-1"><i class="fas fa-home"></i></span>

              <i class="fas fa-times fa-3x" style="position: absolute; top: 0; left: 0; color: red;"></i></span>
              <div class="info-box-content">
                <span class="info-box-text" style="color: dark; font-size: 20px;">No disponible</span>
                <span class="info-box-number" >
                <?php 
                    $available = $conn->query("SELECT * FROM real_estate_list where `status` = 0")->num_rows;
                    echo format_num($available);
                  ?>
                  <?php ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
<div class="container">
  <?php 
    $files = array();
      $fopen = scandir(base_app.'uploads/banner');
      foreach($fopen as $fname){
        if(in_array($fname,array('.','..')))
          continue;
        $files[]= validate_image('uploads/banner/'.$fname);
      }
  ?>
  <div id="tourCarousel"  class="carousel slide" data-ride="carousel" data-interval="3000">
      <div class="carousel-inner h-100">
          <?php foreach($files as $k => $img): ?>
          <div class="carousel-item  h-100 <?php echo $k == 0? 'active': '' ?>">
              <img class="d-block w-100  h-100" style="object-fit:contain" src="<?php echo $img ?>" alt="">
          </div>
          <?php endforeach; ?>
      </div>
      <a class="carousel-control-prev" href="#tourCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Anterior</span>
      </a>
      <a class="carousel-control-next" href="#tourCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Siguiente</span>
      </a>
  </div>
</div>
