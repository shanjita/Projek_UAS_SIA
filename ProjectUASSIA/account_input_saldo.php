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
	
	<header>Laporan Keuangan</header>
	
	<div class="container-fluid" style="margin:8 0 20 0;height: 800px;">
		<div class="row">	
			<div class="col-sm-2" style="background-color:white;height:800px;">
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
				<h4 id="judul"><b>Laporan</b></h4>
					<li><a href="labarugi.php">Laba Rugi</a></li>
				</ul>
				
			</div>
		
			<div class="col-sm-8" style="background:white;margin:0 0 10 10;height:800px;overflow:hidden;">
				<ol class="breadcrumb" style="margin:10;background-color:lightyellow;">
					<li class="breadcrumb-item">
					<a href="index.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a>
					</li>
					<li class="breadcrumb-item active">Akun</li>
					<li class="breadcrumb-item active">Akun pembukaan </li>
					
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
            </div> <div class="colored">
                                    <div class="blue"></div>
                                        <div class="aqua"></div>
                                    <div class="blue"></div>
                                        <div class="aqua"></div>
                                        <div class="blue"></div>
                                    </div><br>
            <div class="table-responsive">  
                                        <table class="table users-table table-condensed table-hover" style="font-size:14;">
                                            <thead>
                                                <tr>
                                                    <th  class="visible-lg">No Account</th>
                                                    <th  class="visible-lg">Nama Account</th>
                                                    <th class="visible-lg">Nama Type</th>
                                                    <th class="visible-lg">Debit</th>
                                                    <th class="visible-lg">Kredit</th>
                                                    <th class="visible-lg">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                
                                                    <tr>
                                                        <td class="visible-lg">1 - 0000</td>
                                                        <td class="visible-lg">Assets</td>
                                                        <td class="visible-lg">Assets</td>
                                                        <td>
                                                        </td>
                                                        <td>
                                                    </td>
                                                    </tr>
                                                <?php
                                                $query = mysqli_query($con, "SELECT * FROM account order by no_account, jenis_account desc");
                                                while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                    <?php 
                                                    if ($row['id_jenis'] == 1){
                                                    if ($row['jenis_account'] == "H" && $row['no_account']>=1000 && $row['no_account']<9999) { ?>
                                                        <tr>
                                                            <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>1 - <?php echo $row['no_account']; ?></strong></td>
                                                            <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $row['nama_account']; ?></strong></td>
                                                            <td class="visible-lg">Assets</td>
                                                             <td class="visible-lg"><?php echo "-"?></td>
                                                             <td class="visible-lg"><?php echo "-";?></td>
                                                            <td>
                                                                
                                                                 
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php if ($row['jenis_account'] == "D" && $row['no_account']>=1000 && $row['no_account']<9999) { ?>
                                                        <tr>
                                                            <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1 - <?php echo $row['no_account']; ?></td>
                                                            <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['nama_account']; ?></td>
                                                            <td class="visible-lg">Assets</td>
                                                             <td class="visible-lg"><?php echo "Rp "; echo $row['debit'];?></td>
                                                             <td class="visible-lg"><?php echo "-";?></td>
                                                            <td>
                                                               <a href="account_opening.php?aksi=edit_debit&id=<?php echo $row['id_account']; ?>" class="btn btn-info">Edit</i></a>  
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                        <?php
                                                    }}
                                                    ?>
                                                <tr>
                                                    <td class="visible-lg">2 - 0000</td>
                                                    <td class="visible-lg">Liabilty</td>
                                                    <td class="visible-lg">Liabilty</td>
                                                    <td>
                                                        
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr>
                                                <?php
                                                $query = mysqli_query($con, "SELECT * FROM account order by no_account, jenis_account desc");
                                               while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                    <?php 
                                                    if ($row['id_jenis'] == 2){
                                                    if ($row['jenis_account'] == "H" && $row['no_account']>=1000 && $row['no_account']<9999) { ?>
                                                        <tr>
                                                            <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>2 - <?php echo $row['no_account']; ?></strong></td>
                                                            <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $row['nama_account']; ?></strong></td>
                                                            <td class="visible-lg">Liabilities</td>
                                                            <td class="visible-lg"><?php echo "-";?></td>
                                                             <td class="visible-lg"><?php echo "-";?></td>
                                                            <td>
                                                                   
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php if ($row['jenis_account'] == "D" && $row['no_account']>=1000 && $row['no_account']<9999) { ?>
                                                        <tr>
                                                            <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2 - <?php echo $row['no_account']; ?></td>
                                                            <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['nama_account']; ?></td>
                                                            <td class="visible-lg">Liabilities</td>
                                                            <td class="visible-lg"><?php echo "-";?></td>
                                                             <td class="visible-lg"><?php echo  "Rp "; echo $row['kredit'];?></td>
                                                            <td>
                                                                <a href="account_opening.php?aksi=edit_kredit&id=<?php echo $row['id_account']; ?>" class="btn btn-info">Edit</i></a>  
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                        <?php
                                                    }}
                                                    ?>
                                                <tr>
                                                    <td class="visible-lg">3 - 0000</td>
                                                    <td class="visible-lg">Equity</td>
                                                    <td class="visible-lg">Equity</td>
                                                    <td>
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr>
                                                <?php
                                                
                                                $query = mysqli_query($con, "SELECT * FROM account order by no_account, jenis_account desc");
                                               while ($row = mysqli_fetch_array($query)) {
                                                   
                                                    ?>
                                                    <?php 
                                                    if ($row['id_jenis'] == 3){
                                                        if ($row['jenis_account'] == "H" && $row['no_account']>=1000 && $row['no_account']<9999) { ?>
                                                        <tr>
                                                            <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>3 - <?php echo $row['no_account']; ?></strong></td>
                                                            <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $row['nama_account']; ?></strong></td>
                                                            <td class="visible-lg">Equity</td>
                                                            <td class="visible-lg"><?php echo "-";?></td>
                                                            <td class="visible-lg"><?php echo "-";?></td>
                                                            <td>
                                                                   
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php if ($row['jenis_account'] == "D" && $row['no_account']>=1000 && $row['no_account']<9999) { ?>
                                                        <tr>
                                                            <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3 - <?php echo $row['no_account']; ?></td>
                                                            <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['nama_account']; ?></td>
                                                            <td class="visible-lg">Equity</td>
                                                            <td class="visible-lg"><?php echo "-";?></td>
                                                             <td class="visible-lg"><?php echo "Rp "; echo $row['kredit'];?></td>
                                                            <td>
                                                               <a href="account_opening.php?aksi=edit_kredit&id=<?php echo $row['id_account']; ?>" class="btn btn-info">Edit</i></a>    
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                        <?php
                                                    }}
                                                    
                                                    ?>
                                                <?php $query = mysqli_query($con, "SELECT sum(kredit) as j_kredit FROM account where id_jenis>=2&&id_jenis<4");
                                               while ($row = mysqli_fetch_array($query)) { $j_kredit=$row['j_kredit']; }?>
                                                        
                                                <?php $query = mysqli_query($con, "SELECT sum(debit) as j_debit FROM account where id_jenis>=1&&id_jenis<2");
                                               while ($row = mysqli_fetch_array($query)) { $j_debit=$row['j_debit']; }?>
                                                        <tr>
                                                            <td colspan="5" class="visible-lg"><h2 style="float: right">Total</h2></td>
                                                            <td class="visible-lg">Selisih : <br> Rp <?php $total=$j_debit-$j_kredit; echo $total; ?> <br>Ket <?php if($total<0||$total>0){
															echo 'Tidak Balance';}else{
															echo 'Balance';} ?></td>
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