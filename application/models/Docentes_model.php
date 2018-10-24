<?php
class Docentes_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //métodos de consulta a la base de datos
    //los que van a utilizar el
    //active record

    public function crear_docentes($data, $id)
    {
        $this->db->set('id_rol', $data);
        $this->db->where('id', $id);
        $this->db->update('usuarios');
    }

    public function listarDocentes()
    {
        $query = $this->db
            ->select("usuarios.id as id_usuario, usuarios.id_rol, usuarios.nombre as nombreUsuario, usuarios.cedula as cedulaUsuario, usuarios.fecha_nacimiento as fechaNacimiento, usuarios.telefono as telefono, usuarios.direccion as direccion, usuarios.fechaRegistro as fechaRegistro, roles.id, roles.nombre as nombreRol")
            ->from('usuarios')
            ->join('roles', 'usuarios.id_rol=roles.id')
            ->where('usuarios.id_rol', 4)
            ->or_where('usuarios.id_rol', 2)
            ->where('usuarios.eliminado', 0)
            ->order_by('nombreRol', 'desc')
            ->get();
        //echo $this->db->last_query();exit;
        return $query->result();
    }

    public function verificar_docentes_por_id($id)
    {

        $query = $this->db

            ->select("id")
            ->from("usuarios")
            ->where("id", $id)
            ->where("id_rol", 4)
            ->get();

        return $query->row();
    }

    public function deleteDocente($id)
    {
        $this->db->set('id_rol', 3);
        $this->db->where('id', $id);
        $this->db->update('usuarios');
    }

}
