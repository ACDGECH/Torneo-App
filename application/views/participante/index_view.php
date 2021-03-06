<?php if(isset($msg)) echo $msg;
function CalculaEdad( $fecha ) {
    list($Y,$m,$d) = explode("-",$fecha);
    return( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
}
if($participantes){?>
<div class="panel panel-default">
  <div class="panel-heading" align="center"><h3><b>Participantes registrados</b></h3></div>

  <table class="table" border="0" cellpadding="2" cellspacing="2">
    <tr>
      <?php if($this->session->userdata('isadmin') == 1){ ?>
      <th>&nbsp</th>
      <th>Dojo</th>
      <?php } ?>
      <th>Nombre</th>
      <th>Cinta</th>
      <th>Edad</th>
      <th>Estatura</th>
      <th>Sexo</th>
    </tr>
    <?php foreach ($participantes as $p){
      foreach($dojos as $d){
        if($d['dojo'] == $p['dojo']){
          $dojo = $d['nombre'];
          break;
        }
      }
      foreach($categorias as $c){
        if($c['categoria'] == $p['categoria']){
          $categoria = $c['nombre'];
          break;
        }
      }
      if($p['sexo']==0)
        $sexo = "Hombre";
      else
        $sexo = "Mujer";
      #if($p['diferente'] == 1)
       # $diferente = "SI";
      #else
       # $diferente = "NO";
      $edad = CalculaEdad($p['fecha_nac']).' años';
      ?>
    <tr>
      <td><?php echo anchor(site_url().'/participante/editar/','<img src="'.base_url().'fotos/'.$p['foto'].'" border="0" height="60px">','style="text-decoration:none;"'); ?></td>
      <?php if($this->session->userdata('isadmin') == 1){ ?>
      <td><?php echo anchor(site_url().'/participante/editar/'.$p['participante'],$dojo,'style="text-decoration:none;"'); ?></td>
      <?php } ?>
      <td><?php echo anchor(site_url().'/participante/editar/'.$p['participante'],$p['nombre'].' '.$p['app'].' '.$p['apm'],'style="text-decoration:none;"'); ?></td>
      <td><?php echo anchor(site_url().'/participante/editar/'.$p['participante'],$categoria,'style="text-decoration:none;"'); ?></td>
      <td><?php echo anchor(site_url().'/participante/editar/'.$p['participante'],$edad,'style="text-decoration:none;"'); ?></td>
      <td><?php echo anchor(site_url().'/participante/editar/'.$p['participante'],$p['estatura'].' mts','style="text-decoration:none;"'); ?></td>
      <td><?php echo anchor(site_url().'/participante/editar/'.$p['participante'],$sexo,'style="text-decoration:none;"'); ?></td>
    </tr>
    <?php }?>
    <tr>
      <td colspan="7">
        <button class="btn btn-lg btn-primary btn-block" type="submit" onclick="window.location.href='<?php echo site_url()."/participante/registro" ?>'">Registrar Nuevo</button>
      </td>
    </tr>
  </table>
</div>
<?php }else{?>
  <h2 class="form-signin-heading" align="center">No se ha registrado a ningún participante</h2><br>
  <button class="btn btn-lg btn-primary btn-block" type="submit" onclick="window.location.href='<?php echo site_url()."/participante/registro" ?>'">Registrar Nuevo</button>
<?php }?>
