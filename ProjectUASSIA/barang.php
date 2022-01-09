<a href="item_input.php?aksi=input" class="btn btn-shadow btn-info">
Tambah Barang 
</a>
<br><br>


<div class="table-responsive">          
	<table class="table users-table table-condensed table-hover">
		<thead>
			<tr>
				<th class="visible-lg">ID Barang</th>
				<th class="visible-lg">Nama Barang</th>
				<th class="visible-lg">Merk</th>
				<th class="visible-lg">Type</th>
				<th class="visible-lg">Stok</th>
				<th class="visible-lg">Harga</th>
				<th class="visible-lg">Action</th>
			</tr>
		</thead>
		<tbody>
		
			<?php
                $query = mysqli_query($con, "SELECT * FROM item");
                while ($row = mysqli_fetch_array($query)) {
                ?>
                 <tr>
					<td class="visible-lg"><?php echo $row['id_barang']; ?></td>
					<td class="visible-lg"><?php echo $row['nama_barang']; ?></td>
					<td class="visible-lg"><?php echo $row['merk']; ?></td>
					<td class="visible-lg"><?php echo $row['type']; ?></td>
					<td class="visible-lg"><?php echo $row['stok']; ?></td>
					<td class="visible-lg"><?php echo "Rp. ".$row['harga_awal']. ",00"; ?></td>
					<td>     
						<a href="item_input.php?aksi=edit&id=<?php echo $row['id_barang']; ?>" class="btn btn-info">Edit<i class="fa fa-edit"></i></a>
						<a href="item_input_sql.php?aksi=delete&id=<?php echo $row['id_barang']; ?>" class="btn btn-warning">Hapus<i class="fa fa-eraser"></i></a>
					</td>
                </tr>
			<?php
            }
            ?>
		</tbody>
	</table>
</div>
