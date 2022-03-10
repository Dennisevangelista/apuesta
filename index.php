<?php include 'estilos/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from usuarios");
    $usuario = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($usuario);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
           
            <div class="card">
                <div class="card-header">
                    Lista de Usuarios
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">DNI</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                          
                                <th scope="col">Celular</th>
                                <th scope="col">Salgo</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($usuario as $dato){ 
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->IDPlayer; ?></td>
                                <td><?php echo $dato->u_DNI; ?></td>
                                <td><?php echo $dato->u_Nombre; ?></td>
                                <td><?php echo $dato->u_Apellido; ?></td>
                                <td><?php echo $dato->u_Celular; ?></td>
                                <td><?php echo $dato->u_Saldo; ?></td>
                                <td><a onclick="return confirm('Estas seguro de editar?');" 
                                       class="text-success" href="editar.php?IDPlayer=<?php echo $dato->IDPlayer; ?>"><i class="bi bi-pencil-square"></i></a>
                                <a onclick="return confirm('Estas seguro de Agregar?');" 
                                   class="text-danger" href="agregar.php?IDPlayer=<?php echo $dato->IDPlayer; ?>"><i class="bi bi-arrow-repeat"></i></a>
                                </td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        
    </div>
</div>
    