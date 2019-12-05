<div class="content-wrapper" style="min-height: 916px;">
    <style>
        .spanclass {
    font-size: 16px;
    background-color: #edf4fb;
    border: #a29393 1px solid;
    margin-right: 5px;
    padding: 5px;
    cursor: pointer;
}
.div{
    padding:10px;
}
    </style>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Tags

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/tags_list">Tags</a></li>
            <li class="active">Add Tags</li>
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
                    <?php $form_attr=array("id"=>'tags');echo form_open_multipart('admin/tags_save',$form_attr); ?>
                    <div class="box-body">
 
             <div class="form-group">
                            <label for="">Name</label>
                            <input class="form-control form-control-lg mb-3"   name="id" value="<?php echo isset($tags->id) ? set_value("id", $tags->id) : set_value("id"); ?>"  type="hidden" placeholder="">

                            <input class="form-control "  required=""  name="name" value="<?php echo isset($tags->name) ? set_value("name", $tags->name) : set_value("name"); ?>"  type="text" placeholder="Name">

                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea id="" class="form-control" name="description" value="<?php echo isset($tags->description) ? set_value("description", $tags->description) : set_value("description"); ?>" rows="3" placeholder="Description"><?php
                                if (!empty($tags->description)) {
                                    echo $tags->description;
                                }
                                ?> </textarea>
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