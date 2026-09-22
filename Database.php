<?php
class Database {
    // Propiedades privadas: Nadie fuera de esta clase puede modificarlas directamente
    private $host = "localhost";
    private $db_name = "todo_db";
    private $username = "root";
    private $password = "";
    private $conn;

    // Método para obtener la conexión a la base de datos
    public function getConnection() {
        $this->conn = null;

        try {
            // Usamos PDO por seguridad y flexibilidad
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            // Configurar PDO para reportar errores mediante Excepciones
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }

        return $this->conn;
    }
}