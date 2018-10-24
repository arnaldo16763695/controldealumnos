<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cursos extends CI_Controller
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
//****************************************************************************************
    public function crearCursos()
    {

        if ($this->input->post()) {

            if ($this->form_validation->run('add_curso')) {
                //print_r($_POST);exit;
                $data = array(
                    'nombre'        => $this->input->post("descripcionCurso", true),
                    'seccion'       => $this->input->post("seccion", true),
                    'etapa'         => $this->input->post("etapa", true),
                    'HoraEntrada'   => $this->input->post("Hentrada", true),
                    'HoraSalida'    => $this->input->post("Hsalida", true),
                    'grado'         => $this->input->post("grado", true),
                    'idDocente'     => $this->input->post("docente", true),
                    'fechaRegistro' => date('Y-m-d'),
                );

                $lastId = $this->Cursos_model->registrarCursos($data);

                $this->session->set_flashdata('css', 'success');
                $this->session->set_flashdata('mensaje', 'El registro se ha creado exitosamente');
                redirect(base_url() . "cursos/listaCursos");
            }
        }

        if ($this->session->userdata('id')) {

            //$datos=$this->Cursos_model->cargarGrados();
            $datos2 = $this->Cursos_model->cargarSecciones();
            $datos3 = $this->Docentes_model->listarDocentes();
            $this->layout->view("crearCursos", compact('datos', 'datos2', 'datos3'));
        } else {
            redirect(base_url() . "home/bienvenido");

            //$this->load->view('welcome_message');
        }
    }
//****************************************************************************************
    public function cargarSelectGrado()
    {

        if ($this->input->post()) {

            $selectEtap = $this->input->post('selectEtapa', true);

            $datosSelect = $this->Cursos_model->cargarGrados($selectEtap);

            $this->layout->setLayout("template");
            $this->layout->view("cargarSelectGrado", compact('datosSelect'));
        }
    }
//****************************************************************************************
    public function listaCursos()
    {

        // if ($this->session->userdata('rol') == 1 or $this->session->userdata('rol') == 2) {
        //echo $this->session->userdata('rol');exit;
        $datos = $this->Cursos_model->listar_cursos();

        /*      } else {

        $datos = $this->Cursos_model->listar_cursos_por_docentes($this->session->userdata('id'));

        } */

        $this->layout->view("listaCursos", compact("datos"));

    }
//****************************************************************************************
    public function listaCursoDetalle($id)
    {

        // if ($this->session->userdata('rol') == 1 or $this->session->userdata('rol') == 2) {
        //echo $this->session->userdata('rol');exit;
        $datos  = $this->Cursos_model->listar_cursos_por_id($id);
        $datos2 = $this->Cursos_model->alumnos_inscritos($id);

        /*      } else {

        $datos = $this->Cursos_model->listar_cursos_por_docentes($this->session->userdata('id'));

        } */
        $this->layout->setLayout("template");
        $this->layout->view("listaCursoDetalle", compact("datos", "datos2"));

    }

//****************************************************************************************
    public function inscripciones()
    {

        if ($this->session->userdata('rol') == 1 or $this->session->userdata('rol') == 2) {
            $datos = $this->Cursos_model->listar_cursos();
        } else {
            $datos = $this->Cursos_model->listar_cursos_por_docentes($this->session->userdata('id'));
        }

        if (count((array) $datos) == 0) {

            $sinDatos = 'En este momento no hay cursos activos para realizar inscripciones, consulte con el administrador del sistema.';
            $this->layout->view("inscripciones", compact('datos', 'sinDatos'));
        } else {

            $this->layout->view("inscripciones", compact('datos'));

        }

    }

//****************************************************************************************

//****************************************************************************************

//****************************************************************************************

//****************************************************************************************
    public function detalle_curso($idCurso = 0)
    {

        //print_r($_POST);exit;

        //echo $idCurso;exit;

        if ($this->session->userdata('rol') == 1 or $this->session->userdata('rol') == 2) {

            $datos = $this->Cursos_model->alumnos_inscritos($idCurso);

        } else {
            //echo $this->session->userdata('id');exit;
            $datos = $this->Cursos_model->alumnos_inscritos_por_docentes($idCurso, $this->session->userdata('id'));
        }

        $datos2 = $this->Cursos_model->listar_cursos_por_id($idCurso);

        if (count((array) $datos2) == 0) {

            redirect(base_url() . "cursos/inscripciones");
        }

        if (count((array) $datos) == 0) {

            $sinDatos = 'En este momento no hay alumnos inscritos en este curso.';

            $this->layout->view('detalle_curso', compact('datos', 'datos2', 'sinDatos'));
        } else {

            $this->layout->view('detalle_curso', compact('datos', 'datos2'));
        }

    }
//****************************************************************************************
    public function agregar_alumnos_curso($idCurso = 0)
    {

        if ($this->input->post()) {

            //print_r($_POST);exit;

            if ($this->form_validation->run('add_alumnos_a_cursos')) {

                $verificarRepre = $this->Representantes_model->getRepresentantesPorCedula($this->input->post('cedulaRepresentante'), true);

                if (count($verificarRepre) == 0) {

                    $this->session->set_flashdata('css', 'danger');
                    $this->session->set_flashdata('mensaje', 'Esta Cédula no está registrada');
                    redirect(base_url() . "cursos/agregar_alumnos_curso/" . $idCurso);

                }

                $cedula  = $verificarRepre->cedula;
                $idCurso = $this->input->post('idCurso', true);
                // $busquedaRepre=$this->Cursos_model->listar_cursos_por_id($idCurso);
                redirect(base_url() . "cursos/agregar_alumnos_curso_2/" . $idCurso . "/" . $cedula);

            }

        }

        if ($this->session->userdata('rol') == 1 or $this->session->userdata('rol') == 2) {
            $datos = $this->Cursos_model->listar_cursos_por_id($idCurso);
        } else {

            $datos = $this->Cursos_model->listar_cursos_por_id_y_docente($idCurso, $this->session->userdata('id'));
        }

        if (count((array) $datos) == 0) {

            redirect(base_url() . "cursos/inscripciones");
        }

        $this->layout->view('agregar_alumnos_curso', compact('datos'));

    }
//****************************************************************************************
    public function agregar_alumnos_curso_2($idCurso = 0, $cedula = 0)
    {

        if ($this->input->post()) {

            //print_r($_POST);exit;
            $idAlum = $this->input->post('checkboxIdAlumno', true);
            $idRep  = $this->input->post('idRepre', true);
            $idCur  = $this->input->post('idCurso', true);

            $contador1 = count((array) $idAlum);

            if ($contador1 > 0) {

                // $existeElAlumno=array();
                $mensaje = array();

                for ($y = 0; $y < $contador1; $y++) {
                    //  echo "entro en el for";exit;

                    $existeElAlumno = $this->Cursos_model->get_alumnos_inscritos_por_id_($idAlum[$y]);

                    if (count((array) $existeElAlumno) > 0) {

                        array_push($mensaje, $existeElAlumno->nameAlumno . ""); //colaca datos en el array

                    }
                }

                $mensj = implode(", ", $mensaje); //Permite mostrar los datos del array

                if (count($mensaje) == 1) {
                    $this->session->set_flashdata('css', 'danger');
                    $this->session->set_flashdata('mensaje', 'El alumno ' . $mensj . ' ya está inscrito en este u otro curso, por favor verifique');
                } elseif (count($mensaje) > 1) {
                    $this->session->set_flashdata('css', 'danger');
                    $this->session->set_flashdata('mensaje', 'Los alumnos ' . $mensj . ' ya están inscritos en este u otro curso, por favor verifique');

                } else {

                    for ($i = 0; $i < $contador1; $i++) {

                        $data = array(
                            'idCurso'         => $idCur,
                            'idRepresentante' => $idRep,
                            'idAlumnos'       => $idAlum[$i],
                            'fechaRegistro'   => date('Y-m-d'),
                        );
                        $lastId = $this->Cursos_model->hacerIncripcion($data);
                    }
                    $this->session->set_flashdata('css', 'success');
                    $this->session->set_flashdata('mensaje', 'Registro creado exitosamente');
                    redirect(base_url() . "cursos/detalle_curso/" . $idCurso);

                }

            } //fin de ciclo IF contador1

        }

        if ($this->session->userdata('rol') == 1 or $this->session->userdata('rol') == 2) {

            $datos = $this->Cursos_model->listar_cursos_por_id($idCurso);

        } else {

            $datos = $this->Cursos_model->listar_cursos_por_id_y_docente($idCurso, $this->session->userdata('id'));
        }

        if (count((array) $datos) == 0) {

            redirect(base_url() . "cursos/inscripciones");
        }

        $datos2 = $this->Alumnos_model->alumnos_porCedulaRepresentante($cedula);

        if (count((array) $datos2) == 0) {

            redirect(base_url() . "cursos/inscripciones");
        }

        $datos3 = $this->Cursos_model->listar_Representante_por_cedula($cedula);

        if (count((array) $datos3) == 0) {

            redirect(base_url() . "cursos/inscripciones");
        }

        //redirect(base_url() . "cursos/listaCursos");

        $this->layout->view('agregar_alumnos_curso_2', compact('datos2', 'datos', 'datos3', 'idCurso'));

    }

    public function edit_curso($id)
    {
        $grados    = $this->Cursos_model->cargarGradosPrimariaPreescolar();
        $secciones = $this->Cursos_model->cargarSecciones();
        $dato      = $this->Cursos_model->listar_cursos_por_id($id);
        $docentes  = $this->Docentes_model->listarDocentes();

        if ($this->input->post()) {

            if ($this->form_validation->run('add_curso')) {
                //print_r($_POST);exit;
                $data = array(
                    'nombre'      => $this->input->post("descripcionCurso", true),
                    'seccion'     => $this->input->post("seccion", true),
                    'etapa'       => $this->input->post("etapa", true),
                    'HoraEntrada' => $this->input->post("Hentrada", true),
                    'HoraSalida'  => $this->input->post("Hsalida", true),
                    'grado'       => $this->input->post("grado", true),
                    'idDocente'   => $this->input->post("docente", true),
                    // 'fechaRegistro' => date('Y-m-d'),
                );

                $this->Cursos_model->edit_curso($data, $id);
                $this->session->set_flashdata('css', 'success');
                $this->session->set_flashdata('mensaje', 'Registro Editado exitosamente');
                redirect(base_url() . "cursos/edit_curso/" . $id);
            }

        }

        $this->layout->view('edit_curso', compact('id', 'dato', 'grados', 'secciones', 'docentes'));
    }

    public function eliminarCurso($id)
    {

        $tieneAlumno = $this->Cursos_model->alumnos_inscritos($id);

        if (count((array) $tieneAlumno) > 0) {

            $this->session->set_flashdata('css', 'danger');
            $this->session->set_flashdata('mensaje', 'El curso no puede ser eliminado porque tiene alumnos inscritos');
            redirect(base_url() . "cursos/listaCursos");
        } else {

            $this->Cursos_model->deleteCurso($id);

            redirect(base_url() . "cursos/listaCursos");

        }

    }

    public function eliminarAlumnoCurso($id, $idCurso)
    {

        $this->Cursos_model->deleteAlumnoCurso($id);

        $foto = $this->Alumnos_model->get_datos_antropometricos_por_id($id);
        unlink('public/fotos/' . $foto->nombre_Foto);

        $this->Alumnos_model->deleteDatosAntropometrico($id);

        $this->session->set_flashdata('css', 'danger');
        $this->session->set_flashdata('mensaje', 'Alumno eliminado con éxito');

        redirect(base_url() . "cursos/detalle_curso/" . $idCurso);

    }

}
