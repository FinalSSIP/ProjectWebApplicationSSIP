<?php 
include 'config.php';
$id=$_POST['id'];
$tanggal=$_POST['tanggal'];
$nama=$_POST['nama'];
$jumlah=$_POST['jumlah'];
$harga=$_POST['harga'];

$dt=mysql_query("select * from barang where nama='$nama'");
$data=mysql_fetch_array($dt);
$sisa=$data['jumlah']-$jumlah;
mysql_query("update barang set jumlah='$sisa' where nama='$nama'");

$modal=$data['modal'];
$laba=$harga-$modal;
$labaa=$laba*$jumlah;
$total_harga=$harga*$jumlah;

mysql_query("update barang_laku set nama='$nama', jumlah='$jumlah', harga='$harga', total_harga='$total_harga', laba='$labaa' where id='$id'");

header("location:barang_laku.php");

?>
 <script type="text/javascript">
        $(document).ready(function(){

            $('#tanggal').datepicker({dateFormat: 'yy/mm/dd'});

        });
    </script>
<?php
    include 'footer.php';
?>