<?php
include "koneksi.php";

$aksi=$_GET['aksi'];
if($aksi=="insert"){
$transaksi =$_GET['no_transaksi'];
$nama_barang =$_GET['nama_beban'];
$merk =$_GET['keterangan'];
$type =$_GET['tanggal'];
$stok =$_GET['harga'];
    //$harga_awal =$_GET['harga_awal'];
     $query = mysqli_query($con, "INSERT INTO `beban`(`no_transaksi`,`nama_beban`,`keterangan`, `tanggal`, `harga`) 
                  VALUES ('$transaksi','$nama_barang','$merk','$type','$stok')");
     ?><script type="text/javascript">
                            alert("Data Berhasil Di Tambahkan!");
                            window.location = "beban1.php";
                        </script> <?php
}else if($aksi=="delete"){
    $id=$_GET['id'];
    $query = mysqli_query($con, "DELETE FROM `beban` WHERE no_transaksi=$id"); 
    ?><script type="text/javascript">
                            alert("Data Berhasil Di Hapus!");
                            window.location = "beban1.php";
                        </script> <?php
}else{
$id =$_GET['id'];    
$transaksi =$_GET['no_transaksi'];
$nama_barang =$_GET['nama_beban'];
$merk =$_GET['keterangan'];
$type =$_GET['tanggal'];
$stok =$_GET['harga'];
//$harga_awal =$_GET['harga_awal'];

      $query = mysqli_query($con, "UPDATE `beban` SET `no_transaksi`='$transaksi',`nama_beban`='$nama_barang',`keterangan`='$merk',`tanggal`='$type',`harga`='$stok' WHERE no_transaksi=$id");
      ?> <?php
}      
?>     
