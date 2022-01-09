<a href="beban1_input.php?aksi=input" class="btn btn-shadow btn-info">
Tambah Beban
</a>
<br><br>


<div class="table-responsive">          
	<table class="table users-table table-condensed table-hover">
		<thead>
			<tr>
				
				<th class="visible-lg">No Transaksi</th>
				<th class="visible-lg">Nama Beban</th>
				<th class="visible-lg">Keterangan</th>
				<th class="visible-lg">Tanggal</th>
				<th class="visible-lg">Harga</th>
				<th class="visible-lg">Action</th>
			</tr>
		</thead>
		<tbody>
		
			<?php
                $query = mysqli_query($con, "SELECT * FROM beban");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                 <tr>
					<td class="visible-lg"><?php echo $row['no_transaksi']; ?></td>
					<td class="visible-lg"><?php echo $row['nama_beban']; ?></td>
					<td class="visible-lg"><?php echo $row['keterangan']; ?></td>
					<td class="visible-lg"><?php echo $row['tanggal']; ?></td>
					<td class="visible-lg"><?php echo $row['harga']; ?></td>
					<td>     
						
						<a href="beban1_input_sql.php?aksi=delete&id=<?php echo $row['no_transaksi']; ?>" class="btn btn-warning">Hapus<i class="fa fa-eraser"></i></a>
					</td>
                </tr>
			<?php
            }
            ?>
		</tbody>
	</table>
</div>
