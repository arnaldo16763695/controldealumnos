<?php
class Usuarios_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getLogin($correo, $pass)
    {
        $query = $this->db
            ->select("usuarios.id as idUsuario,usuarios.nombre,usuarios.correo,usuarios.telefono,usuarios.pass,usuarios.id_rol, roles.id, roles.nombre as nombreRol")
            ->from("usuarios")
            ->join("roles", "roles.id=usuarios.id_rol")
            ->where(array('usuarios.correo' => $correo, 'usuarios.pass' => $pass))
            ->get();
        // echo $this->db->last_query();exit;
        return $query->row();
    }

    public function getCorreo($correo)
    {
        $query = $this->db
            ->select("id,nombre,correo,telefono,pass")
            ->from("usuarios")
            ->where(array('correo' => $correo))
            ->get();
        //echo $this->db->last_query();exit;
        return $query->row();
    }

    public function getCedula($cedula)
    {
        $query = $this->db
            ->select("id,nombre,correo,telefono,pass")
            ->from("usuarios")
            ->where(array('cedula' => $cedula))
            ->get();
        //echo $this->db->last_query();exit;
        return $query->row();
    }

    public function listarUsuarios()
    {
        $query = $this->db
            ->select("id,nombre,correo,cedula,telefono,pass")
            ->from("usuarios")

            ->get();

        return $query->result();
    }

    public function listarUsuarios_no_admin()
    {
        $query = $this->db
            ->select("id,nombre,correo,cedula,telefono,pass")
            ->from("usuarios")
            ->where("id_rol != ", 1)
            ->where("id_rol != ", 2)
            ->where("eliminado", 0)
            ->get();
        //echo $this->db->last_query();exit;
        return $query->result();
    }

    public function registrarUsuarios($data = array())
    {
        $this->db->insert('usuarios', $data);
        return $this->db->insert_id();
    }

}
