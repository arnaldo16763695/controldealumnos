
<?php
class Alumnos_model extends CI_Model
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
            ->select("alumnos.id as idAlumn,alumnos.nombre,alumnos.cedula, alumnos.cedulaEscolar,alumnos.fechaNacimiento,alumnos.idRepresentante, alumnos.sexo, alumnos.fechaRegistro, alumnos.eliminado,alumnos.nombreMadre,alumnos.cedulaMadre,alumnos.nombrePadre,alumnos.cedulaPadre, representantes.nombre AS nombreR, representantes.id, representantes.cedula as cedulaR")
            ->from('alumnos')
            ->join('representantes', 'representantes.id=alumnos.idRepresentante')
            ->where(array('alumnos.eliminado' => 0))
            ->get();
        //echo $this->db->last_query();exit;
        return $query->result();
    }

    public function getAlumnosPorCedula($cedula)
    {
        $query = $this->db
            ->select("*")
            ->from('alumnos')
            ->where(array('cedula' => $cedula))
        //   ->or(array('cedulaEscolar' => $cedula))
            ->get();
        // echo $this->db->last_query();exit;
        return $query->row();
    }

    public function getAlumnosPorCedulaEscolar($cedulaEscolar)
    {
        $query = $this->db
            ->select("*")
            ->from('alumnos')
            ->like(array('cedulaEscolar' => $cedulaEscolar))
        //   ->or(array('cedulaEscolar' => $cedula))
            ->get();
        //echo $this->db->last_query();exit;
        return $query->result();
    }

    public function getAlumnosPorId($id)
    {
        $query = $this->db
            ->select("alumnos.id, alumnos.nombre, alumnos.fechaNacimiento, alumnos.lugarNacimiento, alumnos.cedula, alumnos.cedulaEscolar, alumnos.sexo, alumnos.nombreMadre, alumnos.nombrePadre, alumnos.cedulaMadre, alumnos.cedulaPadre, representantes.nombre as nombreRepresentante, representantes.cedula as cedulaRepresentante")
            ->from('alumnos')
            ->join('representantes', 'representantes.id=alumnos.idRepresentante')
            ->like(array('alumnos.id' => $id))
        //   ->or(array('cedulaEscolar' => $cedula))
            ->get();
        //echo $this->db->last_query();exit;
        return $query->row();
    }

    public function detalleAlumnos_porRepresentante($id)
    {

        $query = $this->db
            ->select("alumnos.id as idAlum,alumnos.nombre,alumnos.cedula, alumnos.cedulaEscolar,alumnos.fechaNacimiento,alumnos.idRepresentante, alumnos.sexo, alumnos.fechaRegistro,alumnos.nombreMadre,alumnos.cedulaMadre,alumnos.nombrePadre,alumnos.cedulaPadre, representantes.nombre AS nombreR, representantes.id, representantes.cedula as cedulaR")
            ->from('alumnos')
            ->join('representantes', 'representantes.id=alumnos.idRepresentante')
            ->where(array('alumnos.idRepresentante' => $id, 'alumnos.eliminado' => 0))
            ->get();
        return $query->result();
        //echo $this->db->last_query();exit;

    }

    public function alumnos_porCedulaRepresentante($cedula)
    {

        $query = $this->db
            ->select("alumnos.id idAlumno, alumnos.nombre as nameAlumno ,alumnos.cedula, alumnos.cedulaEscolar, alumnos.fechaNacimiento as fnaciAlumno,alumnos.idRepresentante,alumnos.fechaRegistro,alumnos.nombreMadre,alumnos.cedulaMadre,alumnos.nombrePadre,alumnos.cedulaPadre, representantes.nombre AS nombreR, representantes.id, representantes.cedula as cedulaR")
            ->from('alumnos')
            ->join('representantes', 'representantes.id=alumnos.idRepresentante')
            ->where(array('representantes.cedula' => $cedula, 'alumnos.eliminado' => 0))
            ->get();
        // echo $this->db->last_query();exit;
        return $query->result();

    }

    public function get_datos_antropometricos_por_id($id)
    {

        $query = $this->db
            ->select("datos_antropometricos.id, datos_antropometricos.edad, datos_antropometricos.peso, datos_antropometricos.tallaPantalon, datos_antropometricos.tallaCamisa, datos_antropometricos.tallaCalzado, datos_antropometricos.altura, datos_antropometricos.nombreFoto as nombre_Foto , datos_antropometricos.id_alumno, datos_antropometricos.id_curso, datos_antropometricos.observaciones, datos_antropometricos.eliminado, alumnos.id, alumnos.eliminado")
            ->from('datos_antropometricos')
            ->join('alumnos', 'alumnos.id=datos_antropometricos.id_alumno')
            ->where(array('datos_antropometricos.id_alumno' => $id, 'datos_antropometricos.eliminado' => 0, 'alumnos.eliminado' => 0))
            ->get();
        // echo $this->db->last_query();exit;
        return $query->row();

    }

    public function add_datos_antropometricos($data = array())
    {
        $this->db->insert('datos_antropometricos', $data);

        return $this->db->insert_id();
    }

    public function edit_datos_antropometricos($data2 = array(), $id)
    {
        $this->db->where('id_alumno', $id);
        $this->db->where('eliminado', 0);
        $this->db->update('datos_antropometricos', $data2);
        //   echo $this->db->last_query();exit;
    }

    public function edit($data = array(), $id)
    {
        $this->db->where('id', $id);
        $this->db->update('alumnos', $data);
        //echo $this->db->last_query();exit;
    }

    public function deleteAlumno($id)
    {
        $this->db->set('eliminado', 1);
        $this->db->where('id', $id);
        $this->db->update('alumnos');
    }

    public function deleteDatosAntropometrico($id)
    {
        $this->db->set('eliminado', 1);
        $this->db->set('nombreFoto', '');
        $this->db->where('id_alumno', $id);
        $this->db->update('datos_antropometricos');
    }

}
