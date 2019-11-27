
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Infus
        <small>Control panel</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo $this->session->flashdata('pesan'); ?>
      <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-table"></i> Data Pasien</h3>
                   <button type="button" class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#modal_tambah">
                <i class="fa fa-plus"></i> Add Pasien
              </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
             <table id="example1" class="table table-bordered">
                <thead>
                  <tr>
                  <th>#</th>
                  <th>Nama Infus</th>
                  <th>Type infus</th>
                  <th>Berat Botol</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($infus as $in) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $in->nama_infus; ?></td>
                  <td><?php echo $in->type_infus; ?></td>
                  <td><?php echo $in->berat_botol; ?></td>
                  <td>
                   <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal_ubah<?php echo $in->id_infus; ?>">
                <i class="fa fa-edit"></i>
              </button>

              <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_delete<?php echo $in->id_infus; ?>">
                <i class="fa fa-trash"></i>
              </button>
                  </td>
                </tr>
                <div class="modal fade" id="modal_ubah<?php echo $in->id_infus; ?>">
                  <div class="modal-dialog">
                    <div class="box box-warning">
                      <div class="box-header with-border">
                        <h3 class="box-title">Update Infus</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                      </div>
                      <form action="<?php echo base_url('web/update_infus/').$in->id_infus ?>" method="POST">
                      <div class="box-body">
                        <div class="form-group">
                              <label >Nama Infus</label>
                              <input type="text" name="nama_infus" class="form-control" value="<?php echo $in->nama_infus ?>" >
                            </div>
                            <div class="form-group">
                              <label >Type Infus</label>
                              <input type="text" class="form-control" name="type_infus" value="<?php echo $in->type_infus ?>" >
                            </div>
                            <div class="form-group">
                              <label >Berat Botol</label>
                              <input type="text" class="form-control" name="berat_botol" value="<?php echo $in->berat_botol ?>" >
                            </div>
                      </div>
                      <div class="box-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary pull-right">Save changes</button>
                      </div>
                      </form>
                    </div>
                     
                  </div>
                  <!-- /.modal-dialog -->
                </div>

               
                <!-- /.modal -->

                 <div class="modal fade" id="modal_delete<?php echo $in->id_infus; ?>">
                  <div class="modal-dialog">
                    <div class="box box-danger">
                      <div class="box-header with-border">
                        <h3 class="box-title">Delete Infus</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                      </div>
                      
                      <div class="box-body">
                        <p>Apa anda yakin menghapus Infus <b><?php echo  $in->nama_infus ?></b></p>
                      </div>
                      <div class="box-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <a href="<?php echo base_url('web/delete_infus/').$in->id_infus ?>" class="btn btn-danger pull-right">Delete</a>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div> 

            
              <?php } ?>
              </tbody>
            </table>
            </div>
            <!-- /.box-body -->
         
          </div>
    </section>
  </div>

    <div class="modal fade" id="modal_tambah">
                  <div class="modal-dialog">
                    <div class="box box-warning">
                      <div class="box-header with-border">
                        <h3 class="box-title">Add Infus</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                      </div>
                      <form action="<?php echo base_url('web/add_infus/') ?>" method="POST">
                      <div class="box-body">
                        <div class="form-group">
                              <label >Nama Infus</label>
                              <input type="text" name="nama_infus" class="form-control" >
                            </div>
                            <div class="form-group">
                              <label >Type Infus</label>
                              <input type="text" class="form-control" name="type_infus" >
                            </div>
                            <div class="form-group">
                              <label >Berat Botol</label>
                              <input type="text" class="form-control" name="berat_botol" >
                            </div>
                      </div>
                      <div class="box-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary pull-right">Save</button>
                      </div>
                      </form>
                    </div>
                     
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal --> 