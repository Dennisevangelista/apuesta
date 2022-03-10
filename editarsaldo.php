<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $IDPlayer = $_POST['codigo'];
    $u_Saldo = $_POST['txtSaldo'];
    $u_Motivo = $_POST['txtMotivo'];
    $estado = 'Editar';

    $sentencia = $bd->prepare("UPDATE usuarios SET u_Saldo = ? where IDPlayer = ?;");
    $resultado = $sentencia->execute([$u_Saldo, $IDPlayer]);

    $query = $bd->prepare("INSERT INTO detalle_saldo(ID_player,saldo_Agregado,motivo,estado) VALUES (?,?,?,?);");
    $respuesta = $query->execute([$u_Saldo, $IDPlayer, $u_Motivo, $estado ]);
    
    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>