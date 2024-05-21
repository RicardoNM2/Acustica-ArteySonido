<?php 
include("../../bd.php");


if (isset($_GET['txtID'])) {
    //Editar registro segun id
    $txtID=(isset($_GET['txtID']) )?$_GET['txtID']: "";

    
    $sentencia=$conexion->prepare("SELECT imagen FROM tbl_portafolio WHERE id=:id ");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro_imagen = $sentencia -> fetch(PDO::FETCH_LAZY);

    if (isset($registro_imagen["imagen"])) {
        
        if (file_exists ("../../../assets/img/portfolio/". $registro_imagen["imagen"])){
            unlink("../../../assets/img/portfolio/". $registro_imagen["imagen"]);            
        } 
        
     
    } 
    $sentencia=$conexion->prepare("DELETE FROM tbl_portafolio WHERE id=:id ");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    
    
}

    
    //Seleccionar registros
    $sentencia=$conexion->prepare("SELECT * FROM `tbl_portafolio`");
    $sentencia->execute();
    $lista_portafolio=$sentencia->fetchAll(PDO::FETCH_ASSOC);

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
        <div class="card-header">Portafolio</div> <br>
        <a
            name=""
            id=""
            class="btn btn-primary"
            href="crear.php"
            role="button"
            >Agregar registros</a>

        <div class="card-body">
            <div
                class="table-responsive"
            >
                <table
                    class="table-responsive"
                >
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">imagen</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Cliente</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lista_portafolio as $registros) { ?>
                        <tr class="">
                            <td scope="col"><?php echo $registros['ID'] ?></td>
                            <td scope="col">
                                <h6><?php echo $registros['titulo'] ?></h6>
                                <?php echo $registros['subtitulo'] ?> <br>
                                <?php echo $registros['url'] ?>
                            </td>
                            <td scope="col">
                            <img width="50" src="../../../assets/img/portfolio/ <?php echo $registros['imagen']; ?>"/> 
                            </td>
                            <td scope="col"><?php echo $registros['descripcion'] ?></td>
                            <td scope="col">
                                - <?php echo $registros['cliente'] ?> - <br>
                                 <?php echo $registros['categoria'] ?></td>
                            
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
            
            <h4 class="card-title"></h4>
            <p class="card-text"></p>
        </div>
    </div>
    
<?php include("../../templates/footer.php"); ?>