<?php 
include("../../bd.php"); 


//MIN 5:47

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
                <label for="nombre" class="form-label">Nombre:</label>
                <input
                    type="text"
                    class="form-control"
                    name="nombre"
                    id="nombre"
                    aria-describedby="helpId"
                    placeholder="nombre"
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
                <label for="instagram" class="form-label">Instagram:</label>
                <input
                    type="text"
                    class="form-control"
                    name="instagram"
                    id="intagram"
                    aria-describedby="helpId"
                    placeholder="instagram"
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