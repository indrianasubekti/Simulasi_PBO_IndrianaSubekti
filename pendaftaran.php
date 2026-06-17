<?php
// Pendaftaran.php

abstract class Pendaftaran {
    // Properti Terenkapsulasi (Sesuai preferensi: private)
    private $id_pendaftaran;
    private $nama_calon;
    private $asal_sekolah;
    private $nilai_ujian;
    private $biayaPendaftaranDasar;

    // Konstruktor untuk memetakan data dari kolom tabel database
    public function __construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biayaPendaftaranDasar) {
        $this->id_pendaftaran = $id_pendaftaran;
        $this->nama_calon = $nama_calon;
        $this->asal_sekolah = $asal_sekolah;
        $this->nilai_ujian = $nilai_ujian;
        $this->biayaPendaftaranDasar = $biayaPendaftaranDasar;
    }

    // --- GETTER & SETTER ---
    
    public function getIdPendaftaran() {
        return $this->id_pendaftaran;
    }

    public function setIdPendaftaran($id_pendaftaran) {
        $this->id_pendaftaran = $id_pendaftaran;
    }

    public function getNamaCalon() {
        return $this->nama_calon;
    }

    public function setNamaCalon($nama_calon) {
        $this->nama_calon = $nama_calon;
    }

    public function getAsalSekolah() {
        return $this->asal_sekolah;
    }

    public function setAsalSekolah($asal_sekolah) {
        $this->asal_sekolah = $asal_sekolah;
    }

    public function getNilaiUjian() {
        return $this->nilai_ujian;
    }

    public function setNilaiUjian($nilai_ujian) {
        $this->nilai_ujian = $nilai_ujian;
    }

    public function getBiayaPendaftaranDasar() {
        return $this->biayaPendaftaranDasar;
    }

    public function setBiayaPendaftaranDasar($biayaPendaftaranDasar) {
        $this->biayaPendaftaranDasar = $biayaPendaftaranDasar;
    }

    // --- METODE ABSTRAK (Wajib diimplementasikan oleh class anak) ---
    
    abstract public function hitungTotalBiaya();
    abstract public function tampilkanInfoJalur();
}
?>