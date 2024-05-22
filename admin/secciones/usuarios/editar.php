<?php 
include("../../bd.php"); 
include("../../templates/header.php"); 

if (isset($_GET['txtID'])) {
    //Editar registro segun id

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']: "";

    $sentencia=$conexion->prepare(" SELECT * FROM tbl_usuarios WHERE id=:id ");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

    $usuario= $registro['usuario'];
    $correo= $registro['correo'];
    $password= $registro['password'];

}

if($_POST) {
    
    //recogemos informacion, aañadimos txtID para recoger la informacion
    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $usuario=(isset($_POST['usuario']))?$_POST['usuario']:"";
    $correo=(isset($_POST['correo']))?$_POST['correo']:"";
    $password=(isset($_POST['password']))?$_POST['password']:"";

    //Instrucciión de actualziación
    $sentencia=$conexion->prepare("UPDATE tbl_usuarios 
    SET 
    usuario=:usuario, 
    correo=:correo, 
    password=:password
    WHERE id=:id "); 
    

    //Asignamos los valores que insertemos por la interfaza los valores de la tabla
    $sentencia->bindParam(":usuario", $usuario);
    $sentencia->bindParam(":correo", $correo);
    $sentencia->bindParam(":password", $password);
    $sentencia->bindParam(":id", $txtID);

    $sentencia->execute();
    $mensaje="Registro modificado con exito";
    header("Location:index.php?mensaje=".$mensaje);
}

?>

<div class="card">
    <div class="card-header">Usuario</div>
    <div class="card-body">
        <form action="" method="post">
            <div class="mb-3">
                <label for="txtID" class="form-label">ID</label>
                <input readonly value="<?php echo $txtID; ?>"
                    type="text"
                    class="form-control"
                    name="txtID"
                    id="txtID"
                    aria-describedby="helpId"
                    placeholder=""
                />
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">Nombre del usuario:</label>
                <input value="<?php echo $usuario; ?>"
                    type="text"
                    class="form-control"
                    name="usuario"
                    id="usuario"
                    aria-describedby="helpId"
                    placeholder="Nombre del usuario"
                />
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Contraseña:</label>
                <input value="<?php echo $password; ?>"
                    type="password"
                    class="form-control"
                    name="password"
                    id="password"
                    aria-describedby="helpId"
                    placeholder="Contraseña"
                />
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">Correo:</label>
                <input value="<?php echo $correo; ?>"
                    type="email"
                    class="form-control"
                    name="correo"
                    id="correo"
                    aria-describedby="helpId"
                    placeholder="Correo"
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
    <div class="card-footer text-muted">

    </div>
</div>


<?php include("../../templates/footer.php"); ?>