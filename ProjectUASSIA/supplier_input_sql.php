<?php
include "koneksi.php";

$aksi=$_GET['aksi'];
if($aksi=="insert"){
    $nama =$_GET['nama'];
    $alamat =$_GET['alamat'];
    $email = $_GET['email'];
    $no_hp=$_GET['no_hp'];
     $query = mysqli_query($con, "INSERT INTO `supplier`(`nama`, `alamat`,`email`,`no_hp`) VALUES ('$nama','$alamat','$email','$no_hp')");
     ?><script type="text/javascript">
							alert("Data Berhasil Di Tambahkan!");
							window.location = "supplier.php";
						</script> <?php
}else if($aksi=="delete"){
    $id=$_GET['id'];
    $query = mysqli_query($con, "DELETE FROM `supplier` WHERE id_supplier=$id");
    ?><script type="text/javascript">
							alert("Data Berhasil Di Hapus!");
							window.location = "supplier.php";
						</script> <?php
}else{
     $id=$_GET['id'];
     
$nama =$_GET['nama'];
$alamat = $_GET['alamat'];
$email = $_GET['email'];
$no_hp=$_GET['no_hp'];
$query = mysqli_query($con, "UPDATE `supplier` SET `nama`='$nama',`alamat`='$alamat',`email`='$email',`no_hp`='$no_hp' WHERE id_supplier=$id");
?><script type="text/javascript">
							alert("Data Berhasil Di Update!");
							window.location = "supplier.php";
						</script> <?php

}      
?>
