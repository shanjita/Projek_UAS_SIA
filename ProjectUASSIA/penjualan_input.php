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
		<marquee behavior="scroll" direction="left">Financial Report</marquee>
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
					<li><a  href="pembelian.php">Pembelian</a></li>
					<li><a class="active" href="penjualan.php">Penjualan</a></li>
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
					<li class="breadcrumb-item active">Penjualan</li>
					<li class="breadcrumb-item active">Tambah Penjualan</li>
				</ol>
				
				
				<div class="row" style="margin:0px;" >
				
				
			<?php if($_GET['aksi']=="input"){ ?>
 <div class="col-md-12">
    <div class="panel panel-warning">
      <div class="panel-heading">

    <div class="panel panel-warning">
      <div class="panel-heading">
      <i class="glyphicon glyphicon-cog"></i>
        <b>Input Penjualan</b>
      </div>
      <div class="panel-body">
<!-- input masks -->
          
                <form action="penjualan_input_sql.php?aksi=insert" method="GET" class="form-horizontal row-border">
                     <input type="hidden" name="aksi" value="insert">
                     
                    
                     
          <div class="panel-body">
              <div class="form-group">
                <label class="col-sm-3 control-label">No Transaksi</label>
                <div class="col-sm-6">
                    <input type="text" name="no_transaksi" class="form-control" id="phone"/>
                </div>
                
              </div><!-- /phone -->
              
              

              <div class="form-group">
                <label class="col-sm-3 control-label">Tanggal</label>
                <div class="col-sm-6">
                    <input type="date" name="tanggal" class="form-control" id="phone"/>
                </div>
                
              </div><!-- /phone -->

              <div class="form-group">
               <label class="col-sm-3 control-label">Jumlah</label>
               <div class="col-sm-6">
                   <input type="text" name="jumlah" class="form-control" id="phext"/>
               </div>
               </div>
               
              
              <div class="form-group">
               <label class="col-sm-3 control-label">Keterangan</label>
               <div class="col-sm-6">
                   <input type="text" name="keterangan" class="form-control" id="phext"/>
               </div>
               
              </div><!-- /phone Ext -->
              <div class="form-group">
            <label class="col-sm-3 control-label">Nama Barang</label>
            <div class="col-sm-6">
                <select class="form-control m-bot15" name="nama_barang">
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM item");
                    while ($d = mysqli_fetch_array($query)) {
                        ?>
                    <option value="<?php echo $d['nama_barang'];?>"><?php echo $d['nama_barang'] ?></option>
                    <?php } ?>
                  </select>
            </div>
         
        </div>
         <div class="form-group">
            <label class="col-sm-3 control-label">Debit</label>
            <div class="col-sm-6">
                <select class="form-control m-bot15" name="debit">
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM account WHERE nama_account='Kas' ");
                    while ($d = mysqli_fetch_array($query)) {
                      
                        ?>
                    <option value="<?php echo $d['nama_account'];?>"><?php echo $d['nama_account']; ?></option>
                    <?php } ?>
                  </select> 
                </div>
            </div>
             <div class="form-group">
            <label class="col-sm-3 control-label">Kredit</label>
            <div class="col-sm-6">
                <select class="form-control m-bot15" name="kredit">
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM account WHERE ket_account='kredit' ");
                    while ($d = mysqli_fetch_array($query)) {
                      
                        ?>
                    <option value="<?php echo $d['nama_account'];?>"><?php echo $d['nama_account']; ?></option>
                    <?php } ?>
                  </select>
                </div>
            </div>
           
</div> <!-- /panel body -->
<div class="panel-footer">
  <div class="row">
   <div class="col-sm-6 col-sm-offset-3">
       <button type="submit" class="btn btn-success">Submit</button>
    <a href="penjualan.php" button type="button" class="btn btn-danger">Cancel</button></a>
  </div>
</div>
</div> <!-- panel footer -->
 </form>
</div></div> <!-- /panel-body -->
</div><!-- Panel --></div></div>
<?php }else{?>
 <?php
 $id=$_GET['id'];
 $query = mysqli_query($con, "SELECT * FROM penjualan WHERE no_transaksi=$id");
 while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                      
<div class="col-md-12">
    <div class="panel panel-warning">
      <div class="panel-heading">

    <div class="panel panel-warning">
      <div class="panel-heading">
      <i class="glyphicon glyphicon-cog"></i>
        <b>Edit Penjualan</b>
      </div>
                <form action="penjualan_input_sql.php?aksi=update&id=<?php echo $row['no_transaksi']; ?>" method="GET" class="form-horizontal row-border">
                    <input type="hidden" name="aksi" value="update">
                    <input type="hidden" name="id" value="<?php echo $row['no_transaksi']; ?>">
                    <div class="panel-body">
              
             
              <!-- /phone -->          
              <div class="form-group">
                <label class="col-sm-3 control-label">Tanggal Penjualan</label>
                <div class="col-sm-6">
                    <input type="date" value="<?php echo $row['tanggal']; ?>" name="tanggal" class="form-control" id="phone"/>
                </div>
                
              </div><!-- /phone -->

              <div class="form-group">
               <label class="col-sm-3 control-label">Jumlah</label>
               <div class="col-sm-6">
                   <input type="text" value="<?php echo $row['jumlah']; ?>" name="jumlah" class="form-control" id="phext"/>
               </div>
               </div>

              
              <div class="form-group">
               <label class="col-sm-3 control-label">Keterangan</label>
               <div class="col-sm-6">
                   <input type="text" value="<?php echo $row['keterangan']; ?>" name="keterangan" class="form-control" id="phext"/>
               </div>
               
              </div><!-- /phone Ext -->
              <div class="form-group">
            <label class="col-sm-3 control-label">Nama Barang</label>
            <div class="col-sm-6">
                <select class="form-control m-bot15" name="nama_barang">
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM item");
                    while ($d = mysqli_fetch_array($query)) {
                        ?>
                    <option value="<?php echo $d['nama_barang'];?>"><?php echo $d['nama_barang'] ?></option>
                    <?php } ?>
                  </select>
            </div></div>
            <div class="form-group">
            <label class="col-sm-3 control-label">Debit</label>
            <div class="col-sm-6">
                <select class="form-control m-bot15" name="debit">
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM account WHERE nama_account='Kas' ");
                    while ($d = mysqli_fetch_array($query)) {
                      
                        ?>
                    <option value="<?php echo $d['nama_account'];?>"><?php echo $d['nama_account']; ?></option>
                    <?php } ?>
                  </select> 
                </div>
            </div>
             <div class="form-group">
            <label class="col-sm-3 control-label">Kredit</label>
            <div class="col-sm-6">
                <select class="form-control m-bot15" name="kredit">
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM account ");
                    while ($d = mysqli_fetch_array($query)) {
                        if ($d['ket_account'] == 'kredit' ){
                        ?>
                    <option value="<?php echo $d['nama_account'];?>"><?php echo $d['nama_account']; ?></option>
                    <?php } }?>
                  </select>
                </div>
            </div>
         
        </div>
           
</div> <!-- /panel body -->
<div class="panel-footer">
  <div class="row">
   <div class="col-sm-6 col-sm-offset-3">
       <button type="submit" class="btn btn-success">Submit</button>
    <a href="penjualan.php" button type="button" class="btn btn-danger">Cancel</button></a>
  </div>
</div>
</div> <!-- panel footer -->
 </form>
                  <?php
                                                    }
                                                    ?>
</div></div> <!-- /panel-body -->
</div><!-- Panel -->
<?php } ?>



        
									
				</div>	
			</div>
			
		</div>
		
		<footer class="container-fluid text-center">
			COPYRIGHT&copy; POLITEKNIK CALTEX RIAU
		</footer>
		
	</div>

</body>
</html>