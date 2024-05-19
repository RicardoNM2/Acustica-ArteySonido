<?php 
    include("../../bd.php"); 

    
    if (isset($_GET['txtID'])) {
        //Borrar registro segun id
        $txtID=(isset($_GET['txtID']))?$_GET['txtID']: "";

        $sentencia=$conexion->prepare("DELETE FROM tbl_configuraciones WHERE id=:id ");
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();
    }


    //Seleccionar registros
   $sentencia=$conexion->prepare("SELECT * FROM `tbl_configuraciones`");
   $sentencia->execute();
   $lista_configuraciones=$sentencia->fetchAll(PDO::FETCH_ASSOC);


    include("../../templates/header.php"); ?>

    <div class="card">
        <div class="card-header">
        <a
            name=""
            id=""
            class="btn btn-primary"
            href="crear.php"
            role="button"
            >Agregar registros</a>
        </div>
        <div class="card-body">
            <div
                class="table-responsive-sm"
            >
                <table
                    class="table"
                >
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre de configuración</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($lista_configuraciones as $registros) { ?>
                        <tr class="">
                            <td><?php echo $registros['ID']; ?></td>
                            <td><?php echo $registros['nombreconfiguracion']; ?></td>
                            <td><?php echo $registros['valor']; ?></td>
                            <td>
                            <a
                                        name=""
                                        id=""
                                        class="btn btn-info"
                                        href="editar.php?txtID=<?php echo $registros['ID']; ?>"
                                        role="button"
                                        >Editar</a
                                    >
                                |
                                <a
                                        name=""
                                        id=""
                                        class="btn btn-danger"
                                        href="index.php?txtID=<?php echo $registros['ID']; ?>" 
                                        role="button"
                                        >Eliminar</a
                                >
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            
        </div>
        <div class="card-footer text-muted"></div>
    </div>
    
    
<?php include("../../templates/footer.php"); ?>