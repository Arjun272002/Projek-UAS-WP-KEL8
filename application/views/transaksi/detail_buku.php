<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="float-right">
                <a href="<?= base_url('transaksi1') ?>" class="btn btn-secondary btn-sm"><i class="fa fa-reply"><br></i> Kembali</a>
            </div>
            <?php foreach ($buku as $b) { ?>
                <div class="float-right">
                    <a href="<?= base_url('transaksi1/print/') . $b['id']; ?>" class="btn btn-info btn-sm"><i class="fas fa-print"></i> Print</a>
                </div>
                <div class="card-header"><strong>Detail Pemesanan - <?= $b['pemesan']; ?></strong></div>
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-borderless">
                                    <tr>
                                        <td><strong>Nama Pemesan</strong></td>
                                        <td>:</td>
                                        <td><?= $b['pemesan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tanggal Pemesanan</strong></td>
                                        <td>:</td>
                                        <td><?= $b['tgl_pesan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Waktu Pemesanan</strong></td>
                                        <td>:</td>
                                        <td><?= $b['jam_pesan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Metode Pembayaran</strong></td>
                                        <td>:</td>
                                        <td><?= $b['pembayaran']; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-8">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Service</th>
                                            <th scope="col">Kapster</th>
                                            <th scope="col">Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $a = 1;
                                        foreach ($buku as $b) { ?>
                                            <tr>
                                                <td><?= $b['kategori']; ?></td>
                                                <td><?= $b['kapster']; ?></td>
                                                <td><?= $b['harga']; ?></td>
                                            </tr>

                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>