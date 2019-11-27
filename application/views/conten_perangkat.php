
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Perangkat
        <small>Control panel</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo $this->session->flashdata('pesan'); ?>
      <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-table"></i> Data Perangkat</h3>
                   <button type="button" class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#modal_tambah">
                <i class="fa fa-plus"></i> Add Perangkat
              </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
             <table id="example1" class="table table-bordered">
                <thead>
                  <tr>
                  <th>#</th>
                  <th>Serial Number</th>
                  <th>Berat</th>
                  <th>Waktu</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($perangkat as $p) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $p->sn; ?></td>
                  <td><?php echo $p->berat; ?></td>
                  <td><?php echo $p->waktu; ?></td>
                  <td>
              <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_delete<?php echo $p->id_sensing; ?>">
                <i class="fa fa-trash"></i>
              </button>
                  </td>
                </tr>
         

               
                <!-- /.modal -->

                 <div class="modal fade" id="modal_delete<?php echo $p->id_sensing; ?>">
                  <div class="modal-dialog">
                    <div class="box box-danger">
                      <div class="box-header with-border">
                        <h3 class="box-title">Delete Perangkat</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                      </div>
                      
                      <div class="box-body">
                        <p>Apa anda yakin menghapus Perangkat <b><?php echo  $p->sn ?></b></p>
                      </div>
                      <div class="box-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <a href="<?php echo base_url('web/delete_perangkat/').$p->id_sensing ?>" class="btn btn-danger pull-right">Delete</a>
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
                        <h3 class="box-title">Add Perangkat</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                      </div>
                      <form action="<?php echo base_url('web/add_perangkat/') ?>" method="POST">
                      <div class="box-body">
                        <div class="form-group">
                              <label >Serial Number</label>
                              <input type="text" name="sn" class="form-control" >
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