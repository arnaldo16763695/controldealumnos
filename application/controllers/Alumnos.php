<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Mpdf\Mpdf;

class Alumnos extends CI_Controller
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

//************************************************************************************************************************
    public function registro_alumnos()
    {

        if ($this->input->post()) {

            // print_r($_POST);exit;

            if ($this->form_validation->run('add_alumnos')) {

                $fechaActual = date("Y-m-d");
                $fechaNR     = $this->input->post('fechaNRepresentante');

                if ($fechaActual <= $fechaNR) {

                    $this->session->set_flashdata('css', 'danger');
                    $this->session->set_flashdata('mensaje', 'La fecha de nacimiento del representante no debe ser mayor o igual a la fecha actual');
                    redirect(base_url() . "alumnos/registro_alumnos");
                }

                $cedul_R = $this->input->post('cedulaRepresentante', true);

                $datos = $this->Representantes_model->getRepresentantesPorCedula($cedul_R);

                if (count((array) $datos) > 0) {

                    $this->session->set_flashdata('css', 'danger');
                    $this->session->set_flashdata('mensaje', 'Esta cedula ya está registrada');
                    redirect(base_url() . "alumnos/registro_alumnos");

                }

                //ciclo if para evitar que la fecha de nacimiento sea mayor a la actual
                $fechaNEstudiante = $this->input->post('fechaNEstudiante', true);

                for ($i = 0; $i < count($fechaNEstudiante); $i++) {

                    $fechaNaciEstudiante = $fechaNEstudiante[$i];
                }

                // echo $fechaNaciEstudiante;exit;

                if ($fechaActual <= $fechaNaciEstudiante) {

                    $this->session->set_flashdata('css', 'danger');
                    $this->session->set_flashdata('mensaje', 'La fecha de nacimiento del estudiante no debe ser mayor o igual a la fecha actual');
                    redirect(base_url() . "alumnos/registro_alumnos");
                } else {

                    $data = array
                        (
                        'nombre'          => $this->input->post('nombreRepresentante', true),
                        'cedula'          => $this->input->post('cedulaRepresentante', true),
                        'direccion'       => $this->input->post('direccion', true),
                        'telefono'        => $this->input->post('telefono', true),
                        'fechaNacimiento' => $this->input->post('fechaNRepresentante', true),
                        'fechaRegistro'   => date("Y-m-d"),
                    );

                    $lastidRepresentante = $this->Representantes_model->registrarRepresentantes($data);

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

                }

                //---INICIO---DE---FOR---PARA---ITERAR---SOBRE---BD---
                for ($i = 0; $i < $contador1; $i++) {

                    //ciclo if para evitar que la fecha de nacimiento sea mayor a la actual
                    if ($fechaActual <= $fechaNEstudiante[$i]) {
                        $this->session->set_flashdata('css', 'danger');
                        $this->session->set_flashdata('mensaje', 'La fecha de nacimiento del estudiante no debe ser mayor o igual a la fecha actual');
                        redirect(base_url() . "alumnos/registro_alumnos");
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
                        'idRepresentante' => $lastidRepresentante,
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
                redirect(base_url() . "alumnos/registro_alumnos");

            }

        }

//--------------------------------------------------
        //****************************************************

        $this->layout->view("registro_alumnos");

    }

//*********FIN***DE***METODO*****registro_alumnos()***********************************

//**********************************************************************************************************
    public function lista_alumnos($var = 0)
    {

        $datos = $this->Alumnos_model->getTodosAlumnos();
        $this->layout->view("lista_alumnos", compact("datos"));

    }
//**************************Listado en PDF****************************************
    public function lista_alumnos_pdf()
    {

        $datos = $this->Alumnos_model->getTodosAlumnos();

        $mostrar = '  <header class="clearfix">
              <div id="logo">
                <img width="100" src="' . base_url() . 'public/images/logo.png">
              </div>
              <h3>Listado de Alumnos</h3>

            </header>';

        $mostrar .= '<body><table>
                          <thead>
                            <tr>

                              <th scope="col">Estudiante</th>
                              <th scope="col">Cédula</th>
                              <th scope="col">Cédula E.</th>
                              <th scope="col">F. de Nacimiento</th>
                              <th scope="col">Sexo</th>
                              <th scope="col">Edad</th>
                              <th scope="col">Representante</th>
                              <th scope="col">Cédula. Representante</th>


                            </tr>
                          </thead>
                          <tbody>';

        foreach ($datos as $dato) {
            $factual = date("Y-m-d");
            // $fnaci= $dato->fechaNacimiento;

            $diff = abs(strtotime($factual) - strtotime($dato->fechaNacimiento));
            $edad = floor($diff / (365 * 60 * 60 * 24));

            $mostrar .= '
                              <tr>
                              <td>' . $dato->nombre . '</td>
                              <td>' . $dato->cedula . '</td>
                              <td>' . $dato->cedulaEscolar . '</td>
                              <td>' . date("d-m-Y", strtotime($dato->fechaNacimiento)) . '</td>
                              <td>' . $dato->sexo . '</td>
                              <td>' . $edad . ' Años</td>
                              <td>' . $dato->nombreR . '</td>
                              <td>' . $dato->cedulaR . '</td>
                              </tr>
                           ';
        }

        $mostrar .= '</tbody></table><footer>
                    Listado de Alumnos Mene Grande
                    </footer></body>';

        // echo $mostrar;exit;

        //$html='<h4>Hola mundooooo</h4>';
        $pdf = new Mpdf(['format' => 'letter-L', 'aliasNbPg' => '[pagetotal]']);
        $css = file_get_contents(base_url() . 'public/css/css_bootstrap/estilos.css');
        //echo $css;exit;
        $pdf->writeHTML($css, 1);
        $pdf->setFooter('{PAGENO}' . '/' . '[pagetotal]');
        $pdf->writeHTML($mostrar, 2);
        $pdf->Output('todo_los_alumnos.pdf', 'I');
    }
//*********************************************************************************************************************

    //**************************Listado en excel****************************************
    public function lista_alumnos_excel()
    {

        header('Content-type:application/xls');
        header('Content-Disposition: attachment; filename=usuarios.xls');

        // require_once 'conexion.php';
        $datos = $this->Alumnos_model->getTodosAlumnos();

        ?>

        <table border="1">
    <tr>
        <th>Estudiante</th>
        <th>Cedula</th>
        <th>Cedula Escolar</th>
        <th>Fecha de Nacimiento</th>
        <th>Sexo</th>
        <th>Edad</th>
        <th>Representante</th>
        <th>Cedula del Representatante</th>
    </tr>

    <?php
foreach ($datos as $dato) {

            $factual = date("Y-m-d");
            // $fnaci= $dato->fechaNacimiento;

            $diff = abs(strtotime($factual) - strtotime($dato->fechaNacimiento));
            $edad = floor($diff / (365 * 60 * 60 * 24));

            ?>
                <tr>
                    <td><?php echo $dato->nombre; ?></td>
                    <td><?php echo $dato->cedula; ?></td>
                    <td><?php echo $dato->cedulaEscolar; ?></td>
                    <td><?php echo date("d-m-Y", strtotime($dato->fechaNacimiento)); ?></td>
                    <td><?php echo $dato->sexo; ?></td>
                    <td><?php echo $edad . 'años'; ?></td>
                    <td><?php echo $dato->nombreR; ?></td>
                    <td><?php echo $dato->cedulaR; ?></td>


                </tr>

            <?php
}

        ?>
</table>

    <?php

    }

//*************************************************************************************+
    public function listaDetalleAlumnos($id = 0)
    {

        if (!$id) {
            show_404();
        } else {

            $datos  = $this->Alumnos_model->detalleAlumnos_porRepresentante($id);
            $datos2 = $this->Representantes_model->getRepresentantesPorId($id);

            if (count((array) $datos2) == 0) {
                redirect(base_url() . "representantes/lista_representantes");
            }

            $this->layout->view("listaDetalleAlumnos", compact("datos", "datos2"));

        }

    }

    public function detalleAlumnoGeneral($id = 0)
    {

        if (!$id) {
            show_404();
        } else {

            $this->layout->setLayout("template");
            $dato2 = $this->Alumnos_model->get_datos_antropometricos_por_id($id);
            $dato  = $this->Alumnos_model->getAlumnosPorId($id);
            //$datos2=$this->Representantes_model->getRepresentantesPorId($id);

            $this->layout->view("detalleAlumnoGeneral", compact("dato", "dato2"));

        }

    }

    public function buscarRepresentanteAjax()
    {

        //print_r($_POST);exit;

        //$cedulaRepresentante = $_POST['valorBusqueda'];
        $cedulaRepresentante = $this->input->post('valorBusqueda', true);

        $datos = $this->Representantes_model->getRepresentantesPorCedula($cedulaRepresentante);

        if (count((array) $datos) > 0) {
            //echo "si hay Registro";exit;

            echo "<script>deshabilitarCampos();</script>";
            $this->session->set_flashdata('css', 'danger');
            $this->session->set_flashdata('mensaje2', 'Ya esta cédula está Registrada');
            //redirect(base_url()."alumnos/registro_alumnos/yaExiste");
            $this->layout->setLayout('template');
            $this->layout->view("buscarRepresentanteAjax");
        }

        if (count((array) $datos) == 0) {

            echo "<script>habilitarCampos();</script>";
        }
    }

    public function edit($id = 0)
    {

        $dato = $this->Alumnos_model->getAlumnosPorId($id);

        $cedulaActual        = $dato->cedula;
        $fechaNActual        = $dato->fechaNacimiento;
        $cedulaEscolarActual = $dato->cedulaEscolar;

        // echo $anio;exit;
        //echo $cedulaEscolarActual;exit;

        if ($this->input->post()) {

            // print_r($_POST);exit;

            if ($this->form_validation->run('edit_alumnos')) {

                if (trim($this->input->post('cedulaEstudiante', true)) == '') {

                    $cedula = "No tiene";

                } else {
                    $cedula = $this->input->post('cedulaEstudiante', true);
                }

                if ($this->input->post('fechaNEstudiante', true) == $fechaNActual) {

                    $data = array(
                        'nombre'          => $this->input->post('nombreEstudiante', true),
                        'cedula'          => $cedula,
                        // 'cedulaEscolar'   => $cedula,
                        'fechaNacimiento' => $this->input->post('fechaNEstudiante', true),
                        'lugarNacimiento' => $this->input->post('lugarNEstudiante', true),
                        'sexo'            => $this->input->post('sexo', true),
                        'nombreMadre'     => $this->input->post('nombreMadre', true),
                        'cedulaMadre'     => $this->input->post('cedulaMadre', true),
                        'nombrePadre'     => $this->input->post('nombrePadre', true),
                        'cedulaPadre'     => $this->input->post('cedulaPadre', true),
                    );
                } else {
                    //echo "entró";exit;
                    $anio = substr($this->input->post('fechaNEstudiante', true), 2, -6);
                    //echo $anio;exit;
                    $cedul_R    = $dato->cedulaRepresentante;
                    $cedulaEsco = $anio . '' . $cedul_R;
                    //echo $cedulaEsco;exit;
                    $existeCedulaEscolar = $this->Alumnos_model->getAlumnosPorCedulaEscolar($cedulaEsco);

                    $contCeduEsco = sizeof((array) $existeCedulaEscolar);

                    if ($cedulaEsco !== $cedulaEscolarActual) {
                        if ($contCeduEsco > 0) {
                            //echo $contCeduEsco;exit;
                            //$contCeduEsco++;
                            $cedulaEsco = $contCeduEsco . '' . $cedulaEsco;

                        }
                    }

                    $data = array(
                        'nombre'          => $this->input->post('nombreEstudiante', true),
                        'cedula'          => $cedula,
                        'cedulaEscolar'   => $cedulaEsco,
                        'fechaNacimiento' => $this->input->post('fechaNEstudiante', true),
                        'lugarNacimiento' => $this->input->post('lugarNEstudiante', true),
                        'sexo'            => $this->input->post('sexo', true),
                        'nombreMadre'     => $this->input->post('nombreMadre', true),
                        'cedulaMadre'     => $this->input->post('cedulaMadre', true),
                        'nombrePadre'     => $this->input->post('nombrePadre', true),
                        'cedulaPadre'     => $this->input->post('cedulaPadre', true),
                    );
                }
                $validarCedula = $this->Alumnos_model->getAlumnosPorCedula($cedula);
                if ($validarCedula->cedula == $cedulaActual) {

                    $this->Alumnos_model->edit($data, $id);
                    $this->session->set_flashdata('css', 'success');
                    $this->session->set_flashdata('mensaje', 'Registro editado con éxito');
                    redirect(base_url() . "alumnos/edit/" . $id);
                } else {
                    if (count($validarCedula) > 0) {
                        $this->session->set_flashdata('css', 'danger');
                        $this->session->set_flashdata('mensaje', 'Esta cedula ya está registrada, no se pudo editar');
                        redirect(base_url() . "alumnos/edit/" . $id);
                    } else {
                        $this->Alumnos_model->edit($data, $id);
                        $this->session->set_flashdata('css', 'success');
                        $this->session->set_flashdata('mensaje', 'Registro editado con éxito');
                        redirect(base_url() . "alumnos/edit/" . $id);
                    }
                }

            }

        }
        $this->layout->view("edit", compact('id', 'dato'));
    }

    public function eliminarAlumnos($id)
    {
        $existeElAlumno = $this->Cursos_model->get_alumnos_inscritos_por_id_($id);

        if (count((array) $existeElAlumno) > 0) {

            $this->session->set_flashdata('css', 'danger');
            $this->session->set_flashdata('mensaje', 'Este alumno no puede ser eliminado ya que está inscrito en un curso activo');
            redirect(base_url() . "alumnos/lista_alumnos");
        } else {

            $this->Alumnos_model->deleteAlumno($id);
            $this->session->set_flashdata('css', 'success');
            $this->session->set_flashdata('mensaje', 'El registro se ha eliminado exitosamente');
            redirect(base_url() . "alumnos/lista_alumnos");

        }

    }
//*******************************************************************************************************************
    public function antropometrica($id, $idCurso)
    {

        $datos  = $this->Alumnos_model->getAlumnosPorId($id);
        $datos2 = $this->Cursos_model->listar_cursos_por_id($idCurso);
        $dato3  = $this->Alumnos_model->get_datos_antropometricos_por_id($id);

        if (count((array) $datos2) > 0) {

            if ($this->input->post()) {

                if (count((array) $dato3) > 0) {

                    //echo "entró";exit;
                    $fotoActual = trim($dato3->nombre_Foto);

                    //echo $fotoActual;exit;

                    if ($fotoActual === '') {
                        //echo "jjj";exit;
                        $fotoActual = "fotoDefault.png";
                    }

                } else {
                    $fotoActual = "fotoDefault.png";
                }
                ////////////////////////////////////////////////////////////////////////////////
                //print_r($_FILES);exit;
                $inputFoto = $_FILES['foto']['name'];
                //echo $inputFoto;exit;

                if (!empty($inputFoto)) {

                    $config['upload_path']   = 'public/fotos/';
                    $config['allowed_types'] = 'gif|jpg|png|JPEG';
                    $config['max_size']      = 1024;
                    $config['max_width']     = 1024;
                    $config['max_height']    = 1024;
                    $config['encrypt_name']  = true;

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('foto')) {

                        $error = array('error' => $this->upload->display_errors());

                        //$this->load->view('upload_form', $error);

                        foreach ($error as $err) {

                            $mensaje = $err;
                        }

                        $this->session->set_flashdata('css', 'danger');
                        $this->session->set_flashdata('mensaje', $err);
                        redirect(base_url() . "alumnos/antropometrica/" . $datos->id . '/' . $datos2->idCurso);

                    }
                    //echo $fotoActual;exit;
                    if ($fotoActual !== 'fotoDefault.png') {
                        unlink("public/fotos/" . $fotoActual);
                    }

                    $ima        = $this->upload->data();
                    $fotoActual = $ima['file_name'];
                    //  echo $fotoActual;exit;

                }

                //   echo $file_name;exit;

                ///////////////////////////////////////////////////////////////////////////////7

                if ($this->form_validation->run('add_antropometrico')) {

                    $factual = date("Y-m-d");
                    // $fnaci= $dato->fechaNacimiento;

                    $diff = abs(strtotime($factual) - strtotime($datos->fechaNacimiento));
                    $edad = floor($diff / (365 * 60 * 60 * 24));

                    $data = array(

                        'edad'          => $edad,
                        'peso'          => $this->input->post('peso', true),
                        'tallaPantalon' => $this->input->post('tCamisa', true),
                        'tallaCamisa'   => $this->input->post('tPantalones', true),
                        'tallaCalzado'  => $this->input->post('tCalzado', true),
                        'altura'        => $this->input->post('altura', true),
                        'id_alumno'     => $datos->id,
                        'id_curso'      => $datos2->idCurso,
                        'observaciones' => $this->input->post('observaciones', true),
                        'nombreFoto'    => $fotoActual,
                    );

                    $data2 = array(

                        //'edad'          => $edad,
                        'peso'          => $this->input->post('peso', true),
                        'tallaPantalon' => $this->input->post('tCamisa', true),
                        'tallaCamisa'   => $this->input->post('tPantalones', true),
                        'tallaCalzado'  => $this->input->post('tCalzado', true),
                        'altura'        => $this->input->post('altura', true),
                        'id_alumno'     => $datos->id,
                        'id_curso'      => $datos2->idCurso,
                        'observaciones' => $this->input->post('observaciones', true),
                        'nombreFoto'    => $fotoActual,
                    );

                    //echo $fotoActual;exit;

                    if (count((array) $dato3) > 0) {
                        // echo "entro aquí";exit;
                        $this->Alumnos_model->edit_datos_antropometricos($data2, $dato3->id);
                        $this->session->set_flashdata('css', 'success');
                        $this->session->set_flashdata('mensaje', 'El registro se ha editado exitosamente');
                        redirect(base_url() . "alumnos/antropometrica/" . $datos->id . '/' . $datos2->idCurso);
                    } else {
                        $this->Alumnos_model->add_datos_antropometricos($data);
                        $this->session->set_flashdata('css', 'success');
                        $this->session->set_flashdata('mensaje', 'El registro se ha creado exitosamente');
                        redirect(base_url() . "alumnos/antropometrica/" . $datos->id . '/' . $datos2->idCurso);
                    }

                }

            }

        } else {
            redirect(base_url() . "cursos/inscripciones/");
        }

        $this->layout->view("antropometrica", compact('id', 'datos', 'datos2', 'dato3'));

    }

}
