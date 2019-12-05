<div class="content-wrapper" style="min-height: 916px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tours 

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/tours_info_list">Tours Info</a></li>
            <li class="active">Add Tours Info</li>
        </ol>
    </section>
<?php if(empty($this->session->userdata('destination_id'))){ ?>
    <script>alert("Pls choose Destination to add further tours");</script>
<?php } ?>
    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#info" data-toggle="tab" aria-expanded="true">Info</a></li>
              <li class=""><a href="#notes" data-toggle="tab" aria-expanded="true">Notes</a></li>
              <li class=""><a href="#scheduling" data-toggle="tab" aria-expanded="false">Scheduling</a></li>
              <li class=""><a href="#payment" data-toggle="tab" aria-expanded="false">Payment</a></li>
              
               
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="info">
             
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
                                    <option <?php if(!empty($tours_info->client_id)) { if($value['id']==$tours_info->client_id){ echo 'selected'; } } ?> value="<?php echo $value['id']; ?>"><?php echo $value['first_name'].' - '.$value['last_name'].' - '.$value['email']; ?></option>
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
                                <select class="form-control select2"  name="tour_status_id" style="width: 100%;" required="">
                                    <option selected="selected" disabled="">Select Tours Status</option>
                                    <?php foreach($tours_status as $key=> $value){ ?>
                                    <option <?php if(!empty($tours_info->tour_status_id)) { if($value['id']==$tours_info->tour_status_id){ echo 'selected'; } }else{ if($key==0){ echo ' selected '; } } ?>   value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                    <?php } ?>
                                     
                                </select>
                            </div>
                         <div class="form-group">
                            <label for="exampleInputFile">File</label>
                                                       <input type="file" name="file_name"   value="<?php echo isset($tours_info->file_name) ? set_value("file_name", $tours_info->file_name) : set_value("file_name"); ?>" id="">

<?php if (!empty($tours_info->file_name)) { ?>
                                                       <a href="<?php echo base_url() . 'appdata/tours_info/' . $tours_info->id . '/' . $tours_info->file_name; ?>" target="_blank"><?php echo $tours_info->file_name; ?></a>
                                 
<?php } ?>

                        </div>

                         
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <input type="submit" name="save" class="btn btn-primary" value="Save">
                        <input type="submit" name="save_and_continue" class="btn btn-primary" value="Save and Continue">
                        
                    </div>
                    </form>
                </div>
               
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="notes">
               <div class="box box-primary">
                    <div class="box-header with-border">

                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <?php $form_attr=array("id"=>"tours_info_notes"); echo form_open_multipart('admin/tours_info_notes_save',$form_attr); ?>
                    <div class="box-body">
 
                                  <input class="form-control form-control-lg mb-3"   name="id" value="<?php echo isset($tours_info->id) ? set_value("id", $tours_info->id) : set_value("id"); ?>"  type="hidden" placeholder="">

                        <div class="form-group">
                            <label> Notes </label>
                            <textarea id="editor1" class="form-control" name="notes" value="<?php echo isset($tours_info->notes) ? set_value("notes", $tours_info->notes) : set_value("notes"); ?>" rows="3" placeholder="Notes"><?php
                                if (!empty($tours_info->notes)) {
                                    echo $tours_info->notes;
                                }
                                ?> </textarea>
                        </div>
                        

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <input type="submit" name="save" class="btn btn-primary" value="Save">
                        <input type="submit" name="save_and_continue" class="btn btn-primary" value="Save and Continue">
                        
                    </div>
                    </form>
                </div>
              </div>
              <div class="tab-pane" id="scheduling">
               Scheduling Section
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="payment">
                 Payment Section
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
 
      </div>
       
    </section>
    <!-- /.content -->
     
    <?php echo form_close(); ?>
    <!-- /.content -->
</div>