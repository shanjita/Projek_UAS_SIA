<?php
	include("koneksi.php");
	session_start();
	if (empty($_SESSION['username'])) {
		header("location:login.php");
	}
?>

<html>
<head>

	<div class="body" style="background-color:white;height:1100px;">

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--BOOSTRAP-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="css/color.css" rel="stylesheet" type="text/css"> 
</head>
<body >
		
	<div class="navbar-inverse" style="background:white;">
		<div class="collapse navbar-collapse" id="myNavbar">
				<a class="navbar-brand" href="Index.php" ><img src="home.jpg" width="45" height="45" ></a>
			<ul class="nav navbar-nav">
				<li><a style="margin:5;">1 SI B FotoCopy</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a style="margin:5;" href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a style="margin:5;"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['username'] ?></a></li>
			</ul>
		</div>
	</div>
	
	<header>
		<tr>Laporan Keuangan</tr>
	</header>
	
	<div class="container-fluid" style="margin:8 0 20 0;height: 800px;">
		<div class="row">	
			<div class="col-sm-2" style="background-color:white;height:800px;">
				<ul class="sidenav">
					<li><a  href="index.php">Dashboard</a></li>
				<h4 id="judul"><b>Data</b></h4>
					<li><a href="account.php">Akun</a></li>
					<li><a href="supplier.php">Pemasok</a></li>
					<li><a href="item.php">Barang</a></li>
				<h4 id="judul"><b>Transaksi</b></h4>
					<li><a href="pembelian.php">Pembelian</a></li>
					<li><a href="penjualan.php">Penjualan</a></li>
					<li><a href="beban1.php">Pengeluaran</a></li>
				<h4 id="judul"><b>Laporan</b></h4>
					
					<li><a class="active" href="labarugi.php">Laba Rugi</a></li>
					
				</ul>
				
			</div>
		
			<div class="col-sm-8" style="background:white;margin:0 0 10 10;height:800px;overflow:hidden;">
				<ol class="breadcrumb" style="margin:10;background-color:lightyellow;">
					<li class="breadcrumb-item">
					<a href="index.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a>
					</li>
					<li class="breadcrumb-item active">Laba Rugi</li>
				</ol>
				
				
				<div class="row" style="margin:0px;" >
				<h2 style="text-shadow: 2px 2px lightgrey;text-align:center;"><b>Laba & Rugi</b></h2>
					
								<br>
								<div class="colored">
                                    <div class="red"></div>
                                        <div class="yellow"></div>
                                    <div class="red"></div>
										<div class="yellow"></div>
                                    <div class="red"></div>
                                </div>
								<br>
<div class="panel panel-warning">
<div class="panel-heading">
<div class="panel panel-warning">
<div class="panel-heading">   
				<div class="table-responsive"> 
				<table class="table users-table table-condensed table-hover" >
                                                <?php
                                                    $query = mysqli_query($con, "SELECT sum(harga_jual) as jual FROM penjualan");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        $jual=$row['jual']; 
                                                    }
                                                    $query = mysqli_query($con, "SELECT sum(harga_awal) as beli FROM pembelian");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        $beli=$row['beli']; 
                                                    }
                                                    
                                                    $query = mysqli_query($con, "SELECT sum(harga) as pengeluaran FROM pengeluaran");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        $pengeluaran=$row['pengeluaran']; 
                                                    }
                                                    
                                                    $query = mysqli_query($con, "SELECT sum(debit) as beban FROM account where id_jenis=6");
                                                    while ($row = mysqli_fetch_array($query)) { 
                                                        $beban=$row['beban']; 
                                                    }

                                                     $query = mysqli_query($con, "SELECT max(harga) as luar FROM beban");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        $luar=$row['luar']; 
                                                    } 
                                                    
                                                    $query = mysqli_query($con, "SELECT min(harga) as luar1 FROM beban");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        $luar1=$row['luar1']; 
                                                    }

                                                    $beli=$beli;
                                                    $luar=$luar;
                                                    $luar1=$luar1;
                                                    $hasil = $beli + $luar + $luar1;
                                                        
                                                    $cos=$jual-$hasil;
                                                    $total=$cos; 
                                                    
                                                        ?>

                                                    <tr>
                                                        <td class="visible-lg" colspan="2"><b>Pendapatan</b></td>                                                             
                                                    </tr>
                                                    <tr>
                                                        <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php print "Penjualan" ?><br><br></td>
                                                        <td><?php print "Rp ".$jual; ?></td>
                                                                                                                        
                                                    </tr>
                                                      <tr>
                                                        <td class="visible-lg"><b>Total Pendapatan</b></td>                                                             
                                                        <td class="visible-lg"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php print "Rp ".$jual; ?></b></td>                                                             
                                                    </tr>
                                                    <tr>
                                                        <td class="visible-lg" colspan="2"><b>Harga Pokok Penjualan</b></td>                                                             
                                                    </tr>
                                                    <tr>
                                                        <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php print "Pembelian" ?><br><br></td>
                                                        <td><?php print "Rp ".$beli; ?></td>
                                                                                                                        
                                                    </tr>
                                                    <tr>
                                                        <td class="visible-lg" colspan="2"><b>Beban</b></td>                                                             
                                                    </tr>
                                                    <tr>
                                                        <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php print "Beban Sewa" ?></td>
                                                        <td><?php print "Rp ".$luar; ?><br><br></td>  
                                                        </tr>
                                                   
                                                    <tr>
                                                        <br> 
                                                        <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php print "Beban Listrik" ?></td>
                                                        <td><?php print "Rp ".$luar1; ?><br><br></td>  <br>                                                           
                                                    </tr>

                                                        <td class="visible-lg"><b>Total Pengeluaran</b></td>                                                             
                                                        <td class="visible-lg"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php
                                                        $beli=$beli;
                                                        $luar=$luar;
                                                        $luar1=$luar1;
                                                        $hasil = $beli + $luar + $luar1;
                                                        
                                                        print "Rp ".$hasil; ?></b></td>                    
                                                    </tr>

                                                    <tr>
                                                        <td class="visible-lg"><b>Laba Rugi</b></td>
                                                        <td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php print "Rp ".$cos ?><b></td>                                                                
                                                    </tr>
                                                    <tr>
                                                     <?php 
                                                    if ($total < 0) {
                                                    ?>
                                                        <td><H3>Kerugian</h3></td>
                                                        <td class="visible-lg"><br><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php print "Rp ".$total; ?></b></td>
                                                    <?php } else { ?>
                                                        <td><h3>Keuntungan</h3></td>
                                                        <td class="visible-lg"><br><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php print "Rp ".$total; ?></b></td>
                                                       <?php } ?>
                                                        </b>
                                                    </tr>
                                            </tbody>
                                        </table>
                                   </div>
                            	</div>	
							</div>
						</div>	
					</div>
					
				</div>	
			</div>
			
		</div>
		
		<footer class="container-fluid text-center">
			COPYRIGHT&copy; POLITEKNIK CALTEX RIAU
		</footer>
		
	</div>

</body>
</html>