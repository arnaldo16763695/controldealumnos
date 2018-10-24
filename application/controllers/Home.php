<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('rol') == 1 or $this->session->userdata('rol') == 2) {
            //echo "su id es 1 o 2";exit;
            $this->layout->setLayout("frontend");

        } elseif ($this->session->userdata('rol') == 4) {
            //echo "su id es 4";exit;
            $this->layout->setLayout("frontend_docente");

        } elseif ($this->session->userdata('rol') == 3) {
            //echo "su id es 3";exit;
            $this->layout->setLayout("frontend_usuario");

        }

    }

    public function index()
    {
        $this->layout->setLayout("frontend_inicio");
        if ($this->session->userdata('id')) {
            redirect(base_url() . "home/bienvenido");
        } else {
            $this->layout->view("index");
        }

        //$this->load->view('welcome_message');
    }

    public function bienvenido()
    {

        if (!$this->session->userdata('id')) {
            redirect(base_url() . "home/index");
        } else {

            // $this->layout->setLayout("frontend_usuario");
            $this->layout->view("bienvenido");
        }

        //$this->load->view('welcome_message');
    }

}
