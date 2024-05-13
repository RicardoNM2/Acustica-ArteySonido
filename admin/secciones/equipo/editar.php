<?php 
include("../../bd.php"); 
include("../../templates/header.php"); 


if (isset($_GET['txtID'])) {
    //Editar registro segun id

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']: "";

    $sentencia=$conexion->prepare(" SELECT * FROM tbl_equipo WHERE id=:id ");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

    $imagen=$registro['imagen'];
    $titulo=$registro['titulo'];

    $puesto=$registro['titulo'];
    $twitter=$registro['twitter'];
    $facebook=$registro['facebook'];
    $linkedin=$registro['linkedin'];

}
?>

<div class="card">
        <div class="card-header">Datos del equipo</div>
        <div class="card-body">
            
            <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <img width="60" src="../../../assets/img/team/ <?php echo $imagen; ?>"/> 

                <input 
                    type="file"
                    class="form-control"
                    name="imagen"
                    id="imagen"
                    aria-describedby="helpId"
                    placeholder="imagen"
                />
            </div>
            <div class="mb-3">
                <label for="titulo" class="form-label">Nombre:</label>
                <input value="<?php echo $titulo; ?>"
                    type="text"
                    class="form-control"
                    name="titulo"
                    id="titulo"
                    aria-describedby="helpId"
                    placeholder="titulo"
                />
            </div>
            <div class="mb-3">
                <label for="puesto" class="form-label">Puesto:</label>
                <input value="<?php echo $puesto; ?>"
                    type="text"
                    class="form-control"
                    name="puesto"
                    id="puesto"
                    aria-describedby="helpId"
                    placeholder="puesto"
                />
            </div>
            <div class="mb-3">
                <label for="twitter" class="form-label">Twitter:</label>
                <input value="<?php echo $twitter; ?>"
                    type="text"
                    class="form-control"
                     name="twitter"
                    id="twitter"
                    aria-describedby="helpId"
                    placeholder="twitter"
                />
            </div>
    
            <div class="mb-3">
                <label for="facebook" class="form-label">Facebook:</label>
                <input value="<?php echo $facebook; ?>"
                    type="text"
                    class="form-control"
                    name="facebook"
                    id="facebook"
                    aria-describedby="helpId"
                    placeholder="facebook"
                />
            </div>
            <div class="mb-3">
                <label for="linkedin" class="form-label">Linkedin:</label>
                <input value="<?php echo $linkedin; ?>"
                    type="text"
                    class="form-control"
                    name="linkedin"
                    id="linkedin"
                    aria-describedby="helpId"
                    placeholder="linkedin"
                />
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a
                name=""
                id=""
                class="btn btn-danger"
                href="index.php"
                role="button"
                >Cancelar</a
            >
            </form>
            
        </div>
    </div>

<?php include("../../templates/footer.php"); ?>