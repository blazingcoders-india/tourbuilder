<div class="content-wrapper" style="min-height: 916px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Users

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/users_list">Users</a></li>
            <li class="active">Add Users</li>
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
                    <?php $form_attr=array("id"=>"users"); echo form_open_multipart('admin/users_save',$form_attr); ?>
                    <div class="box-body">
 
                        

                        <div class="form-group">
                            <label for="">First Name</label>

                            <input class="form-control form-control-lg mb-3"   name="id" value="<?php echo isset($users->id) ? set_value("id", $users->id) : set_value("id"); ?>"  type="hidden" placeholder="">
                            <input class="form-control "  required="" name="first_name" value="<?php echo isset($users->first_name) ? set_value("first_name", $users->first_name) : set_value("first_name"); ?>"  type="text" placeholder="First Name">

                        </div>
                        <div class="form-group">
                            <label for="">Last Name</label>

                            <input class="form-control "    name="last_name" value="<?php echo isset($users->last_name) ? set_value("last_name", $users->last_name) : set_value("last_name"); ?>"  type="text" placeholder="Last Name">

                        </div>
                        <div class="form-group">
                            <label for="">Email</label>

                            <input class="form-control "  required="" name="email" value="<?php echo isset($users->email) ? set_value("email", $users->email) : set_value("email"); ?>"  type="email" placeholder="Email">

                        </div>
                        <div class="form-group">
                            <label for="">Password</label>

                            <input class="form-control "  required="" name="password" value="<?php echo isset($users->password) ? set_value("password", $users->password) : set_value("password"); ?>"  type="text" placeholder="Password">

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