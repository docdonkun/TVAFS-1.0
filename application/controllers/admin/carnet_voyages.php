<?php

session_start();
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Voyages extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function add() {
        if ($this->session->userdata('logged_admin')) {
            $this->load->model('voyage');
            $this->load->helper(array('form'));
            $data["allCss"] = "";
            $data["alljs"] = "";
            $this->load->templateAdmin('/carnet/add_carnet_voyage', $data);
        } else {
            //If no session, redirect to login page
            redirect('admin/index/connexion', 'refresh');
        }
    }

    public function edit() {
        if ($this->session->userdata('logged_admin')) {
            $this->load->model('voyage');
            if (!$this->input->get('id')) {
                redirect('admin/voyages/liste', 'refresh');
            }
            $data["voyage"] = $this->voyage->getVoyage($this->input->get('id'));
            $data["continents"] = $this->voyage->getContinents();
            $this->load->helper(array('form'));
            $data["allCss"] = array("admin/main");
            $data["alljs"] = array("admin/main");
            $this->load->templateAdmin('/voyage/edit_voyage', $data);
        } else {
            //If no session, redirect to login page
            redirect('admin/index/connexion', 'refresh');
        }
    }

    public function liste() {
        if ($this->session->userdata('logged_admin')) {
            $this->load->helper(array('form'));
            $this->load->model('voyage');
            $data["voyages"] = $this->voyage->getVoyages();
            $data["allCss"] = array("admin/main");
            $data["alljs"] = array("admin/main");
            $this->load->templateAdmin('/voyage/list_voyage', $data);
        } else {
            //If no session, redirect to login page
            redirect('admin/index/connexion', 'refresh');
        }
    }

}
