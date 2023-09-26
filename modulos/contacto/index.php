<?php  

include("../../conexion.php");

$stm=$conexion->prepare("SELECT * FROM `contactos`");
$stm->execute();
$contactos=$stm->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['id'])) {
    # code...
    $txtid=(isset($_GET['id'])?$_GET['id']:"");
    $stm=$conexion->prepare("DELETE FROM contactos WHERE id=:txtid");
    $stm->bindParam(":txtid",$txtid);
    $stm->execute();
    header("location:index.php");
}

?>

<?php  include("../../template/header.php"); ?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
  Nuevo
</button>
<!--  -->
<div class="table-responsive">
    <table class="table">
        <thead class="table table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Fecha</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($contactos as $contacto) { ?>
            <tr class="">
                <td scope="row"><?php echo $contacto['id']; ?></td>
                <td  scope="row"><?php echo $contacto['nombre']; ?></td>
                <td  scope="row"><?php echo $contacto['telefono']; ?></td>
                <td  scope="row"><?php echo $contacto['fecha']; ?></td>
                
                <td >
            
                <a href="edit.php?id=<?php echo $contacto['id']; ?>" class="btn btn-success">Editar</a>    
                <a href="index.php?id=<?php echo $contacto['id']; ?>" class="btn btn-danger">Eliminar</a>    
                
                </td>
                
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include("create.php"); ?>

<?php  include("../../template/footer.php");     ?>