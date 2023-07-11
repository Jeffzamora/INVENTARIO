<?php
$page_title = 'Historico de Sesiones';
require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
page_require_level(1);
//pull out all user form database
$all_logs = find_all_logs();
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Historico de Usuarios</span>
       </strong>
      </div>
     <div class="panel-body">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th class="text-center" style="width: 50px;">#</th>
            <th>Usuario</th>
            <th>Nombre</th>
            <th class="text-center" style="width: 15%;">Entrada</th>
            <th class="text-center" style="width: 10%;">Salida</th>
            <th style="width: 20%;">Tiempo conectado</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($all_logs as $l_logs): ?>
          <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td><?php echo remove_junk(ucwords($l_logs['username']))?></td>
           <td><?php echo remove_junk(ucwords($l_logs['name']))?></td>
           <td><?php echo remove_junk(ucwords($l_logs['l_in']))?></td>
           <td><?php echo $l_logs['l_out'] ? remove_junk(ucwords($l_logs['l_out'])) : '<span style="color: red;">Sin salida</span>';?></td>
           <td><?php echo $l_logs['connection_time'] ? remove_junk(ucwords($l_logs['connection_time'])) : '<span style="color: red;">Fallo</span>';?></td>
          </tr>
        <?php endforeach;?>
       </tbody>
     </table>
     </div>
    </div>
  </div>
</div>
<?php include_once('layouts/footer.php'); ?>
