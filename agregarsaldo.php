<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $IDPlayer = $_POST['codigo'];
    $u_Saldo = $_POST['txtSaldo'];
    $u_Saldoactual = $_POST['txtSaldoactual'];
    
    $estado = 'agregar';
    $sentencia = $bd->prepare("INSERT INTO detalle_saldo(ID_player,saldo_Agregado,estado) VALUES (?,?,?);");
    $resultado = $sentencia->execute([$u_Saldo, $IDPlayer,  $estado ]);

    
    $suma = $u_Saldo + $u_Saldoactual ;
    //print_r($suma);
    $query = $bd->prepare("UPDATE usuarios SET u_Saldo = ? where IDPlayer = ?;");
    $respuesta = $query->execute([$suma, $IDPlayer]);
   
    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>