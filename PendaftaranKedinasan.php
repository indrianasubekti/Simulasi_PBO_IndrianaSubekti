<?php
// PendaftaranKedinasan.php
require_once 'Pendaftaran.php';

class PendaftaranKedinasan extends Pendaftaran {
    // Properti tambahan spesifik (private)
    private $skIkatanDinas;
    private $instansiSponsor;

    // Konstruktor
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar, $skIkatanDinas, $instansiSponsor) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar);
        $this->skIkatanDinas = $skIkatanDinas;
        $this->instansiSponsor = $instansiSponsor;
    }

    // --- GETTER & SETTER ---
    public function getSkIkatanDinas() {
        return $this->skIkatanDinas;
    }

    public function setSkIkatanDinas($skIkatanDinas) {
        $this->skIkatanDinas = $skIkatanDinas;
    }

    public function getInstansiSponsor() {
        return $this->instansiSponsor;
    }

    public function setInstansiSponsor($instansiSponsor) {
        $this->instansiSponsor = $instansiSponsor;
    }

    // --- IMPLEMENTASI METODE ABSTRAK (Wajib Hadir) ---
    public function hitungTotalBiaya() {
        // Logika detail perhitungan akan diisi pada Tahap 5
        return $this->getBiayaPendaftaranDasar();
    }

    public function tampilkanInfoJalur() {
        return "Jalur Pendaftaran: Kedinasan | No SK: " . $this->skIkatanDinas . " | Sponsor: " . $this->instansiSponsor;
    }

    // --- METODE QUERY SPESIFIK ---
    public static function getDaftarKedinasan($db) {
        $query = "SELECT id_pendaftaran, nama_calon, asal_sekolah, nilai_ujian, biaya_pendaftaran_dasar, sk_ikatan_dinas, instansi_sponsor 
                  FROM tabel_pendaftaran 
                  WHERE jalur_pendaftaran = 'Kedinasan'";
        
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $daftarKedinasan = [];
        while ($row = $stmt->fetch()) {
            $daftarKedinasan[] = new self(
                $row->id_pendaftaran,
                $row->nama_calon,
                $row->asal_sekolah,
                $row->nilai_ujian,
                $row->biaya_pendaftaran_dasar,
                $row->sk_ikatan_dinas,
                $row->instansi_sponsor
            );
        }
        return $daftarKedinasan;
    }
}
?>