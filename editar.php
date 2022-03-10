<?php include 'estilos/header.php' ?>

<?php
    if(!isset($_GET['IDPlayer'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $IDPlayer = $_GET['IDPlayer'];

    $sentencia = $bd->prepare("select * from usuarios where IDPlayer = ?;");
    $sentencia->execute([$IDPlayer]);
    $usuarios = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($persona);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarSaldo.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" value="<?php echo $usuarios->u_Nombre; ?> <?php echo $usuarios->u_Apellido; ?> ">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Saldo: </label>
                        <input type="number" class="form-control" name="txtSaldo"  required
                        value="<?php echo $usuarios->u_Saldo; ?>">
                    </div>
                    
                     <div class="mb-3">
                        <label class="form-label">Motivo: </label>
                        <input type="textarea" class="form-control" name="txtMotivo" value="">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $usuarios->IDPlayer; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

