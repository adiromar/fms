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
<?php // flash messages
if($this->session->flashdata('file_deleted')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-success">Success </span><?= $this->session->flashdata('file_deleted'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php endif;
if($this->session->flashdata('error_deletion')): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-warning">Error </span><?= $this->session->flashdata('error_deletion'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
<?php endif; ?>


                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                  <table class="table table-striped table-bordered" id="myTable">
                    <thead>
                      <tr>
                        <th>S.N.</th>
                        <th>File Info</th>
                        <th>Files</th>
                        <th>Date</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        $images = array('jpeg', 'png', 'jpg', 'gif', '');
              
                        foreach ($files as $fkey => $fval) {
                            echo '<tr>';
                            echo '<td>'.$i.'</td>';
                            echo '<td data-info="as">'.$fval['file_info'].'</td>';

                            // for images and pdf/docx
                            $ext = pathinfo($fval['file_name'], PATHINFO_EXTENSION);
                            if (in_array($ext, $images)) { ?>
                            <td class="pop"><img class="myImg img-responsive" src="<?= base_url(); ?>uploads/files/<?= $fval['file_name']?>" onclick="showImg('<?= base_url()?>uploads/files/<?= $fval['file_name']?>')" /></td>
                            <?php }else{ ?>
                            <td><a href="<?= base_url().'uploads/files/'.$fval['file_name']?>"><img class="doc_img" src="<?php echo base_url().'uploads/pdf.png'?>"></a></td>

                            <?php }
                            echo '<td>'.$fval['inserted_date'].'</td>'; ?>
                            <td><a class="btn btn-danger del_btn" onclick="confirm_delete('<?= base_url(); ?>pages/delete_file/<?= $fval['id']?>')"><i class="fa fa-trash"></i></a></td>
                            <?php echo '</tr>';
                        $i++; } ?>
                      
                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>
<script src="<?= base_url(); ?>assets/js/vendor/jquery-2.1.4.min.js"></script>
<!-- modal for image preview -->
<button type="button" class="btn btn-primary modal_click" data-toggle="modal" id="modal_click" data-target="#imagemodal" style="display: none;">
  Launch demo modal
</button>

<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">              
      <div class="modal-body">
        <img src="" class="img-responsive" id='image' alt="" style='height:400px;width:100%;'>
        <button type="button" class="close" data-dismiss="modal"><span style="color: black;" aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <!-- <img src="" class="imagepreview" style="width: 100%;" > -->
      </div>
    </div>
  </div>
</div>
<!-- image modal preview ends -->

<script type="text/javascript">
$(function() {
    $('.pop').on('click', function() {
      $('.imagepreview').attr('src', $(this).find('img').attr('src'));
      $('#imagemodal').show('show');   
    });   
});
function showImg(url){
  // alert('images clicked');
   //load your image
   $('.modal-body img').attr('src',url);
   //show modal
   $('#modal_click').click();
}
function confirm_delete(url){
  // alert(url);
  var clk =confirm("Confirm Delete this Data?")
  // var clk = $('#modal_click').click();
        if (clk==true)
          window.location = url;
        else
          return false;
} 

$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>