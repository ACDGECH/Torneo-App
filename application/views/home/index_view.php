<?php if(isset($msg))
  echo $msg;
$meses=array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
if($evento){
  if($evento->fecha != date('Y-m-d') || $this->session->userdata('isadmin') != 1){
  $fecha = explode('-', $evento->fecha);
  $fecha = $fecha[2].' de '.$meses[$fecha[1]-1].' del '.$fecha[0]; ?>
<div class="panel panel-default">
  <div class="panel-heading"><h3 class="panel-title">Próximo Evento</h3></div>
  <div class="panel-body">
    <h2 align="center"><b><?php echo $evento->nombre; ?></b></h2>
    <p><?php echo $evento->descripcion; ?></p>
  </div>
  <div class="panel-footer">
    Fecha: <b><?php echo $fecha; ?></b>
  </div>
</div>
<?php }}else{?>
  <h2 class="form-signin-heading" align="center">No hay evento próximo</h2><br>
  <?php if($this->session->userdata('isadmin') == 1){ ?>
    <button class="btn btn-lg btn-primary btn-block" type="button" onclick="window.location.href='<?php echo site_url()."/evento/registro" ?>'">Crear evento</button>
  <?php }
  }?>

<div class="panel panel-default">
  <div class="panel-body">
  <?php if($this->session->userdata('isadmin') == 1)
    if(!isset($combates) && $evento)
      if($evento->fecha == date('Y-m-d')){ ?>
        <h1>Crea los combates</h1>
        <p>Dá click en el botón para generar los combates automáticamente.</p>
        <button class="btn btn-lg btn-primary btn-block" type="button" onclick="window.location.href='<?php echo site_url()."/ronda/genera" ?>'">Generar combates</button>
      <?php }
    else{ ?>
      <button class="btn btn-lg btn-primary btn-block" type="button" onclick="window.location.href='<?php echo site_url()."/ronda" ?>'">Ver combates</button>
    <?php } ?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class=""></li>
        <li class="active" data-target="#myCarousel" data-slide-to="1"></li>
        <li class="" data-target="#myCarousel" data-slide-to="2"></li>
        <li class="" data-target="#myCarousel" data-slide-to="3"></li>
        <li class="" data-target="#myCarousel" data-slide-to="4"></li>
        <li class="" data-target="#myCarousel" data-slide-to="5"></li>
        <li class="" data-target="#myCarousel" data-slide-to="6"></li>
        <li class="" data-target="#myCarousel" data-slide-to="7"></li>
        <li class="" data-target="#myCarousel" data-slide-to="8"></li>
        <li class="" data-target="#myCarousel" data-slide-to="9"></li>
        <li class="" data-target="#myCarousel" data-slide-to="10"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAGZmZgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
          <div class="container">
            <div class="carousel-caption">
            <img src="<?php echo base_url(); ?>/images/cch.png" height="100px" border="0" alt="slice">
            </div>
          </div>
        </div>
        <div class="item">
          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <img src="<?php echo base_url(); ?>/images/7.png" height="100px" border="0" alt="slice">
            </div>
          </div>
        </div>
        <div class="item">
          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAFVVVQAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <img src="<?php echo base_url(); ?>/images/8a.png" height="100px" border="0" alt="slice">
            </div>
          </div>
        </div>
        <div class="item">
          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAFVVVQAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <img src="<?php echo base_url(); ?>/images/cons.jpg" height="100px" border="0" alt="slice">
            </div>
          </div>
        </div>
        <div class="item">
          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAFVVVQAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <img src="<?php echo base_url(); ?>/images/gob.png" height="100px" border="0" alt="slice">
            </div>
          </div>
        </div>
        <div class="item">
          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAFVVVQAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <img src="<?php echo base_url(); ?>/images/ichd.png" height="100px" border="0" alt="slice">
            </div>
          </div>
        </div>
        <div class="item">
          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAFVVVQAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <img src="<?php echo base_url(); ?>/images/jmas.png" height="100px" border="0" alt="slice">
            </div>
          </div>
        </div>
        <div class="item">
          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAFVVVQAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <img src="<?php echo base_url(); ?>/images/lince.jpg" height="100px" border="0" alt="slice">
            </div>
          </div>
        </div>
        <div class="item">
          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAFVVVQAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <img src="<?php echo base_url(); ?>/images/mpio.png" height="100px" border="0" alt="slice">
            </div>
          </div>
        </div>
        <div class="item">
          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAFVVVQAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <img src="<?php echo base_url(); ?>/images/pwr.jpg" height="100px" border="0" alt="slice">
            </div>
          </div>
        </div>
        <div class="item">
          <img src="data:image/gif;base64,R0lGODlhAQABAIAAAFVVVQAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
          <div class="container">
            <div class="carousel-caption">
              <img src="<?php echo base_url(); ?>/images/vive.png" height="100px" border="0" alt="slice">
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"></a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"></a>
    </div><!-- /.carousel -->
    <div class="panel-footer">
      Patrocinadores
    </div>
  </div>
</div>
