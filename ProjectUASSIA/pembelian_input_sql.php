<?php
include "koneksi.php";

$aksi=$_GET['aksi'];
if($aksi=="insert"){
    $no_transaksi =$_GET['no_transaksi'];
    $tanggal=$_GET['tanggal'];
    $keterangan =$_GET['keterangan'];
    $nama_barang=$_GET['nama_barang'];
    $supplier=$_GET['supplier'];
    $banyaknya=$_GET['banyaknya'];
    $debit=$_GET['debit'];
    $kredit=$_GET['kredit'];

    $query2 = mysqli_query($con, "SELECT * FROM item WHERE `item`.`nama_barang` = '$nama_barang'");
    $m = mysqli_fetch_object($query2);
    if ($banyaknya > 0){
    $jumlahStok=$banyaknya + $m->stok;
    if ($banyaknya >= 0){
    $hargabarang = $banyaknya * $m->harga_awal;
    $query = mysqli_query($con, "UPDATE `project_sia`.`item` SET `stok`= '$jumlahStok' WHERE `item`.`nama_barang`='$nama_barang'");
    $query = mysqli_query($con, "INSERT INTO `pembelian` (`no_transaksi`, `tanggal`, `harga_awal`, `keterangan`, `nama_barang`, `supplier`,`banyaknya`,`debit`,`kredit`)
								VALUES ($no_transaksi, '$tanggal', $hargabarang, '$keterangan', '$nama_barang','$supplier','$banyaknya','$debit','$kredit')");


    $query1 = mysqli_query($con, "SELECT * FROM account");
    $n = mysqli_fetch_object($query1);
    if($debit = 'Inventory'){

      $query3 = mysqli_query($con, "SELECT debit from account where `account`.`nama_account` = '$debit'");
      $s = mysqli_fetch_object($query3);
      $j_debit = $hargabarang + $s->debit;
      $query7 = mysqli_query($con, "UPDATE `project_sia`.`account` SET `debit`='$j_debit' where `account`.`nama_account`='$debit'");
}
      $query9 = mysqli_query($con, "SELECT * FROM account");
    $n = mysqli_fetch_object($query9);
    if($debit = 'Kas'){
      $query11 = mysqli_query($con, "SELECT debit from account where `account`.`nama_account` = '$debit'");
      $k = mysqli_fetch_object($query11);
      $j_debit = $k->debit - $hargabarang;
      $query12 = mysqli_query($con, "UPDATE `project_sia`.`account` SET `debit`='$j_debit' where `account`.`nama_account`='$debit'");
    }

       ?>
     <script type="text/javascript">
                           // alert("Data Berhasil Di Tambahkan!");
                            window.location = "pembelian.php";
                        </script>
                        <?php }

            else {
                ?><script type="text/javascript">
                           // alert("Nomor Transaksi Sudah Terpakai, Silahkan gunakan nomor transakis lain");
                            window.location = "pembelian_input.php";
                            </script>
            <?php } }
         ?> <?php

}else if($aksi=="delete"){
    $id=$_GET['id'];
    $query = mysqli_query($con, "DELETE FROM `pembelian` WHERE no_transaksi=$id");
    ?><script type="text/javascript">
							alert("Data Berhasil Di Hapus!");
							window.location = "pembelian.php";
						</script> <?php
}else{
    $id=$_GET['id'];
    $tanggal=$_GET['tanggal'];
    $keterangan =$_GET['keterangan'];
    $nama_barang=$_GET['nama_barang'];
    $banyaknya=$_GET['banyaknya'];

    $query2 = mysqli_query($con, "SELECT * FROM item WHERE `item`.`nama_barang` = '$nama_barang'");
    $m = mysqli_fetch_object($query2);

    $query15 = mysqli_query($con, "SELECT * FROM pembelian WHERE `pembelian`.`nama_barang` = '$nama_barang'");
    $n = mysqli_fetch_object($query15);
    $jumlahnow = ($m->stok) - ($n->banyaknya);
    $jumlahStok = (($banyaknya)+($jumlahnow));

	$hargabarang = $banyaknya * $m->harga_awal;
    $query3 = mysqli_query($con, "UPDATE `pembelian` SET `no_transaksi`=$id,`tanggal`='$tanggal',`harga_awal`=$hargabarang,`keterangan`='$keterangan',`nama_barang`='$nama_barang',`banyaknya`='$banyaknya' WHERE no_transaksi=$id");
    $query4 = mysqli_query($con, "UPDATE `project_sia`.`item` SET `stok`= '$jumlahStok' WHERE `item`.`nama_barang`='$nama_barang'");
?><script type="text/javascript">
							alert("Data Berhasil Di Update!");
							window.location = "pembelian.php";
						</script> <?php

}
?>
