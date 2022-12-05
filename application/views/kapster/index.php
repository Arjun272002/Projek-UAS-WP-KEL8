<!-- Begin Page Content -->
<div class="container-fluid">

    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-3">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>
            <a href="" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#kategoriBaruModal"><i class="fas fa-file-alt"></i> Tambah Kapster </a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kapster</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Telpon</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $a = 1;
                    foreach ($kapster as $k) { ?>
                        <tr>
                            <th scope="row"><?= $a++; ?></th>
                            <td><?= $k['kapster']; ?></td>
                            <td><?= $k['tgl_lahir']; ?></td>
                            <td><?= $k['alamat']; ?></td>
                            <td><?= $k['telpon']; ?></td>
                            <td>
                                <a href="<?= base_url('kapster/ubahkapster/') . $k['id']; ?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
                                <a href="<?= base_url('kapster/hapuskapster/') . $k['id']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $k['kapster']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Tambah kategori baru-->
<div class="modal fade" id="kategoriBaruModal" tabindex="-1" role="dialog" aria-labelledby="kategoriBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kategoriBaruModalLabel">Tambah Kapster Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('kapster'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="kapster" id="kapster" placeholder="Masukkan Nama Kapster" class="form-control form-control-user">
                    </div>
                    <div class="form-group">
                        <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control form-control-user">
                    </div>
                    <div class="form-group">
                        <input type="text" name="alamat" id="alamat"  placeholder="Masukkan Alamat anda" class="form-control form-control-user">
                    </div>
                    <div class="form-group">
                        <input type="text" name="telpon" id="telpon"  placeholder="Masukkan No Telpon" class="form-control form-control-user">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Mneu -->