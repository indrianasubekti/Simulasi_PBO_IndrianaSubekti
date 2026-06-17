<?php
// index.php

// 1. Memuat seluruh komponen logika yang dibutuhkan
require_once 'koneksi.php';
require_once 'Pendaftaran.php';
require_once 'PendaftaranReguler.php';
require_once 'PendaftaranPrestasi.php';
require_once 'PendaftaranKedinasan.php';

try {
    // 2. Inisialisasi koneksi database
    $database = new Database();
    $db = $database->getConnection();

    // 3. Mengambil data terpisah berdasarkan metode query spesifik masing-masing jalur (Tahap 4)
    $daftarReguler   = PendaftaranReguler::getDaftarReguler($db);
    $daftarPrestasi  = PendaftaranPrestasi::getDaftarPrestasi($db);
    $daftarKedinasan = PendaftaranKedinasan::getDaftarKedinasan($db);

} catch (Exception $e) {
    die("Terjadi kesalahan sistem: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulasi PBO - Panel Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold text-primary">Panel Dashboard Pendaftaran Mahasiswa Baru</h1>
        <p class="text-muted">Sistem Pemantauan Data Pendaftaran Mahasiswa Baru</p>
    </div>

    <div class="card shadow-sm mb-5">
        <div class="card-header bg-primary text-white py-3">
            <h5 class="card-title mb-0 fw-semibold">Data Pendaftaran - Jalur Reguler</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0 align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th class="ps-3">ID</th>
                            <th>Nama Calon</th>
                            <th>Asal Sekolah</th>
                            <th>Nilai Ujian</th>
                            <th>Prodi Pilihan</th>
                            <th>Lokasi Kampus</th>
                            <th>Biaya Dasar</th>
                            <th class="pe-3 text-end">Total Akhir Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($daftarReguler)): ?>
                            <tr><td colspan="8" class="text-center py-4 text-muted">Belum ada data pendaftar jalur reguler.</td></tr>
                        <?php else: ?>
                            <?php foreach ($daftarReguler as $reguler): ?>
                                <tr>
                                    <td class="ps-3 fw-bold"><?= $reguler->getIdPendaftaran(); ?></td>
                                    <td><?= htmlspecialchars($reguler->getNamaCalon()); ?></td>
                                    <td><?= htmlspecialchars($reguler->getAsalSekolah()); ?></td>
                                    <td><span class="badge bg-secondary"><?= $reguler->getNilaiUjian(); ?></span></td>
                                    <td><span class="fw-medium text-dark"><?= htmlspecialchars($reguler->getPilihanProdi()); ?></span></td>
                                    <td><?= htmlspecialchars($reguler->getLokasiKampus()); ?></td>
                                    <td>Rp <?= number_format($reguler->getBiayaPendaftaranDasar(), 0, ',', '.'); ?></td>
                                    <td class="pe-3 text-end fw-bold text-primary">Rp <?= number_format($reguler->hitungTotalBiaya(), 0, ',', '.'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow-sm mb-5">
        <div class="card-header bg-success text-white py-3">
            <h5 class="card-title mb-0 fw-semibold">Data Pendaftaran - Jalur Prestasi</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0 align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th class="ps-3">ID</th>
                            <th>Nama Calon</th>
                            <th>Asal Sekolah</th>
                            <th>Nilai Ujian</th>
                            <th>Kategori & Cakupan Prestasi</th>
                            <th>Biaya Dasar (Insentif)</th>
                            <th class="pe-3 text-end">Total Akhir Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($daftarPrestasi)): ?>
                            <tr><td colspan="7" class="text-center py-4 text-muted">Belum ada data pendaftar jalur prestasi.</td></tr>
                        <?php else: ?>
                            <?php foreach ($daftarPrestasi as $prestasi): ?>
                                <tr>
                                    <td class="ps-3 fw-bold"><?= $prestasi->getIdPendaftaran(); ?></td>
                                    <td><?= htmlspecialchars($prestasi->getNamaCalon()); ?></td>
                                    <td><?= htmlspecialchars($prestasi->getAsalSekolah()); ?></td>
                                    <td><span class="badge bg-secondary"><?= $prestasi->getNilaiUjian(); ?></span></td>
                                    <td><small class="text-muted fw-medium"><?= htmlspecialchars($prestasi->tampilkanInfoJalur()); ?></small></td>
                                    <td>Rp <?= number_format($prestasi->getBiayaPendaftaranDasar(), 0, ',', '.'); ?> <span class="text-success text-xs">(-50k)</span></td>
                                    <td class="pe-3 text-end fw-bold text-success">Rp <?= number_format($prestasi->hitungTotalBiaya(), 0, ',', '.'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow-sm mb-5">
        <div class="card-header bg-warning text-dark py-3">
            <h5 class="card-title mb-0 fw-semibold">Data Pendaftaran - Jalur Kedinasan</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped mb-0 align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th class="ps-3">ID</th>
                            <th>Nama Calon</th>
                            <th>Asal Sekolah</th>
                            <th>Nilai Ujian</th>
                            <th>Informasi Ikatan Dinas & Kemitraan</th>
                            <th>Biaya Dasar (+Surcharge 25%)</th>
                            <th class="pe-3 text-end">Total Akhir Biaya</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($daftarKedinasan)): ?>
                            <tr><td colspan="7" class="text-center py-4 text-muted">Belum ada data pendaftar jalur kedinasan.</td></tr>
                        <?php else: ?>
                            <?php foreach ($daftarKedinasan as $kedinasan): ?>
                                <tr>
                                    <td class="ps-3 fw-bold"><?= $kedinasan->getIdPendaftaran(); ?></td>
                                    <td><?= htmlspecialchars($kedinasan->getNamaCalon()); ?></td>
                                    <td><?= htmlspecialchars($kedinasan->getAsalSekolah()); ?></td>
                                    <td><span class="badge bg-secondary"><?= $kedinasan->getNilaiUjian(); ?></span></td>
                                    <td><small class="text-muted fw-medium"><?= htmlspecialchars($kedinasan->tampilkanInfoJalur()); ?></small></td>
                                    <td>Rp <?= number_format($kedinasan->getBiayaPendaftaranDasar(), 0, ',', '.'); ?></td>
                                    <td class="pe-3 text-end fw-bold text-danger">Rp <?= number_format($kedinasan->hitungTotalBiaya(), 0, ',', '.'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>