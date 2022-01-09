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
		
			<div class="col-sm-8" style="background:white;margin:0 0 10 10;height:800px;overflow:hidden;">
				<ol class="breadcrumb" style="margin:10;background-color:lightyellow;">
					<li class="breadcrumb-item">
					<a href="index.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a>
					</li>
					<li class="breadcrumb-item active">Jurnal</li>
					<li class="breadcrumb-item active">Jurnal Entry</li>
					<li class="breadcrumb-item active">Record Jurnal Entry</li>
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
				</div>	
				
			<!-- disini masukkan contentnya -->
				<?php if($_GET['aksi']=="input"){ ?>
<!-- input masks -->
 <div class="col-md-12">
    <div class="panel panel-warning">
      <div class="panel-heading">

    <div class="panel panel-warning">
      <div class="panel-heading">
      <i class="glyphicon glyphicon-cog"></i>
        <b>Journal Entry</b>
      </div>
      <div class="panel-body">        
                <form action="jurnal_input_sql.php?aksi=insert" method="GET" class="form-horizontal row-border">
                     <input type="hidden" name="aksi" value="insert">
          <div class="form-group">
                <label class="col-sm-3 control-label">Tanggal</label>
                <div class="col-sm-6">
                    <input type="date" name="tgl_jurnal" class="form-control" id="phone"/>
                </div>
                
              </div><!-- /phone -->
              

              <div class="form-group">
            <label class="col-sm-3 control-label">Debit</label>
            <div class="col-sm-6">
                <select class="form-control m-bot15" name="akun1">
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM account ");
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
                <select class="form-control m-bot15" name="akun2">
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM account ");
                    while ($d = mysqli_fetch_array($query)) {
                        ?>
                    <option value="<?php echo $d['nama_account'];?>"><?php echo $d['nama_account']; ?></option>
                    <?php } ?>
                  </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Harga</label>
                <div class="col-sm-6">
                    <input type="text" name="harga_debit" class="form-control" id="phone"/>
                </div>

                
              </div><!-- /phone -->
               
           
</div> <!-- /panel body -->
<div class="panel-footer">
  <div class="row">
   <div class="col-sm-6 col-sm-offset-3">
       <button type="submit" class="btn btn-success">Submit</button>
    <a href="jurnal.php" button type="button" class="btn btn-danger">Cancel</button></a>
  </div>
</div>
</div> <!-- panel footer -->
 </form>
</div></div> <!-- /panel-body -->
</div><!-- Panel -->
<?php }else{?>
 <?php
 $id=$_GET['id'];
                                                $query = mysqli_query($con, "SELECT * FROM jurnal where id_jurnal=$id");
                                               while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                      
<div class="row">
           <div class="col-md-12">
            <div class="panel panel-cascade">
             <div class="panel-heading">
              <h3 class="panel-title">
                <i class="fa fa-pencil-square"></i> Form Input Jurnal 
                <span class="pull-right">
                  <div class="btn-group code">
                   
                </div>
                
              </span>
            </h3>
          </div>
                <form action="jurnal_input_sql.php?aksi=update&id=<?php echo $row['id_jurnal']; ?>" method="GET" class="form-horizontal row-border">
                    <input type="hidden" name="aksi" value="update">
                    <input type="hidden" name="id" value="<?php echo $row['id_jurnal']; ?>">
                    <div class="panel-body">
              
             

              <div class="form-group">
                <label class="col-sm-3 control-label">Tanggal </label>
                <div class="col-sm-6">
                    <input type="date" value="<?php echo $row['tgl_jurnal']; ?>" name="tgl_jurnal" class="form-control" id="phone"/>
                </div>
                
              </div><!-- /phone -->

              <div class="form-group">
            <label class="col-sm-3 control-label">Debit</label>
            <div class="col-sm-6">
                <select class="form-control m-bot15" name="akun1">
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM account ");
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
                <select class="form-control m-bot15" name="akun2">
                    <?php
                    $query = mysqli_query($con, "SELECT * FROM account ");
                    while ($d = mysqli_fetch_array($query)) {
                        ?>
                    <option value="<?php echo $d['nama_account'];?>"><?php echo $d['nama_account']; ?></option>
                    <?php } ?>
                  </select>
                </div>
            </div>
            
              <div class="form-group">
               <label class="col-sm-3 control-label">Harga Debit</label>
               <div class="col-sm-6">
                   <input type="text" value="<?php echo $row['harga_debit']; ?>" name="harga_debit" class="form-control" id="phext"/>
               </div>
               
              </div><!-- /phone Ext -->

              <div class="form-group">
               <label class="col-sm-3 control-label">Harga Kredit</label>
               <div class="col-sm-6">
                   <input type="text" value="<?php echo $row['harga_kredit']; ?>" name="harga_kredit" class="form-control" id="phext"/>
               </div>
               
              </div><!-- /phone Ext -->
           
</div> <!-- /panel body -->
<div class="panel-footer">
  <div class="row">
   <div class="col-sm-6 col-sm-offset-3">
       <button type="submit" class="btn btn-success">Submit</button>
    <a href="jurnal.php" button type="button" class="btn btn-danger">Cancel</button></a>
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

				<!-- end -->
			</div>
		</div>
		
		<footer class="container-fluid text-center">
			COPYRIGHT&copy; POLITEKNIK CALTEX RIAU
		</footer>
		
	</div>

</body>
</html>