<?= $this->extend('layouts/base'); ?>

<?= $this->section('content'); ?>

<section class="section">
    <div class="section-header">
        <h1>Lihat Rekam Medis</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form action="<?= base_url('/find-dokumen'); ?>" method="get">
                        <div class="card-header">
                            <h4>Identitas Pasien</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Nomor Rekam Medis</label>
                                        <input type="number" name="nomor_rm" class="form-control" value="<?= service('request')->getGet('nomor_rm'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control" value="<?= service('request')->getGet('nama'); ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Tahun</label>
                                        <input type="number" name="tahun" class="form-control" value="<?= service('request')->getGet('tahun'); ?>">
                                    </div>
                                    <div class="form-group mb-0">
                                        <label>Diagnosa</label>
                                        <input type="text" name="diagnosa" class="form-control" value="<?= service('request')->getGet('diagnosa'); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button class="btn btn-primary">Cari</button>
                        </div>
                    </form>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-list-alt"></i> Hasil Pencarian</h4>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($result)): ?>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nomor RM</th>
                                            <th>Nama Pasien</th>
                                            <th>Tahun</th>
                                            <th>Diagnosa</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($result as $key => $dokumen): ?>
                                            <tr>
                                                <td><?= $key + 1; ?></td>
                                                <td><?= esc($dokumen['no_rm']); ?></td>
                                                <td><?= esc($dokumen['nama']); ?></td>
                                                <td><?= esc($dokumen['tahun']); ?></td>
                                                <td><?= esc($dokumen['diagnosa']); ?></td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-info btn-sm btn-lihat"
                                                        data-toggle="modal"
                                                        data-target="#dokumenModal"
                                                        data-url="<?= base_url('uploads/dokumen/' . $dokumen['unique_file_name']); ?>"
                                                        data-title="<?= esc($dokumen['origin_file_name']); ?>"
                                                        title="Lihat Dokumen">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-warning text-center" role="alert">
                                <i class="fas fa-exclamation-triangle"></i> Data dokumen tidak ditemukan.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="dokumenModal" tabindex="-1" aria-labelledby="dokumenModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dokumenModalLabel">Tampilan Dokumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="dokumenModalBody">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>