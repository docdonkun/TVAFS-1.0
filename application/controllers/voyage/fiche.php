<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fiche extends CI_Controller {

    /**
     * 
     */
    public function index() {
        $this->load->templateVoyage('/fiche_voyage');
        
    }
}
