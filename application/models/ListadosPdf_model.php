<?php
class ListadosPdf_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //métodos de consulta a la base de datos
    //los que van a utilizar el
    //active record

    public function registrarAlumnos($data2 = array())
    {
        $this->db->insert('alumnos', $data2);
        return $this->db->insert_id();
    }

    public function getTodosAlumnos()
    {
        $query = $this->db
            ->select("alumnos.id as idAlumn,alumnos.nombre,alumnos.cedula, alumnos.cedulaEscolar,alumnos.fechaNacimiento,alumnos.idRepresentante, alumnos.sexo, alumnos.fechaRegistro,alumnos.nombreMadre,alumnos.cedulaMadre,alumnos.nombrePadre,alumnos.cedulaPadre, representantes.nombre AS nombreR, representantes.id, representantes.cedula as cedulaR")
            ->from('alumnos')
            ->join('representantes', 'representantes.id=alumnos.idRepresentante')
        // ->where(array('correo'=>$correo))
            ->get();
        //echo $this->db->last_query();exit;
        return $query->result();
    }

    public function Header()
    {

        $pdf = new FPDF();

        //   $pdf->Image('base_url()."public/images/logo.png"', 5, 5, 30 );
        $pdf->SetFont('Arial', 'B', 15);
        $pdf->Cell(30);
        $pdf->Cell(120, 10, 'Reporte de Alumnos', 0, 0, 'C');
        $pdf->Ln(20);
    }

    public function Footer()
    {

        $pdf->SetY(-15);
        $pdf->SetFont('Arial', 'I', 8);
        $pdf->Cell(0, 10, 'Página ', $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}
