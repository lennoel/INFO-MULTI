<?php
require 'setting.php';

class Conexion {
    private $conector = null;

    public function getConexion() {
        $this->conector = new PDO("sqlsrv:server=".SERVIDOR.";database=".DATABASE, USUARIO, PASSWORD);
    }
}

$con = new Conexion();
if ($con->getConexion() != null) {
    echo "Conexión exitosa";
} else {
    echo "Error al conectarse";
}
?>
