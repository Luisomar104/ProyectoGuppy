<?php
include "conexion.php";

$user_id=null;
$sql1= "select * from tipoproducto where IdTipoProducto = ".$_GET["id"];
$query = $con->query($sql1);
$tipoproducto = null;
if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $tipoproducto=$r;
  break;
}

  }
?>

<?php if($tipoproducto!=null):?>

<form role="form" id="actualizar" >
  <div class="form-group">
    <label for="name">Descripcion</label>
    <input type="text" class="form-control" value="<?php echo $tipoproducto->DescripcionTipoProducto; ?>" name="DescripcionTipoProducto" required>
  </div>
<input type="hidden" name="IdTipoProducto" value="<?php echo $tipoproducto->IdTipoProducto; ?>">
  <button type="submit" class="btn btn-primary">Actualizar</button>
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