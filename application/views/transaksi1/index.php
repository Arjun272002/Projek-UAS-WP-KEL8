<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h3>Data Pemesanan atau Booking</h3>
            <hr>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Service</th>
                        <th scope="col">Nama Pemesan</th>
                        <th scope="col">Kapster</th>
                        <th scope="col">Tanggal Pemesanan</th>
                        <th scope="col">Jam Pemesanan</th>
                        <th scope="col">Pembayaran</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Pilihan</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $a = 1;
                    foreach ($buku as $b) { ?>
                        <tr>
                            <th scope="row"><?= $a++; ?></th>
                            <td><?= $b['kategori']; ?></td>
                            <td><?= $b['pemesan']; ?></td>
                            <td><?= $b['kapster']; ?></td>
                            <td><?= $b['tgl_pesan']; ?></td>
                            <td><?= $b['jam_pesan']; ?></td>
                            <td><?= $b['pembayaran']; ?></td>
                            <td><?= $b['harga']; ?></td>
                            <td>
                                <a href="<?= base_url('transaksi/detailBuku/') . $b['id']; ?>" class="badge badge-info"><i class="fas fa-eye"></i> Detail</a>
                                <a href="<?= base_url('transaksi/hapusbuku/') . $b['id']; ?>" onclick="return confirm('Kamu yakin akan menghapus <?= $judul . ' ' . $b['kategori']; ?> ?');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>