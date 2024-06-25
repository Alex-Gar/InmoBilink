<?php

namespace Model;

class Propietarios extends ActiveRecord
{

    protected static $tabla = 'propietarios';
    protected static $atributoId = 'id';
    protected static $columnasDB = ['id', 'nombre', 'p_apellido', 's_apellido', 'email', 'password', 'rol_user', 'telefono', 'fecha_registro', 'fecha_cierre', 'paquete', 'status_pago', 'confirmado', 'token'];
    public $id;
    public $nombre;
    public $p_apellido;
    public $s_apellido;
    public $email;
    public $password;
    public $rol_user;
    public $telefono;
    public $fecha_registro;
    public $fecha_cierre;
    public $paquete;
    public $status_pago;
    public $no_propiedades;
    public $confirmado;
    public $token;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->p_apellido = $args['p_apellido'] ?? '';
        $this->s_apellido = $args['s_apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->rol_user = $args['rol_user'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->fecha_registro = date('Y-m-d');
        $this->paquete = $args['paquete'] ?? '';
        $this->fecha_cierre =  date('Y-m-d'); //Pediente calcular la fecha del fin del paquete
        $this->status_pago = $args['status_pago'] ?? '';
        $this->no_propiedades = $args['no_propiedades'] ?? 0;
        $this->confirmado = $args['confirmado'] ?? 0;
        $this->token = $args['token'] ?? '';
    }

    public function validar()
    {
        if (!$this->nombre) {
            self::$alertas[] = "Error el campo nombre es obligatorio.";
        }
        if (!$this->p_apellido) {
            self::$alertas[] = "Error el campo primer apellido es obligatorio.";
        }
        /*  if (!$this->s_apellido) {
            self::$alertas[] = "Error el campo segundo apellido es obligatorio.";
        } */
        if (!$this->email) {
            self::$alertas[] = "El E-mail es obligatorio";
        }
        if (!$this->password) {
            self::$alertas[] = "Error en la contraseña.";
        }
        if (!$this->rol_user) {
            self::$alertas[] = "Error al seleccionar el rol.";
        }
        if (!$this->telefono) {
            self::$alertas[] = "Error el campo telefono es obligatorio.";
        }
        if (strlen($this->telefono) > 10) {
            self::$alertas[] = "Error el telefono tiene mas de 10 dígitos.";
        }
        if (!$this->paquete) {
            self::$alertas[] = "Error al seleccionar el paquete.";
        }
        /*  if (!$this->status_pago) {
            self::$alertas[] = "Se necesita validar si el cliente pago.";
        }*/
        return self::$alertas;
    }
    public function validarLogin()
    {
        if (!$this->email) {
            self::$alertas[] = "El E-mail es obligatorio";
        }
        if (!$this->password) {
            self::$alertas[] = "La contraseña es obligatorio.";
        }
        return self::$alertas;
    }

    public function validarEmail()
    {
        if (!$this->email) {
            self::$alertas[] = "El E-mail es obligatorio";
        }
        return self::$alertas;
    }


    public function hashPassword()
    {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }
    public function crearToken()
    {
        $this->token = uniqid();
    }
    public function comprobarPassword($password)
    {
        $resultado = password_verify($password, $this->password);

        if (!$resultado || !$this->confirmado) {
            self::$alertas['error'][] = "Password incorrecto o tu cuenta no esta confirmada";
        } else {
            return true;
        }
    }
    public function validarPassword()
    {
        if (!$this->password) {
            self::$alertas['error'][] = "El password es obligatorio";
        }
        if (strlen($this->password) < 8) {
            self::$alertas['error'][] = "El password debe tener al menos 8 caracteres";
        }
        return self::$alertas;
    }

    public function existeUsuario()
    {
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";
        $resultado = self::$db->query($query);

        if (!$resultado->num_rows) {
            self::$alertas[] = 'El Correo no esta registrado a un usuario, Regístrate!!';
            return;
        }
        return $resultado;
    }
}
