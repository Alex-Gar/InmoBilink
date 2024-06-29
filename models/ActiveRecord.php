<?php

namespace Model;

class ActiveRecord
{

    // Base DE DATOS
    protected static $db;
    protected static $tabla = '';
    protected static $columnasDB = [];

    // Alertas y Mensajes
    protected static $alertas = [];
    protected static $atributoId = '';

    // Definir la conexión a la BD - includes/database.php
    public static function setDB($database)
    {
        self::$db = $database;
    }

    public static function setAlerta($tipo, $mensaje)
    {
        static::$alertas[$tipo][] = $mensaje;
    }

    // Validación
    public static function getAlertas()
    {
        return static::$alertas;
    }

    public function validar()
    {
        static::$alertas = [];
        return static::$alertas;
    }

    // Consulta SQL para crear un objeto en Memoria
    public static function consultarSQL($query)
    {
        // Consultar la base de datos
        $resultado = self::$db->query($query);

        // Iterar los resultados
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        // liberar la memoria
        $resultado->free();

        // retornar los resultados
        return $array;
    }

    // Crea el objeto en memoria que es igual al de la BD
    protected static function crearObjeto($registro)
    {
        $objeto = new static;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    // Identificar y unir los atributos de la BD
    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id')
                continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    // Sanitizar los datos antes de guardarlos en la BD
    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    // Sincroniza BD con Objetos en memoria
    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

    // Registros - CRUD
    public function guardar()
    {
        $resultado = '';
        if (!is_null($this->id)) {
            // actualizar
            $resultado = $this->actualizar();
        } else {
            // Creando un nuevo registro
            $resultado = $this->crear();
        }
        return $resultado;
    }

    // Todos los registros
    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // Busca un registro por su id
    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE " . static::$atributoId . " = {$id}";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    // Obtener Registros con cierta cantidad
    public static function get($limite)
    {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT {$limite}";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    // crea un nuevo registro
    public function crear()
    {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Insertar en la base de datos
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        // Resultado de la consulta
        $resultado = self::$db->query($query);
        return [
            'resultado' => $resultado,
            'id' => self::$db->insert_id
        ];
    }

    // Actualizar el registro
    public function actualizar()
    {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Iterar para ir agregando cada campo de la BD
        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        // Consulta SQL
        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        // Actualizar BD
        $resultado = self::$db->query($query);
        return $resultado;
    }

    // Eliminar un Registro por su ID
    public function eliminar()
    {
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public static function filtroSecundario($tipoPropiedad, $finalidad, $ciudad)
    {
        // Construcción de la consulta SQL con parámetros opcionales
        $query = "SELECT DISTINCT pro.*, u.*, i.*
     FROM propiedades AS pro
     INNER JOIN ubicaciones AS u ON pro.id = u.id_propiedad
     INNER JOIN imagenes AS i ON pro.id = i.id_propiedad
     WHERE 1=1";

        // Condiciones opcionales
        if (!empty($tipoPropiedad)) {
            $query .= " AND pro.tipo_propiedad = '" . self::escapeSQL($tipoPropiedad) . "'";
        }
        if (!empty($finalidad)) {
            $query .= " OR pro.finalidad = '" . self::escapeSQL($finalidad) . "'";
        }
        if (!empty($ciudad)) {
            $query .= " AND (u.municipio LIKE '%" . self::escapeSQL($ciudad) . "%' OR u.localidad LIKE '%" . self::escapeSQL($ciudad) . "%')";
        }
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // Método auxiliar para escapar valores
    private static function escapeSQL($value)
    {
        // Este método debería implementar el escape de valores para evitar inyecciones SQL
        return mysqli_real_escape_string(self::$db, $value);  // Asumiendo que self::$db es la conexión a la base de datos
    }


    public static function where($columna, $valor)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE ${columna} = '${valor}';";
        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    public function comprobarPasswordAndVerificado($password)
    {
        $resultado = password_verify($password, $this->password);

        if (!$resultado || !$this->confirmado) {
            self::$alertas['error'][] = 'Password Incorrecto o tu cuenta no ha sido confirmada';
        } else {
            return true;
        }
    }
    public static function findByForeingKey($llaveForanea, $id)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE $llaveForanea = ${id}; ";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }
    public function setImagen($imagen, $numero)
    {
        // Validar que el número de imagen esté entre 1 y 5
        if ($numero < 1 || $numero > 5) {
            echo "El número de imagen debe estar entre 1 y 5.";
        }

        // Construir el nombre de la propiedad de la imagen (img1, img2, etc.)
        $propiedad_imagen = 'img' . $numero;

        // Verificar que la propiedad exista en el objeto
        if (!property_exists($this, $propiedad_imagen)) {
            echo "La propiedad {$propiedad_imagen} no existe.";
        }

        // Eliminar imagen previa si existe y si el id no es nulo
        if (!is_null($this->id)) {
            $this->borrarImagen();
        }

        // Asignar la nueva imagen si se proporciona
        if ($imagen) {
            $this->$propiedad_imagen = $imagen;
        }
    }

    public function borrarImagen()
    {
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->img1);

        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->img1);
            unlink(CARPETA_IMAGENES . $this->img2);
            unlink(CARPETA_IMAGENES . $this->img3);
            unlink(CARPETA_IMAGENES . $this->img4);
            unlink(CARPETA_IMAGENES . $this->img5);
        }
    }
}
