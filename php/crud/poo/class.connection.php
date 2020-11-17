<?php
class Connection {
    private $host = 'localhost';
    private $db = 'db_example';
    private $user = 'admin';
    private $pass = '1234';

    public function __construct() {
        // Para bbdd en MySQL o MariaDB
        try {
            // creamos una conexión con los datos anteriores
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
            // selecciona el modo de error de PDO a excepción
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conectado con éxito a la base de datos";
        } catch(PDOException $e) {
            echo "Conexión fallida: " . $e->getMessage();
        }
    }

    // Para cerrar la conexión:
    // ejecutar desde donde se importe este script
    // connect_db::$conn->close();
    public function closedb() {
        $this->conn->close();
    }

    // Añadir datos
    public function add(){
        try {
            // sentencia preparada
            $sql = "INSERT INTO db (x,x,x) VALUES (:campo, :campo2, :campo3)";
            $stp = $this->conn->prepare($sql); 
            // Preparar variables
            // $variable = "valor";

            // asociar parámetros con variables 
            $stp->bindParam(); // (':campo', $variable)

            $stp->execute();

            echo "Filas insertadas correctamente";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    // Borrar datos
    public function delete($id){
        try {
            $sql = "DELETE FROM db WHERE id=:id";
            $stp = $this->conn->prepare($sql); 
            // asignar valor del id
            $stp->bindParam(':id', $id);
            $this->conn->exec($sql);
            
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    // Actualizar datos
    public function update(){
        try {
            // sentencia preparada
            $sql = "UPDATE db SET campo1=:campo, campo2:campo2, campo3=:campo3)";
            $stp = $this->conn->prepare($sql); 
            // Preparar variables
            // $variable = "valor";

            // asociar parámetros con variables 
            $stp->bindParam(); // (':campo', $variable)

            $stp->execute();

            echo "Filas actualizadas correctamente";
            
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    // Recuperar datos
    public function read(){
        try {
            // sentencia preparada
            $sql = "UPDATE db SET campo1=:campo, campo2:campo2, campo3=:campo3)";
            $stp = $this->conn->prepare($sql); 
            // Preparar variables
            // $variable = "valor";

            // asociar parámetros con variables 
            $stp->bindParam(); // (':campo', $variable)
            $stp->execute();
            $result = $stp->fetch();
            return $result;
            
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
