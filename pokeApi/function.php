<?php
define('ch', curl_init());

function connection($id_poke) {
    $url = 'https://pokeapi.co/api/v2/pokemon/'.$id_poke.'';        
    curl_setopt(ch,CURLOPT_URL,$url);
    curl_setopt(ch,CURLOPT_RETURNTRANSFER,true);
    $response = curl_exec(ch);
    return $response;
}

function api($ini) {
    $fin = $ini + 30;
    for ($i=$ini; $i < $fin; $i++) {
            $response = connection($i);          
            curl_close(ch);
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
                                            Cerrar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
        }
}
?>