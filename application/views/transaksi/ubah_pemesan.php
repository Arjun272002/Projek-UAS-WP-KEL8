<!-- Begin Page Content -->
<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-6">
            <?php if (validation_errors()) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Nama Pemesan tidak boleh Kosong</div>');
                redirect('transaksi/ubahpemesan/' . $p['id']);
            } ?>
            <?php foreach ($pemesan as $p) { ?>
                <form action="<?= base_url('transaksi/ubahpemesan'); ?>" method="post">
                    <div class="form-group">
                        <input type="hidden" name="id" id="id" value="<?php echo $p['id']; ?>">
                        <input type="text" class="form-control form-control-user" id="pemesan" name="pemesan" placeholder="Masukkan Nama Pemesan" value="<?= $p['pemesan']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="alamat" id="alamat" placeholder="Masukan Alamat" value="<?= $p['alamat']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="telpon" id="telpon" placeholder="Masukan No Telpon" value="<?= $p['telpon']; ?>">
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