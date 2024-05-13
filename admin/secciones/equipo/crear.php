<?php 
include("../../bd.php"); 

if($_POST) {

        //Recepcionaos los valores de las entradas
        $imagen=(isset($_FILES["imagen"]["name"]))?$_FILES["imagen"]["name"]:"";
        $titulo=(isset($_POST['titulo']))?$_POST['titulo']:"";
        $puesto=(isset($_POST['puesto']))?$_POST['puesto']:"";

        $twitter=(isset($_POST['twitter']))?$_POST['twitter']:"";
        $facebook=(isset($_POST['facebook']))?$_POST['facebook']:"";
        $linkedin=(isset($_POST['linkedin']))?$_POST['linkedin']:"";


        //Actualizamos imagen
        $fecha_imagen=new DateTime();
        $nombre_archivo_imagen = ($imagen != "") ? $fecha_imagen->getTimestamp() . "_" . $imagen : " ";
        $tmp_imagen = $_FILES["imagen"]["tmp_name"];
    
        if ($tmp_imagen != " ") {
            move_uploaded_file ($tmp_imagen, "../../../assets/img/team/ ".$nombre_archivo_imagen);
        }

        include("../../bd.php"); 
        //Sentencia para insertar los datos
        $sentencia=$conexion->prepare("INSERT INTO `tbl_equipo` 
        (`ID`, `imagen`, `titulo`, `puesto`, `twitter`, `facebook`,`linkedin`) 
        VALUES (NULL, :imagen, :titulo, :puesto, :twitter, :facebook, :linkedin);");
        
        $sentencia->bindParam(":imagen", $nombre_archivo_imagen);

        $sentencia->bindParam(":titulo", $titulo);
        $sentencia->bindParam(":puesto", $puesto);
        $sentencia->bindParam(":twitter", $twitter);
        $sentencia->bindParam(":facebook", $facebook);
        $sentencia->bindParam(":linkedin", $linkedin);
        $sentencia->execute();
  

     
}
include("../../templates/header.php"); ?>




    <div class="card">
        <div class="card-header">Datos del equipo</div>
        <div class="card-body">
            
            <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
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
                <input
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
                <input
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
                <input
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
                <input
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
                <input
                    type="text"
                    class="form-control"
                    name="linkedin"
                    id="linkedin"
                    aria-describedby="helpId"
                    placeholder="linkedin"
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