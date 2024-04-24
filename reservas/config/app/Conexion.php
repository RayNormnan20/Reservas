<?php 
class Conexion {
    private $conect;
    public function __construct(){
        // Formar la cadena de conexión PDO con las constantes
        $pdo = "mysql:host=" . HOST . ";dbname=" . DATABASE . ";" . CHARSET;

        try {
            // Establecer la conexión
            $this->conect = new PDO($pdo, USER, PASS);
            // Establecer el modo de errores para que se muestren excepciones
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo ''; // Este mensaje indicará que la conexión se ha realizado correctamente
        } catch (PDOException $e) {
            echo 'Error en la conexión: '. $e->getMessage(); // Mostrar mensaje de error si la conexión falla
        }
    }
    // Método para obtener la conexión
    public function conectar (){
        return $this -> conect;
    }
}
?>
