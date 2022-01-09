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
				
				<a href="bukubesar.php" button type="button" class="btn btn-primary">Back</button></a>
                                        <table class="table users-table table-condensed table-hover" >
                                            <thead>
                                                <tr>
                                                    <th  class="visible-lg">Tanggal</th>
                                                    <th  class="visible-lg">Keterangan</th>
                                                    <th class="visible-lg">Debit</th>
                                                    <th  class="visible-lg">Kredit</th>
                                                    <th class="visible-lg">Saldo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                        <tr>
                                                             <?php
                                                             include "koneksi.php";

                                                                    $akun=$_GET['account'];
                                                                    $harga=0;

                                                                    $query1 = mysqli_query($con, "SELECT * FROM pembelian");
                                                                    $n = mysqli_fetch_object($query1);

                                                                    $query = mysqli_query($con, "SELECT * FROM pembelian");                                                                    
                                                                    while ($row = mysqli_fetch_array($query)) {
                                                                        
                                                                        if($akun==$n->debit){
                                                                        $harga = $harga + ($row['harga_awal']);    
                                                    ?>
                                                             <td class="visible-lg"><?php echo $row['tanggal']; ?></td>
                                                             
                                                            <td class="visible-lg"><?php echo $row['keterangan']; ?></td>
                                                            <td class="visible-lg"><?php echo "Rp ".$row['harga_awal'].""; ?></td>
                                                            <td class="visible-lg">-</td>
                                                            <td class="visible-lg"><?php echo "Rp ".$harga."  ,-"; ?></td>
                                                          
                                                            
                                                        </tr>
                                                        </tr>
                                                    
                                                        <?php
                                                   
                                                                  }  
                                                                    else if($akun==$n->kredit){
                                                                        $harga = $harga + ($row['harga_awal']);
                                                    ?>
                                                             <td class="visible-lg"><?php echo $row['tanggal']; ?></td>
                                                             
                                                            <td class="visible-lg"><?php echo $row['keterangan']; ?></td>
                                                            <td class="visible-lg">-</td>
                                                            <td class="visible-lg"><?php echo "Rp ".$row['harga_awal']; ?></td>
                                                            <td class="visible-lg"><?php echo "Rp ".$harga."  ,-"; ?></td>
                                                        
                                                        </tr>
                                                        </tr>
                                                    
                                                        <?php
                                                   }
                                                   else{ 
                                                    //echo "gak masuk woiii!!!!";
                                                }
                                               }
                                                             include"koneksi.php";
                                                                    $akun1=$_GET['account'];
                                                                    

                                                                    $query2 = mysqli_query($con, "SELECT * FROM penjualan");
                                                                      $m = mysqli_fetch_object($query2);                                                                                                                                     
                                                                    $query3 = mysqli_query($con, "SELECT * FROM penjualan");
                                                                    

                                                                    while ($rows = mysqli_fetch_array($query3)) {
                                                                        
                                                                        if($akun1==$m->debit){
                                                                            $harga=$harga + ($rows['harga_jual']);
                                                    ?>
                                                             <td class="visible-lg"><?php echo $rows['tanggal']; ?></td>
                                                             
                                                            <td class="visible-lg"><?php echo $rows['keterangan']; ?></td>
                                                            <td class="visible-lg"><?php echo "Rp " .$rows['harga_jual']; ?></td>
                                                            <td class="visible-lg">-</td>
                                                            <td class="visible-lg"><?php echo "Rp ".$harga."  ,-"; ?></td>
                                                          
                                                            
                                                        </tr>
                                                        </tr>
                                                    
                                                        <?php
                                                   
                                                                  }  
                                                                    elseif($akun==$m->kredit){
                                                                    $harga=$harga + ($rows['harga_jual']);
                                                    ?>
                                                             <td class="visible-lg"><?php echo $rows['tanggal']; ?></td>
                                                             
                                                            <td class="visible-lg"><?php echo $rows['keterangan']; ?></td>
                                                            <td class="visible-lg">-</td>
                                                            <td class="visible-lg"><?php echo "Rp " .$rows['harga_jual']; ?></td>
                                                            <td class="visible-lg"><?php echo "Rp ".$harga."  ,-"; ?></td>
                                                        
                                                        </tr>
                                                        </tr>
                                                    
                                                        <?php
                                                   }
                                                   else{ 
                                                    //echo "gak masuk woiii!!!!";
                                                }
                                               }
                                            ?>                                               


                                            </tbody>
                                        </table>
                                    </div>
								</div>
							</div>
		
		<footer class="container-fluid text-center">
			COPYRIGHT&copy; POLITEKNIK CALTEX RIAU
		</footer>
		
	</div>

</body>
</html>