 <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
       
    </div>
    <strong>Copyright &copy; 2014-2019 <a href=""></a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark" style="display: none;">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a id="zone" href="#control-sidebar-home-tab" data-toggle="tab">Zone</a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab">Provider</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Zone List</h3>
        <ul class="control-sidebar-menu">
          <li>
		 
           
            

              <div>
			  <div class="zone-img">
			     <img src="dist/img/avatar.png" style="width: 100%;">
				 </div>
				 <div class="tour-zone">
                <h4 class="control-sidebar-subheading">ZONE 1</h4>

                <p>dummy text</p>
				 </div>
              </div>
            
          </li>
		  <li>
		 
           
            

              <div>
			  <div class="zone-img">
			     <img src="dist/img/avatar.png" style="width: 100%;">
				 </div>
				 <div class="tour-zone">
                <h4 class="control-sidebar-subheading">ZONE 1</h4>

                <p>dummy text</p>
				 </div>
              </div>
            
          </li>
		  <li>
		 
           
            

              <div>
			  <div class="zone-img">
			     <img src="dist/img/avatar.png" style="width: 100%;">
				 </div>
				<div class="tour-zone">
                <h4 class="control-sidebar-subheading">ZONE 1</h4>

                <p>dummy text</p>
				 </div>
              </div>
            
          </li>
		  
          
          
        </ul>
        <!-- /.control-sidebar-menu -->

         
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
	   <h3 class="control-sidebar-heading">Provider List</h3>
      <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              

              <div class="">
                <h4 class="control-sidebar-subheading">Provider 1</h4>

                <p>dummy text</p>
              </div>
            </a>
          </li>
		   <li>
            <a href="javascript:void(0)">
              

              <div class="">
                <h4 class="control-sidebar-subheading">Provider 1</h4>

                <p>dummy text</p>
              </div>
            </a>
          </li>
		   <li>
            <a href="javascript:void(0)">
              

              <div class="">
                <h4 class="control-sidebar-subheading">Provider 1</h4>

                <p>dummy text</p>
              </div>
            </a>
          </li>
		   <li>
            <a href="javascript:void(0)">
              

              <div class="">
                <h4 class="control-sidebar-subheading">Provider 1</h4>

                <p>dummy text</p>
              </div>
            </a>
          </li>
		   <li>
            <a href="javascript:void(0)">
              

              <div class="">
                <h4 class="control-sidebar-subheading">Provider 1</h4>

                <p>dummy text</p>
              </div>
            </a>
          </li>
		   <li>
            <a href="javascript:void(0)">
              

              <div class="">
                <h4 class="control-sidebar-subheading">Provider 1</h4>

                <p>dummy text</p>
              </div>
            </a>
          </li>
          
          
        </ul>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url()?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<!-- Sparkline -->
<!-- jvectormap -->
<!-- jQuery Knob Chart -->
<!-- daterangepicker -->
<!-- Bootstrap WYSIHTML5 -->
<!-- Slimscroll -->
<!-- FastClick -->
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url()?>assets/dist/js/pages/dashboard.js"></script>
<script   src="<?php echo base_url() . 'assets/js/jquery.livequery.js' ?>"></script> 
<script src="<?php echo base_url() . 'assets/js/jquery_validate.js' ?>"></script> 
<script   src="<?php echo base_url() . 'assets/js/script.js' ?>"></script> 
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url() . 'assets/bower_components/ckeditor/ckeditor.js'?>"></script>
<script src="<?php echo base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo site_url(); ?>assets/js/dropzone.js"></script>


<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
   $('.datepicker').datepicker({
      autoclose: true
    })
</script>
<!-- AdminLTE for demo purposes -->
<script>
$( document ).ready(function() {
$( "#display-zone" ).on( "click", function() {
$( "#zone" ).trigger( "click" );
});

    
});
 $('.datepicker').datepicker({
     
      autoclose: true
    })
 $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
     
  })
  
</script>
<script type="text/javascript">
      CKEDITOR.replace( 'editor2' );
      CKEDITOR.add     
      

</script>
<script type="text/javascript">
     CKEDITOR.replaceAll('editors');
   
      

</script>
<script type="text/javascript">
        $('.select3').select2();

    function getVal(value)
    {
        
      jQuery.ajax({
        type:"GET",
        url: "<?php echo base_url();?>/Admin/session_set/",
        dataType:'json',
        data: {destination_id : value},
        error: function(result){
              
              },
        success: function(result){
                       location.href = " ";

          

        }
      });
    }
 </script>
 
 
 
 
 <script>

    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("#my-dropzone", {
        url: "<?php echo site_url("Admin/uploadimage") ?>",
           
      acceptedFiles:'image/jpeg,image/png,image/gif,image/jpg,application/pdf',

        addRemoveLinks: false,
        removedfile: function (file) {
            var name = file.name;
            $.ajax({
                type: "post",
                url: "<?php echo site_url("Admin/removeimage") ?>",
                data: {file: name},
                datatype: 'html',

            })
            var previewElement;
            alert(previewElement);
            return (previewElement = file.previewElement) != null ? (previewElement.parentNode.removeChild(file.previewElement)) : (void 0);
        },
        init: function () {
   this.on("addedfile", function (file) {
                            
                            // Create the remove button
//                            this.on("uploadprogress", function() {
//                                $("#formSMT").prop("disabled",true);
//                            });
                            var removeButton = Dropzone.createElement("<button class='btn btn-sm btn-block'>Remove file</button>");
                            // Capture the Dropzone instance as closure.
                            var _this = this;
                            // Listen to the click event
                            removeButton.addEventListener("click", function (e) {
                                // Make sure the button click doesn't submit the form:
                                e.preventDefault();
                                e.stopPropagation();
                                // Remove the file preview.
                                _this.removeFile(file);
                                // If you want to the delete the file on the server as well,
                                // you can do the AJAX request here.
                                //alert(file.name);
                                $.ajax({
                                    type: "POST",
                                     url: "<?php echo site_url("Admin/removeimage") ?>",
                                    data: {"file": file.name}
                                }).done(function (responseText) {
                                    //console.log(responseText); 
                                    var file_count = responseText.split('~');
                                    $('#file_count').val(file_count[1]);
                                });
                            });
                            // Add the button to the file preview element.
                            file.previewElement.appendChild(removeButton);
                            // reset file count for uploding progress
                            $('#file_count').val(-1);
                        });
                        this.on("added", function (file, responseText) {
                            $("#fileuploadprogress").val(-2);
                        });
                        this.on("queued", function (file, responseText) {
                            $("#fileuploadprogress").val(-2);
                        });
                        this.on("uploadprogress", function (file, responseText) {
                           $("#fileuploadprogress").val(-2);
                        });
                        this.on("complete", function (file, responseText) {
                            $("#fileuploadprogress").val(1);
                        });

            this.on("success", function (file, responseText) {

                var ss = $.trim(responseText);

                var n = responseText.search(".jpg");
                n = n + responseText.search(".png");
                n = n + responseText.search(".gif");
                n = n + responseText.search(".pdf");
                n = n + responseText.search(".xlsx");
                n = n + responseText.search(".csv");
                n = n + responseText.search(".xls");
                if (n < 0)
                {
                    $('#filesuploaderrordetails').append('<p>"' + responseText + '"</p>');
                    this.removeFile(file);
                } else
                {
                     
                    $('#filesuploaderrordetails p').remove();
                    mylittlefix(file, ss);
                }
            });


        }
    });
    function mylittlefix(file, responseText) {

        $('#filesuploaddetails').append('<input type="hidden" name="file_name[]" value="' + responseText + '">');

    }

    function deleteimage(image_id)
    {
        var answer = confirm("Are you sure you want to delete from this post?");

        if (answer)
        {
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('admin/deleteimage/'); ?>",
                data: "image_id=" + image_id,
                success: function () {

                    $(".imagelocation" + image_id).remove(".imagelocation" + image_id);


                }
            });
        }
    }

</script>

  
<script>
$('#last_name').bind('input', function(e){
    
    $('#short_name').val($('#last_name').val())
});
$('#full_name').bind('input', function(e){
    
    $('#short_name').val($('#full_name').val())
});
            $('.select3').select2();
            
            
            
            
            
            
$('#tours_client_id').change(function(){
    var client_id= $("#tours_client_id").val();     
   
   jQuery.ajax({
        type:"GET",
         url: "<?php echo site_url("Admin/get_tour_id") ?>",
        dataType:'json',
        data: {client_id : client_id},
       success: function(response){
         
	 $('#tour_id').val(response); 
          

        }
      });
    
});
<?php   if(!empty($this->session->flashdata('tour_info'))) { ?>

            $('.nav-tabs a[href="#notes"]').tab('show');
            <?php $this->session->unset_userdata('tour_info'); ?>

<?php } ?>
    <?php   if(!empty($this->session->flashdata('tour_info_notes'))) { ?>

            $('.nav-tabs a[href="#scheduling"]').tab('show');
            <?php $this->session->unset_userdata('tour_info_notes'); ?>

<?php } ?>


 
</script>
</body>
</html>
 