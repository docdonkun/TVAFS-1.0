<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Verification extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user');
        $this->load->library('form_validation');
    }

    function changeEmail() {
        if (!$this->session->userdata('logged_in')) {
            echo "co";
            die;
        }
        $this->form_validation->set_rules('mdp', 'mdp', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean|callback_change_email');
        if ($this->form_validation->run() == FALSE) {
            echo "0";
        } else {
            echo "1";
        }
    }

    function changeMdp() {
        if (!$this->session->userdata('logged_in')) {
            echo "co";
            die;
        }
        $this->form_validation->set_rules('mdp', 'mdp', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nmdp', 'nmdp', 'trim|required|xss_clean|callback_change_mdp');
        if ($this->form_validation->run() == FALSE) {
            echo "0";
        } else {
            echo "1";
        }
    }

    function login() {

        $this->form_validation->set_rules('user', 'user', 'trim|required|xss_clean');
        $this->form_validation->set_rules('mdp', 'mdp', 'trim|required|xss_clean|callback_check_database_login');

        if ($this->form_validation->run() == FALSE) {
            $this->load->templateUser('page_connexion');
        } else {
            redirect('user/account', 'refresh');
        }
    }

    function inscription() {

        $this->form_validation->set_rules('nom', 'nom', 'trim|required|xss_clean|callback_check_size_50');
        $this->form_validation->set_rules('prenom', 'prenom', 'trim|required|xss_clean|callback_check_size_50');
        $this->form_validation->set_rules('user', 'user', 'trim|required|xss_clean|callback_check_database_user|callback_check_size');
        $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cemail', 'cemail', 'trim|required|xss_clean');
        $this->form_validation->set_rules('mdp', 'mdp', 'trim|required|xss_clean|callback_check_size|callback_check_size');
        $this->form_validation->set_rules('cmdp', 'cmdp', 'trim|required|xss_clean|callback_check_mdp');

        if ($this->form_validation->run() == FALSE) {
            $this->load->templateUser('page_inscription');
        } else {
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $user = $this->input->post('user');
            $mdp = $this->input->post('mdp');
            $mail = $this->input->post('email');
            $result = $this->user->ajouterUser($nom, $prenom, $user, $mdp, $mail);
            if ($result != 0) {
                $sess_array = array(
                    'id' => $result,
                    'user' => $user
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            redirect('user/account', 'refresh');
        }
    }

    function check_size($valeur) {
        if (strlen($valeur) >= 6 && strlen($valeur) <= 50) {
            return true;
        }
        if ('%s' == "mdp") {
            $label = "Mot de passe";
        } else {
            $label = "Nom d'utilisateur";
        }
        $this->form_validation->set_message('check_size', $label . ' doit être compris entre 6 et 50 caractères');
        return false;
    }

    function check_email() {
        $email = $this->input->post('email');
        $cemail = $this->input->post('cemail');

        if ($email == $cemail) {
            return true;
        }
        $this->form_validation->set_message('check_email', 'Les adresses mails ne sont pas identiques');

        return false;
    }

    function check_size_50($valeur) {
        if (strlen($valeur) <= 50) {
            return true;
        }
        if ('%s' == "prenom") {
            $label = "Prenom";
        } else {
            $label = "Nom";
        }
        $this->form_validation->set_message('check_size_50', $label . ' doit être inférieur à 50 caractères');

        return false;
    }

    function check_mdp() {
        $mdp = $this->input->post('mdp');
        $cmdp = $this->input->post('cmdp');

        if ($mdp == $cmdp) {
            return true;
        }
        $this->form_validation->set_message('check_mdp', 'Les mots de passe ne sont pas identiques');

        return false;
    }

    function check_database_login($mdp) {
//Field validation succeeded.  Validate against database
        $user = $this->input->post('user');

//query the database
        $result = $this->user->login($user, $mdp);

        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->id,
                    'user' => $row->login
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', "Le nom d'utilisateur ou le mot de passe ne sont pas valides");
            return false;
        }
    }

    function check_database_user($user) {
        $result = $this->user->check_user($user);
        if ($result) {
            $this->form_validation->set_message('check_database', "Nom d'utilisateur déja utiliser");
            return false;
        } else {
            return true;
        }
    }

    function change_email($email) {
        $this->user->id = $this->session->userdata('logged_in')["id"];
        $this->user->password = $this->input->post('mdp');
        $this->user->mail = $email;

        if ($this->user->verifPassUser()) {
            if ($this->user->setMail()) {
                return true;
            }
        }
        return false;
    }

    function change_mdp($nmdp) {
        $this->user->password = $this->input->post('mdp');
        $this->user->id = $this->session->userdata('logged_in')["id"];
        if ($this->user->verifPassUser()) {
            $this->user->password = $nmdp;
            if ($this->user->setMdp()) {
                return true;
            }
        }
        return false;
    }

}
