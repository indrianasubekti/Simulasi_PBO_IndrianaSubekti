<?php
// koneksi.php

class Database {
    private $host = "localhost";
    private $username = "root"; // Sesuaikan dengan username MySQL Anda
    private $password = "";     // Sesuaikan dengan password MySQL Anda
    private $db_name = "DB_SIMULASI_PBO_TI1C_INDRIANASUBEKTI"; // Ganti NamaLengkap sesuai Tahap 1
    private $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            // Mengatur mode error PDO ke Exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Mengatur default fetch mode ke object untuk kemudahan pemetaan PBO
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch(PDOException $exception) {
            echo "Koneksi database gagal: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>