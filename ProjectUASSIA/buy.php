<a href="pembelian_input.php?aksi=input" class="btn btn-shadow btn-info" > Tambah Pembelian <i class="icon-plus"></i></a>
<div class="table-responsive"> 	
	<table class="table users-table table-condensed table-hover" style="font-size:14;">
		<thead>
			<tr>
                <th class="visible-lg">ID Transaksi</th>
                <th class="visible-lg">Tanggal</th>
                <th class="visible-lg">Harga</th>
                <th class="visible-lg">Keterangan</th>
                <th class="visible-lg">Nama Barang</th>
                <th class="visible-lg">Pemasok</th>
                <th class="visible-lg">Jumlah</th>
                <th class="visible-lg">Aksi</th>
            </tr>
		</thead>
        <tbody>
			<?php
			$query = mysqli_query($con, "SELECT * FROM pembelian");
			while ($row = mysqli_fetch_array($query)) {
			?>
                                                  
            <tr>
				<td class="visible-lg"><?php echo $row['no_transaksi']; ?></td>
                <td class="visible-lg"><?php echo $row['tanggal']; ?></td>
                <td class="visible-lg"><?php echo "Rp ".$row['harga_awal']. ",00"; ?></td>
                <td class="visible-lg"><?php echo $row['keterangan']; ?></td>
                <td class="visible-lg"><?php echo $row['nama_barang']; ?></td>
                <td class="visible-lg"><?php echo $row['supplier']; ?></td>
                <td class="visible-lg"><?php echo $row['banyaknya']; ?></td>                                            
				<td>
					<a href="pembelian_input.php?aksi=edit&id=<?php echo $row['no_transaksi']; ?>" class="btn btn-info">Edit<i class="fa fa-edit"></i></a>
                    <a href="pembelian_input_sql.php?aksi=delete&id=<?php echo $row['no_transaksi']; ?>" class="btn btn-warning">Hapus<i class="fa fa-eraser"></i></a>
                </td>

            </tr>
				<?php
					}
                    ?>
		</tbody>
	</table>
</div>