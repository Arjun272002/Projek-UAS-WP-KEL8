<section>
 <p align=’justify’>Pada pengertian codeigniter di atas 
tadi di jelaskan bahwa codeigniter menggunakan metode MVC. Apa itu 
MVC? Kita juga harus mengetahui apa itu MVC sebelum masuk dan lebih 
jauh dalam belajar codeigniter.</p>
 <p>MVC adalah teknik atau konsep yang memisahkan 
komponen utama menjadi tiga komponen yaitu model, view dan 
controller.</p>
 
 <ol type=”a”>
 <th>Model</th>
<p align=’justify’>Model adalah kelas yang merepresentasikan atau 
memodelkan tipe data yang akan digunakan oleh aplikasi. Model juga 
dapat didefinisakn sebagai bagian penanganan yang berhubungan dengan 
pengolahan atau manipulasi database. Seperti misalnya mengambil data 
dari database, menginput dan pengolahan database lainnya. Semua 
intruksi atau fungsi yang berhubung dengan pengolahan database di 
letakkan di dalam model. Sebagai contoh, jika ingin membuat aplikasi 
untuk menghitung luas dan keliling lingkaran, maka dapat memodelkan 
objek lingkaran sebagai kelas model.</p>
<p align=’justify’>Sebagai catatan, Semua model harus disimpan di 
dalam folder application\models</p>
<th>View</th>
<p align=’justify’>View merupakan bagian yang menangani halaman user 
interface atau halaman yang muncul pada user(pada browser). Tampilan 
dari user interface di kumpulkan pada view untuk memisahkannya 
dengan controller dan model sehingga memudahkan web designer dalam 
melakukan pengembangan tampilan halaman website.</p>
<th>Controller</th>
<p align=’justify’>Controller merupakan kumpulan intruksi aksi yang 
menghubungkan model dan view, jadi user tidak akan berhubungan 
dengan model secara langsung, intinya data yang tersimpan di
database (model) di ambil oleh controller dan kemudian controller 
pula yang menampilkan nya ke view. Jadi controller lah yang mengolah 
intruksi.</p>
<p align=’justify’>Dari penjelasan tentang model view dan controller 
di atas dapat di simpulkan bahwa controller sebagai penghubung view
dan model. Misalnya pada aplikasi yang menampilkan data dengan 
menggunakan metode konsep mvc, controller memanggil intruksi pada 
model yang mengambil data pada database, kemudian controller yang 
meneruskannya pada view untuk di tampilkan. Jadi jelas sudah dan 
sangat mudah dalam pengembangan aplikasi dengan cara mvc ini karena 
web designer atau front-end developer tidak perlu lagi berhubungan 
dengan controller, dia hanya perlu berhubungan dengan view untuk 
mendesign tampilann aplikasi, karena back-end developer yang 
menangani bagian controller dan modelnya. Jadi pembagian tugas pun 
menjadi mudah dan pengembangan aplikasi dapat di lakukan dengan
cepat dan terstruktur.</p>
 </section>
<!-- Modal Tambah buku baru-->
<div class="modal fade" id="bukuBaruModal" tabindex="-1" role="dialog" aria-labelledby="bukuBaruModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bukuBaruModalLabel">Tambah Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('buku'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="judul_buku" name="judul_buku" placeholder="Masukkan Judul Buku">
                    </div>
                    <div class="form-group">
                        <select name="id_kategori" class="form-control form-control-user">
                            <option value="">Pilih Kategori</option>
                            <?php
                            foreach ($kategori as $k) { ?>
                                <option value="<?= $k['id']; ?>"><?= $k['kategori']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="pengarang" name="pengarang" placeholder="Masukkan nama pengarang">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="penerbit" name="penerbit" placeholder="Masukkan nama penerbit">
                    </div>
                    <div class="form-group">
                        <select name="tahun" class="form-control form-control-user">
                            <option value="">Pilih Tahun</option>
                            <?php
                            for ($i = date('Y'); $i > 1000; $i--) { ?>
                                <option value="<?= $i; ?>"><?= $i; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="isbn" name="isbn" placeholder="Masukkan ISBN">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="stok" name="stok" placeholder="Masukkan nominal stok">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control form-control-user" id="image" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End of Modal Tambah Mneu -->