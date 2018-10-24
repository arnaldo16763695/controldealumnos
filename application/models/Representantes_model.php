<?php
class Representantes_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //métodos de consulta a la base de datos
    //los que van a utilizar el
    //active record

    public function registrarRepresentantes($data = array())
    {
        $this->db->insert('representantes', $data);
        return $this->db->insert_id();
    }

    /* public function getTodosRepresentantes_()
    {
    $query = $this->db
    ->select("representantes.id,representantes.nombre,representantes.cedula,representantes.direccion,
    representantes.telefono,representantes.fechaNacimiento,representantes.fechaRegistro, representantes.eliminado, count(alumnos.idRepresentante) as total")
    ->from("representantes")
    ->join('alumnos', 'representantes.id=alumnos.idRepresentante')
    // ->where(array('correo'=>$correo))
    ->group_by('alumnos.idRepresentante')
    // ->where('alumnos.eliminado', 0)
    ->where('representantes.eliminado', 0)

    ->get();
    //echo $this->db->last_query();exit;
    return $query->result();
    }
     */

    public function getTodosRepresentantes()
    {
        $query = $this->db
            ->select("id,nombre,cedula,direccion,
                    telefono,fechaNacimiento,fechaRegistro, eliminado")
            ->from("representantes")
        //   ->join('alumnos', 'representantes.id=alumnos.idRepresentante')
        // ->where(array('correo'=>$correo))
        //   ->group_by('alumnos.idRepresentante')
        // ->where('alumnos.eliminado', 0)
            ->where('eliminado', 0)

            ->get();
        //echo $this->db->last_query();exit;
        return $query->result();
    }

    public function getRepresentantesPorId($id)
    {
        $query = $this->db
            ->select("id,nombre, cedula, direccion, fechaNacimiento, telefono")
            ->from("representantes")
        //->join('alumnos', 'representantes.id=alumnos.idRepresentante')
            ->where(array('id' => $id))
            ->get();
        //echo $this->db->last_query();exit;
        return $query->row();
    }

    public function getRepresentantesPorCedula($cedula)
    {
        $query = $this->db
            ->select("id,nombre,cedula,direccion,telefono,fechaNacimiento,fechaRegistro")
            ->from("representantes")
            ->where(array('cedula' => $cedula))
            ->get();
        // echo $this->db->last_query();exit;
        return $query->row();

    }

    public function getRepresentantesPorCedula2($cedula)
    {
        $query = $this->db
            ->select("representantes.id,representantes.nombre,representantes.cedula,representantes.direccion,representantes.telefono,representantes.fechaNacimiento,representantes.fechaRegistro, alumnos.id, alumnos.nombre as nameAlumno")
            ->from("representantes")
            ->join('alumnos', 'representantes.id=alumnos.idRepresentante')
            ->where(array('cedula' => $cedula))
            ->get();
        // echo $this->db->last_query();exit;
        return $query->result();

    }

    public function obtenerAlumnosPorIdRepresenante()
    {
        $query = $this->db
            ->select("alumnos.id,alumnos.nombre,alumnos.cedula,alumnos.fechaNacimiento,alumnos.idRepresentante,alumnos.fechaNacimiento,alumnos.fechaRegistro, representantes.id")
            ->from("alumnos")
            ->join('representantes', 'representantes.id=alumnos.idRepresentante')
        //->group_by('alumnos.idRepresentante')

            ->get();

        //echo $this->db->last_query();exit;
        return $query->result();

    }

    public function cantidadAlumnosPorIdRepresentante($id)
    {
        $query = $this->db
            ->select("alumnos.id as id_alum,alumnos.nombre,alumnos.cedula,alumnos.fechaNacimiento,alumnos.idRepresentante,alumnos.fechaNacimiento,alumnos.fechaRegistro, alumnos.eliminado, representantes.id")
            ->from("alumnos")
            ->join('representantes', 'representantes.id=alumnos.idRepresentante')
            ->where('alumnos.idRepresentante', $id)
            ->where('alumnos.eliminado', 0)
            ->get();

        //echo $this->db->last_query();exit;
        return $query->result();

    }

    public function edit_representante($data = array(), $id)
    {
        $this->db->where('id', $id);
        $this->db->update('representantes', $data);
    }

    public function edit_cedula_escolar($cedula, $cedulaActual, $id)
    {

        $this->db->query(" UPDATE `alumnos` SET cedulaEscolar = REPLACE(cedulaEscolar, '$cedula' , '$cedulaActual') WHERE idRepresentante=$id;");
        // echo $this->db->last_query();exit;

    }

    public function deleteRepresentante($id)
    {
        $this->db->set('eliminado', 1);
        $this->db->where('id', $id);
        $this->db->update('representantes');
    }

}
