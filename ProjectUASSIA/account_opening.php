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
				
				<ul class="sidenav">
					<li><a  href="index.php">Dashboard</a></li>
				<h4 id="judul"><b>Data</b></h4>
					<li><a class="active" href="account.php">Akun</a></li>
					<li><a href="supplier.php">Pemasok</a></li>
					<li><a href="item.php">Barang</a></li>
				<h4 id="judul"><b>Transaksi</b></h4>
					<li><a href="pembelian.php">Pembelian</a></li>
					<li><a href="penjualan.php">Penjualan</a></li>
					<li><a href="beban1.php">Pengeluaran</a></li>
				</ul>
				
			</div>
		
			<div class="col-sm-8" style="background:white;margin:0 0 10 10;height:800px;overflow:hidden;">
				<ol class="breadcrumb" style="margin:10;background-color:lightyellow;">
					<li class="breadcrumb-item">
					<a href="index.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a>
					</li>
					<li class="breadcrumb-item active">Akun</li>
					<li class="breadcrumb-item active">Account Opening Balance</li>
					<li class="breadcrumb-item active">Add Opening Balance</li>
					
				</ol>
				
				
				<div class="row" style="margin:0px;" >
				
								<br>
		<div class="col-md-12">
        <div class="panel panel-warning">
            <div class="panel-heading">

        <div class="panel panel-warning">
            <div class="panel-heading">
        <a href="account.php" button type="button" class="btn btn-primary">Back</button></a>
            <i class="glyphicon glyphicon-cog"></i>
                <b>Account Opening Balance</b>
            </div>
            
 <?php
 $id=$_GET['id'];
                                                $query = mysqli_query($con, "SELECT * FROM account where id_account=$id");
                                               while ($row = mysqli_fetch_array($query)) {
                                                    ?>

                  <div class="btn-group code">
                  <a href="#" class="panel-minimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="#" class="panel-close"><i class="fa fa-times"></i></a>
              </span>
            </h3>
          </div>
                <form action="account_input_sql.php?aksi=update&id=<?php echo $row['id_account']; ?>" method="GET" class="form-horizontal row-border">
                    <input type="hidden" name="aksi" value="<?php if($_GET['aksi']=="edit_debit") { echo "update_debit"; }else { echo "update_kredit";}?>">
                    <input type="hidden" name="id" value="<?php echo $row['id_account']; ?>">
                    <div class="panel-body">
              
             
              <div class="form-group">
               <label class="col-sm-3 control-label">Jumlah Saldo</label>
               <div class="col-sm-6">
                   
                   <input type="text" value="<?php if($_GET['aksi']=="edit_debit") { echo $row['debit']; }else {echo $row['kredit'];}?>" name="nama" class="form-control" id="phext"/>
               </div>
               <div class="col-sm-3">
                
               </div>
              </div><!-- /phone Ext -->
           
</div> <!-- /panel body -->
<div class="panel-footer">
  <div class="row">
   <div class="col-sm-6 col-sm-offset-3">
       <button type="submit" class="btn btn-success">Submit</button>
    <a href="account_input_saldo.php"><button type="button" class="btn btn-danger">Cancel</button>
  </div>
</div>
</div> <!-- panel footer -->
 </form>
                  <?php
                                                    }
                                                    ?>
</div></div> <!-- /panel-body -->
</div><!-- Panel -->

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