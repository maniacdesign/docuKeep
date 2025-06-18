<?= $this->extend('layouts/base'); ?>

<?= $this->section('content'); ?>

<section class="section">
    <div class="section-header">
        <h1>Upload Dokumen Rekam Medis</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <form method="post" action="<?= base_url('/upload-dokumen'); ?>" enctype="multipart/form-data">
                        <div class="card-header">
                            <h4>Informasi Dokumen</h4>
                        </div>
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('success'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger" role="alert">
                                <?= session()->getFlashdata('error'); ?>
                            </div>
                        <?php endif; ?>
                        <?php $errors = session()->getFlashdata('errors'); ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Nomor Rekam Medis</label>
                                        <input name="nomor_rm" id="nomor_rm" type="number" min="0" max="999999" class="form-control" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Pasien</label>
                                        <input name="nama" id="nama" type="text" class="form-control" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Diagnosa</label>
                                        <input name="diagnosa" id="diagnosa" type="text" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Tahun</label>
                                        <input name="tahun" id="tahun" type="number" class="form-control" min="1900" max="9999" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input name="keterangan" id="keterangan" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Upload Dokumen</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="uploadFile" name="uploadFile">
                                            <label class="custom-file-label" for="uploadFile">Choose file</label>
                                            <?php if (isset($errors['uploadFile'])) : ?>
                                                <div class="invalid-feedback" style="display: block;">
                                                    <?= $errors['uploadFile']; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                <div class="card-header">
                        <h4><i class="fas fa-list-alt"></i>Hasil Input</h4>
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

<?= $this->endSection(); ?>
<script>
    $('.custom-file-input').on('change', function(event) {
        var fileName = event.target.files[0].name;
        $(this).next('.custom-file-label').html(fileName);
    });
</script>