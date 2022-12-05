<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-6">
            <?php if (validation_errors()) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Nama Kategori tidak boleh Kosong</div>');
                redirect('buku/ubahkapster/' . $k['id']);
            } ?>
            <?php foreach ($kapster as $k) { ?>
                <form action="<?= base_url('kapster/ubahkapster'); ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" value="<?php echo $k['id']; ?>">
                        <input type="text" class="form-control form-control-user" id="kapster" name="kapster" placeholder="Masukkan Kategori Buku" value="<?= $k['kapster']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control form-control-user" id="tgl_lahir" name="tgl_lahir"  value="<?= $k['tgl_lahir']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Masukan Alamat Anda" value="<?= $k['alamat']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="telpon" name="telpon" placeholder="Masukan No Telpon" value="<?= $k['telpon']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="button" class="form-control form-control-user btn btn-dark col-lg-3 mt-3" value="Kembali" onclick="window.history.go(-1)">
                        <input type="submit" class="form-control form-control-user btn btn-primary col-lg-3 mt-3" value="Update">
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>