<?php 
    include("../../bd.php"); 

    
   //Seleccionar registros
   $sentencia=$conexion->prepare("SELECT * FROM `tbl_equipo`");
   $sentencia->execute();
   $lista_entradas=$sentencia->fetchAll(PDO::FETCH_ASSOC);


    

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
            class="table table"
        >
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">NombreCompleto</th>
                    <th scope="col">Puesto</th>
                    <th scope="col">Twitter</th>
                    <th scope="col">Linkedin</th>


                </tr>
            </thead>
            <tbody>
                <tr class="">
                    <td>1</td>
                    <td>imagen.jpg</td>
                    <td>Carlos</td>
                    <td>CEO</td>
                    <td>CarlosNM</td>
                    <td>CarlosNM</td>
                    <td>CarlosNM</td>
                    <td>
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
                        
                    </td>




                </tr>
            </tbody>
        </table>
    </div>
          
        </div>
    </div>
    
  
    

    
<?php include("../../templates/footer.php"); ?>