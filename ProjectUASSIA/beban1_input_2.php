<div class="col-md-12">
    <div class="panel panel-warning">
      <div class="panel-heading">

    <div class="panel panel-warning">
      <div class="panel-heading">
      <i class="glyphicon glyphicon-cog"></i>
        <b>Edit Beban</b>
      </div>
      <div class="panel-body">
  <?php if($_GET['aksi']=="input"){ ?>

                <form action="beban1_input_sql.php?aksi=insert" method="GET" class="form-horizontal row-border">
                     <input type="hidden" name="aksi" value="insert">        
                     
          <div class="panel-body">
            <div class="form-group">
                <label class="col-sm-3 control-label">No Transaksi</label>
                <div class="col-sm-6">
                    <input type="number" name="no_transaksi" class="form-control" id="phone"/>
                </div>
                
              </div><!-- /phone -->

            
              <div class="form-group">
                <label class="col-sm-3 control-label">Nama Beban</label>
                <div class="col-sm-6">
                    <input type="text" name="nama_beban" class="form-control" id="phone"/>
                </div>
                
              </div><!-- /phone -->
      <div class="form-group">
               <label class="col-sm-3 control-label">Keterangan</label>
               <div class="col-sm-6">
                   <input type="text" name="keterangan" class="form-control" id="phext"/>
               </div> 
               
              </div><!-- /phone Ext -->
              <div class="form-group">
               <label class="col-sm-3 control-label">Tanggal</label>
               <div class="col-sm-6">
                   <input type="date" name="tanggal" class="form-control" id="phext"/>
               </div> 
              
         </div><!-- /phone Ext -->
              <div class="form-group">
               <label class="col-sm-3 control-label">Harga</label>
               <div class="col-sm-6">
                   <input type="number" name="harga" class="form-control" id="phext"/>
               </div>
               
              </div><!-- /phone Ext -->
           
</div> <!-- /panel body -->
<div class="panel-footer">
  <div class="row">
   <div class="col-sm-6 col-sm-offset-3">
       <button type="submit" class="btn btn-success">Submit</button>
    <a href="beban1.php" button type="button" class="btn btn-danger">Cancel</button></a>
  </div>
</div>
</div> <!-- panel footer -->
 </form>
</div></div> <!-- /panel-body -->
</div><!-- Panel -->
<?php }else{?>
 <?php
 $id=$_GET['id'];
 $query = mysqli_query($con, "SELECT * FROM beban where no_transaksi=$id");
                                               while ($row = mysqli_fetch_array($query)) {
                                                    ?>
                <form action="beban1_input_sql.php?aksi=update&id=<?php echo $row['no_transaksi']; ?>" method="GET" class="form-horizontal row-border">
                    <input type="hidden" name="aksi" value="update">
                    <input type="hidden" name="id" value="<?php echo $row['no_transaksi]']; ?>">
                    <div class="panel-body">
              
             <div class="form-group">
                <label class="col-sm-3 control-label">No Transaksi</label>
                <div class="col-sm-6">
                    <input type="number" value="<?php echo $row['no_transaksi']; ?>" name="no_transaksi" class="form-control" id="phone"/>
                </div>
                
              </div><!-- /phone -->

              <div class="form-group">
                <label class="col-sm-3 control-label">Nama Beban</label>
                <div class="col-sm-6">
                    <input type="text" value="<?php echo $row['nama_beban']; ?>" name="nama_barang" class="form-control" id="phone"/>
                </div>
                
              </div><!-- /phone -->
              <div class="form-group">
               <label class="col-sm-3 control-label">Keterangan</label>
               <div class="col-sm-6">
                   <input type="text" value="<?php echo $row['keterangan']; ?>" name="merk" class="form-control" id="phext"/>
               </div>
               
              </div><!-- /phone Ext -->

              <div class="form-group">
               <label class="col-sm-3 control-label">Tanggal</label>
               <div class="col-sm-6">
                   <input type="date" value="<?php echo $row['tanggal']; ?>" name="type" class="form-control" id="phext"/>
               </div>
               
              </div><!-- /phone Ext -->

       <div class="form-group">
               <label class="col-sm-3 control-label">Harga</label>
               <div class="col-sm-6">
                   <input type="number" value="<?php echo $row['harga']; ?>" name="harga" class="form-control" id="phext"/>
               </div>
               
              </div><!-- /phone Ext -->
       
      </div> <!-- /panel body -->
      <div class="panel-footer">
      <div class="row">
      <div class="col-sm-6 col-sm-offset-3">
      <button type="submit" class="btn btn-success">Submit</button>
        <a href="beban1.php" button type="button" class="btn btn-danger">Cancel</button></a>
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