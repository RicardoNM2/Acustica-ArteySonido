<?php 
include("../../bd.php"); 
if($_POST) {

    //recogemos los valores del formulario por metodo POST
    $icono=(isset($_POST['icono']))?$_POST['icono']:"";
    $titulo=(isset($_POST['titulo']))?$_POST['titulo']:"";
    $descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";

    $sentencia=$conexion->prepare("INSERT INTO `tbl_servicios` (`ID`, `icono`, `titulo`, `descripcion`) 
    VALUES(NULL, :icono, :titulo, :descripcion);");

    //Asignamos los valores que insertemos por la interfaza los valores de la tabla
    $sentencia->bindParam(":icono", $icono);
    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":descripcion", $descripcion);

    $sentencia->execute();
    $mensaje="Registro agregado con exito";
    header("Location:index.php?mensaje=".$mensaje);
    
}
 
//Incluimos el header
include("../../templates/header.php"); ?>

    <!-- Añadimos los input y botones para crear servicios -->
    <div class="card">
        <div class="card-header">Crear servicios</div>

        <div class="card-body"> 
         <form action="" enctype="multipart/form-data" method="post">
                
            <div class="mb-3">
                <label for="icono" class="form-label">Icono:</label>
                <input
                    type="text"
                    class="form-control"
                    name="icono"
                    id="icono"
                    aria-describedby="helpId"
                    placeholder="icono"
                />
            </div>
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input
                    type="text"
                    class="form-control"
                    name="titulo"
                    id="titulo"
                    aria-describedby="helpId"
                    placeholder="titulo"
                />
            
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <input
                    type="text"
                    class="form-control"
                    name="descripcion"
                    id="descripcicion"
                    aria-describedby="helpId"
                    placeholder="Descripción"
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

    </div>
    
    
<?php include("../../templates/footer.php"); ?>