
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Monitoring Infus
        <small>Control panel</small>
      </h1>
  
    </section>

    <!-- Main content -->
    <section class="content">
      <?php echo $this->session->flashdata('pesan'); ?>
      <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-table"></i> Data Pasien Monitoring</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
             <table id="fcs" class="table table-bordered" style="width: 100%;">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Sisa Cairan</th>
                    <th>Cairan Infus</th>
                    <th>Date Update</th>
                    <th>Status</th>
                  </tr>
                </thead>

            </table>
            </div>
            <!-- /.box-body -->
         
          </div>
    </section>
  </div>

<script type="text/javascript">
  $(document).ready(function(){  
    
      var dataTable = $('#fcs').DataTable({  
         
           "processing":false,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"<?php echo base_url('web/fetch_data') ?>",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[0,5],  
                     "orderable":false,  
                },  
           ],  
      });

      setInterval( function () {
    dataTable.ajax.reload();
}, 3000 );
      



    });
</script>
