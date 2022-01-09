<div class="col-md-12">
    <div class="panel panel-warning">
      <div class="panel-heading">

    <div class="panel panel-warning">
      <div class="panel-heading">
      <i class="glyphicon glyphicon-cog"></i>
        <b>Edit Barang</b>
      </div>
      <div class="panel-body">
	<?php if($_GET['aksi']=="input"){ ?>

                <form action="item_input_sql.php?aksi=insert" method="GET" class="form-horizontal row-border">
                     <input type="hidden" name="aksi" value="insert">        
                     
          <div class="panel-body">
            
              <div class="form-group">
                <label class="col-sm-3 control-label">Nama Barang</label>
                <div class="col-sm-6">
                    <input type="text" name="nama_barang" class="form-control" id="phone"/>
                </div>
                
              </div><!-- /phone -->
			<div class="form-group">
               <label class="col-sm-3 control-label">Merk</label>
               <div class="col-sm-6">
                   <input type="text" name="merk" class="form-control" id="phext"/>
               </div> 
               
              </div><!-- /phone Ext -->
              <div class="form-group">
               <label class="col-sm-3 control-label">Type</label>
               <div class="col-sm-6">
                   <input type="text" name="type" class="form-control" id="phext"/>
               </div> 
               
              </div><!-- /phone Ext -->
              <div class="form-group">
               <label class="col-sm-3 control-label">Stok</label>
               <div class="col-sm-6">
                   <input type="number" name="stok" class="form-control" id="phext"/>
               </div>
			   
			   </div><!-- /phone Ext -->
              <div class="form-group">
               <label class="col-sm-3 control-label">Harga</label>
               <div class="col-sm-6">
                   <input type="number" name="harga_awal" class="form-control" id="phext"/>
               </div>
               
              </div><!-- /phone Ext -->
           
</div> <!-- /panel body -->
<div class="panel-footer">
  <div class="row">
   <div class="col-sm-6 col-sm-offset-3">
       <button type="submit" class="btn btn-success">Submit</button>
    <a href="item.php" button type="button" class="btn btn-danger">Cancel</button></a>
  </div>
</div>
</div> <!-- panel footer -->
 </form>
</div></div> <!-- /panel-body -->
</div><!-- Panel -->
<?php }else{?>
 <?php
 $id=$_GET['id'];
 $query = mysqli_query($con, "SELECT * FROM item where id_barang=$id");
                                               while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                <form action="item_input_sql.php?aksi=update&id=<?php echo $row['id_barang']; ?>" method="GET" class="form-horizontal row-border">
                    <input type="hidden" name="aksi" value="update">
                    <input type="hidden" name="id" value="<?php echo $row['id_barang']; ?>">
                    <div class="panel-body">
              
             

              <div class="form-group">
                <label class="col-sm-3 control-label">Nama Barang</label>
                <div class="col-sm-6">
                    <input type="text" value="<?php echo $row['nama_barang']; ?>" name="nama_barang" class="form-control" id="phone"/>
                </div>
                
              </div><!-- /phone -->
              <div class="form-group">
               <label class="col-sm-3 control-label">Merk</label>
               <div class="col-sm-6">
                   <input type="text" value="<?php echo $row['merk']; ?>" name="merk" class="form-control" id="phext"/>
               </div>
               
              </div><!-- /phone Ext -->

              <div class="form-group">
               <label class="col-sm-3 control-label">Type</label>
               <div class="col-sm-6">
                   <input type="text" value="<?php echo $row['type']; ?>" name="type" class="form-control" id="phext"/>
               </div>
               
              </div><!-- /phone Ext -->

              <div class="form-group">
               <label class="col-sm-3 control-label">Stok</label>
               <div class="col-sm-6">
                   <input type="number" value="<?php echo $row['stok']; ?>" name="stok" class="form-control" id="phext"/>
               </div>
               
              </div><!-- /phone Ext -->
           
		   <div class="form-group">
               <label class="col-sm-3 control-label">Harga</label>
               <div class="col-sm-6">
                   <input type="number" value="<?php echo $row['harga_awal']; ?>" name="harga_awal" class="form-control" id="phext"/>
               </div>
               
              </div><!-- /phone Ext -->
		   
			</div> <!-- /panel body -->
			<div class="panel-footer">
			<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
			<button type="submit" class="btn btn-success">Submit</button>
				<a href="item.php" button type="button" class="btn btn-danger">Cancel</button></a>
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
</div>