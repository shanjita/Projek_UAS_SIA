<?php
include "koneksi.php";

$aksi=$_GET['aksi'];
if($aksi=="insert"){
$nama =$_GET['nama'];
$header =$_GET['header'];
$no = $_GET['no'];
$type = $_GET['type'];
$query = mysqli_query($con, "INSERT INTO `account`(`no_account`, `nama_account`, `debit`, `kredit`, `jenis_account`,`id_jenis`) VALUES ($no,'$nama',0,0,'$header',$type)");
?><script type="text/javascript">
              alert("Data Berhasil Di Tambahkan!");
              window.location = "account.php";
            </script> <?php
}else if($aksi=="delete"){
    $id=$_GET['id'];

    $cekakun=mysqli_fetch_array(mysqli_query($con, "SELECT * FROM `account` WHERE `id_account`='$id' "));
    if($cekakun['debit']==0 && $cekakun['kredit']==0){
    $query = mysqli_query($con, "DELETE FROM `account` WHERE id_account=$id");

    ?><script type="text/javascript">
              alert("Data Berhasil Di Hapus!");
              window.location = "account.php";
            </script> <?php
}else{
  ?>
<script type="text/javascript">
              alert("Gagal!! Data Akun Digunakan!");
              window.location = "account.php";
            </script> <?php }}
            else{
    
    if($_GET['aksi']=="update_debit"){
        
     $id=$_GET['id'];
     
    $nama =$_GET['nama'];
      $query = mysqli_query($con, "UPDATE `account` SET `debit`='$nama' WHERE id_account=$id");
      ?><script type="text/javascript">
              alert("Data Berhasil Di Update!");
              window.location = "account_input_saldo.php";
            </script> <?php 
    }elseif ($_GET['aksi']=="update_kredit") {
       
     $id=$_GET['id'];
     
    $nama =$_GET['nama'];
      $query = mysqli_query($con, "UPDATE `account` SET `kredit`='$nama' WHERE id_account=$id");
      ?><script type="text/javascript">
              alert("Data Berhasil Di Update!");
              window.location = "account_input_saldo.php";
            </script> <?php 
    }  else {
 
     $id=$_GET['id'];
     
    $nama =$_GET['nama'];
$no = $_GET['no'];
$type = $_GET['type'];

$header = $_GET['header'];
      $query = mysqli_query($con, "UPDATE `account` SET `no_account`=$no,`nama_account`='$nama',`jenis_account`='$header',`id_jenis`=$type WHERE id_account=$id");
      ?><script type="text/javascript">
              alert("Data Berhasil Di Update!");
              window.location = "account.php";
            </script> <?php
}             
}
?>