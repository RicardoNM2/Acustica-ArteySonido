<?php 
include("../../bd.php"); 
include("../../templates/header.php"); 


if (isset($_GET['txtID'])) {
    //Editar registro segun id

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']: "";

    $sentencia=$conexion->prepare(" SELECT * FROM tbl_entradas WHERE id=:id ");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

    $fecha= $registro['fecha'];
    $titulo=$registro['titulo'];
    $imagen= $registro['imagen'];
    $descripcion= $registro['descripcion'];
}

if ($_POST) {

    //Recepcionaos los valores de las entradas
    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";

    $fecha=(isset($_POST['fecha']))?$_POST['fecha']:"";
    $titulo=(isset($_POST['titulo']))?$_POST['titulo']:"";
    $descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";

    //Sentencia para actualizar los datos
    $sentencia=$conexion->prepare ("UPDATE `tbl_entradas` 
    SET fecha=:fecha, titulo=:titulo,descripcion=:descripcion
    WHERE id = :id ");
     
    $sentencia->bindParam(":fecha", $fecha);
    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":descripcion", $descripcion);
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();


       //Comprobamos si hay imagen
       if($_FILES["imagen"]["tmp_name"]!="") {

        //Cambiamos numero para controlar la actualziacion
        $imagen=(isset($_FILES["imagen"]["name"]))?$_FILES["imagen"]["name"]:"";

        $fecha_imagen=new DateTime();
        $nombre_archivo_imagen = ($imagen != "") ? $fecha_imagen->getTimestamp() . "_" . $imagen : " ";
        
        //Subir imagen
        $tmp_imagen = $_FILES["imagen"]["tmp_name"];

        move_uploaded_file ($tmp_imagen, "../../../assets/img/about/ ".$nombre_archivo_imagen);
        
        //Borrado del archivo anterior
        $sentencia=$conexion->prepare("SELECT imagen FROM tbl_entradas WHERE id=:id ");
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();
        $registro_imagen = $sentencia -> fetch(PDO::FETCH_LAZY);
    
        if (isset($registro_imagen["imagen"])) {
            
            if (file_exists ("../../../assets/img/about/". $registro_imagen["imagen"])){
                unlink("../../../assets/img/about/". $registro_imagen["imagen"]);            
            } 
        } 
        

        //Instrucciión de actualziación de imagen
        $sentencia=$conexion->prepare("UPDATE tbl_entradas 
        SET imagen=:imagen
        WHERE id=:id "); 

        $sentencia->bindParam(":imagen", $nombre_archivo_imagen);
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();

    }  

}

?>

<div class="card">
        <div class="card-header">
            Entradas
        </div>
        <div class="card-body">

        <form action="" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="txtID" class="form-label">ID:</label>
                <input  readonly value="<?php echo $txtID; ?>"
                    type="text"
                    class="form-control"
                    name="txtID"
                    id="txtID"
                    aria-describedby="helpId"
                    placeholder=""
                />
                <small id="helpId" class="form-text text-muted">Help text</small>
            </div>
            
            <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha:</label>
                    <input value="<?php echo $fecha; ?>"
                        type="date"
                        class="form-control"
                        name="fecha"
                        id="fecha"
                        aria-describedby="helpId"
                        placeholder=""
                    />
            </div>

            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input value="<?php echo $titulo; ?>"
                    type="text"
                    class="form-control"
                    name="titulo"
                    id="titulo"
                    aria-describedby="helpId"
                    placeholder="Título"
                />
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <input value="<?php echo $descripcion; ?>"
                    type="text"
                    class="form-control"
                    name="descripcion"
                    id="descripcion"
                    aria-describedby="helpId"
                    placeholder="Descripción"
                />
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <img width="60" src="../../../assets/img/about/ <?php echo $imagen; ?>"/> 
                <input 
                    type="file"
                    class="form-control"
                    name="imagen"
                    id="imagen"
                    placeholder="Imagen"
                    aria-describedby="fileHelpId"
                />
            </div>
            <button type="submit" class="btn btn-success">Agregar</button>
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