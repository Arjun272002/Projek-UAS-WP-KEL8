<head>
    <title>Print BB'ON Barbershop</title>
</head>
<div class="card-header"><strong>Isi Form</strong></div>
<?php foreach ($buku as $b) { ?>
<div class="card shadow">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-borderless">
                    <tr>
                        <td><strong>Nama Pemesan</strong></td>
                        <td>:</td>
                        <td><?= $b['kategori']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Nama Pemesan</strong></td>
                        <td>:</td>
                        <td><?= $b['pemesan']; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Nama Pemesan</strong></td>
                        <td>:</td>
                        <td><?= $b['kapster']; ?></td>
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
                    <tr>
                        <td><strong>Metode Pembayaran</strong></td>
                        <td>:</td>
                        <td><?= $b['harga']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<script type="text/javascript">
    window.print();
</script>