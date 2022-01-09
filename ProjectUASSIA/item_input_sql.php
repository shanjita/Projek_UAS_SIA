<?php
include "koneksi.php";

$aksi=$_GET['aksi'];
if($aksi=="insert"){
    $nama_barang =$_GET['nama_barang'];
	$merk =$_GET['merk'];
    $type =$_GET['type'];
    $stok =$_GET['stok'];
    $harga_awal =$_GET['harga_awal'];
     $query = mysqli_query($con, "INSERT INTO `item`(`nama_barang`,`merk`, `type`, `stok`, `harga_awal`) 
								  VALUES ('$nama_barang','$merk','$type','$stok','$harga_awal')");
     ?><script type="text/javascript">
                            alert("Data Berhasil Di Tambahkan!");
                            window.location = "item.php";
                        </script> <?php
}else if($aksi=="delete"){
    $id=$_GET['id'];
    $query = mysqli_query($con, "DELETE FROM `item` WHERE id_barang=$id"); 
    ?><script type="text/javascript">
                            alert("Data Berhasil Di Hapus!");
                            window.location = "item.php";
                        </script> <?php
}else{
     $id=$_GET['id'];
     
$nama_barang =$_GET['nama_barang'];
$merk =$_GET['merk'];
$type =$_GET['type'];
$stok =$_GET['stok'];
$harga_awal =$_GET['harga_awal'];

      $query = mysqli_query($con, "UPDATE `item` SET `nama_barang`='$nama_barang',`merk`='$merk',`type`='$type',`stok`='$stok',`harga_awal`='$harga_awal' WHERE id_barang=$id");
      ?><script type="text/javascript">
                            alert("Data Berhasil Di Update!");
                            window.location = "item.php";
                        </script> <?php
}      
?>
