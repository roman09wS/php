<?php include_once("function.php") ;?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pokemones</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <link href="css/styles.css" rel="stylesheet" />

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/jquery-ui.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">


        <link rel="stylesheet" href="css/aos.css">

        <link rel="stylesheet" href="css/style.css">
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><img src="assets/img/navbar-logo.svg" alt="..." /></a>
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
                <div class="masthead-subheading">Bienvenido!</div>
                <div class="masthead-heading text-uppercase">Winder Roman</div>
            </div>
        </header>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Consumiendo una API con PHP</h2>
                    <h3 class="section-subheading text-muted">PokeApi</h3>
                </div>
                <div class="row">
                    <?php
                   
                    $ch = curl_init();
                    for ($i=10; $i <= 30; $i++) { 
                        $url = 'https://pokeapi.co/api/v2/pokemon/'.$i.'';        
                        curl_setopt($ch,CURLOPT_URL,$url);
                        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
                        $response = curl_exec($ch);

                        if (curl_errno($ch)) {
                            $error_msg = curl_error($ch);
                            echo "Error al conectarse a la API";
                        } else {
                            if (isset($_POST['generar'])) {
                        
                                $numInicio = rand(1,807);
                                api($numInicio);
                                
                            }else {
                                curl_close($ch);
                                $pokemon_data = json_decode($response,true); ?>
                                <div class="col-lg-4 col-sm-6 mb-4">
                                    <!-- Portfolio item 1-->
                                    <div class="portfolio-item" data-aos="fade-up">
                                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal<?php echo $i; ?>">
                                            <div class="portfolio-hover">
                                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                            </div>
                                            <img class="img-fluid" src="<?php echo $pokemon_data['sprites']['front_default'];?>" alt="">
                                        </a>
                                        <div class="portfolio-caption">
                                            <div class="portfolio-caption-heading"><?php echo $pokemon_data['name'] ?></div>
                                            <!-- <div class="portfolio-caption-subheading text-muted">Illustration</div> -->
                                        </div>
                                    </div>
                                </div>
                                
                                <!--Modal -->
                                <div class="portfolio-modal-sm modal modal fade" id="portfolioModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            
                                            <div class="container">
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-8">
                                                        <div class="modal-body">
                                                            <h2 class="text-uppercase"><?php echo $pokemon_data['name']?></h2>
                                                            <img class="img-fluid" src="<?php echo $pokemon_data['sprites']['front_default'];?>" alt="">
                                                            <ul>
                                                                <li><strong>Nombre: </strong><?php echo $pokemon_data['name']; ?></li>
                                                                <li><strong>Altura: </strong><?php echo $pokemon_data['height']; ?></li>
                                                                <li><strong>Anchura: </strong><?php echo $pokemon_data['weight']; ?></li>
                                                
                                                                <li><strong>Habilidades: </strong></li>
                                                                <ul>
                                                                    <?php
                                                                    foreach ($pokemon_data['abilities'] as $ability){ ?>
                                                                        <li><?php echo $ability['ability']['name'];?></li>
                                                                    <?php } ?>
                                                                </ul>
                                                            </ul>
                                                            <button class="btn btn-warning btn-xl  text-uppercase" data-bs-dismiss="modal" type="button">
                                                                <i class="fas fa-xmark me-1"></i>
                                                                Close Project
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        }      
                    } ?>
                </div>
            </div>
        </section>
        <!-- About-->
        <form action="" method="post">
            <footer class="footer py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <button class="btn btn-outline-warning" name="generar" onChange="this.form.submit()" type="submit">Generar otros pokemones</button>
                        </div>
                    </div>
                </div>
            </footer>
        </form>
        <!-- Clients-->
        <div class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/microsoft.svg" alt="..." aria-label="Microsoft Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/google.svg" alt="..." aria-label="Google Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/facebook.svg" alt="..." aria-label="Facebook Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/ibm.svg" alt="..." aria-label="IBM Logo" /></a>
                    </div>
                </div>
            </div>
        </div>
  
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-start">Copyright &copy; Your Website 2023</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!">Privacy Policy</a>
                        <a class="link-dark text-decoration-none" href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Portfolio Modals-->
        <!-- Portfolio item 1 modal popup-->
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
                
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/aos.js"></script>

        <script src="js/main.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
