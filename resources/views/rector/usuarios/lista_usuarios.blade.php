<div style="overflow-x:auto;">
<div class="box box-primary">

<div class="box-header">
 <h4 class="box-title">Buscar Usuarios</h4>
        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" id="dato_buscado">
                            <span class="input-group-btn">
                              <button class="btn btn-info btn-flat" type="button" onclick="borrarusuRector();" >Buscar!</button>
                            </span>
        </div>
</div>

<div class="box-body">              
<?php  

if( count($usuarios) >0){
?>

<table id="tabla_usuarios" class="display table table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
             <th style="width:10px">Id</th>
                <th>Documento</th>
                <th>Nombres</th>
                <th>Rol</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Direccion</th>
                <th>Fecha Creacion</th>
            </tr>
        </thead>    
<tbody>

<?php 

   foreach($usuarios as $usuario){  
?>

 <tr role="row" class="odd">
    <td class="sorting_1"><?= $usuario->id; ?></td>
    <td><?= $usuario->type;  ?></td>
    <td class="mailbox-messages mailbox-name"><i class="fa fa-user"></i>&nbsp;&nbsp;<?= $usuario->name." ".$usuario->last_name;  ?></a></td>
    <td><?= $usuario->rol;  ?></td>
    <td><?= $usuario->telefono;  ?></td>
    <td><?= $usuario->email;  ?></td>
    <td><?= $usuario->direccion;  ?></td>
    <td><?= $usuario->created_at;  ?></td>

</tr>
<?php        
}
?>
    </table>

<?php
}

?>
</div>
</div>


