<?php
include "conexion.php";

$user_id=null;
$sql1= "select * from rol where idRol = ".$_GET["id"];
$query = $con->query($sql1);
$rol = null;
if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $rol=$r;
  break;
}

  }
?>

<?php if($rol!=null):?>

<form role="form" id="actualizar" >
  <div class="form-group">
    <label for="name">Estado</label>
    <input type="text" class="form-control" value="<?php echo $rol->EstadoRol; ?>" name="EstadoRol" required>
  </div>
<input type="hidden" name="idRol" value="<?php echo $rol->idRol; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    $.post("./php/actualizar.php",$("#actualizar").serialize(),function(data){
    });
    //alert("Agregado exitosamente!");
    //$("#actualizar")[0].reset();
    $('#editModal').modal('hide');
$('body').removeClass('modal-open');
$('.modal-backdrop').remove();
    loadTabla();
  });
</script>

<?php else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>