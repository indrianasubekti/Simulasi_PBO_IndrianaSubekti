<?php
// PendaftaranPrestasi.php
require_once 'Pendaftaran.php';

class PendaftaranPrestasi extends Pendaftaran {
    // Properti tambahan spesifik (private)
    private $jenisPrestasi;
    private $tingkatPrestasi;

    // Konstruktor
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar, $jenisPrestasi, $tingkatPrestasi) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar);
        $this->jenisPrestasi = $jenisPrestasi;
        $this->tingkatPrestasi = $tingkatPrestasi;
    }

    // --- GETTER & SETTER ---
    public function getJenisPrestasi() {
        return $this->jenisPrestasi;
    }

    public function setJenisPrestasi($jenisPrestasi) {
        $this->jenisPrestasi = $jenisPrestasi;
    }

    public function getTingkatPrestasi() {
        return $this->tingkatPrestasi;
    }

    public function setTingkatPrestasi($tingkatPrestasi) {
        $this->tingkatPrestasi = $tingkatPrestasi;
    }

    // --- IMPLEMENTASI METODE ABSTRAK (Wajib Hadir) ---
    public function hitungTotalBiaya() {
        // Logika detail perhitungan akan diisi pada Tahap 5
        return $this->getBiayaPendaftaranDasar();
    }

    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Prestasi | Jenis: " . $this->jenisPrestasi . " | Tingkat: " . $this->tingkatPrestasi;
    }

    // --- METODE QUERY SPESIFIK ---
    public static function getDaftarPrestasi($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, jenis_prestasi, tingkat_prestasi 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Prestasi'";
        
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $daftarPrestasi = [];
        while ($row = $stmt->fetch()) {
            $daftarPrestasi[] = new self(
                $row->id_pendaftaran,
                $row->nama_calon,
                $row->asal_sekolah,
                $row->nilai_ujian,
                $row->biaya_pendaftaran_dasar,
                $row->jenis_prestasi,
                $row->tingkat_prestasi
            );
        }
        return $daftarPrestasi;
    }
}
?>