<div class="content-wrapper" style="min-height: 916px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Tours Info

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/tours_info_list">Tours Info</a></li>
            <li class="active">Add Tours Info</li>
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
                    <?php $form_attr=array("id"=>"tours_info"); echo form_open_multipart('admin/tours_info_save',$form_attr); ?>
                    <div class="box-body">
 <div class="form-group">
                                 <input class="form-control form-control-lg mb-3"   name="id" value="<?php echo isset($tours_info->id) ? set_value("id", $tours_info->id) : set_value("id"); ?>"  type="hidden" placeholder="">

                                <label>Clients</label>
                                <select class="form-control select3" id="tours_client_id" name="client_id" style="width: 100%;" required="">
                                    <option selected="selected" disabled="">Select Client</option>
                                    <?php foreach($clients as $value){ ?>
                                    <option <?php if(!empty($tours_info->client_id)) { if($value['id']==$tours_info->client_id){ echo 'selected'; } } ?> value="<?php echo $value['id']; ?>"><?php echo $value['short_name']; ?></option>
                                    <?php } ?>
                                     
                                </select>
                            </div>
                         <div class="form-group">
                            <label for="">Tour ID</label>

                            <input class="form-control "    id="tour_id" name="tour_id" value="<?php echo isset($tours_info->tour_id) ? set_value("tour_id", $tours_info->tour_id) : set_value("tour_id"); ?>"  type="text" placeholder="Tour ID">

                        </div>
                         <div class="form-group">
                            <label for="">Tour Name</label>

                            <input class="form-control "    id="tour_name" name="tour_name" value="<?php echo isset($tours_info->tour_name) ? set_value("tour_name", $tours_info->tour_name) : set_value("tour_name"); ?>"  type="text" placeholder="Tour Name">

                        </div>
                           <div class="form-group">
                            <label>Create Date:</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="create_date"  value="<?php echo (isset($tours_info->create_date)) ? date('m/d/Y', strtotime($tours_info->create_date)) : date('m/d/Y'); ?>" required="" class="form-control pull-right datepicker" id="" >
                            </div>
                            <!-- /.input group -->
                        </div>
                         <div class="form-group">
                            <label for="">PAX</label>

                            <input class="form-control "   id="pax" name="pax" value="<?php echo isset($tours_info->pax) ? set_value("pax", $tours_info->pax) : set_value("pax"); ?>"  type="text" placeholder="PAX">

                        </div>
                         <div class="form-group">
                            <label for="">Lodging Type</label>

                            <input class="form-control "   id="lodging_type" name="lodging_type" value="<?php echo isset($tours_info->lodging_type) ? set_value("lodging_type", $tours_info->lodging_type) : set_value("lodging_type"); ?>"  type="text" placeholder="Lodging Type">

                        </div>
                         <div class="form-group">
                                  
                                <label>Tours Status</label>
                                <select class="form-control select2"  name="tours_status_id" style="width: 100%;" required="">
                                    <option selected="selected" disabled="">Select Tours Status</option>
                                    <?php foreach($tours_status as $key=> $value){ ?>
                                    <option <?php if(!empty($tours_info->tours_status_id)) { if($value['id']==$tours_info->tours_status_id){ echo 'selected'; } } ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                    <?php } ?>
                                     
                                </select>
                            </div>

                        
                        
                        <div class="form-group">
                            <label> Notes </label>
                            <textarea id="" class="form-control" name="notes" value="<?php echo isset($tours_info->notes) ? set_value("notes", $tours_info->notes) : set_value("notes"); ?>" rows="3" placeholder="Notes"><?php
                                if (!empty($tours_info->notes)) {
                                    echo $tours_info->notes;
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