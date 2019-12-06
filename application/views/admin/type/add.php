<div class="content-wrapper" style="min-height: 916px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Type

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/type_list">Type</a></li>
            <li class="active">Add Type</li>
        </ol>
    </section>

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <?php echo form_open_multipart('admin/type_save'); ?>
                    <div class="box-body">
 
                        

                        <div class="form-group">
                            <label for="">Type</label>

                            <input class="form-control form-control-lg mb-3"   name="id" value="<?php echo isset($type->id) ? set_value("id", $type->id) : set_value("id"); ?>"  type="hidden" placeholder="">
                            <input class="form-control "   name="name" value="<?php echo isset($type->name) ? set_value("name", $type->name) : set_value("name"); ?>"  type="text" placeholder="Name">

                        </div>
                        
                        
                           

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
                <!-- /.box -->





                <!-- /.box -->

            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
     
    <?php echo form_close(); ?>
    <!-- /.content -->
</div>