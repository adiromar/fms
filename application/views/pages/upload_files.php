        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><?= $title ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <!-- <li class="active">Dashboard</li> -->
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="col-sm-12">
<?php // flash messages
if($this->session->flashdata('insert_success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-success">Success </span><?= $this->session->flashdata('insert_success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php endif; 
if($this->session->flashdata('insert_err')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-danger">Error </span><?= $this->session->flashdata('insert_success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php endif; 
if($this->session->flashdata('invalid_file')): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-warning">Warning </span><?= $this->session->flashdata('invalid_file'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php endif; ?>

            </div>
        </div> <!-- .content -->

                  <div class="offset-2 col-lg-8 offset-2">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">File Management Form</strong>
                        </div>
                        <div class="card-body">
                          
                          <div id="pay-invoice">
                              <div class="card-body">
                                  <form action="<?= base_url()?>posts/upload_files" method="post" id="insert_form" enctype="multipart/form-data">

                                      <div class="form-group">
                                          <label for="file_info" class="control-label mb-1">File Information</label>
                                          <input name="file_info" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                      </div>
                                      <div class="form-group has-success">
                                          <label for="userfile" class="control-label mb-1">Choose File</label>
                                          <input name="userfile" type="file" class="form-control valid" data-val="true" autocomplete="cc-name" aria-required="true" required>
                                          <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                      </div>
                                      <div class="mt-5">
                                          <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                              <span id="submitbtn">Submit</span>
                                              <span id="sending" style="display:none;">Uploading…</span>
                                          </button>
                                      </div>
                                  </form>
                              </div>
                          </div>

                        </div>
                    </div> <!-- .card -->

                  </div><!--/.col-->
<script src="<?= base_url(); ?>assets/js/vendor/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3500);

// $(document).ready(function(){
//             $("#insert_form").submit(function(){
//       alert("sdsd");
//       $.post('<?= base_url()?>posts/upload_files', $('#insert_form').serialize(),   
//         function (data, textStatus) {
//             $("#submitbtn").hide();
//             $("#sending").show();

//       // $( "#view_data" ).hide();
//       setTimeout(function() {
//         $("#submitbtn").show();
//         $("#sending").hide();
//         $('#res_show').show('slidedown').html(data);
//         }, 1605);
//     });
//     return false;
//     });
// });
</script>