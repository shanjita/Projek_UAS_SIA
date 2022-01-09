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
		<marquee behavior="scroll" direction="left">Laporan Keuangan</marquee>
	</header>
	
	<div class="container-fluid" style="margin:8 0 20 0;height: 800px;">
		<div class="row">	
			<div class="col-sm-2" style="background-color:white;height:800px;">
				
				<ul class="sidenav">
					<li><a  href="index.php">Dashboard</a></li>
				<h4 id="judul"><b>Data</b></h4>
					<li><a href="account.php">Akun</a></li>
					<li><a href="supplier.php">Pemasok</a></li>
					<li><a class="active" href="item.php">Barang</a></li>
				<h4 id="judul"><b>Transaksi</b></h4>
					<li><a  href="pembelian.php">Pembelian</a></li>
					<li><a href="penjualan.php">Penjualan</a></li>
					<li><a href="beban1.php">Pengeluaran</a></li>
				<h4 id="judul"><b>Laporan</b></h4>
					<li><a href="labarugi.php">Laba Rugi</a></li>
				</ul>
				
			</div>
		
			<div class="col-sm-8" style="background:white;margin:0 0 10 10;height:800px;overflow:hidden;">
				<ol class="breadcrumb" style="margin:10;background-color:lightyellow;">
					<li class="breadcrumb-item">
					<a href="index.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a>
					</li>
					<li class="breadcrumb-item active">Barang</li>
					<li class="breadcrumb-item active">Tambah Barang</li>
				</ol>
				
				
				<div class="row" style="margin:0px;" >
				
					<?php include("item_input_2.php");?>
					
				</div>	
			</div>
			
		</div>
		
		<footer class="container-fluid text-center">
			COPYRIGHT&copy; POLITEKNIK CALTEX RIAU
		</footer>
		
	</div>

</body>
</html>