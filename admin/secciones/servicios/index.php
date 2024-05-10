<?php 
include("../../bd.php");


if (isset($_GET['txtID'])) {
    //Borrar registro segun id
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']: "";

    $sentencia=$conexion->prepare("DELETE FROM tbl_servicios WHERE id=:id ");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
}
    //Seleccionamos los servicio
    $sentencia=$conexion->prepare("SELECT * FROM `tbl_servicios`");
    $sentencia->execute();
    $lista_servicios=$sentencia->fetchAll(PDO::FETCH_ASSOC);


include("../../templates/header.php"); ?>

    <style>
        .card th,
        .card td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        /* Agregamos una separación entre las columnas */
        .card th:not(:last-child),
        .card td:not(:last-child) {
            margin-right: 10px;
        }
    </style>
    <div class="card">
        <div class="card-header">Servicios</div> <br>
        <a
            name=""
            id=""
            class="btn btn-primary"
            href="crear.php"
            role="button"
            >Agregar registros</a
        >
    
        <div class="card-body">
            <div
                class="table-responsive"
            >
                <table
                    class="table-responsive-sm"
                >
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Icono</th>
                            <th scope="col">Título</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista_servicios as $registros) { ?>
                        <tr class="refor">
                            <td><?php echo $registros['ID'] ?></td>
                            <td><?php echo $registros['icono'] ?></td>
                            <td><?php echo $registros['titulo'] ?></td>
                            <td><?php echo $registros['descripcion'] ?></td>
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
    </div>
    
<?php include("../../templates/footer.php"); ?>