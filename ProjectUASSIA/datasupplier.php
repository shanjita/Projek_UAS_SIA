<a href="supplier_input.php?aksi=input" ><i class="glyphicon glyphicon-pencil"></i> <b>Tambah Pemasok</b></a></a>
<br>
<br>



<div class="table-responsive" > 
	<table id="tabel" class="table table-striped table-condensed table-bordered" style="font-size:14;">
	<thead>
		<tr>
			<th class="visible-lg">ID</th>
			<th class="visible-lg">Nama Pemasok</th>
			<th class="visible-lg">Alamat</th>
			<th class="visible-lg">Email</th>
			<th class="visible-lg">Nomor Telphone</th>
			<th class="visible-lg">Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$query = mysqli_query($con, "SELECT * FROM supplier");
			while ($row = mysqli_fetch_array($query)) {
	?>
		<tr>
			<td class="visible-lg"><?php echo $row['id_supplier']; ?></td>
			<td class="visible-lg"><?php echo $row['nama']; ?></td>
			<td class="visible-lg"><?php echo $row['alamat']; ?></td>
			<td class="visible-lg"><?php echo $row['email']; ?></td>
			<td class="visible-lg"><?php echo "+ ". $row['no_hp']; ?></td>
            <td>
				<a href="supplier_input.php?aksi=edit&id=<?php echo $row['id_supplier']; ?>">Edit |</a>
				<a href="supplier_input_sql.php?aksi=delete&id=<?php echo $row['id_supplier']; ?>">Hapus</i></a>
			</td>
		</tr>                                            
    <?php
    }
    ?>
    </tbody>
	</table>
</div>