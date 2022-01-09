<?php
include"koneksi.php";

$aksi=$_GET['aksi'];
if($aksi=="insert"){
    
    $akun1 =$_GET['akun1'];
    $akun2 =$_GET['akun2'];
    $tgl_jurnal =$_GET['tgl_jurnal'];
    $harga_debit =$_GET['harga_debit'];
    //$harga_kredit =$_GET['harga_kredit'];
     $query = mysqli_query($con, "INSERT INTO `jurnal`(`akun1`,`akun2`,`tgl_jurnal`,`harga_debit`,`harga_kredit`) VALUES ('$akun1','$akun2','$tgl_jurnal',$harga_debit,$harga_debit)");
     ?><script type="text/javascript">
							alert("Data Berhasil Di Insert!");
							window.location = "jurnal_entry.php";
						</script> <?php
}else if($aksi=="delete"){
    $id=$_GET['id'];
    $query = mysqli_query($con, "DELETE FROM `jurnal` WHERE id_jurnal=$id"); 
    ?><script type="text/javascript">
							alert("Data Berhasil Di Hapus!");
							window.location = "jurnal_entry.php";
						</script> <?php
}else{
     $id=$_GET['id'];
     
    $akun1 =$_GET['akun1'];
    $akun2 =$_GET['akun2'];
    $tgl_jurnal =$_GET['tgl_jurnal'];
    $harga_debit =$_GET['harga_debit'];
    $harga_kredit =$_GET['harga_kredit'];

      $query = mysqli_query($con, "UPDATE `jurnal` SET `id_jurnal`=$id,`akun1`='$akun1',`akun2`='$akun2',`tgl_jurnal`='$tgl_jurnal',`harga_debit`=$harga_debit,`harga_kredit`=$harga_kredit WHERE id_jurnal=$id");
      ?><script type="text/javascript">
							alert("Data Berhasil Di Update!");
							window.location = "jurnal_entry.php";
						</script> <?php
}      
?>
