<div style="overflow-x:auto;">
    <div class="row">  
  		<div class="col-md-12">
        	<div class="box box-primary">
                <div class="box-header">
                	<h3 class="box-title">Asignacion de clases</h3>
                </div><!-- /.box-header -->
 
            <form  method="get"  action="deleteClases">                
              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">                     
  						<input type="hidden" name="idProfesor" value="<?= $id; ?>"> 
  						<div class="box-body">
                <table id="tablaAsignaClases" class="table table-striped table-bordered table-hover" cellspacing="0" width="50%">
                  <thead>
                    <tr>
                      <th>Horario</th>
                      <th>Lunes</th>
                      <th>Martes</th>
                      <th>Miercoles</th>
                      <th>Jueves</th>
                      <th>Viernes</th>
                      <th>Curso</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($asignaciones as $asignacion){ ?>
                      <tr>
                              <td><?=$asignacion->horario;?></td>

                         <?php if($asignacion->lunes) { ?>
                              <td><label class="checkbox-inline"><input id="curso" class="flat-red" type="checkbox" name="materiasLun[]" value="<?= $asignacion->horario.' '.$asignacion->name.' '.$asignacion->lunes ?>">&nbsp;&nbsp;&nbsp;<?= $asignacion->lunes; ?></td>
                         <?php } else { ?>
                              <td></td>
                         <?php } ?>

                         <?php if($asignacion->martes) { ?>
                              <td><label class="checkbox-inline"><input id="curso" class="flat-red" type="checkbox" name="materiasMar[]" value="<?= $asignacion->horario.' '.$asignacion->name.' '.$asignacion->martes ?>">&nbsp;&nbsp;&nbsp;<?= $asignacion->martes; ?></td>
                         <?php } else { ?>
                              <td></td>
                         <?php } ?>

                         <?php if($asignacion->miercoles) { ?>
                              <td><label class="checkbox-inline"><input id="curso" class="flat-red" type="checkbox" name="materiasMier[]" value="<?= $asignacion->horario.' '.$asignacion->name.' '.$asignacion->miercoles ?>">&nbsp;&nbsp;&nbsp;<?= $asignacion->miercoles; ?></td>
                         <?php } else { ?>
                              <td></td>
                         <?php } ?>

                         <?php if($asignacion->jueves) { ?>
                              <td><label class="checkbox-inline"><input id="curso" class="flat-red" type="checkbox" name="materiasJuev[]" value="<?= $asignacion->horario.' '.$asignacion->name.' '.$asignacion->jueves ?>">&nbsp;&nbsp;&nbsp;<?= $asignacion->jueves; ?></td>
                         <?php } else { ?>
                              <td></td>
                         <?php } ?>

                         <?php if($asignacion->viernes) { ?>
                              <td><label class="checkbox-inline"><input id="curso" class="flat-red" type="checkbox" name="materiasVier[]" value="<?= $asignacion->horario.' '.$asignacion->name.' '.$asignacion->viernes ?>">&nbsp;&nbsp;&nbsp;<?= $asignacion->viernes; ?></td>
                         <?php } else { ?>
                              <td></td>
                         <?php } ?>

                              <td><?=$asignacion->name;?></td>
                    <?php } ?>
                  </tbody>
                </table>
                <center><button class="btn btn-danger btn-xs" type="submit">Elimina Clase</button></center>
  						</div>
            </form>
          </div> <!-- end col mod 6 -->
		  </div> <!-- end col-md-6 -->
    </div>
</div>