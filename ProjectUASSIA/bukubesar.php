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
	
	<header>Laporan Keuangan</header>
	
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
					<li><a href="jurnal.php">Jurnal</a></li>
					<li><a class="active" href="bukubesar.php">Buku Besar</a></li>
					<li><a href="labarugi.php">Laba Rugi</a></li>
					<li><a href="Balance.php">Balance Sheet</a></li>
				</ul>
				
			</div>
		
			<div class="col-sm-8" style="background:white;margin:0 0 10 10;height:800px;overflow:hidden;">
				<ol class="breadcrumb" style="margin:10;background-color:lightyellow;">
					<li class="breadcrumb-item">
					<a href="index.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a>
					</li>
					<li class="breadcrumb-item active">Buku Besar</li>
				</ol>
				
				
				<div class="row" style="margin:0px;" >
				<h2 style="text-shadow: 2px 2px lightgrey;text-align:center;"><b>Buku Besar</b></h2>
					
								<br>
								<div class="colored">
                                    <div class="red"></div>
                                        <div class="yellow"></div>
                                    <div class="red"></div>
										<div class="yellow"></div>
                                    <div class="red"></div>
                                </div>
								<br>
				
				<form action="bukubesar_input.php" method="GET" class="form-horizontal row-border">
        
         <div class="form-group">
            <label class="col-sm-3 control-label">Pilih Account</label>
            <div class="col-sm-6">
                <select class="form-control m-bot15" name="account">
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM account order by nama_account asc");
                    while ($d = mysqli_fetch_array($query)) {
                        ?>
                    <option value="<?php echo $d['nama_account'];?>"><?php echo $d['nama_account']; ?></option>
                    <?php } ?>
                  </select> 
                </div>
            </div>

  <div class="row">
   <div class="col-sm-6 col-sm-offset-3">
       <button type="submit" class="btn btn-success">Submit</button>
    <a href="bukubesar.php" button type="button" class="btn btn-danger">Cancel</button></a>
  </div>
</div>
</div> <!-- panel footer -->
 </form>

</div> <!-- /panel-body -->
</div><!-- Panel -->
					
					
			
			
	
		
		<footer class="container-fluid text-center">
			COPYRIGHT&copy; POLITEKNIK CALTEX RIAU
		</footer>
		
	</div>

</body>
</html>