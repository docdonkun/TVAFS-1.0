<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Voyages extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('carnetVoyage');
        $this->load->model('Voyage');
        $this->load->model('article');

        $this->load->library('pagination');

        $this->load->model('user');
        $this->load->model('images');
        $this->load->model('continents');
    }

    public function index() {
        $continent = $this->input->get('continent');

        $perPage = 8;   //nombres d'articles par page
        $page = 0;  //numero de page

        if ($continent) {
            //si un continent a été passé en paramètre, j'affiche tous les voyages du continent choisi
            $data['voyages'] = $this->Voyage->getVoyagesByContinent($continent);

            if ($data['voyages'] != false) {
                //si il y a bien des voyages pour ce continent, je récupère le nom du continent.
                $this->continents->setId($continent);
                $data['nomContinent'] = $this->continents->getNomContinent();
            } else {
                //sinon, j'affiche tous les voyages
                $data['voyages'] = $this->Voyage->getAllVoyages($perPage, $page);

                //et je signal qu'il n'y a pas de voyages pour le continent choisi
                $data['erreur'] = "Il n'y a aucun voyages pour le continent sélectionné. Voici la liste des voyages :";
            }
        } else {
            //sinon j'affiche tous les voyages du continent sélectionné, avec une pagination
            $data['voyages'] = $this->Voyage->getAllVoyages($perPage, $page);
        }

        $config['base_url'] = base_url() . "voyage/index/voyage";
        $config['total_rows'] = $this->Voyage->getRowAllVoyages();
        $config['per_page'] = $perPage;
        $config["uri_segment"] = 4;

        // génération des css et js
        $data["allCss"] = array("voyage");
        $data["alljs"] = array("voyage", "slide", "ajaxPaginate");

        $this->pagination->initialize($config);

        //appel du template
        $data["titre"] = "Liste voyages";
        $this->load->templateVoyage('/voyage', $data);
    }

    function addInList() {
        $pagePost = $this->input->post('page');
        if (!isset($pagePost) && empty($pagePost)) {
            echo "0";
            return;
        }
        $perPage = 8;   //nombres d'articles par page
        $page = $pagePost * $perPage;  //numero de page
        $voyages = $this->Voyage->getAllVoyages($perPage, $page);
        if ($voyages) {
            $i = 0;
            foreach ($voyages as $voyage) {
                if (($i % 2) == 0) {
                    $right = "right";
                }else{
                    $right = "";
                }
                $json["id"][$i] = $voyage->vId;
                $json["header"][$i] = '<li class="listElement-'. $voyage->vId.' voyage  '. $right .'" style="display:none;"></li>' ;
                $json["content"][$i] = '<div class="bloc_image">' .
                        '<a href="' . base_url('/voyage/fiche/?id=') . $voyage->vId . '">' .
                        '<img src="' . base_url('') . 'media/' . $voyage->lien . '" alt="' . $voyage->nom . '" title="' . $voyage->nom . '">' .
                        '</a>' .
                        '</div>' .
                        '<div class="bloc_bottom">' .
                        '<a href="' . base_url('/voyage/fiche/?id=') . $voyage->vId . '">Voir<br><span>le voyage</span></a>' .
                        '<p class="titre">' . $voyage->titre . '</p>' .
                        '<p class="accroche">' . tronque($voyage->phrase_accroche, 200) . '</p>' .
                        '</div>' .
                        '</li>';
                $i++;
            }
            $json["nbr_list"] = $i;
            echo json_encode($json);
            return;
        }
        echo "0";
    }

}