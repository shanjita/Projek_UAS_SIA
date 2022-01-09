<?php
include "koneksi.php";

$aksi=$_GET['aksi'];
if($aksi=="insert"){
    //$id_beban =$_GET['id_beban'];
    $nama_beban = $_GET['nama_beban'];
    $keterangan =$_GET['keterangan'];
    $tanggal=$_GET['tanggal'];
    //$harga =$_GET['harga'];
    $debit=$_GET['debit'];
    $kredit=$_GET['kredit'];

    $query2 = mysqli_query($con, "SELECT * FROM beban WHERE `beban`.`nama_beban` = '$nama_beban'");
    $m = mysqli_fetch_object($query2);
    if ($banyaknya > 0){
    $jumlahbeban=$banyaknya + $m->nama_beban;
    $hargabarang = $banyaknya * $m->harga;
    $query = mysqli_query($con, "INSERT INTO `pengeluaran` ('id_beban','nama_beban', `keterangan`,  `tanggal`, `harga`,`debit`,`kredit`)
                VALUES ($id_beban, '$nama_beban','$keterangan', '$tanggal', $harga,'$debit','$kredit')");


    $query1 = mysqli_query($con, "SELECT * FROM account");
    $n = mysqli_fetch_object($query1);
    if($debit = 'Inventory'){

      $query3 = mysqli_query($con, "SELECT debit from account where `account`.`nama_account` = '$debit'");
      $s = mysqli_fetch_object($query3);
      $j_debit = $harga + $s->debit;
      $query7 = mysqli_query($con, "UPDATE `project_sia`.`account` SET `debit`='$j_debit' where `account`.`nama_account`='$debit'");
}
      $query9 = mysqli_query($con, "SELECT * FROM account");
    $n = mysqli_fetch_object($query9);
    if($debit = 'Kas'){
      $query11 = mysqli_query($con, "SELECT debit from account where `account`.`nama_account` = '$debit'");
    }

       ?>
     <script type="text/javascript">
                           // alert("Data Berhasil Di Tambahkan!");
                            window.location = "pengeluaran.php";
                        </script>
                        <?php }

            else {
                ?><script type="text/javascript">
                           // alert("Nomor Transaksi Sudah Terpakai, Silahkan gunakan nomor transakis lain");
                            window.location = "pengeluaran_input.php";
                            </script>
            <?php } }
         ?> <?php

if($aksi=="delete"){
    $id=$_GET['id_beban'];
    $query = mysqli_query($con, "DELETE FROM `pengeluaran` WHERE id_beban =$id_beban");
    ?><script type="text/javascript">
              alert("Data Berhasil Di Hapus!");
              window.location = "pengeluaran.php";
            </script> <?php
}else{
    $id=$_GET['id_beban'];
    $nama_beban=$_GET['nama_beban'];
    $keterangan =$_GET['keterangan'];
    $tanggal=$_GET['tanggal'];
    $banyaknya=$_GET['banyaknya'];

    $query2 = mysqli_query($con, "SELECT * FROM beban WHERE `beban`.`nama_beban` = '$nama_beban'");
    $m = mysqli_fetch_object($query2);

    $query15 = mysqli_query($con, "SELECT * FROM pengeluaran WHERE `pengeluaran`.`nama_beban` = '$nama_beban'");
    
    $query3 = mysqli_query($con, "UPDATE `pengeluaran` SET `id_beban`=$id_beban,`nama_beban`='$nama_beban',`keterangan`='$keterangan',`tanggal`='$tanggal',`harga`=$harga,`banyaknya`='$banyaknya' WHERE id_beban=$id_beban");

    
?><script type="text/javascript">
              alert("Data Berhasil Di Update!");
              window.location = "pengeluaran.php";
            </script> <?php

}
?>