<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Representantes extends CI_Controller
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

    public function lista_representantes()
    {
        //$datos=$this->Representantes_model->obtenerAlumnosPorIdRepresenante();
        $datos = $this->Representantes_model->getTodosRepresentantes();
        $this->layout->view("lista_representantes", compact("datos"));

    }

    public function adicionarAlumnos()
    {
        //$datos=$this->Representantes_model->obtenerAlumnosPorIdRepresenante();

        if ($this->input->post()) {

            if ($this->form_validation->run('adicionar_alumnos')) {

                $fechaActual = date("Y-m-d");
                $cedul_R     = $this->input->post('cedulaRepresentante', true);
                $datos       = $this->Representantes_model->getRepresentantesPorCedula($cedul_R);

                if (count($datos) == 0) {

                    $this->session->set_flashdata('css', 'danger');
                    $this->session->set_flashdata('mensaje', 'Esta cedula ya está registrada');
                    redirect(base_url() . "alumnos/registro_alumnos");

                }

                $id_representante = $datos->id;

                $nombreEstudiante = $this->input->post('nombreEstudiante', true);
                $fechaNEstudiante = $this->input->post('fechaNEstudiante', true);
                $lugarNEstudiante = $this->input->post('lugarNEstudiante', true);
                $cedulaEstudiante = $this->input->post('cedulaEstudiante', true);
                $sexo             = $this->input->post('sexo', true);
                $nombreMadre      = $this->input->post('nombreMadre', true);
                $cedulaMadre      = $this->input->post('cedulaMadre', true);
                $nombrePadre      = $this->input->post('nombrePadre', true);
                $cedulaPadre      = $this->input->post('cedulaPadre', true);
                $contador1        = count($nombreEstudiante);

                for ($i = 0; $i < $contador1; $i++) {

                    //ciclo if para evitar que la fecha de nacimiento sea mayor a la actual
                    if ($fechaActual <= $fechaNEstudiante[$i]) {
                        $this->session->set_flashdata('css', 'danger');
                        $this->session->set_flashdata('mensaje', 'La fecha de nacimiento del estudiante no debe ser mayor o igual a la fecha actual');
                        redirect(base_url() . "representantes/adicionarAlumnos");
                    }
                    //----------fin--de--IF------------------------------------------------

                    //-----CREACÍON--DE--CEDULA---ESCOLAR--------------------------------
                    $anio          = substr($fechaNEstudiante[$i], 2, -6);
                    $cedulaEscolar = $anio . '' . $cedul_R;

                    $existeCedulaEscolar = $this->Alumnos_model->getAlumnosPorCedulaEscolar($cedulaEscolar);

                    $contCeduEsco = sizeof((array) $existeCedulaEscolar);

                    if ($contCeduEsco > 0) {
                        //echo $contCeduEsco;exit;
                        //$contCeduEsco++;
                        $cedulaEscolar = $contCeduEsco . '' . $cedulaEscolar;

                    }

                    //------FIN---CREACIÓN---DE---CEDULA---ESCOLAR----------------------

                    //-------IF----PARA----VERIFICAR---CÉDULA--REGISTRADA--------------
                    if (!empty($cedulaEstudiante[$i])) {

                        $existeCedula = $this->Alumnos_model->getAlumnosPorCedula($cedulaEstudiante[$i]);

                        if (count((array) $existeCedula) > 0) {
                            $this->session->set_flashdata('css', 'danger');
                            $this->session->set_flashdata('mensaje2', 'Sin embargo introdujo cedula(s) de alumno(s) que ya se encontraba(n) registrada(s), por lo tanto dicho(s) alumno(s) no  fuero(n) registrado(s), por favor verifique');
                            continue;
                        }

                    } else {
                        $cedulaEstudiante[$i] = "No tiene";
                    }
                    //-----------FIN----CICLO-------IF---------------------

                    $data2 = array(
                        'nombre'          => $nombreEstudiante[$i],
                        'cedula'          => $cedulaEstudiante[$i],
                        'cedulaEscolar'   => $cedulaEscolar,
                        'fechaNacimiento' => $fechaNEstudiante[$i],
                        'lugarNacimiento' => $lugarNEstudiante[$i],
                        'idRepresentante' => $id_representante,
                        'sexo'            => $sexo[$i],
                        'fechaRegistro'   => $fechaActual,
                        'nombreMadre'     => $nombreMadre[$i],
                        'cedulaMadre'     => $cedulaMadre[$i],
                        'nombrePadre'     => $nombrePadre[$i],
                        'cedulaPadre'     => $cedulaPadre[$i],
                    );

                    $this->Alumnos_model->registrarAlumnos($data2);

                } //cierre del for

                $this->session->set_flashdata('css', 'success');
                $this->session->set_flashdata('mensaje', 'El registro se ha creado exitosamente');
                redirect(base_url() . "alumnos/listaDetalleAlumnos/" . $id_representante);

            } //fin dek ciclo if de form_validation

        }

        if ($this->session->userdata('id')) {
            //$datos=$this->Representantes_model->getTodosRepresentantes();
            $this->layout->view("adicionarAlumnos", compact("datos"));
        } else {

            //die("entro aquiiii");
            redirect(base_url());
            //$this->layout->view("index");
        }

    }

    public function buscarRepreAdicionarAlum()
    {

        //print_r($_POST);exit;

        //$cedulaRepresentante = $_POST['valorBusqueda'];
        $cedulaRepresentante = $this->input->post('valorBusqueda', true);

        $datos = $this->Representantes_model->getRepresentantesPorCedula($cedulaRepresentante);

        if (count((array) $datos) == 0) {
            //echo "no hay Registro";exit;

            echo "<script>deshabilitarCampos();</script>";

            $this->session->set_flashdata('css', 'danger');
            $this->session->set_flashdata('mensaje2', 'La cédula no está Registrada');
            //redirect(base_url()."alumnos/registro_alumnos/yaExiste");
            $this->layout->setLayout("template");
            $this->layout->view("buscarRepreAdicionarAlum");
        } else {

            echo "<script>habilitarCampos();  $('#nombreRepresentante').val( '" . $datos->nombre . "');



                </script>";

        }

    }

    public function listaDetalleRepresentante($id)
    {
        $dato  = $this->Representantes_model->getRepresentantesPorId($id);
        $dato2 = $this->Representantes_model->cantidadAlumnosPorIdRepresentante($id);
        $this->layout->setLayout('template');
        $this->layout->view("listaDetalleRepresentante", compact('dato', 'dato2'));
    }

    public function edit_representante($id)
    {
        $dato = $this->Representantes_model->getRepresentantesPorId($id);
        //$cedulaActual = $dato->cedula;

        if ($this->input->post()) {

            $dato         = $this->Representantes_model->getRepresentantesPorId($id);
            $cedulaActual = $dato->cedula;
            //echo $cedulaActual;exit;

            if ($this->form_validation->run('edit_representante')) {

                $data = array(

                    'nombre'          => $this->input->post('nombreRepresentante', true),
                    'cedula'          => $this->input->post('cedulaRepresentante', true),
                    'direccion'       => $this->input->post('direccion', true),
                    'telefono'        => $this->input->post('telefono', true),
                    'fechaNacimiento' => $this->input->post('fechaNRepresentante', true),

                );

                $inputCedula   = trim($this->input->post('cedulaRepresentante', true));
                $validarCedula = $this->Representantes_model->getRepresentantesPorCedula($inputCedula);

                if (count((array) $validarCedula) > 0) {
                    $comparar = $validarCedula->cedula;
                } else {
                    $comparar = 0;
                }

                // echo $comparar;exit;

                if ($comparar == $cedulaActual) {
                    $this->Representantes_model->edit_representante($data, $id);
                    $this->session->set_flashdata('css', 'success');
                    $this->session->set_flashdata('mensaje', 'Registro editado con éxito');
                    redirect(base_url() . "representantes/edit_representante/" . $id);
                } else {

                    if (count((array) $validarCedula) > 0) {
                        $this->session->set_flashdata('css', 'danger');
                        $this->session->set_flashdata('mensaje', 'Esta cedula ya está registrada, no se pudo editar');
                        redirect(base_url() . "representantes/edit_representante/" . $id);
                    } else {
                        $this->Representantes_model->edit_representante($data, $id);

                        $this->Representantes_model->edit_cedula_escolar($cedulaActual, $inputCedula, $id);

                        $this->session->set_flashdata('css', 'success');
                        $this->session->set_flashdata('mensaje', 'Registro editado con éxito');
                        redirect(base_url() . "representantes/edit_representante/" . $id);
                    }
                }
            }

        }

        $this->layout->view("edit_representante", compact('dato'));
    }

    public function eliminarRepresentante($id)
    {

        $tieneAlumno = $this->Alumnos_model->detalleAlumnos_porRepresentante($id);

        if (count((array) $tieneAlumno) > 0) {

            $this->session->set_flashdata('css', 'danger');
            $this->session->set_flashdata('mensaje', 'El representante no puede ser eliminado porque tiene alumnos activos');
            redirect(base_url() . "representantes/lista_representantes");
        } else {

            $this->Representantes_model->deleteRepresentante($id);

            redirect(base_url() . "representantes/lista_representantes");

        }

    }

}
