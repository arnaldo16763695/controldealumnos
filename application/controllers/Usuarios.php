<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->layout->setLayout("frontend_inicio");
    }

    public function registro_usuarios()
    {

        if ($this->input->post()) {

            if ($this->form_validation->run('registro_usuario')) {

                //die("Entró");

                $correo  = trim($this->input->post('correo'));
                $correo2 = trim($this->input->post('correo2'));
                $cedu    = trim($this->input->post('cedula'));

                if ($correo2 != $correo) {

                    $this->session->set_flashdata('css', 'danger');
                    $this->session->set_flashdata('mensaje', 'Los Correos no Coinciden');
                    redirect(base_url() . "usuarios/registro_usuarios");

                } elseif (trim($this->input->post('pass')) != trim($this->input->post('pass2'))) {

                    $this->session->set_flashdata('css', 'danger');
                    $this->session->set_flashdata('mensaje', 'Las contraseñas no Coinciden');
                    redirect(base_url() . "usuarios/registro_usuarios");

                }

                $data0 = $this->Usuarios_model->getCorreo($correo);
                $data1 = $this->Usuarios_model->getCedula($cedu);
                if (sizeof((array) $data0) > 0) {

                    echo "<script type='text/javascript'> alert('El correo ingresado ya está en uso');</script>";

                } elseif (sizeof((array) $data1) > 0) {
                    echo "<script type='text/javascript'> alert('La cedula ingresada ya está en uso');</script>";
                } else {

                    $data = array
                        (
                        'nombre'           => $this->input->post('nombre', true),
                        'cedula'           => $this->input->post('cedula', true),
                        'telefono'         => $this->input->post('telefono', true),
                        'direccion'        => $this->input->post('direccion', true),
                        'fecha_nacimiento' => $this->input->post('fNacimiento', true),
                        'correo'           => $this->input->post('correo', true),
                        'telefono'         => $this->input->post('telefono', true),
                        'pass'             => sha1($this->input->post('pass', true)),
                        'fechaRegistro'    => date("Y-m-d"),
                        'id_rol'           => 3,
                        'estado'           => 1,
                    );
                    $this->Usuarios_model->registrarUsuarios($data);
                    //echo $insertar;exit;
                    $this->session->set_flashdata('css', 'success');
                    $this->session->set_flashdata('mensaje', 'El registro se ha creado exitosamente');
                    redirect(base_url() . "iniciosesion");

                }

            }

        }

        if ($this->session->userdata('id')) {
            redirect(base_url() . "home/bienvenido");
        } else {

            //die("entro aquiiii");

            $this->layout->view("registro_usuarios");
        }

        //$this->load->view('welcome_message');
    }

}
