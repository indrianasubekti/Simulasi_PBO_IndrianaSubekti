<?php
// PendaftaranReguler.php
require_once 'Pendaftaran.php';

class PendaftaranReguler extends Pendaftaran {
    // Properti tambahan spesifik (private)
    private $pilihanProdi;
    private $lokasiKampus;

    // Konstruktor
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar, $pilihanProdi, $lokasiKampus) {
        // Memanggil konstruktor milik class induk (Pendaftaran)
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar);
        $this->pilihanProdi = $pilihanProdi;
        $this->lokasiKampus = $lokasiKampus;
    }

    // --- GETTER & SETTER ---
    public function getPilihanProdi() {
        return $this->pilihanProdi;
    }

    public function setPilihanProdi($pilihanProdi) {
        $this->pilihanProdi = $pilihanProdi;
    }

    public function getLokasiKampus() {
        return $this->lokasiKampus;
    }

    public function setLokasiKampus($lokasiKampus) {
        $this->lokasiKampus = $lokasiKampus;
    }

    // --- OVERRIDING METODE ABSTRAK INDUK ---
    public function hitungTotalBiaya() {
        // Jalur Reguler: Tarif standar murni
        return $this->getBiayaPendaftaranDasar();
    }

    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Reguler | Prodi: " . $this->pilihanProdi . " | Kampus: " . $this->lokasiKampus;
    }

    // --- METODE QUERY SPESIFIK ---
    public static function getDaftarReguler($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, pilihan_prodi, lokasi_campur 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Reguler'";
        
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $daftarReguler = [];
        while ($row = $stmt->fetch()) {
            // Memetakan hasil query ke dalam bentuk Object PendaftaranReguler
            $daftarReguler[] = new self(
                $row->id_pendaftaran,
                $row->nama_calon,
                $row->asal_sekolah,
                $row->nilai_ujian,
                $row->biaya_pendaftaran_dasar,
                $row->pilihan_prodi,
                $row->lokasi_kampus
            );
        }
        return $daftarReguler;
    }
}
?>