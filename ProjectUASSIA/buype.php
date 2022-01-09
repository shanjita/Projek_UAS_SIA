<a href="pengeluaran_input.php?aksi=input" class="btn btn-shadow btn-info" > Tambah Pengeluaran <i class="icon-plus"></i></a>
<div class="table-responsive"> 	
	<table class="table users-table table-condensed table-hover" style="font-size:14;">
		<thead>
			<tr>
                <th class="visible-lg">ID Beban</th>
                <th class="visible-lg">Keterangan</th>
                <th class="visible-lg">Nama Beban</th>
                <th class="visible-lg">Tanggal</th>
                <th class="visible-lg">Harga</th>
  
            </tr>
		</thead>
        <tbody>
			<?php
			$query = mysqli_query($con, "SELECT * FROM pengeluaran");
			while ($row = mysqli_fetch_array($query)) {
			?>
                                                  
            <tr>
				<td class="visible-lg"><?php echo $row['id_beban']; ?></td>
                <td class="visible-lg"><?php echo $row['keterangan']; ?></td>
                <td class="visible-lg"><?php echo $row['nama_beban']; ?></td>
                <td class="visible-lg"><?php echo $row['tanggal']; ?></td>
                <td class="visible-lg"><?php echo "Rp ".$row['harga']. ",00"; ?></td>
                                                            
				<td>
					<a href="pengeluaran_input.php?aksi=edit&id=<?php echo $row['id_beban']; ?>" class="btn btn-info">Edit<i class="fa fa-edit"></i></a>
                    <a href="pengeluaran_input_sql.php?aksi=delete&id=<?php echo $row['no_transaksi']; ?>" class="btn btn-warning">Delete<i class="fa fa-eraser"></i></a>
                </td>

            </tr>
				<?php
					}
                    ?>
		</tbody>
	</table>
</div>