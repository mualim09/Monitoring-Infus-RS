
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pasien
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
                  <th>Nama</th>
                  <th>Berat</th>
                  <th>Cairan Infus</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($pasien as $p) { ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $p->nama; ?></td>
                  <td><?php echo $p->berat; ?></td>
                  <td><?php echo $p->nama_infus; ?></td>
                  <td>
                   <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal_ubah<?php echo $p->id_pasien; ?>">
                <i class="fa fa-edit"></i>
              </button>

              <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_delete<?php echo $p->id_pasien; ?>">
                <i class="fa fa-trash"></i>
              </button>
                  </td>
                </tr>
                <div class="modal fade" id="modal_ubah<?php echo $p->id_pasien; ?>">
                  <div class="modal-dialog">
                    <div class="box box-warning">
                      <div class="box-header with-border">
                        <h3 class="box-title">Update Pasien</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                      </div>
                      <form action="<?php echo base_url('web/update_pasien/').$p->id_pasien ?>" method="POST">
                      <div class="box-body">
                        <div class="form-group">
                              <label >Nama</label>
                              <input type="text" name="nama" class="form-control" value="<?php echo $p->nama ?>">
                            </div>
                            <div class="form-group">
                              <label >kamar</label>
                              <input type="text" class="form-control" name="kamar" value="<?php echo $p->kamar ?>" >
                            </div>
                             <div class="form-group">
                              <label >Perangkat</label>
                              <select class="form-control" name="id_sensor">
                                <option value="<?php echo $p->id_sensing ?>"><?php echo $this->db->query("SELECT * FROM tbl_sensing WHERE id_sensing='".$p->id_sensing."'")->row()->sn ?></option>
                                <?php foreach ($this->db->query("SELECT * FROM tbl_sensing")->result() as $sn) { ?>
                                <option value="<?php echo $sn->id_sensing ?>"><?php echo $sn->sn ?></option>
                              <?php } ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label >Infus</label>
                              <select class="form-control" name="id_infus">
                                <option value="<?php echo $p->id_infus ?>"><?php echo $this->db->query("SELECT * FROM tbl_infus WHERE id_infus='".$p->id_infus."'")->row()->nama_infus ?></option>
                                <?php foreach ($this->db->query("SELECT * FROM tbl_infus")->result() as $in) { ?>
                                <option value="<?php echo $in->id_infus ?>"><?php echo $in->nama_infus ?></option>
                              <?php } ?>
                              </select>
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

                 <div class="modal fade" id="modal_delete<?php echo $p->id_pasien; ?>">
                  <div class="modal-dialog">
                    <div class="box box-danger">
                      <div class="box-header with-border">
                        <h3 class="box-title">Delete Pasien</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                      </div>
                      
                      <div class="box-body">
                        <p>Apa anda yakin menghapus Pasein <b><?php echo  $p->nama ?></b></p>
                      </div>
                      <div class="box-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <a href="<?php echo base_url('web/delete_pasien/').$p->id_pasien ?>" class="btn btn-danger pull-right">Delete</a>
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
                        <h3 class="box-title">Add Pasien</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                      </div>
                      <form action="<?php echo base_url('web/add_pasien/') ?>" method="POST">
                      <div class="box-body">
                        <div class="form-group">
                              <label >Nama</label>
                              <input type="text" name="nama" class="form-control" >
                            </div>
                            <div class="form-group">
                              <label >kamar</label>
                              <input type="text" class="form-control" name="kamar" >
                            </div>
                             <div class="form-group">
                              <label >Perangkat</label>
                              <select class="form-control" name="id_sensor">
                                <?php foreach ($this->db->query("SELECT * FROM tbl_sensing")->result() as $sn) { ?>
                                <option value="<?php echo $sn->id_sensing ?>"><?php echo $sn->sn ?></option>
                              <?php } ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label >Infus</label>
                              <select class="form-control" name="id_infus">
                                <?php foreach ($this->db->query("SELECT * FROM tbl_infus")->result() as $in) { ?>
                                <option value="<?php echo $in->id_infus ?>"><?php echo $in->nama_infus ?></option>
                              <?php } ?>
                              </select>
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