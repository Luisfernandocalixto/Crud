<?php

include("../../conexion.php");

$stm = $conexion->prepare("SELECT * FROM `contactos`");
$stm->execute();
$contactos = $stm->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['id'])) {
    # code...
    $txtid = (isset($_GET['id']) ? $_GET['id'] : "");
    $stm = $conexion->prepare("DELETE FROM contactos WHERE id=:txtid");
    $stm->bindParam(":txtid", $txtid);
    $stm->execute();
    header("location:index.php");
}

?>

<?php include("../../template/header.php"); ?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
    Nuevo <i class="fa-solid fa-plus"></i>
</button>
<!--  -->
<div class="table-responsive">
    <table class="table">
        <thead class="table table-dark">
            <tr align="center">
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Fecha</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contactos as $contacto) { ?>
                <tr align="center" class="">
                    <!-- <td scope="row"><?php echo $contacto['id']; ?></td> -->
                    <td scope="row" height="100"><i class="fa-solid fa-user"></i></td>
                    <td scope="row" height="100"><?php echo $contacto['nombre']; ?></td>
                    <td scope="row" height="100"><?php echo $contacto['telefono']; ?></td>
                    <td scope="row" height="100"><?php echo $contacto['fecha']; ?></td>

                    <td colspan="2">

                        <a href="edit.php?id=<?php echo $contacto['id']; ?>" class="btn btn-success">Editar <i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="index.php?id=<?php echo $contacto['id']; ?>" class="btn btn-danger">Eliminar <i class="fa-solid fa-trash"></i></a>

                    </td>

                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include("create.php"); ?>

<?php include("../../template/footer.php");     ?>