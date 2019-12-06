<div class="content-wrapper" style="min-height: 916px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Meal Plan

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/meal_plan_list">Meal Plan</a></li>
            <li class="active">Add Meal Plan</li>
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
                    <?php $form_attr=array("id"=>'meal_plan'); echo form_open_multipart('admin/meal_plan_save',$form_attr); ?>
                    <div class="box-body">
 
                        

                        <div class="form-group">
                            <label for="">Type</label>

                            <input class="form-control form-control-lg mb-3"   name="id" value="<?php echo isset($meal_plan->id) ? set_value("id", $meal_plan->id) : set_value("id"); ?>"  type="hidden" placeholder="">
                            <input class="form-control "  required="" name="name" value="<?php echo isset($meal_plan->name) ? set_value("name", $meal_plan->name) : set_value("name"); ?>"  type="text" placeholder="Name">

                        </div>
                        <div class="form-group">
                            <label for="">French Name</label>

                            <input class="form-control " required=""   name="french_name" value="<?php echo isset($meal_plan->french_name) ? set_value("french_name", $meal_plan->french_name) : set_value("french_name"); ?>"  type="text" placeholder="French Name">

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