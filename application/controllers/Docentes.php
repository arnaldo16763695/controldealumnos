<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Docentes extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id')) {

            redirect(base_url());

        }

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

    public function registro_docentes()
    {

        //$datos = $this->Usuarios_model->listarUsuarios();

        $datos = $this->Usuarios_model->listarUsuarios_no_admin();

        if ($this->input->post()) {

            //print_r($_POST);exit;

            if ($this->form_validation->run('add_docentes')) {

                $rol = 4;

                $existe = $this->Docentes_model->verificar_docentes_por_id($this->input->post('usuario', true));

                if (count((array) $existe) > 0) {

                    $this->session->set_flashdata('css', 'danger');
                    $this->session->set_flashdata('mensaje', 'Este Usuario ya se encuentra registrado como docente');
                    redirect(base_url() . "docentes/registro_docentes");
                }

                $lastId = $this->Docentes_model->crear_docentes($rol, $this->input->post('usuario', true));

                $this->session->set_flashdata('css', 'success');
                $this->session->set_flashdata('mensaje', 'El registro se ha creado exitosamente');
                redirect(base_url() . "docentes/lista_docentes");
            }

        }

        $this->layout->view('registro_docentes', compact('datos'));

    }

    public function lista_docentes()
    {

        $datos = $this->Docentes_model->listarDocentes();
        $this->layout->view('lista_docentes', compact('datos'));

    }

    public function eliminarDocente($id)
    {

        $tieneCurso = $this->Cursos_model->listar_cursos_por_id_docente($id);

        if (count($tieneCurso) > 0) {
            $this->session->set_flashdata('css', 'danger');
            $this->session->set_flashdata('mensaje', 'El docente no puede ser eliminado porque tiene cursos activos');
            redirect(base_url() . "docentes/lista_docentes");
        } else {
            $this->Docentes_model->deleteDocente($id);
            $this->session->set_flashdata('css', 'success');
            $this->session->set_flashdata('mensaje', 'Docente eliminado con éxito');

            redirect(base_url() . "docentes/lista_docentes");
        }

    }

}
