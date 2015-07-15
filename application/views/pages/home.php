<!---------- CONTENT ------- -->	
<div class="content content-home">
    <div class="displayMapSize">
        <div class="divLeTireurTop">
            <svg class="blurpMenuRetour" width="192" height="61" viewBox="0 0 160.7 61.5" >
            <path fill="#FFFFFF" d="M80.3,61.5c0,0,22.1-2.7,43.1-5.4s41-5.4,36.6-5.4c-21.7,0-34.1-12.7-44.9-25.4S95.3,0,80.3,0c-15,0-24.1,12.7-34.9,25.4S22.3,50.8,0.6,50.8c-4.3,0-6.5,0,3.5,1.3S36.2,56.1,80.3,61.5z">
            </path>
            </svg>
            <div class="btn--top_textRetour"> 
                <span class="btn__arrow btn__arrow--top"></span> 
                <span class="btn__arrow btn__arrow--bottom"></span> 
            </div> 
        </div>
    </div>

    <div class="callbacks_container slider_principal">
        <?php if ($voyages) { ?>
            <ul class="rslides" id="slider_top">
                <?php foreach ($voyages as $voyage) { ?>
                    <li>
                        <img src="<?php echo asset_media($voyage->lien); ?>" alt="">
                    </li>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>

    <div class="displayMapSize">
        <div class="map">
            <div id="map-continents">
                <ul class="continents">

                    <?php
                    foreach ($continents as $continent) {
                        if ($continent->tag == "AFRIQUE") {
                            ?>
                            <li class="c1"><a href="<?php echo base_url('/voyage/carnet/voyage?continent=').$continent->id ?>">Afrique</a></li>
                            <?php
                        } else if ($continent->tag == "ASIE") {
                            ?>
                            <li class="c2"><a href="<?php echo base_url('/voyage/carnet/voyage?continent=').$continent->id ?>">Asie</a></li>
                            <?php
                        } else if ($continent->tag == "OCEANIE") {
                            ?>
                            <li class="c3"><a href="<?php echo base_url('/voyage/carnet/voyage?continent=').$continent->id ?>">Océanie</a></li>
                            <?php
                        } else if ($continent->tag == "EUROPE") {
                            ?>
                            <li class="c4"><a href="<?php echo base_url('/voyage/carnet/voyage?continent=').$continent->id ?>">Europe</a></li>
                            <?php
                        } else if ($continent->tag == "AMERIQUE_DU_NORD") {
                            ?>
                            <li class="c5"><a href="<?php echo base_url('/voyage/carnet/voyage?continent=').$continent->id ?>">Amerique du nord</a></li>
                            <?php
                        } else if ($continent->tag == "AMERIQUE_DU_SUD") {
                            ?>
                            <li class="c6"><a href="<?php echo base_url('/voyage/carnet/voyage?continent=').$continent->id ?>">Amerique du sud</a></li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="divLeTireurBottom">
                <svg class="blurpMenu" width="192" height="61" viewBox="0 0 160.7 61.5" >
                <path fill="#FFFFFF" d="M80.3,61.5c0,0,22.1-2.7,43.1-5.4s41-5.4,36.6-5.4c-21.7,0-34.1-12.7-44.9-25.4S95.3,0,80.3,0c-15,0-24.1,12.7-34.9,25.4S22.3,50.8,0.6,50.8c-4.3,0-6.5,0,3.5,1.3S36.2,56.1,80.3,61.5z">
                </path>
                </svg>
                <div class="btn--top_text"> 
                    <span class="btn__arrow btn__arrow--top"></span> 
                    <span class="btn__arrow btn__arrow--bottom"></span> 
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="contenu_home">
        <?php if ($this->session->flashdata('result_newsletter') > 0) { ?>
            <div class="messageAlerteCarnet center">
                <div class="alertType"><div class="alert alert-success fade in limiteMessage">
                        <strong>Succés !</strong> Vous êtes bien inscrit à la newsletter.</div></div>
            </div>
            <br/><br/>
        <?php } ?>
        <div class="voyages">
            <h2>Nos voyages en cours</h2>
            <div class="liste_voyages">
                <?php
                $i = 0;
                foreach ($voyages as $voyage) {
                    $i++;
                    if ($i % 2) {
                        ?>
                        <div class="voyage gauche">

                            <?php
                        } else {
                            echo '<div class="voyage droite">';
                        }
                        ?>

                        <a href="<?php echo base_url('/voyage/fiche/?id=') . $voyage->id; ?>">
                            <div class="bloc_image">
                                <img src="<?php echo base_url(''); ?>media/produit/image_slider/<?php echo $voyage->image; ?>" alt="<?php echo $voyage->image; ?>" title="<?php echo $voyage->image; ?>" />
                            </div>
                            <div class="rotate_description">
                                <div class="bloc_description">
                                    <div class="titre"><?php echo $voyage->titre; ?></div>
                                    <div class="description"><?php echo tronque($voyage->description_first_bloc, 300); ?></div>
                                    <div class="voir_plus">Plus d'info</div>
                                </div>
                            </div>


                        </a>
                    </div>
                <?php } ?>
                <div class="clear"></div>
            </div>
        </div>
        <div class="carnet_voyages">
            <h2>Nos récents carnets</h2>
            <div class="liste_carnet">
                <div id="onglet3" class="contenu_fiche_onglet onglet3mobile">



                    <?php
                    for ($i = 0; $i < count($carnetVoyages); $i++) {
                        if ($i == 0) {
                            carnet_long($carnetVoyages, $i);
                        }
                        if ($i == 1 && (count($carnetVoyages) - 1) == 1) {
                            carnet_long($carnetVoyages, $i);
                        }

                        if ($i > 0 && (count($carnetVoyages) - 1) >= 2) {
                            carnet_court($carnetVoyages, $i);
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="actualites">
            <h2>Nos dernières actualités</h2>
            <div class="liste_actu actualites">
                <div class="actu">
                    <?php
                    if ($actualites) {
                        $i = 1;
                        foreach ($actualites as $actualite) {
                            ?>
                            <div class="uneActu">
                                <div class="titreActu">
                                    <div class="meta">
                                        <span><?php echo $actualite->date; ?></span>
                                    </div>
                                    <div class="titre"><span><?php echo $actualite->titre; ?></span></div>
                                </div>
                                <div class="image">
                                    <ul id="slider<?php echo $i ?>">
                                        <li><?php echo '<img src="' . base_url('') . 'media/actualite/' . $actualite->img1 . '" alt="' . $actualite->img1 . '"'; ?></li>
                                        <?php if ($actualite->img2): ?><li><?php echo '<img src="' . base_url('') . 'media/actualite/' . $actualite->img2 . '" alt="' . $actualite->img2 . '"'; ?></li><?php endif; ?>
                                        <?php if ($actualite->img3): ?><li><?php echo '<img src="' . base_url('') . 'media/actualite/' . $actualite->img3 . '" alt="' . $actualite->img3 . '"'; ?></li><?php endif; ?>
                                    </ul>
                                </div>
                                <script type="text/javascript">
                                    initialiseResponsiveSilide('#slider<?php echo $i ?>');
                                </script>
                                <div class="descriptionActu">
                                    <?php echo $actualite->description; ?>
                                    <div class="reseau">
                                        <ul>
                                            <li class="gplus"><a href="#"></a></li>
                                            <li class="facebook"><a href="#"></a></li>
                                            <li class="twitter"><a href="#"></a></li>
                                            <li class="link"><a href="#"></a></li>
                                            <li class="pinte"><a href="#"></a></li>
                                        </ul>
                                    </div>	
                                </div>
                            </div>
                            <?php
                            $i++;
                        }
                    } else {
                        echo "pas d'actualité";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!---------- CONTENT ------- -->	
