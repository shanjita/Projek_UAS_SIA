<a href="account_input.php?aksi=input&header=D" class="btn btn-shadow btn-info" >
                                            Tambah Akun Detail <i class="icon-plus"></i>
                                        </a>
										
                                        <a href="account_input.php?aksi=input&header=H" class="btn btn-shadow btn-info" >
                                            Tambah Akun Header <i class="icon-plus"></i>
                                        </a>
                                        
                                       <a href="account_input_saldo.php" class="btn btn-shadow btn-info" >

                                           Account Opening Balance <i class="icon-plus"></i>

                                        </a>
<br><br>

<div class="table-responsive">          
	<table class="table users-table table-condensed table-hover" >
		<thead>
			<tr>
				<th  class="visible-lg">No Account</th>
                <th  class="visible-lg">Nama Account</th>
                <th class="visible-lg">Type Account</th>   
                <th class="visible-lg">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
				<td class="visible-lg"><b>1 - 0000</b></td>
                <td class="visible-lg"><b>Harta</b></td>
                <td class="visible-lg"><b>Harta</b></td>
                <td></td>
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
                <td class="visible-lg">Harta</td>
                <td>
					<a href="account_input.php?aksi=edit&header=H&id=<?php echo $row['id_account']; ?>" class="btn btn-info">Edit</i></a>
                    <a href="account_input_sql.php?aksi=delete&id=<?php echo $row['id_account']; ?>" class="btn btn-warning">Hapus</i></a>
                </td>
            </tr>
				<?php } ?>
                <?php if ($row['jenis_account'] == "D" && $row['no_account']>=1000 && $row['no_account']<9999) { ?>
            <tr>
				<td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1 - <?php echo $row['no_account']; ?></td>
                <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['nama_account']; ?></td>
                <td class="visible-lg">Harta</td>
                <td>
					<a href="account_input.php?aksi=edit&header=D&id=<?php echo $row['id_account']; ?>" class="btn btn-info">Edit</i></a>
					<a href="account_input_sql.php?aksi=delete&id=<?php echo $row['id_account']; ?>" class="btn btn-warning">Hapus</i></a>
                </td>
            </tr>
				<?php } ?>
                <?php }} ?>
            <tr>
				<td class="visible-lg"><b>2 - 0000</b></td>
				<td class="visible-lg"><b>Utang</b></td>
                <td class="visible-lg"><b>Utang</b></td>
                <td></td>
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
                <td class="visible-lg">Utang</td>
                <td>
					<a href="account_input.php?aksi=edit&header=H&id=<?php echo $row['id_account']; ?>" class="btn btn-info">Edit</a>
                    <a href="account_input_sql.php?aksi=delete&id=<?php echo $row['id_account']; ?>" class="btn btn-warning">Hapus</a>
                </td>
			</tr>
				<?php } ?>
                <?php if ($row['jenis_account'] == "D" && $row['no_account']>=1000 && $row['no_account']<9999) { ?>
            <tr>
				<td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2 - <?php echo $row['no_account']; ?></td>
                <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['nama_account']; ?></td>
                <td class="visible-lg">Utang</td>
                <td>
					<a href="account_input.php?aksi=edit&header=D&id=<?php echo $row['id_account']; ?>" class="btn btn-info">Edit</a>
                    <a href="account_input_sql.php?aksi=delete&id=<?php echo $row['id_account']; ?>" class="btn btn-warning">Hapus</a>
                </td>
            </tr>
				<?php } ?>
                <?php }} ?>
            <tr>
				<td class="visible-lg"><b>3 - 0000</b></td>
                <td class="visible-lg"><b>Modal</b></td>
                <td class="visible-lg"><b>Modal</b></td>
                <td></td>
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
                <td class="visible-lg">Modal</td>
                <td>
					<a href="account_input.php?aksi=edit&header=H&id=<?php echo $row['id_account']; ?>" class="btn btn-info">Edit</a>
                    <a href="account_input_sql.php?aksi=delete&id=<?php echo $row['id_account']; ?>" class="btn btn-warning">Hapus</a>
				</td>
            </tr>
				<?php } ?>
                <?php if ($row['jenis_account'] == "D" && $row['no_account']>=1000 && $row['no_account']<9999) { ?>
            <tr>
				<td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3 - <?php echo $row['no_account']; ?></td>
                <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['nama_account']; ?></td>
                <td class="visible-lg">Modal</td>
                <td>
					<a href="account_input.php?aksi=edit&header=D&id=<?php echo $row['id_account']; ?>" class="btn btn-info">Edit</a>
                    <a href="account_input_sql.php?aksi=delete&id=<?php echo $row['id_account']; ?>" class="btn btn-warning">Hapus</a>
                </td>
            </tr>
				<?php } ?>
				<?php }} ?>
            <tr>
				<td class="visible-lg"><b>4 - 0000</b></td>
                <td class="visible-lg"><b>Pendapatan</b></td>
                <td class="visible-lg"><b>Pendapatan</b></td>
                <td></td>
            </tr>
				<?php
					$query = mysqli_query($con, "SELECT * FROM account order by no_account, jenis_account desc");
						while ($row = mysqli_fetch_array($query)) {
                ?>
				<?php 
					if ($row['id_jenis'] == 4){
                    if ($row['jenis_account'] == "H" && $row['no_account']>=1000 && $row['no_account']<9999) { ?>
            <tr>
				<td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>4 - <?php echo $row['no_account']; ?></strong></td>
                <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $row['nama_account']; ?></strong></td>
                <td class="visible-lg">Penjualan</td>
                <td>
					<a href="account_input.php?aksi=edit&header=H&id=<?php echo $row['id_account']; ?>" class="btn btn-info">Edit</a>
                    <a href="account_input_sql.php?aksi=delete&id=<?php echo $row['id_account']; ?>" class="btn btn-warning">Hapus</i></a>
                </td>
            </tr>
				<?php } ?>
                <?php if ($row['jenis_account'] == "D" && $row['no_account']>=1000 && $row['no_account']<9999) { ?>
            <tr>
				<td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4 - <?php echo $row['no_account']; ?></td>
                <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['nama_account']; ?></td>
                <td class="visible-lg">Pendapatan</td>
                <td>
					<a href="account_input.php?aksi=edit&header=D&id=<?php echo $row['id_account']; ?>" class="btn btn-info">Edit</a>
                    <a href="account_input_sql.php?aksi=delete&id=<?php echo $row['id_account']; ?>" class="btn btn-warning">Hapus</a>
                </td>
            </tr>
				<?php } ?>
                <?php }} ?>
			<tr>
				<td class="visible-lg"><b>5 - 0000</b></td>
                <td class="visible-lg"><b>Cost of Sales</b></td>
				<td class="visible-lg"><b>Cost of Sales</b></td>
                <td></td>
            </tr>
				<?php
					$query = mysqli_query($con, "SELECT * FROM account order by no_account, jenis_account desc");
                    while ($row = mysqli_fetch_array($query)) {
				?>
                <?php 
					if ($row['id_jenis'] == 5){
                    if ($row['jenis_account'] == "H" && $row['no_account']>=1000 && $row['no_account']<9999) { ?>
            <tr>
				<td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>5 - <?php echo $row['no_account']; ?></strong></td>
                <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $row['nama_account']; ?></strong></td>
                <td class="visible-lg">Pembelian</td>
                <td>
					<a href="account_input.php?aksi=edit&header=H&id=<?php echo $row['id_account']; ?>" class="btn btn-info">Edit</a>
                    <a href="account_input_sql.php?aksi=delete&id=<?php echo $row['id_account']; ?>" class="btn btn-warning">Hapus</a>
				</td>
            </tr>
				<?php } ?>
                <?php if ($row['jenis_account'] == "D" && $row['no_account']>=1000 && $row['no_account']<9999) { ?>
            <tr>
				<td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5 - <?php echo $row['no_account']; ?></td>
                <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['nama_account']; ?></td>
                <td class="visible-lg">Cost Of Sales</td>
                <td>
					<a href="account_input.php?aksi=edit&header=D&id=<?php echo $row['id_account']; ?>" class="btn btn-info">Edit</i></a>
                    <a href="account_input_sql.php?aksi=delete&id=<?php echo $row['id_account']; ?>" class="btn btn-warning">Hapus</i></a>
                </td>
            </tr>
				<?php } ?>
                <?php }} ?>
			<tr>
				<td class="visible-lg"><b>6 - 0000</b></td>
                <td class="visible-lg"><b>Beban</b></td>
                <td class="visible-lg"><b>Beban</b></td>
                <td></td>
            </tr>
				<?php
					$query = mysqli_query($con, "SELECT * FROM account order by no_account, jenis_account desc");
						while ($row = mysqli_fetch_array($query)) {
                ?>
				<?php 
					if ($row['id_jenis'] == 6){
                    if ($row['jenis_account'] == "H" && $row['no_account']>=1000 && $row['no_account']<9999) { ?>
            <tr>
				<td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>6 - <?php echo $row['no_account']; ?></strong></td>
                <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $row['nama_account']; ?></strong></td>
                <td class="visible-lg">Beban</td>
                <td>
					<a href="account_input.php?aksi=edit&header=H&id=<?php echo $row['id_account']; ?>" class="btn btn-info">Edit</a>
					<a href="account_input_sql.php?aksi=delete&id=<?php echo $row['id_account']; ?>" class="btn btn-warning">Hapus</a>
				</td>
            </tr>
				<?php } ?>
                <?php if ($row['jenis_account'] == "D" && $row['no_account']>=1000 && $row['no_account']<9999) { ?>
            <tr>
				<td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6 - <?php echo $row['no_account']; ?></td>
                <td class="visible-lg">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['nama_account']; ?></td>
                <td class="visible-lg">Beban</td>
				<td>
					<a href="account_input.php?aksi=edit&header=D&id=<?php echo $row['id_account']; ?>" class="btn btn-info">Edit</i></a>
                    <a href="account_input_sql.php?aksi=delete&id=<?php echo $row['id_account']; ?>" class="btn btn-warning">Hapus</i></a>
                </td>
            </tr>
				<?php } ?>
                <?php }} ?>
		</tbody>
    </table>
</div>
