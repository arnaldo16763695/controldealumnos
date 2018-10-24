<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Iniciosesion extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->layout->setLayout("frontend_inicio");
    }

    public function index()
    {

        if ($this->input->post()) {

            //echo "hola";exit;

            if ($this->form_validation->run('login')) {

                //crear y referenciar metodo  para ver si los usuarios existen en la bd

                $datos = $this->Usuarios_model->getLogin($this->input->post('correo', true), sha1($this->input->post('pass', true))); //crear condicion para validar lo anterior

                if (sizeof((array) $datos) == 0) {
                    $this->session->set_flashdata('css', 'danger');
                    $this->session->set_flashdata('mensaje', 'Email o Contraseña Incorrectos');
                    redirect(base_url() . "iniciosesion");

                } else {
                    //    die($datos->id);
                    //darle un nombre al array general de sesion
                    //darle un nombre al array general de sessiones

                    // echo $datos->id_rol;exit;

                    $this->session->set_userdata('manosenelcodigo');
                    //asignamos los datos a cada sessión por separado

                    $this->session->set_userdata('id', $datos->idUsuario);
                    $this->session->set_userdata('nombre', $datos->nombre);
                    $this->session->set_userdata('rol', $datos->id_rol);
                    $this->session->set_userdata('nombre_rol', $datos->nombreRol);
                    //echo $this->session->userdata('rol');exit;

                    //echo $this->session->set_userdata('id', $datos->id);exit;
                    //redireccionamos a la url principal de los contenidos restringidos
                    //echo $this->session->set_userdata('nombre');exit;
                    redirect(base_url() . "home/bienvenido");

                }
            }

        }

        if ($this->session->userdata('id')) {

            redirect(base_url() . "home/bienvenido");
        } else {

            //die("entro aquiiii");
            $this->layout->view("index");
        }

    }

    public function cerrar()
    {

        $this->session->sess_destroy('manosenelcodigo');

        redirect(base_url());
    }

}
