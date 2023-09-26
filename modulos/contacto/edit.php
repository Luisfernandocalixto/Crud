<?php 
include("../../conexion.php");

if (isset($_GET['id'])) {
    # code...
    $txtid=(isset($_GET['id'])?$_GET['id']:"");
    $stm=$conexion->prepare("SELECT * FROM contactos WHERE id=:txtid");
    $stm->bindParam(":txtid",$txtid);
    $stm->execute();
    $registro=$stm->fetch(PDO::FETCH_LAZY);
    $nombre=$registro['nombre'];
    $telefono=$registro['telefono'];
    $fecha=$registro['fecha'];
    
}

if ($_POST) {
    # code...
    $txtid=(isset($_POST['txtid'])?$_POST['txtid']:"");
    $nombre=(isset($_POST['nombre'])?$_POST['nombre']:"");
    $telefono=(isset($_POST['telefono'])?$_POST['telefono']:"");
    $fecha=(isset($_POST['fecha'])?$_POST['fecha']:"");

    $stm=$conexion->prepare("UPDATE contactos SET nombre=:nombre,telefono=:telefono,fecha=:fecha 
    WHERE id=:txtid");
    $stm->bindParam(":nombre",$nombre);
    $stm->bindParam(":telefono",$telefono);
    $stm->bindParam(":fecha",$fecha);
    $stm->bindParam(":txtid",$txtid);
    $stm->execute();

    header("location:index.php");

}

?>

<?php include("../../template/header.php"); ?>

<form action="" method="post" style="display: grid; justify-content: center; font-size: 24px;">
    
    <input type="hidden" class="" name="txtid" value="<?php echo $txtid; ?>" placeholder="Ingresa nombre">
    
    <label for="">Nombre</label>
    <input type="text" class="" name="nombre" value="<?php echo $nombre; ?>" placeholder="Ingresa nombre">
    <br>
    <label for="">Teléfono</label>
    <input type="text" class="" name="telefono" value="<?php echo $telefono; ?>" placeholder="Ingresa teléfono">
    <br>
    <label for="">Fecha</label>
    <input type="date" class="" name="fecha" value="<?php echo $fecha; ?>">
    <br>
</div>
    <div style="display: flex; justify-content: space-between;">
        <a href="index.php" class="btn btn-danger">Cancelar</a>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>

<?php include("../../template/footer.php"); ?>