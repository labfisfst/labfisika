<!DOCTYPE html>
<html lang="id">
<head>
    <title>Daftar Inventaris Lab</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        .header-title {
            font-weight: 700;
            color: #333;
        }
    </style>
</head>
<body class="bg-light p-4">

    <div class="container-fluid bg-white p-4 rounded shadow-sm">
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="header-title mb-0">Daftar Alat: <span class="text-primary"><?= $judul ?></span></h2>
                <small class="text-muted">Inventaris Laboratorium Fisika</small>
            </div>
            
            <div>
                <?php if(session()->get('is_admin')): ?>
                    <span class="me-3 fw-bold text-success"><i class="fas fa-user-shield"></i> Admin Mode</span>
                    <a href="<?= base_url('admin/tambah') ?>" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Alat</a>
                    <a href="<?= base_url('logout') ?>" class="btn btn-outline-danger ms-2"><i class="fas fa-sign-out-alt"></i> Logout</a>
                <?php else: ?>
                    <a href="<?= base_url('login') ?>" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Login Admin</a>
                <?php endif; ?>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th width="5%">No</th>
                        <th width="10%">Foto</th>
                        <th width="20%">Nama Alat</th>
                        
                        <?php if($judul == 'Semua Alat'): ?>
                            <th width="15%">Lokasi Lab</th>
                        <?php endif; ?>

                        <th width="8%">Tahun</th>
                        <th width="10%">Kondisi</th>
                        <th>Fungsi</th>
                        <th width="12%">Lihat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($barang as $brg): ?>
                    <tr>
                        <td class="text-center fw-bold"><?= $no++ ?></td>
                        
                        <td class="text-center">
                            <?php if($brg['foto']): ?>
                                <img src="<?= base_url('uploads/' . $brg['foto']) ?>" class="rounded border" width="60" height="60" style="object-fit: cover;">
                            <?php else: ?>
                                <span class="badge bg-secondary">No IMG</span>
                            <?php endif; ?>
                        </td>

                        <td class="fw-bold text-primary"><?= $brg['nama_alat'] ?></td>

                        <?php if($judul == 'Semua Alat'): ?>
                            <td>
                                <span class="badge bg-secondary"><?= $brg['lokasi'] ?></span>
                            </td>
                        <?php endif; ?>

                        <td class="text-center"><?= $brg['tahun'] ?></td>
                        
                        <td class="text-center">
                            <?php 
                                $warna = 'success';
                                if($brg['kondisi'] == 'Rusak Ringan') $warna = 'warning';
                                if($brg['kondisi'] == 'Rusak Berat') $warna = 'danger';
                            ?>
                            <span class="badge bg-<?= $warna ?>"><?= $brg['kondisi'] ?></span>
                        </td>

                        <td class="text-muted small"><?= $brg['fungsi'] ?></td>
                        
                        <td class="text-center">
                            <?php if(session()->get('is_admin')): ?>
                                <a href="<?= base_url('admin/edit/' . $brg['id']) ?>" class="btn btn-info btn-sm text-white" title="Edit Data">
                                    <i class="fas fa-eye"></i>
                                </a>
                            <?php else: ?>
                                <a href="<?= base_url('barang/detail/' . $brg['id']) ?>" class="btn btn-info btn-sm text-white" title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                            <?php endif; ?>
                        </td>

                    </tr>
                    <?php endforeach; ?>
                    
                    <?php if(empty($barang)): ?>
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="fas fa-box-open fa-3x mb-3"></i><br>
                            Belum ada data barang di lokasi ini.
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        
        <div class="mt-3">
            <a href="<?= base_url('/') ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali ke Menu Utama
            </a>
        </div>

    </div>

</body>
</html>