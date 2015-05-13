<!---------- CONTENT ---------->	
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZo93gQX7j_kr0Bn3oqfwfIIPCQLAKhuI"></script>
<script type="text/javascript" src ="<?php echo asset_url(''); ?>librairie/js/fancybox/jquery.fancybox.js?v=2.1.5"></script>
<link href="<?php echo asset_url(''); ?>librairie/css/fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" rel="stylesheet"/>
<script type="text/javascript">
//<?php echo $voyage[0]->lattitude; ?>, lng: <?php echo $voyage[0]->longitude; ?>},

function initialize() {
var myLatlng = new google.maps.LatLng(<?php echo $voyage[0]->lattitude; ?>, <?php echo $voyage[0]->longitude; ?>);
  var mapOptions = {
    zoom: 8,
    scrollwheel: false,
    disableDoubleClickZoom: true,
    center: myLatlng,
  };
  map = new google.maps.Map(document.getElementById('carte'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Hello World!'
  });
}


</script>
<div class="fiche_produit">		
    <!-- Slideshow 4 -->
    <div class="callbacks_container slider_principal">
        <ul class="rslides" id="slider_top">
            <li>
                <img src="<?php echo base_url(''); ?>media/produit/image_slider/<?php echo $voyage[0]->image_slider_1; ?>" alt="<?php echo $voyage[0]->image_slider_1; ?>">
            </li>
            <li>
                <img src="<?php echo base_url(''); ?>media/produit/image_slider/<?php echo $voyage[0]->image_slider_2; ?>" alt="<?php echo $voyage[0]->image_slider_2; ?>">
            </li>
            <li>
                <img src="<?php echo base_url(''); ?>media/produit/image_slider/<?php echo $voyage[0]->image_slider_3; ?>" alt="<?php echo $voyage[0]->image_slider_3; ?>">
            </li>
        </ul>
        <!-- caption desktop -->
        <div class="caption">
            <h1><?php echo $voyage[0]->titre; ?></h1>
            <h2><?php echo $voyage[0]->phrase_accroche; ?></h2>
        </div>
        <!-- fin caption desktop -->
    </div>

    <div style="clear:both"></div>

    <div class="fil_arianne_conteneur">
        <div class="fil_arianne">
            <ul class="breadcrumbs">
                <li class="acceuil"><a href="/">Acceuil</a></li>
                <li><a href="/">Voyages</a></li>
                <li class="last">Au coeur du Chili</li>
            </ul>
        </div>
    </div>

    <!-- caption mobile -->
    <h1 class="caption_titre_mobile"><span><?php echo $voyage[0]->titre; ?></span></h1>
    <h2 class="caption_mobile"><span><?php echo $voyage[0]->phrase_accroche; ?></span></h2>
    <!-- fin caption mobile -->

    <div class="contain_top_bloc">
        <div class="top_bloc">
            <!-- bloc achat -->
            <div class="image_fond"><img src="<?php echo base_url(''); ?>media/produit/image_sous_slider/<?php echo $voyage[0]->image_sous_slider; ?>" alt="<?php echo $voyage[0]->image_sous_slider; ?>"></div>
            <div class="bloc_achat">
                <form action="#">
                    <div class="nom_pays"><?php echo $voyage[0]->titre; ?></div>
                    <div class="trait_sous_titre"></div>
                    <div class="info_prix">
                        <div class="info">
                            <span class="titre">Durée</span>
                            <span class="valeur"><?php echo $voyage[0]->duree; ?> jours</span>
                        </div>
                        <div class="prix">
                            <span class="titre">à partir de</span>
                            <span class="valeur"><?php echo $voyageInfo[0]->prix; ?> €</span>
                        </div>
                    </div>
                    <div class="info_prix">
                        <div class="place_dispo">
                            <span class="titre">Place disponible</span>
                            <span class="valeur"><?php echo $voyageInfo[0]->place_dispo; ?></span>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    Vous avez choisi les dates suivantes : <br/>
                    Départ le <?php echo $voyageInfo[0]->date_depart; ?> à <?php echo $voyageInfo[0]->depart; ?>.<br/>
                    Retour le <?php echo $voyageInfo[0]->date_arrivee; ?> à <?php echo $voyageInfo[0]->arrivee; ?>
                    

                    <input type="hidden" name="id" value="<?php echo $voyage[0]->id; ?>">
                    <input type="hidden" name="id" value="<?php echo $voyageInfo[0]->id; ?>">

                    <button id="embarque" class="borange bbillet" type="submit">J'embarque</button>
                    <button id="embarque" class="borange bbillet" type="submit">J'embarque</button>
                    <div style="clear:both"></div>

                </form>
                <div style="clear:both"></div>
            </div>
            <!-- fin bloc achat -->
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>

    <div class="onglet_fiche">
        <div class="onglet_fiche_inner">
            <!-- onglet vu desktop -->
            <div id="onglet1" class="onglet onglet1 active"><a href="#">Description voyage</a></div>
            <div id="onglet2" class="onglet onglet2"><a href="#">Carte</a></div>
            <div id="onglet3" class="onglet onglet3"><a href="#">Carnet de voyage</a></div>
            <div id="onglet4" class="onglet onglet4"><a href="#">Déroulement</a></div>	
            <!-- fin onglet vu desktop -->
        </div>
    </div>

    <div class="contenu_onglet">
        <div id="onglet1mobile" class="onglet_mobile active"><a href="#">Description voyage</a></div>
        <div id="onglet1" class="contenu_fiche_onglet onglet1mobile active">
            <!-- contenu description -->

            <div class="text">
                <p><?php echo $voyage[0]->description_first_bloc; ?> </p>
            </div>

            <div class="info_pratique">
                <div class="inner">
                    <div class="left">
                        <!-- tableau d'info pays -->
                        <div class="table_info">
                            <div class="une_ligne">
                                <div class="gauche"><span class="tgauche">Drapeau</span><span class="tdroit"><img src="<?php echo base_url(''); ?>media/produit/drapeau/<?php echo $voyage[0]->drapeau; ?>" alt="<?php echo $voyage[0]->drapeau; ?>"></span></div>
                                 <?php
                                    $date = new DateTime(null, new DateTimeZone('America/Santiago'));
                                ?>
                                <div class="droit"><span class="tgauche">Heure locale</span><span class="tdroit"><?php echo str_replace(':','h',$date->format('H:i')); ?></span></div>
                                <div class="clear"></div>
                            </div>
                            <div class="une_ligne">
                                <div class="gauche"><span class="tgauche">Capital</span><span class="tdroit"><?php echo $voyage[0]->capital; ?></span></div>
                                <div class="droit"><span class="tgauche">Météo</span><span class="tdroit"><?php echo $voyage[0]->meteo_temperature; ?>°C</span></div>
                                <div class="clear"></div>
                            </div>
                            <div class="une_ligne">
                                <?php   $this->load->model('voyage'); 
                                        $result = $this->voyage->getContinent($voyage[0]->continent);
                                ?>
                                <div class="gauche"><span class="tgauche">Continent</span><span class="tdroit"><?php echo $result[0]->name; ?></span></div>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <!-- fin tableau d'info pays -->
                    </div>
                    <div class="right">
                        <div class="separation"></div>
                        <div class="picto">
                            <ul>
                                <li><img src="<?php echo base_url(''); ?>media/produit/picto/<?php echo $voyage[0]->picto_1; ?>" alt="<?php echo $voyage[0]->picto_1; ?>"></li>
                                <li><img src="<?php echo base_url(''); ?>media/produit/picto/<?php echo $voyage[0]->picto_2; ?>" alt="<?php echo $voyage[0]->picto_2; ?>"></li>
                                <li><img src="<?php echo base_url(''); ?>media/produit/picto/<?php echo $voyage[0]->picto_3; ?>" alt="<?php echo $voyage[0]->picto_3; ?>"></li>
                                <li><img src="<?php echo base_url(''); ?>media/produit/picto/<?php echo $voyage[0]->picto_4; ?>" alt="<?php echo $voyage[0]->picto_4; ?>"></li>
                                <li><img src="<?php echo base_url(''); ?>media/produit/picto/<?php echo $voyage[0]->picto_5; ?>" alt="<?php echo $voyage[0]->picto_5; ?>"></li>
                                <li class="last"><img src="<?php echo base_url(''); ?>media/produit/picto/<?php echo $voyage[0]->picto_6; ?>" alt="<?php echo $voyage[0]->picto_6; ?>"></li>
                            </ul>
                        </div>
                        <div class="information_medicale">

                        </div>
                    </div>
                    <div class="sous_info">
                        <div class="sous_info_left">
                            <p><span>Villes principales :</span><?php echo $voyage[0]->villes_principales; ?></li>
                            <p><span>Religion :</span><?php echo $voyage[0]->religion; ?></p>
                            <p><span>Nombre d'habitants :</span><?php echo $voyage[0]->nombre_habitant; ?></p>
                        </div>
                        <div class="sous_info_right">
                            <p><span>Monnaie :</span> <?php echo $voyage[0]->monnaie; ?></p>
                            <p><span>Fête :</span><?php echo $voyage[0]->fete; ?></p>
                            <p><span>Langue officielle :</span> <?php echo $voyage[0]->langue_officielle; ?></p>
                        </div>
                    </div>                   
                    <div class="clear"></div>
                </div>
            </div>

            <div class="text">
                <?php echo $voyage[0]->description_second_bloc; ?>            
            </div>


            <div class="ligne_image">
                <div class="img img1"><img src="<?php echo base_url(''); ?>media/produit/banniere/<?php echo $voyage[0]->image_baniere_1; ?>" alt="<?php echo $voyage[0]->image_baniere_1; ?>"></div>
                <div class="img img2"><img src="<?php echo base_url(''); ?>media/produit/banniere/<?php echo $voyage[0]->image_baniere_2; ?>" alt="<?php echo $voyage[0]->image_baniere_2; ?>"></div>
                <div class="separation_image"></div>
                <div class="img img3"><img src="<?php echo base_url(''); ?>media/produit/banniere/<?php echo $voyage[0]->image_baniere_3; ?>" alt="<?php echo $voyage[0]->image_baniere_3; ?>"></div>
                <div class="img img4"><img src="<?php echo base_url(''); ?>media/produit/banniere/<?php echo $voyage[0]->image_baniere_4; ?>" alt="<?php echo $voyage[0]->image_baniere_4; ?>"></div>
                <div class="clear"></div>
            </div>

            <div class="text">
            <p><?php echo $voyage[0]->description_third_bloc; ?></p>
            </div>

            <div id="jcl-demo">
                <div class="custom-container widget">
                    <div class="mid">
                        <img class="zoom" src="<?php echo base_url(''); ?>media/produit/image_description/<?php echo $voyage[0]->image_description_1; ?>" alt="<?php echo $voyage[0]->image_description_1; ?>">
                    </div>
                    <div class="carousel">  
                        <ul>
                            <li class="miniature"><img src="<?php echo base_url(''); ?>media/produit/image_description/<?php echo $voyage[0]->image_description_1; ?>" alt="<?php echo $voyage[0]->image_description_1; ?>"></li>
                            <li class="miniature"><img src="<?php echo base_url(''); ?>media/produit/image_description/<?php echo $voyage[0]->image_description_2; ?>" alt="<?php echo $voyage[0]->image_description_2; ?>"></li>
                            <li class="miniature last"><img src="<?php echo base_url(''); ?>media/produit/image_description/<?php echo $voyage[0]->image_description_3; ?>" alt="<?php echo $voyage[0]->image_description_3; ?>"></li>
                            <li class="miniature"><img src="<?php echo base_url(''); ?>media/produit/image_description/<?php echo $voyage[0]->image_description_4; ?>" alt="<?php echo $voyage[0]->image_description_4; ?>"></li>
                            <li class="miniature"><img src="<?php echo base_url(''); ?>media/produit/image_description/<?php echo $voyage[0]->image_description_5; ?>" alt="<?php echo $voyage[0]->image_description_5; ?>"></li>
                            <li class="miniature last"><img src="<?php echo base_url(''); ?>media/produit/image_description/<?php echo $voyage[0]->image_description_6; ?>" alt="<?php echo $voyage[0]->image_description_6; ?>"></li>
                        </ul> 
                    </div>                        
                    <div class="clear"></div>
                </div>


                <script type="text/javascript">
                    $(function() {
                        $(".widget img").click(function() {
                            $(".widget .mid img").attr("src", $(this).attr("src"));
                        })
                    });
                </script>
            </div>
            <!-- fin contenu description -->
            <div class="clear"></div>
        </div>
        <div id="onglet2mobile" class="onglet_mobile"><a href="#">Carte</a></div>
        <div id="onglet2" class="contenu_fiche_onglet onglet2mobile"><div id="carte"></div></div>
        <div id="onglet3mobile" class="onglet_mobile"><a href="#">Les carnets de voyage</a></div>
        <div id="onglet3" class="contenu_fiche_onglet onglet3mobile">
        <!-- contenu carnet de voyage -->
            <div class="article_first">
                <div class="image">
                    <div class="callbacks_container carnet">
                        <a href="#">
                            <ul class="rslides" id="slidercarnet1">
                                <li>
                                    <img src="<?php echo asset_url(''); ?>images/ficheproduit/carnet/tribut.jpg" alt="">
                                </li>
                                <li>
                                    <img src="<?php echo asset_url(''); ?>images/ficheproduit/carnet/tribut2.jpg" alt="">
                                </li>
                            </ul>
                        </a>
                    </div>
                    <a class="slide_carnet1 fancybox.ajax zoom" href="<?php echo asset_url(''); ?>../fancybox/popup_carnet.php"></a>
                    <div style="clear:both"></div>
                    <script type="text/javascript">
                        $(".slide_carnet1").fancybox({
                            maxWidth: 1000,
                            maxHeight: 600,
                            fitToView: false,
                            width: '80%',
                            height: '80%',
                            autoSize: false,
                            closeClick: false,
                            openEffect: 'none',
                            closeEffect: 'none',
                            ajax: {
                                type: "POST",
                                cache: false,
                                data: "var=1|<?php echo asset_url(''); ?>",
                                success: function (data) {
                                    $.fancybox(data);
                                }
                            }
                        });
                    </script>
                </div>
                <div class="partie_droite">
                    <a  href="#" class="titre">Deux semaines au Chili</a>
                    <div class="date_auteur">Thomas l'aventurier - 22 / 03 / 2015</div>
                    <div class="texte">Le mois de Mai dernier, je m’envollais pour deux semaines au Chili, venez dècouvrir ce que le Chili vous reserves et envolez vous avec lagrandecouverte.com au coeur de se pays ...</div>
                    <a href="#" class="lire_suite">Voir le carnet ></a>
                </div>
            </div>

            <div class="separateur_article"></div>

            <div class="contenu_article_suivant">

                <!-- un article -->
                <div class="un_article left">
                    <div class="callbacks_container carnet">
                        <a href="#">
                            <ul class="rslides" id="slidercarnet2">
                                <li>
                                    <img src="<?php echo asset_url(''); ?>images/ficheproduit/carnet/tribut.jpg" alt="">
                                </li>
                                <li>
                                    <img src="<?php echo asset_url(''); ?>images/ficheproduit/carnet/tribut2.jpg" alt="">
                                </li>
                            </ul>
                        </a>
                    </div>
                    <div style="clear:both"></div>
                    <div class="date_auteur"><span>Thomas l'aventurier - 22 / 03 / 2015</span></div>
                    <a class="titre">Deux semaines au Chili</a>
                    <div class="texte">Le mois de Mai dernier, je m’envollais pour deux semaines au Chili, venez dècouvrir ce que le Chili vous reserves et envolez vous avec lagrandecouverte.com au coeur de se pays ...</div>
                    <a href="#" class="lire_suite">Voir le carnet ></a>
                    <script type="text/javascript">initialiseResponsiveSilide('#slidercarnet2');</script>
                </div>
                <!-- fin un article -->

                <!-- un article -->
                <div class="un_article">
                    <div class="callbacks_container carnet">
                        <a href="#">
                            <ul class="rslides" id="slidercarnet3">
                                <li>
                                    <img src="<?php echo asset_url(''); ?>images/ficheproduit/carnet/tribut.jpg" alt="">
                                </li>
                                <li>
                                    <img src="<?php echo asset_url(''); ?>images/ficheproduit/carnet/tribut2.jpg" alt="">
                                </li>
                            </ul>
                        </a>
                    </div>
                    <div style="clear:both"></div>
                    <div class="date_auteur"><span>Thomas l'aventurier - 22 / 03 / 2015</span></div>
                    <a  href="#" class="titre">Deux semaines au Chili</a>
                    <div class="texte">Le mois de Mai dernier, je m’envollais pour deux semaines au Chili, venez dècouvrir ce que le Chili vous reserves et envolez vous avec lagrandecouverte.com au coeur de se pays ...</div>
                    <a href="#" class="lire_suite">Voir le carnet ></a>
                    <script type="text/javascript">initialiseResponsiveSilide('#slidercarnet3');</script>
                </div>
                <!-- fin un article -->

                <div style="clear:both"></div>

                <!-- un article -->
                <div class="un_article left">
                    <div class="callbacks_container carnet">
                        <a href="#">
                            <ul class="rslides" id="slidercarnet4">
                                <li>
                                    <img src="<?php echo asset_url(''); ?>images/ficheproduit/carnet/tribut.jpg" alt="">
                                </li>
                                <li>
                                    <img src="<?php echo asset_url(''); ?>images/ficheproduit/carnet/tribut2.jpg" alt="">
                                </li>
                            </ul>
                        </a>
                    </div>
                    <div style="clear:both"></div>
                    <div class="date_auteur"><span>Thomas l'aventurier - 22 / 03 / 2015</span></div>
                    <a href="#" class="titre">Deux semaines au Chili</a>
                    <div class="texte">Le mois de Mai dernier, je m’envollais pour deux semaines au Chili, venez dècouvrir ce que le Chili vous reserves et envolez vous avec lagrandecouverte.com au coeur de se pays ...</div>
                    <a href="#" class="lire_suite">Voir le carnet ></a>
                    <script type="text/javascript">initialiseResponsiveSilide('#slidercarnet4');</script>
                </div>
                <!-- fin un article -->

                <div style="clear:both"></div>
            </div>
        <!-- fin contenu carnet de voyage -->	
        </div>
        <div id="onglet4mobile" class="onglet_mobile"><a href="#">Déroulement</a></div>
        <div id="onglet4" class="contenu_fiche_onglet onglet4mobile">
            <div class="contenu">
                <div class="blue_line"></div>

                <!-- 1 jour -->
                <div class="jour_container">
                    <div class="day_counter">
                        <div class="pointRouge"></div><div class="day">Jour 1</div>                       
                    </div>
                    <div class="day_container">
                        <div class="fleche_jour"></div>
                        <div class="description_container">
                            <div class="image">
                                <img src="<?php echo asset_url(''); ?>images/ficheproduit/deroulement/imagen_unidad_2.jpg" alt="">
                            </div>
                            <div class="texte">
                                <div class="titre">Vol domestique Santiago - Calama et transfert en voiture vers votre lodge.</div>
                                <div class="text">Alto Atacama propose un large éventail d'activités au choix : Excursions en voiture, à pied ou en VTT vers les splendeurs de l’Atacama : lacs de haute montagne, Andes, geysers del Tatio, visites de villages, déserts de sel, randonnées, ascensions de volcans, … avec des guides expérimentés connaissant les moindres recoins de la région.
                    Le soir, l'observation des étoiles y est incroyable !</div>
                            </div>
                        </div>
                        <div style="clear:both"></div>
                    </div>
                </div>
                <!-- fin 1 jour -->

                <!-- 1 jour -->
                <div class="jour_container">
                    <div class="day_counter">
                        <div class="pointRouge"></div><div class="day">Jour 2</div>                       
                    </div>
                    <div class="day_container">
                        <div class="fleche_jour"></div>
                        <div class="description_container">
                            <div class="texte no-image">
                                <div class="titre">Vol domestique Santiago - Calama et transfert en voiture vers votre lodge.</div>
                                <div class="text">Alto Atacama propose un large éventail d'activités au choix : Excursions en voiture, à pied ou en VTT vers les splendeurs de l’Atacama : lacs de haute montagne, Andes, geysers del Tatio, visites de villages, déserts de sel, randonnées, ascensions de volcans, … avec des guides expérimentés connaissant les moindres recoins de la région.
                    Le soir, l'observation des étoiles y est incroyable !</div>
                            </div>
                        </div>
                        <div style="clear:both"></div>
                    </div>
                </div>
                <!-- fin 1 jour -->

                <!-- 1 jour -->
                <div class="jour_container">
                    <div class="day_counter">
                        <div class="pointRouge"></div><div class="day">Jour 3</div>                       
                    </div>
                    <div class="day_container">
                        <div class="fleche_jour"></div>
                        <div class="description_container">
                            <div class="image">
                                <img src="<?php echo asset_url(''); ?>images/ficheproduit/deroulement/imagen_unidad_2.jpg" alt="">
                            </div>
                            <div class="texte">
                                <div class="titre">Vol domestique Santiago - Calama et transfert en voiture vers votre lodge.</div>
                                <div class="text">Alto Atacama propose un large éventail d'activités au choix : Excursions en voiture, à pied ou en VTT vers les splendeurs de l’Atacama : lacs de haute montagne, Andes, geysers del Tatio, visites de villages, déserts de sel, randonnées, ascensions de volcans, … avec des guides expérimentés connaissant les moindres recoins de la région.
                    Le soir, l'observation des étoiles y est incroyable !</div>
                            </div>
                        </div>
                        <div style="clear:both"></div>
                    </div>
                </div>
                <!-- fin 1 jour -->
            </div>
        </div>
    </div>	
    <br>
</div>

