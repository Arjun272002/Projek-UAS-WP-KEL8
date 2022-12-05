<div class="container-fluid ">
    <div class="row">
        <div class="col">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>
            <div class="card shadow">
                <div class="card-header"><strong>Isi Form</strong></div>
                <div class="card-body">
                    <form action="<?= base_url('transaksi/index'); ?>" method="post" enctype="multipart/form-data">
                        <h5>Data Member</h5>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-3">
                                <label>Nama Pemesan </label>
                                <select name="pemesan" class="form-control form-control-user">
                                    <option value="">Pilih Pemesan</option>
                                    <?php
                                    foreach ($pemesan as $p) :  ?>
                                        <option value="<?= $p['pemesan']; ?>"><?= $p['pemesan']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group col-2">
                                <label>Jam</label>
                                <input type="text" class="form-control form-control-user" id='jam_pesan' name="jam_pesan" value="<?= date('H:i:s') ?>" readonly>
                            </div>
                            <div class="form-group col-2">
                                <label>Tanggal Pesan</label>
                                <input type="text" class="form-control form-control-user" name="tgl_pesan" value="<?= date('d/m/Y') ?>" readonly>
                            </div>
                        </div>
                        <h5>Data Member</h5>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-3">
                                <label>Kategori Service </label>
                                <select name="kategori" class="form-control form-control-user">
                                    <option value="">Pilih kategori</option>
                                    <?php
                                    foreach ($kategori as $k) :  ?>
                                        <option value="<?= $k['kategori']; ?>"><?= $k['kategori']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group col-3">
                                <label>Kapster</label>
                                <select name="kapster" class="form-control form-control-user">
                                    <option value="">Pilih Kapster</option>
                                    <?php
                                    foreach ($kapster as $k) { ?>
                                        <option value="<?= $k['kapster']; ?>"><?= $k['kapster']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <h5>Pembayaran</h5>
                        <hr>
                        <div class="form-row">
                            <div class="form-group col-2 ">
                                <label>Metode Pembayaran</label>
                                <select class="form-control form-control-user" id="pembayaran" name="pembayaran">
                                    <option value="">Pilih</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Debit">Debit</option>
                                    <option value="Kredit">Kredit</option>
                                </select>
                            </div>
                            <div class="form-group col-2">
                                <label>Harga</label>
                                <input type="text" class="form-control form-control-user" id="harga" name="harga" placeholder="Masukan harga">
                            </div>
                        </div>
                        <div class="form-row">
                            <br>
                            <div class="form-group col-2">
                                <button type="reset" class="btn btn-primary">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Begin Page Content -->

<!-- End of Main Content -->

<!-- Modal Tambah buku baru-->
<!-- End of Modal Tambah Mneu -->