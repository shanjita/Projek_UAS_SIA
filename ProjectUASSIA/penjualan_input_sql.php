<?php
include "koneksi.php";

$aksi=$_GET['aksi'];
if($aksi=="insert"){
    $no_transaksi =$_GET['no_transaksi'];
    $tanggal=$_GET['tanggal'];
    $jumlah=$_GET['jumlah'];
    //$harga_awal =$_GET['harga_awal'];
    $keterangan =$_GET['keterangan'];
    $nama_barang=$_GET['nama_barang'];
    $debit=$_GET['debit'];
    $kredit=$_GET['kredit'];

     $query2 = mysqli_query($con, "SELECT * FROM item WHERE `item`.`nama_barang` = '$nama_barang'");
     $m = mysqli_fetch_object($query2);
     if ($jumlah > 0){
       $jumlahStok = $m->stok - $jumlah;
       if($jumlah >= 0){
         $harga = ( $jumlah * $m->harga_jual);
         $query = mysqli_query($con, "UPDATE `project_sia`.`item` SET `stok`= '$jumlahStok' WHERE `item`.`nama_barang`='$nama_barang'");
         $query = mysqli_query($con, "INSERT INTO `penjualan` (`no_transaksi`, `tanggal`, `jumlah`, `harga_jual`, `keterangan`, `nama_barang`,`debit`,`kredit`)
                                      VALUES ('$no_transaksi', '$tanggal','$jumlah','$harga','$keterangan','$nama_barang','$debit','$kredit')");

         $query1 = mysqli_query($con, "SELECT * FROM account");
         $n = mysqli_fetch_object($query1);
         if($debit = 'Inventory'){
           $query3 = mysqli_query($con, "SELECT debit from account where `account`.`nama_account` = '$debit'");
           $s = mysqli_fetch_object($query3);
           $j_debit =  $s->debit - $harga;
           $query7 = mysqli_query($con, "UPDATE `project_sia`.`account` SET `debit`='$j_debit' where `account`.`nama_account`='$debit'");
         }
         $query9 = mysqli_query($con, "SELECT * FROM account");
	        $n = mysqli_fetch_object($query9);
          if($debit = 'Kas'){
            $query11 = mysqli_query($con, "SELECT debit from account where `account`.`nama_account` = '$debit'");
            $k = mysqli_fetch_object($query11);
            $j_debit = $k->debit + $harga;
            $query12 = mysqli_query($con, "UPDATE `project_sia`.`account` SET `debit`='$j_debit' where `account`.`nama_account`='$debit'");
          }
          ?>

    <script type="text/javascript">
    //alert("Data Berhasil Di Tambahkan!");
    window.location = "penjualan.php";
    </script>
    <?php
    }
    else {
    ?><script type="text/javascript">
    //alert("Nomor Transaksi Sudah Terpakai, Silahkan gunakan nomor transakis lain");
    window.location = "penjualan_input.php";
    </script>
    <?php }
    } ?> <?php
  }else if($aksi=="delete"){



    $id=$_GET['id'];
    $nama_barang=$_GET['nama'];
    $query = mysqli_query($con, "DELETE FROM `penjualan` WHERE no_transaksi=$id");
    ?><script type="text/javascript">

                            alert("Data Berhasil Di Hapus!");
                            window.location = "penjualan.php";
                        </script> <?php
}else{
    $id=$_GET['id'];
    $tanggal=$_GET['tanggal'];
    $jumlah=$_GET['jumlah'];
    //$harga =$_GET['harga'];
    $keterangan =$_GET['keterangan'];
    $nama_barang=$_GET['nama_barang'];
    $debit=$_GET['debit'];
    $kredit=$_GET['kredit'];
$query5 = mysqli_query($con, "SELECT * FROM penjualan WHERE `penjualan`.`no_transaksi` = '$id'");
    $a = mysqli_fetch_object($query5);
    $query2 = mysqli_query($con, "SELECT * FROM item WHERE `item`.`nama_barang` = '$nama_barang'");
    $m = mysqli_fetch_object($query2);
    $jumlahBrg = ($m->stok) - ($a->jumlah);
    $jumlahStok = (($jumlahBrg)+($jumlah));

    $harga = $m->harga_jual * $jumlah;
$query = mysqli_query($con, "UPDATE `penjualan` SET `no_transaksi`=$id,`tanggal`='$tanggal',`Jumlah`='$jumlah',`harga_jual`=$harga,`keterangan`='$keterangan',`nama_barang`='$nama_barang',`kredit`='$kredit',`debit`='$debit' WHERE no_transaksi=$id");
$query1 = mysqli_query($con, "UPDATE `project_sia`.`item` SET `stok`= '$jumlahStok' WHERE `item`.`nama_barang`='$nama_barang'");
?><script type="text/javascript">
                            alert("Data Berhasil Di Update!");
                            window.location = "penjualan.php";
                        </script> <?php

}
?>
