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

    $puesto=$registro['puesto'];
    $twitter=$registro['twitter'];
    $facebook=$registro['facebook'];
    $linkedin=$registro['linkedin'];

}

if ($_POST) {
    
    $imagen=(isset($_FILES["imagen"]["name"]))?$_FILES["imagen"]["name"]:"";
    $titulo=(isset($_POST['titulo']))?$_POST['titulo']:"";
    $puesto=(isset($_POST['puesto']))?$_POST['puesto']:"";
    $twitter=(isset($_POST['twitter']))?$_POST['twitter']:"";
    $facebook=(isset($_POST['facebook']))?$_POST['facebook']:"";
    $linkedin=(isset($_POST['linkedin']))?$_POST['linkedin']:"";


    $sentencia=$conexion->prepare("UPDATE tbl_equipo SET 
    titulo =:titulo , 
    puesto =: puesto, 
    twitter =: twitter, 
    facebook =: facebook, 
    linkedin =: linkedin 
    WHERE ID=:id "); 
    

    //Asignamos los valores que insertemos por la interfaza los valores de la tabla

    // $sentencia->bindParam(":imagen", $nombre_archivo_imagen);
        $sentencia->bindParam(":titulo", $titulo);
        $sentencia->bindParam(":puesto", $puesto);
        $sentencia->bindParam(":twitter", $twitter);
        $sentencia->bindParam(":facebook", $facebook);
        $sentencia->bindParam(":linkedin", $linkedin);
        $sentencia->bindParam(":id", $txtID);
        $imagen=$nombre_archivo_imagen;
        $sentencia->execute();
        

       //Comprobamos si hay imagen
       if($_FILES["imagen"]["tmp_name"]!="") {

        //Cambiamos numero para controlar la actualziacion
        $imagen=(isset($_FILES["imagen"]["name"]))?$_FILES["imagen"]["name"]:"";

        $fecha_imagen=new DateTime();
        $nombre_archivo_imagen = ($imagen != "") ? $fecha_imagen->getTimestamp() . "_" . $imagen : " ";
        
        //Subir imagen
        $tmp_imagen = $_FILES["imagen"]["tmp_name"];

        move_uploaded_file ($tmp_imagen, "../../../assets/img/team/ ".$nombre_archivo_imagen);
        
        //Borrado del archivo anterior
        $sentencia=$conexion->prepare("SELECT imagen FROM tbl_equipo WHERE id=:id ");
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();
        $registro_imagen = $sentencia -> fetch(PDO::FETCH_LAZY);
    
        if (isset($registro_imagen["imagen"])) {
            
            if (file_exists ("../../../assets/img/team/". $registro_imagen["imagen"])){
                unlink("../../../assets/img/team/". $registro_imagen["imagen"]);            
            } 
        } 
        

        //Instrucciión de actualziación de imagen
        $sentencia=$conexion->prepare("UPDATE tbl_equipo 
        SET imagen=:imagen
        WHERE id=:id "); 

        $sentencia->bindParam(":imagen", $nombre_archivo_imagen);
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();


    }
       
    }  
   
?>

<div class="card">
        <div class="card-header">Datos del equipo</div>
        <div class="card-body">
            
            <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">ID:</label>
                <input readonly value="<?php  echo $txtID; ?>"
                    type="text"
                    class="form-control"
                    name="txtID"
                    id="txtID"
                    aria-describedby="helpId"
                    placeholder="ID"
                />
            </div>
            
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