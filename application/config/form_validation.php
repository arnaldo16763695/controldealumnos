<?php
/**
 * Reglas de validacion para formularios
 */
$config = array(

    /**
     * add_formulario
     * */
    'registro_usuario'     => array(

        array('field' => 'correo', 'label' => 'E-Mail', 'rules' => 'required|is_string|trim|valid_email'),
        array('field' => 'correo2', 'label' => 'Repita E-Mail', 'rules' => 'required|is_string|trim|valid_email'),
        array('field' => 'nombre', 'label' => 'Nombre y Apellido', 'rules' => 'required|is_string|trim|max_length[50]'),
        array('field' => 'cedula', 'label' => 'Cédula', 'rules' => 'required|trim|max_length[20]|numeric'),
        array('field' => 'telefono', 'label' => 'Telefono', 'rules' => 'required|is_string|trim'),
        array('field' => 'direccion', 'label' => 'Dirección', 'rules' => 'required|is_string|trim|max_length[50]'),
        array('field' => 'fNacimiento', 'label' => 'Fecha de Nacimiento', 'rules' => 'required|trim|regex_match[/[0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9]$/]|max_length[10]'),
        array('field' => 'pass', 'label' => 'Contraseña', 'rules' => 'required|is_string|trim|max_length[20]'),
        array('field' => 'pass2', 'label' => 'Repita contraseña', 'rules' => 'required|is_string|trim|max_length[20]'),

    ),

    /**
     * add_formulario
     * */
    'login'                => array(

        array('field' => 'pass', 'label' => 'Contraseña', 'rules' => 'required|trim|max_length[20]'),
        // array('field' => 'correo','label' => 'E-Mail','rules' => 'required|is_string|trim|valid_email'),
        array('field' => 'correo', 'label' => 'Correo', 'rules' => 'required|trim'),

    ),

    /**
     * add_alumnos
     * */
    'add_alumnos'          => array(

        array('field' => 'cedulaRepresentante', 'label' => 'Cedula Representante', 'rules' => 'required|trim|max_length[20]|numeric'),
        array('field' => 'nombreRepresentante', 'label' => 'Nombre del Representante', 'rules' => 'required|trim|max_length[50]'),
        array('field' => 'fechaNRepresentante', 'label' => 'Fecha de Nacimiento del Representante', 'rules' => 'required|trim|regex_match[/[0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9]$/]|max_length[10]'),
        array('field' => 'telefono', 'label' => 'Teléfono del Representante', 'rules' => 'required|trim|max_length[50]'),
        array('field' => 'direccion', 'label' => 'Dirección de Habitación', 'rules' => 'required|trim|max_length[50]'),

        array('field' => 'nombreEstudiante[]', 'label' => 'Nombre del Estudiante', 'rules' => 'required|trim|max_length[50]'),
        array('field' => 'fechaNEstudiante[]', 'label' => 'Fecha de Nacimiento del Estudiante', 'rules' => 'required|trim|regex_match[/[0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9]$/]|max_length[10]'),
        array('field' => 'lugarNEstudiante[]', 'label' => 'Lugar de Nacimiento', 'rules' => 'required|trim|max_length[50]'),
        array('field' => 'cedulaEstudiante', 'label' => 'Cedula del Estudiante', 'rules' => 'trim|max_length[20]|numeric'),
        array('field' => 'sexo[]', 'label' => 'Sexo del Estudiante', 'rules' => 'required|trim|max_length[50]'),

        array('field' => 'nombreMadre[]', 'label' => 'Nombre de la Madre', 'rules' => 'required|trim|max_length[50]'),
        array('field' => 'cedulaMadre[]', 'label' => 'Cedula de la Madre', 'rules' => 'required|trim|max_length[20]|numeric'),
        array('field' => 'nombrePadre[]', 'label' => 'Nombre del Padre', 'rules' => 'required|trim|max_length[50]'),
        array('field' => 'cedulaPadre[]', 'label' => 'Cedula del Padre', 'rules' => 'required|trim|max_length[20]|numeric'),
    ),

    /**
     * add_antropometrico
     * */
    'add_antropometrico'   => array(

        //array('field' => 'edad', 'label' => 'Edad', 'rules' => 'required|trim|max_length[20]|numeric'),
        array('field' => 'peso', 'label' => 'Peso', 'rules' => 'required|trim|max_length[20]|numeric'),
        array('field' => 'tCamisa', 'label' => 'Talla Camisa', 'rules' => 'required|trim|max_length[20]|numeric'),
        array('field' => 'tPantalones', 'label' => 'Talla Pantalones', 'rules' => 'required|trim|max_length[20]|numeric'),
        array('field' => 'tCalzado', 'label' => 'Talla Calzado', 'rules' => 'required|trim|max_length[20]|numeric'),
        array('field' => 'altura', 'label' => 'Altura', 'rules' => 'required|trim|max_length[20]|numeric'),
        array('field' => 'observaciones', 'label' => 'Observaciones', 'rules' => 'required|trim|max_length[200]'),
    ),

    /**
     * add_producto
     * */
    'edit_alumnos'         => array(

        array('field' => 'nombreEstudiante', 'label' => 'Nombre del Estudiante', 'rules' => 'required|trim|max_length[50]'),
        array('field' => 'fechaNEstudiante', 'label' => 'Fecha de Nacimiento del Estudiante', 'rules' => 'required|trim|regex_match[/[0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9]$/]|max_length[10]'),
        array('field' => 'lugarNEstudiante', 'label' => 'Lugar de Nacimiento', 'rules' => 'required|trim|max_length[50]'),
        array('field' => 'cedulaEstudiante', 'label' => 'Cedula del Estudiante', 'rules' => 'trim|max_length[20]|numeric'),
        array('field' => 'sexo', 'label' => 'Sexo del Estudiante', 'rules' => 'required|trim|max_length[50]'),

        array('field' => 'nombreMadre', 'label' => 'Nombre de la Madre', 'rules' => 'required|trim|max_length[50]'),
        array('field' => 'cedulaMadre', 'label' => 'Cedula de la Madre', 'rules' => 'required|trim|max_length[20]|numeric'),
        array('field' => 'nombrePadre', 'label' => 'Nombre del Padre', 'rules' => 'required|trim|max_length[50]'),
        array('field' => 'cedulaPadre', 'label' => 'Cedula del Padre', 'rules' => 'required|trim|max_length[20]|numeric'),
    ),

    'adicionar_alumnos'    => array(

        array('field' => 'cedulaRepresentante', 'label' => 'Cedula Representante', 'rules' => 'required|trim|max_length[20]|numeric'),
        array('field' => 'nombreEstudiante[]', 'label' => 'Nombre del Estudiante', 'rules' => 'required|trim|max_length[50]'),
        array('field' => 'fechaNEstudiante[]', 'label' => 'Fecha de Nacimiento del Estudiante', 'rules' => 'required|trim|regex_match[/[0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9]$/]|max_length[10]'),
        array('field' => 'lugarNEstudiante[]', 'label' => 'Lugar de Nacimiento', 'rules' => 'required|trim|max_length[50]'),
        //    array('field' => 'cedulaEstudiante','label' => 'Cedula del Estudiante','rules' => 'required|trim|max_length[20]|numeric'),
        array('field' => 'sexo[]', 'label' => 'Sexo del Estudiante', 'rules' => 'required|trim|max_length[50]'),

        array('field' => 'nombreMadre[]', 'label' => 'Nombre de la Madre', 'rules' => 'required|trim|max_length[50]'),
        array('field' => 'cedulaMadre[]', 'label' => 'Cedula de la Madre', 'rules' => 'required|trim|max_length[20]|numeric'),
        array('field' => 'nombrePadre[]', 'label' => 'Nombre del Padre', 'rules' => 'required|trim|max_length[50]'),
        array('field' => 'cedulaPadre[]', 'label' => 'Cedula del Padre', 'rules' => 'required|trim|max_length[20]|numeric'),
    ),

    /**
     * add_producto
     * */

    'add_curso'            => array(

        array('field' => 'etapa', 'label' => 'Etapa', 'rules' => 'required|trim'),
        array('field' => 'grado', 'label' => 'Grado', 'rules' => 'required|trim'),
        array('field' => 'seccion', 'label' => 'Seccion', 'rules' => 'required|trim'),
        array('field' => 'docente', 'label' => 'Docente', 'rules' => 'required|trim'),
        array('field' => 'Hentrada', 'label' => 'Hora de Entrada', 'rules' => 'required|trim'),
        array('field' => 'Hsalida', 'label' => 'Hora de Salida', 'rules' => 'required|trim'),
        array('field' => 'descripcionCurso', 'label' => 'Descripción del Curso', 'rules' => 'required|trim|max_length[20]'),

    ),

    'add_docentes'         => array(

        array('field' => 'usuario', 'label' => 'Usuario', 'rules' => 'required|trim|max_length[60]|numeric'),

    ),

    'add_alumnos_a_cursos' => array(

        array('field' => 'cedulaRepresentante', 'label' => 'Cedula del Representante', 'rules' => 'required|trim|max_length[20]|numeric'),

    ),

    /**
     * Edit_representante
     * */
    'edit_representante'   => array(

        array('field' => 'cedulaRepresentante', 'label' => 'Cedula Representante', 'rules' => 'required|trim|max_length[20]|numeric'),
        array('field' => 'nombreRepresentante', 'label' => 'Nombre del Representante', 'rules' => 'required|trim|max_length[50]'),
        array('field' => 'fechaNRepresentante', 'label' => 'Fecha de Nacimiento del Representante', 'rules' => 'required|trim|regex_match[/[0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9]$/]|max_length[10]'),
        array('field' => 'telefono', 'label' => 'Teléfono del Representante', 'rules' => 'required|trim|max_length[50]'),
        array('field' => 'direccion', 'label' => 'Dirección de Habitación', 'rules' => 'required|trim|max_length[50]'),

    ),

    //éste es el final
);
