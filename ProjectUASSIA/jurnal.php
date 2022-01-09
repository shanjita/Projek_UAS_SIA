<?php
	include("koneksi.php");
	session_start();
	if (empty($_SESSION['username'])) {
		header("location:login.php");
	}
?>

<html>
<head>

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
		
	<div class="navbar-inverse" style="background:#ffd500;">
		<div class="collapse navbar-collapse" id="myNavbar">
				<a class="navbar-brand" href="Index.php" ><img src="home.png" width="30" height="30" ></a>
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
		<marquee behavior="scroll" direction="left">Financial Report</marquee>
	</header>
	
	<div class="container-fluid" style="margin:8 0 20 0;height: 800px;">
		<div class="row">	
			<div class="col-sm-2" style="background-color:white;height:800px;">
				<br>
				<a class="menu panel-heading">
					<span class="glyphicon glyphicon-th-large"></span> NAVIGATION
				</a>
				<br><br>
				<ul class="sidenav">
					<li><a  href="index.php">Dashboard</a></li>
				<h4 id="judul"><b>Data</b></h4>
					<li><a href="account.php">Account</a></li>
					<li><a href="supplier.php">Supplier</a></li>
					<li><a href="item.php">Item</a></li>
				<h4 id="judul"><b>Transaction</b></h4>
					<li><a href="pembelian.php">Purchase</a></li>
					<li><a href="penjualan.php">Sale</a></li>
				<h4 id="judul"><b>Report</b></h4>
					<li><a class="active" href="jurnal.php">Jurnal</a></li>
					<li><a href="bukubesar.php">Buku Besar</a></li>
					<li><a href="labarugi.php">Laba Rugi</a></li>
					<li><a href="Balance.php">Balance Sheet</a></li>
				</ul>
				
			</div>
		
			<div class="col-sm-8" style="background:white;margin:0 0 10 10;height:auto;overflow:hidden;">
				<ol class="breadcrumb" style="margin:10;background-color:lightyellow;">
					<li class="breadcrumb-item">
					<a href="index.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a>
					</li>
					<li class="breadcrumb-item active">Jurnal</li>
				</ol>
				
				
				<div class="row" style="margin:0px;" >
				<h2 style="text-shadow: 2px 2px lightgrey;text-align:center;"><b>Journal</b></h2>
					
								<br>
								<div class="colored">
                                    <div class="red"></div>
                                        <div class="yellow"></div>
                                    <div class="red"></div>
										<div class="yellow"></div>
                                    <div class="red"></div>
                                </div>
								<br>
				
				 <!-- Gallery Items -->
        <ul class="list-inline pull-left ">
        <li class="filter" data-filter="mix"><a class="btn btn-info" href="jurnal_entry.php">Jurnal Entry</a></li>
        </ul>
		
		<br><br>

    <center><h2>Jurnal Penjualan</h2></center>
<div class="panel panel-warning">
<div class="panel-heading">
<div class="panel panel-warning">
<div class="panel-heading">

	<div class="table-responsive">   
		<table class="table users-table table-condensed table-hover" >
			<thead>
				<tr>
					<th class="visible-lg">Tanggal</th>
                    <th class="visible-lg">Keterangan</th>
                    <th class="visible-lg">Debit</th>
                    <th class="visible-lg">Kredit</th>
				</tr>
            </thead>
			<tbody>
            <?php
            $query = mysqli_query($con, "SELECT tanggal,keterangan,debit,kredit,harga_jual FROM penjualan ORDER BY  penjualan.tanggal ASC");
            while ($row = mysqli_fetch_array($query)) {
            ?>
            <tr>                                                
                <td class="visible-lg"><?php  echo  $row['tanggal']; ?></td>
				<td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['keterangan'];  echo "<br>"; echo $row['debit']; echo "<br>"; echo  $row['kredit']; ?></td>
				<td class="visible-lg"><?php echo "<br>Rp "; echo $row['harga_jual']; echo "<br>-"."<br>"; ?></td>
                <td class="visible-lg"><?php echo "<br>-"."<br>Rp ";  echo $row['harga_jual']; ?></td>
			</tr>
                                                    
			<?php
				}
            ?>
			</tbody>
		</table>
		</div>
		</div>
		</div>
       </div>
</div>	   
	<div class="panel-heading"><center><h2>Jurnal Pembelian</h2></center>
<div class="panel panel-warning">
<div class="panel-heading">
<div class="panel panel-warning">
<div class="panel-heading">

	<div class="table-responsive">   
		<table class="table users-table table-condensed table-hover" >
			<thead>
                <tr>
					<th class="visible-lg">Tanggal</th>
                    <th class="visible-lg">Keterangan</th>
                    <th class="visible-lg">Debit</th>
                    <th class="visible-lg">Kredit</th>
				</tr>
            </thead>
            <tbody>
				<?php
				$query = mysqli_query($con, "SELECT tanggal,keterangan,debit,kredit,harga_awal FROM pembelian ORDER BY  pembelian.tanggal ASC");
					while ($row = mysqli_fetch_array($query)) {
				?>
                
                <tr>
					<td class="visible-lg"><?php  echo  $row['tanggal']; ?></td>
                    <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['keterangan'];  echo "<br>"; echo $row['debit']; echo "<br>"; echo$row['kredit']; ?></td>
					<td class="visible-lg"><?php echo "<br>Rp "; echo $row['harga_awal']; echo "<br>-"."<br>"; ?></td>
                    <td class="visible-lg"><?php echo "<br>-"."<br>Rp ";  echo $row['harga_awal']; ?></td>
                </tr>
				<?php
					}
                ?>
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
			
		</div>
		
		<footer class="container-fluid text-center">
			COPYRIGHT&copy; POLITEKNIK CALTEX RIAU
		</footer>
		
	</div>

</body>
</html>