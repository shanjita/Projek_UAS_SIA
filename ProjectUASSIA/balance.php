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
					<li><a href="jurnal.php">Jurnal</a></li>
					<li><a href="bukubesar.php">Buku Besar</a></li>
					<li><a href="labarugi.php">Laba Rugi</a></li>
					<li><a class="active" href="Balance.php">Balance Sheet</a></li>
				</ul>
				
			</div>
		
			<div class="col-sm-8" style="background:white;margin:0 0 10 10;height:800px;overflow:hidden;">
				<ol class="breadcrumb" style="margin:10;background-color:lightyellow;">
					<li class="breadcrumb-item">
					<a href="index.php"><span class="glyphicon glyphicon-home"></span> Dashboard</a>
					</li>
					<li class="breadcrumb-item active">Balance Sheet</li>
				</ol>
				
				
				<div class="row" style="margin:0px;" >
				<h2 style="text-shadow: 2px 2px lightgrey;text-align:center;"><b>Balance Sheet</b></h2>
					
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
                                        
                                            <tbody>
                                            
                                                    <tr>
                                                        <td class="visible-lg"><b>Assets</b></td>
                                                        <td class="visible-lg"></b></td>
                                                    </tr>
                                                <?php
                                                $query = mysqli_query($con, "SELECT * FROM account order by no_account, jenis_account desc");
                                                while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                                                    <?php 
                                                    if ($row['id_jenis'] == 1){
                                                    if ($row['jenis_account'] == "H" && $row['no_account']>=1000 && $row['no_account']<9999) { ?>
                                                        <tr>
                                                            <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $row['nama_account']; ?></strong></td>
                                                             <td class="visible-lg"><?php echo ""?></td>
                                                             <td class="visible-lg"><?php echo "";?></td>
                                                            <td>
                                                                
                                                                 
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php if ($row['jenis_account'] == "D" && $row['no_account']>=1000 && $row['no_account']<9999) { ?>
                                                        <tr>
                                                            <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['nama_account']; ?></td>
                                                             <td class="visible-lg"><?php echo "Rp "; echo $row['debit'];?></td>
                                                             <td class="visible-lg"><?php echo "";?></td>
                                                            
                                                        </tr>
                                                        <?php } ?>
                                                        <?php
                                                    }}
                                                    ?>
                                                        
                                                <?php $query = mysqli_query($con, "SELECT sum(debit) as j_debit FROM account where id_jenis>=1&&id_jenis<2");
                                               while ($row = mysqli_fetch_array($query)) { $j_debit=$row['j_debit']; }?>
                                                <tr>
                                                    <td class="visible-lg"><b>Total Assets</b></td>
                                                    <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <b><?php print "Rp ".$j_debit; ?></b>
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr><br><br>

                                                <tr>
                                                    <td class="visible-lg"><b>Liabilty</b></td>
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
                                                    if ($row['jenis_account'] == "H" && $row['no_akun']>=1000 && $row['no_akun']<9999) { ?>
                                                        <tr>
                                                            <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $row['nama_account']; ?></strong></td>
                                                            <td class="visible-lg"><?php echo "";?></td>
                                                             <td class="visible-lg"><?php echo "";?></td>
                                                            <td>
                                                                   
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php if ($row['jenis_account'] == "D" && $row['no_account']>=1000 && $row['no_account']<9999) { ?>
                                                        <tr>
                                                            <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['nama_account']; ?></td>
                                                            <td class="visible-lg"><?php echo  "Rp "; echo $row['kredit'];?></td>
                                                            <td class="visible-lg"><?php echo "";?></td>
                                                             
                                                            
                                                        </tr>
                                                        <?php } ?>
                                                        <?php
                                                    }}
                                                    ?>



                                                <tr>
                                                    <td class="visible-lg"><b>Equity</b></td>
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
                                                            <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $row['nama_account']; ?></strong></td>
                                                            <td class="visible-lg"><?php echo "";?></td>
                                                            <td class="visible-lg"><?php echo "";?></td>
                                                            <td>
                                                                   
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    <?php if ($row['jenis_account'] == "D" && $row['no_account']>=1000 && $row['no_account']<9999) { ?>
                                                        <tr>
                                                            <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['nama_account']; ?></td>
                                                            <td class="visible-lg"><?php echo  "Rp "; echo $row['kredit'];?></td>
                                                            <td class="visible-lg"><?php echo "";?></td>
                                                            
                                                        </tr>
                                                        <?php } ?>
                                                        <?php
                                                    }}
                                                    
                                                    ?>
                                                    <?php $query = mysqli_query($con, "SELECT sum(kredit) as j_kredit FROM account where id_jenis>=2&&id_jenis<4");
                                               while ($row = mysqli_fetch_array($query)) { $j_kredit=$row['j_kredit']; }?>
                                                        
                                                <tr>
                                                    <td class="visible-lg"><b>Total Liability + Equity</b></td>
                                                    <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                        <b><?php print "Rp ".$j_kredit; ?></b>
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr><br><br>
                                                        


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