<?php
class Cursos_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //métodos de consulta a la base de datos
    //los que van a utilizar el
    //active record

    public function registrarCursos($data = array())
    {
        $this->db->insert('cursos', $data);
        return $this->db->insert_id();
    }

    public function hacerIncripcion($data = array())
    {
        $this->db->insert('inscripcion', $data);
        //echo $this->db->last_query();exit;
        return $this->db->insert_id();
    }

    public function cargarSecciones()
    {

        $query = $this->db
            ->select("id,nombreSeccion")
            ->from("secciones")
            ->get();
        //echo $this->db->last_query();exit;
        return $query->result();

    }

    public function cargarGrados($selectEtap = 0)
    {

        $query = $this->db
            ->select("id,nombreGrado, etapa")
            ->from("grados")
            ->where(array('etapa' => $selectEtap))
            ->get();
        //echo $this->db->last_query();exit;
        return $query->result();

    }

    public function cargarGradosPrimariaPreescolar()
    {

        $query = $this->db
            ->select("id,nombreGrado, etapa")
            ->from("grados")
        //->like('nombreGrado', 'Grado')
            ->get();
        //echo $this->db->last_query();exit;
        return $query->result();

    }

    public function listar_cursos()
    {

        $query = $this->db
            ->select("cursos.id as idCurso, cursos.nombre, cursos.etapa as etapa, cursos.seccion, cursos.horaEntrada, cursos.horaSalida, cursos.grado, cursos.idDocente, cursos.fechaRegistro, cursos.eliminado, grados.id, grados.nombreGrado as nameGrado, secciones.id, secciones.nombreSeccion as nameSeccion,  usuarios.nombre as nombreDocente, usuarios.cedula as cedulaDocente, roles.nombre as nombreRol")
            ->from("cursos")
            ->join('grados', 'cursos.grado=grados.id')
            ->join('secciones', 'cursos.seccion=secciones.id')
            ->join('usuarios', 'cursos.idDocente=usuarios.id')
            ->join('roles', 'roles.id=usuarios.id_rol')
            ->where('cursos.eliminado', 0)

        //->order_by('etapa','desc')
        //->having('docentes.id = cursos.idDocente2')
            ->get();
        //echo $this->db->last_query();exit;
        return $query->result();

    }

    public function listar_cursos_por_docentes($id)
    {

        $query = $this->db
            ->select("cursos.id as idCurso, cursos.nombre, cursos.etapa as etapa, cursos.seccion, cursos.horaEntrada, cursos.horaSalida, cursos.grado, cursos.idDocente, cursos.fechaRegistro, grados.id, grados.nombreGrado as nameGrado, secciones.id, secciones.nombreSeccion as nameSeccion,  usuarios.nombre as nombreDocente, usuarios.cedula as cedulaDocente, roles.nombre as nombreRol")
            ->from("cursos")
            ->join('grados', 'cursos.grado=grados.id')
            ->join('secciones', 'cursos.seccion=secciones.id')
            ->join('usuarios', 'cursos.idDocente=usuarios.id')
            ->join('roles', 'roles.id=usuarios.id_rol')
            ->where('cursos.idDocente', $id)

        //->order_by('etapa','desc')
        //->having('docentes.id = cursos.idDocente2')
            ->get();
        // echo $this->db->last_query();exit;
        return $query->result();

    }

    public function listar_cursos_por_id($id = 0)
    {

        $query = $this->db
            ->select("cursos.id as idCurso, cursos.nombre nameCurso, cursos.etapa as etapa, cursos.seccion nameSeccion, cursos.horaEntrada, cursos.horaSalida, cursos.grado, cursos.idDocente, cursos.fechaRegistro, grados.id, grados.nombreGrado as nameGrado, secciones.id, secciones.nombreSeccion as nameSeccion,  usuarios.nombre as nombreDocente, usuarios.cedula as cedulaDocente, roles.nombre as nombreRol")
            ->from("cursos")
            ->join('grados', 'cursos.grado=grados.id')
            ->join('secciones', 'cursos.seccion=secciones.id')
            ->join('usuarios', 'cursos.idDocente=usuarios.id')
            ->join('roles', 'roles.id=4')
            ->order_by('etapa', 'desc')
            ->where('cursos.id', $id)
        //->having('docentes.id = cursos.idDocente2')
            ->get();
        //echo $this->db->last_query();exit;
        return $query->row();

    }

    public function listar_cursos_por_id_y_docente($id = 0, $idDocente)
    {

        $query = $this->db
            ->select("cursos.id as idCurso, cursos.nombre nameCurso, cursos.etapa as etapa, cursos.seccion, cursos.horaEntrada, cursos.horaSalida, cursos.grado, cursos.idDocente, cursos.fechaRegistro, grados.id, grados.nombreGrado as nameGrado, secciones.id, secciones.nombreSeccion as nameSeccion,  usuarios.nombre as nombreDocente, usuarios.cedula as cedulaDocente, roles.nombre as nombreRol")
            ->from("cursos")
            ->join('grados', 'cursos.grado=grados.id')
            ->join('secciones', 'cursos.seccion=secciones.id')
            ->join('usuarios', 'cursos.idDocente=usuarios.id')
            ->join('roles', 'roles.id=4')
            ->order_by('etapa', 'desc')
            ->where('cursos.id', $id)
            ->where('cursos.idDocente', $idDocente)
        //->having('docentes.id = cursos.idDocente2')
            ->get();
        //echo $this->db->last_query();exit;
        return $query->row();

    }

    public function listar_cursos_por_id_docente($id)
    {

        $query = $this->db
            ->select("cursos.id as idCurso, cursos.nombre nameCurso, cursos.etapa as etapa, cursos.seccion, cursos.horaEntrada, cursos.horaSalida, cursos.grado, cursos.idDocente, cursos.fechaRegistro, cursos.eliminado, grados.id, grados.nombreGrado as nameGrado, secciones.id, secciones.nombreSeccion as nameSeccion,  usuarios.nombre as nombreDocente, usuarios.cedula as cedulaDocente, roles.nombre as nombreRol")
            ->from("cursos")
            ->join('grados', 'cursos.grado=grados.id')
            ->join('secciones', 'cursos.seccion=secciones.id')
            ->join('usuarios', 'cursos.idDocente=usuarios.id')
            ->join('roles', 'roles.id=4')
            ->order_by('etapa', 'desc')
            ->where(array('cursos.idDocente' => $id, 'cursos.eliminado' => 0))
            ->get();

        // echo $this->db->last_query();exit;
        return $query->result();

    }

    public function alumnos_inscritos($idCurso)
    {

        $query = $this->db
            ->select("inscripcion.id, inscripcion.idCurso, inscripcion.idAlumnos, inscripcion.idRepresentante, inscripcion.eliminado, representantes.nombre as nameRepre, representantes.cedula as ceduRepre, alumnos.id as idAlum, alumnos.nombre as nameAlumno, alumnos.id as idAlum , cursos.id as idCurso, cursos.nombre as nameCurso")
            ->from('inscripcion')
            ->join('representantes', 'representantes.id=inscripcion.idRepresentante')
            ->join('alumnos', 'alumnos.id=inscripcion.idAlumnos')
            ->join('cursos', 'cursos.id=inscripcion.idCurso')
            ->where(array('idCurso' => $idCurso, 'inscripcion.eliminado' => 0))
            ->get();

        //  echo $this->db->last_query();exit;
        return $query->result();

    }

    public function alumnos_inscritos_por_docentes($idCurso, $idDocente)
    {

        $query = $this->db
            ->select("inscripcion.id, inscripcion.idCurso, inscripcion.idAlumnos, inscripcion.idRepresentante, inscripcion.eliminado, representantes.nombre as nameRepre, representantes.cedula as ceduRepre, alumnos.nombre as nameAlumno, alumnos.id as idAlum , cursos.nombre as nameCurso, cursos.idDocente")
            ->from('inscripcion')
            ->join('representantes', 'representantes.id=inscripcion.idRepresentante')
            ->join('alumnos', 'alumnos.id=inscripcion.idAlumnos')
            ->join('cursos', 'cursos.id=inscripcion.idCurso')
            ->where(array('idCurso' => $idCurso, 'cursos.idDocente' => $idDocente, 'inscripcion.eliminado' => 0))
            ->get();

        //echo $this->db->last_query();exit;
        return $query->result();

    }

    public function get_alumnos_inscritos_por_id_($idAlumnos)
    {

        $query = $this->db
            ->select("inscripcion.id, inscripcion.idCurso, inscripcion.idAlumnos, inscripcion.idRepresentante, inscripcion.eliminado, representantes.nombre as nameRepre, representantes.cedula as ceduRepre, alumnos.nombre as nameAlumno, alumnos.id as idAlum, alumnos.eliminado , cursos.nombre as nameCurso")
            ->from('inscripcion')
            ->join('representantes', 'representantes.id=inscripcion.idRepresentante')
            ->join('alumnos', 'alumnos.id=inscripcion.idAlumnos')
            ->join('cursos', 'cursos.id=inscripcion.idCurso')
            ->where(array('alumnos.id' => $idAlumnos, 'inscripcion.eliminado' => 0))
            ->get();
        //echo $this->db->last_query();exit;
        return $query->row();

    }

    public function listar_Representante_por_cedula($cedula)
    {

        $query = $this->db
            ->select("*")
            ->from("representantes")
        // ->join('grados', 'cursos.grado=grados.id')
        //->join('secciones', 'cursos.seccion=secciones.id')
        // ->join('docentes', 'docentes.id=cursos.idDocente')
            ->where(array('cedula' => $cedula))
        //->having('docentes.id = cursos.idDocente2')
            ->get();
        // echo $this->db->last_query();exit;
        return $query->row();

    }

    public function edit_curso($data = array(), $id)
    {

        $this->db->where('id', $id);
        $this->db->update('cursos', $data);

    }

    public function deleteCurso($id)
    {
        $this->db->set('eliminado', 1);
        $this->db->where('id', $id);
        $this->db->update('cursos');
    }

    public function deleteAlumnoCurso($id)
    {
        $this->db->set('eliminado', 1);
        $this->db->where('idAlumnos', $id);
        $this->db->where('eliminado', 0);
        $this->db->update('inscripcion');
        // echo $this->db->last_query();exit;
    }

}
