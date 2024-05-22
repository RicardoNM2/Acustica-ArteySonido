<?php
    //Portfolio min 3:45-4:33
    include("admin/bd.php");

    //Selecionar registros de servicios
    $sentencia=$conexion->prepare("SELECT * FROM `tbl_servicios`");
    $sentencia->execute();
    $lista_servicios=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    //Selecionar registros de portafolio
    $sentencia=$conexion->prepare("SELECT * FROM `tbl_portafolio`");
    $sentencia->execute();
    $lista_portfolio=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    //Seleccionar registros entradas
    $sentencia=$conexion->prepare("SELECT * FROM `tbl_entradas`");
    $sentencia->execute();
    $lista_entradas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    //Seleccionar registros equipo
    $sentencia=$conexion->prepare("SELECT * FROM `tbl_equipo`");
    $sentencia->execute();
    $lista_equipo=$sentencia->fetchAll(PDO::FETCH_ASSOC);

     //Seleccionar registros configuracionesz
     $sentencia=$conexion->prepare("SELECT * FROM `tbl_configuraciones`");
     $sentencia->execute();
     $lista_configuraciones=$sentencia->fetchAll(PDO::FETCH_ASSOC);

  

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Acústica Arte y Sonido</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">
                    <h1 style="font-family:courier,arial,helvética;">Artistic Sound</h1>
                <!-- <img src='assets/img/navbar-logo.svg', alt='...'/> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
            <style>
                h3 {
                    color: #B8860B; 
                }
            </style>
                <div class="masthead-subheading"><h3>La importancia del silencio</h3></div>
                <div class="masthead-heading text-uppercase"><?php echo $lista_configuraciones[1]['valor']; ?></div>
                <a class="btn btn-primary btn-xl text-uppercase" href="<?php echo $lista_configuraciones[3]['valor']; ?>"><?php echo $lista_configuraciones[2]['valor']; ?></a>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Servicios</h2>
                    <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[4]['valor']; ?></h3>
                </div>
                <div class="row text-center">

                <?php foreach ($lista_servicios as $registros) { ?>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas <?php echo $registros["icono"];?> fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3"><?php echo $registros["titulo"];?></h4>
                        <p class="text-muted"><?php echo $registros["descripcion"];?></p>
                    </div>
                <?php } ?>

                </div>
            </div>
        </section>

   <!-- Portfolio Grid-->
<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Portfolio</h2>
            <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[5]['valor']; ?></h3>
        </div>
        <div class="row">
            <?php foreach ($lista_portfolio as $registros) { ?>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 1-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal<?php echo $registros['ID']; ?>">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="/website/assets/img/portfolio/<?php echo "%20" . $registros['imagen']; ?>" alt="imagen" />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading"><?php echo $registros['titulo']; ?></div>
                            <div class="portfolio-caption-subheading text-muted"><?php echo $registros['subtitulo']; ?></div>
                        </div>
                    </div>
                </div>
                <!-- Portfolio Modals-->
                <!-- Portfolio item 1 modal popup-->
                <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $registros['ID']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8">
                                        <div class="modal-body">
                                            <!-- Project details-->
                                            <h2 class="text-uppercase"><?php echo $registros['titulo']; ?></h2>
                                            <p class="item-intro text-muted"><?php echo $registros['subtitulo']; ?></p>
                                            <img class="img-fluid" src="/website/assets/img/portfolio/<?php echo "%20" . $registros['imagen']; ?>" alt="imagen" />
                                            <p><?php echo $registros['descripcion']; ?></p>
                                            <ul class="list-inline">
                                                <li>
                                                    <strong>Cliente:</strong>
                                                    <?php echo $registros['cliente']; ?>
                                                </li>
                                                <li>
                                                    <strong>Categoría:</strong>
                                                    <?php echo $registros['categoria']; ?>
                                                </li>
                                                <li>
                                                    <strong>URL:</strong>
                                                    <a href="<?php echo $registros['url']; ?>" target="_blank"><?php echo $registros['url']; ?></a>
                                                </li>
                                            </ul>
                                            <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                                <i class="fas fa-xmark me-1"></i>
                                                Cerrar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>



        

        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Sobre nosotros</h2>
                    <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[6]['valor']; ?></h3>
                </div>
                <ul class="timeline">
                    
                <?php 
                $contador=1;
                foreach ($lista_entradas as $registros) { ?>
                    <li <?php echo (($contador%2)==0)? 'class="timeline-inverted"' : ""?>>
                        <div class="timeline-image">
                        <img class="rounded-circle img-fluid" src="/website/assets/img/about/<?php echo "%20" . $registros["imagen"];?>" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4><?php echo $registros["fecha"];?></h4>
                                <h4 class="subheading"><?php echo $registros["titulo"];?></h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted"><?php echo $registros["descripcion"];?></p></div>
                        </div>
                    </li>
                <?php
                $contador ++;
                } ?>    

                    <!-- <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>March 2011</h4>
                                <h4 class="subheading">An Agency is Born</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/3.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>December 2015</h4>
                                <h4 class="subheading">Transition to Full Service</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/4.jpg" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4>July 2020</h4>
                                <h4 class="subheading">Phase Two Expansion</h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                        </div>
                    </li> -->
                    
                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                                Forma 
                                <br />
                                Parte 
                                <br />
                                Del Cambio 
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>


        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Nuestro equipo</h2>
                    <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[8]['valor']; ?></h3>
                </div>
                <div class="row">
                    <?php 
                foreach ($lista_equipo as $registros) { ?>
                    <div class="col-lg-4">
                        <div class="team-member">
                            
                            <img class="mx-auto rounded-circle" src="/website/assets/img/team/<?php echo $registros['imagen']; ?>" alt="..." />
                            <h4><?php echo $registros['titulo']; ?></h4>
                            <p class="text-muted"><?php echo $registros['puesto']; ?></p>
                            <a class="btn btn-dark btn-social mx-2" href="<?php echo $registros['twitter']; ?>" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="<?php echo $registros['facebook']; ?>" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="<?php echo $registros['linkedin']; ?>" aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <?php } ?>

                </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"></p></div>
                </div>
            </div>
        </section>

        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contacto</h2>
                    <h3 class="section-subheading text-muted">el camino empieza aquí</h3>
                </div>
                <!-- * * * * * * * * * * * * * * *-->
                <!-- * * SB Forms Contact Form * *-->
                <!-- * * * * * * * * * * * * * * *-->
                <!-- This form is pre-integrated with SB Forms.-->
                <!-- To make this form functional, sign up at-->
                <!-- https://startbootstrap.com/solution/contact-forms-->
                <!-- to get an API token!-->
                <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- Name input-->
                                <input class="form-control" id="name" type="text" placeholder="Nombre" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="name:required">Nombre requerido</div>
                            </div>
                            <div class="form-group">
                                <!-- Email address input-->
                                <input class="form-control" id="email" type="email" placeholder="Correo" data-sb-validations="required,email" />
                                <div class="invalid-feedback" data-sb-feedback="email:required">Correo requerido</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Correo no valido</div>
                            </div>
                            <div class="form-group mb-md-0">
                                <!-- Phone number input-->
                                <input class="form-control" id="phone" type="tel" placeholder="Teléfono" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="phone:required">Número de teléfono requerido</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <!-- Message input-->
                                <textarea class="form-control" id="message" placeholder="Tu mensaje..." data-sb-validations="required"></textarea>
                                <div class="invalid-feedback" data-sb-feedback="message:required">Mensaje requerido</div>
                            </div>
                        </div>
                    </div>
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center text-white mb-3">
                            <div class="fw-bolder">Mensaje enviado con éxito!</div>
                            <br />
                            <a href="ricardonm2000@gmail.com"></a>
                        </div>
                    </div>
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error de envio de mensaje</div></div>
                    <!-- Submit Button-->
                    <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">Enviar</button></div>
                </form>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">2024 - Arte y Sonido. Todos los Derechos Reservados</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href=""><strong> Plaza el Campillo, 8 21002 <br>
                        Huelva, España</strong></a>
                    </div>
                </div>
            </div>
        </footer>
     
    
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
