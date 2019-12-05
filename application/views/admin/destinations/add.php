<div class="content-wrapper" style="min-height: 916px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Destinations

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/destinations_list">Destinations</a></li>
            <li class="active">Add Destinations</li>
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
                    <?php $form_attr=array("id"=>"destinations"); echo form_open_multipart('admin/destinations_save',$form_attr); ?>
                    <div class="box-body">
 
                        

                        <div class="form-group">
                            <label for="">Full Name</label>

                            <input class="form-control form-control-lg mb-3"   name="id" value="<?php echo isset($destinations->id) ? set_value("id", $destinations->id) : set_value("id"); ?>"  type="hidden" placeholder="">
                            <input class="form-control "  required="" name="full_name" value="<?php echo isset($destinations->full_name) ? set_value("full_name", $destinations->full_name) : set_value("full_name"); ?>"  type="text" placeholder="Full Name">

                        </div>
                        <div class="form-group">
                            <label for="">Short Name</label>

                            <input class="form-control "  required="" name="short_name" value="<?php echo isset($destinations->short_name) ? set_value("short_name", $destinations->short_name) : set_value("short_name"); ?>"  type="text" placeholder="Short Name">

                        </div>
                        
                       
                       
                        <div class="form-group">
                            <label for="exampleInputFile">Flag</label>
                                                       <input type="file" name="flag"   value="<?php echo isset($destinations->flag) ? set_value("flag", $destinations->flag) : set_value("flag"); ?>" id="">
 
                                   <?php if (!empty($destinations->flag)) { ?>
                                                       <div class="card-content">

                                            <div class="card-body  my-gallery" itemscope=""   data-pswp-uid="1">
                                                <div class="row">
                                      
                                                        <figure class="col-lg-3 col-md-6 col-sm-6 col-xs-12" itemprop="associatedMedia" itemscope=""  >
                                                            <div><a onclick="return confirm('Are you sure?')" href="<?php echo base_url('admin/deleteimg_flag/' . $destinations->flag . '/' . $destinations->id); ?>"><i style="cursor:pointer;padding-left:200px"  class="fa fa-times-circle" aria-hidden="true"></i> </a></div>
                                <img src="<?php echo base_url() . 'appdata/destination_flag/' . $destinations->id . '/' . $destinations->flag; ?>" style="width:100px;height:100px">

                                                        </figure>
                                                   
                                                </div>

                                            </div>


                                        </div>
                        <?php } ?>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Logo</label>
                                                       <input type="file" name="logo"   value="<?php echo isset($destinations->logo) ? set_value("logo", $destinations->logo) : set_value("logo"); ?>" id="">
                        <?php if (!empty($destinations->logo)) { ?>
                                                       <div class="card-content">

                                            <div class="card-body  my-gallery" itemscope=""   data-pswp-uid="1">
                                                <div class="row">
                                      
                                                        <figure class="col-lg-3 col-md-6 col-sm-6 col-xs-12" itemprop="associatedMedia" itemscope=""  >
                                                            <div><a onclick="return confirm('Are you sure?')" href="<?php echo base_url('admin/deleteimg_logo/' . $destinations->logo . '/' . $destinations->id); ?>"><i style="cursor:pointer;padding-left:200px"  class="fa fa-times-circle" aria-hidden="true"></i> </a></div>
                                <img src="<?php echo base_url() . 'appdata/destination_logo/' . $destinations->id . '/' . $destinations->logo; ?>" style="width:100px;height:100px">

                                                        </figure>
                                                   
                                                </div>

                                            </div>


                                        </div>
                        <?php } ?>
 

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