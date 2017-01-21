<div style="overflow-x:auto;">
<div class="row">  
  		<div class="col-md-12">
        	<div class="box box-primary">
                <div class="box-header">
                	<center><h3 class="box-title">Asignacion de clases</h3></center>
                </div><!-- /.box-header -->
 
            <form  method="post"  action="registrarAsignacion">                
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
                    <?php foreach($horariosDisp as $horario){ ?>
                      <?php foreach($materias as $materia){ ?>
                      <tr>
                      <?php if($materia->nombre==$horario->lunes || $materia->nombre==$horario->martes || $materia->nombre==$horario->miercoles || $materia->nombre==$horario->jueves  || $materia->nombre==$horario->viernes ) { ?>

                              <td><?=$horario->horario;?></td>

                         <?php if($materia->nombre==$horario->lunes) { ?>
                              <td><label class="checkbox-inline"><input id="curso" class="flat-red" type="checkbox" name="materiasLun[]" value="<?=$materia->nombre.' '.$horario->horario.' '.$horario->name;?>">&nbsp;&nbsp;&nbsp;<?= $materia->nombre; ?></td>
                         <?php } else { ?>
                              <td></td>
                         <?php } ?>

                         <?php if($materia->nombre==$horario->martes) { ?>
                              <td><label class="checkbox-inline"><input id="curso" class="flat-red" type="checkbox" name="materiasMar[]" value="<?=$materia->nombre.' '.$horario->horario.' '.$horario->name;?>">&nbsp;&nbsp;&nbsp;<?=$materia->nombre;?></td>
                         <?php } else { ?>
                              <td></td>
                         <?php } ?>

                         <?php if($materia->nombre==$horario->miercoles) { ?>
                              <td><label class="checkbox-inline"><input id="curso" class="flat-red" type="checkbox" name="materiasMier[]" value="<?=$materia->nombre.' '.$horario->horario.' '.$horario->name;?>">&nbsp;&nbsp;&nbsp;<?=$materia->nombre;?></td>
                         <?php } else { ?>
                              <td></td>
                         <?php } ?>

                         <?php if($materia->nombre==$horario->jueves) { ?>
                              <td><label class="checkbox-inline"><input id="curso" class="flat-red" type="checkbox" name="materiasJuev[]" value="<?=$materia->nombre.' '.$horario->horario.' '.$horario->name;?>">&nbsp;&nbsp;&nbsp;<?=$materia->nombre;?></td>
                         <?php } else { ?>
                              <td></td>
                         <?php } ?>

                         <?php if($materia->nombre==$horario->viernes) { ?>
                              <td><label class="checkbox-inline"><input id="curso" class="flat-red" type="checkbox" name="materiasViern[]" value="<?=$materia->nombre.' '.$horario->horario.' '.$horario->name;?>">&nbsp;&nbsp;&nbsp;<?=$horario->viernes;?></td>
                         <?php } else { ?>
                              <td></td>
                         <?php } ?>

                              <td><?=$horario->name;?></td>
                      <?php } ?>
                      </tr>
                      <?php } ?>
                    <?php } ?>
                  </tbody>
                </table>
  						</div>

  						<div class="box-footer col-xs-12 ">
                      <center><button type="submit" class="btn btn-primary">Asignar Clases</button></center>
              </div>
            </form>
          </div> <!-- end col mod 6 -->
		  </div> <!-- end col-md-6 -->
  </div>
</div>
<script>
                $(function () {
                  //iCheck for checkbox and radio inputs
                  $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                  });
                  //Red color scheme for iCheck
                  $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                  });
                  //Flat red color scheme for iCheck
                  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                    checkboxClass: 'icheckbox_flat-green',
                    radioClass: 'iradio_flat-green'
                  });
                });
</script>