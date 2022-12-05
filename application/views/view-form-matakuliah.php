<!DOCTYPE html>
<html>
    <head>
        <title>belajar autofill - sahretech.com</title>
    </head>
    <body>
        <form action="">
            <table>
                <tr><td>id</td><th><input type="text" onkeyup="isi_otomatis()" id="id"></th></tr>
                <tr><th>NAMA</th><th><input type="text" id="kategori" disabled></th></tr>               
                <tr><th>NO TELP</th><th><input type="text" id="harga" disabled></th></tr>                
            </table>
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            function isi_otomatis(){
                var id = $("#id").val();
                $.ajax({
                    url: "<?= base_url('assets/'); ?>vendor/ajax.php",
                    data:"id="+id ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#kategori').val(obj.kategori);
                    $('#harga').val(obj.harga);
                });
            }
        </script>
    </body>
</html>
