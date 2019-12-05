<div class="content-wrapper" style="min-height: 916px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Client

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/clients_list">Clients</a></li>
            <li class="active">Add Client</li>
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
                    <?php $form_attr=array("id"=>'clients'); echo form_open_multipart('admin/clients_save',$form_attr); ?>
                    <div class="box-body">
 
                        

                        <div class="form-group">
                            <label for="">First Name</label>

                            <input class="form-control form-control-lg mb-3"   name="id" value="<?php echo isset($clients->id) ? set_value("id", $clients->id) : set_value("id"); ?>"  type="hidden" placeholder="">
                            <input class="form-control "    name="first_name" value="<?php echo isset($clients->first_name) ? set_value("first_name", $clients->first_name) : set_value("first_name"); ?>"  type="text" placeholder="First Name">

                        </div>
                        <div class="form-group">
                            <label for="">Last name / Agency</label>

                            <input class="form-control " id="last_name"  required="" name="last_name" value="<?php echo isset($clients->last_name) ? set_value("last_name", $clients->last_name) : set_value("last_name"); ?>"  type="text" placeholder="Last Name /  Agency">

                        </div>
                        <div class="form-group">
                            <label for="">Short Name</label>

                            <input class="form-control " id="short_name"  name="short_name" value="<?php echo isset($clients->short_name) ? set_value("short_name", $clients->short_name) : set_value("short_name"); ?>"  type="text" placeholder="Short Name">

                        </div>
                        <div class="form-group">
                            <label>Notes</label>
                            <textarea id="" class="form-control" name="notes" value="<?php echo isset($clients->notes) ? set_value("notes", $clients->notes) : set_value("notes"); ?>" rows="3" placeholder="Notes"><?php
                                if (!empty($clients->notes)) {
                                    echo $clients->notes;
                                }
                                ?> </textarea>
                        </div>
                         <div class="form-group">
                            <label>Create Date:</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="create_date"  value="<?php echo (isset($clients->create_date)) ? date('m/d/Y', strtotime($clients->create_date)) : date('m/d/Y'); ?>" required="" class="form-control pull-right datepicker" id="" >
                            </div>
                            <!-- /.input group -->
                        </div>
                        <label>Email</label>
                            <?php  if (!empty($clients->email)) { 
                                $explode = explode(",", $clients->email);
foreach($explode as $key=> $value) {
    if($key==0){
 
                                ?>
                        
                         <div class="form-group fieldGroup">
        <div class="input-group">
        
            <input type="text" name="email[]" value="<?php echo $value; ?>" required="" class="form-control" placeholder="Enter email"/>
            <div class="input-group-addon"> 
                <a href="javascript:void(0)" class="btn btn-success addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
            </div>
        </div>
        </div>
<?php  }else{ ?>
                          <div class="form-group fieldGroup">
     <div class="input-group">
         
        <input type="text" name="email[]" value="<?php echo $value; ?>"  required=" " class="form-control" placeholder="Enter email"/>
        <div class="input-group-addon"> 
            <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>
        </div>
    </div>
    </div>
    
<?php }
} }else{ ?>
                             <div class="form-group fieldGroup">
                              <div class="input-group">
        
            <input type="text" name="email[]" required="" class="form-control" placeholder="Enter email"/>
            <div class="input-group-addon"> 
                <a href="javascript:void(0)" class="btn btn-success addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
            </div>
        </div>
        </div>
<?php } ?>
                        
                          <label>Phone</label>
                                              <?php  if (!empty($clients->phone)) { 
                                $explode = explode(",", $clients->phone);
foreach($explode as $key=> $value) {
    if($key==0){
 
                                ?>
                         <div class="form-group fieldGroupphone">
        <div class="input-group">
        
            <input type="text" name="phone[]" value="<?php echo $value; ?>" class="form-control" placeholder="Enter Phone"/>
            <div class="input-group-addon"> 
                <a href="javascript:void(0)" class="btn btn-success addMorephone"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
            </div>
        </div>
        </div>
<?php  }else{ ?>
                          <div class="form-group fieldGroupphone">
     <div class="input-group">
         
        <input type="text" name="phone[]" value="<?php echo $value; ?>"    class="form-control" placeholder="Enter Phone"/>
        <div class="input-group-addon"> 
            <a href="javascript:void(0)" class="btn btn-danger removephone"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>
        </div>
    </div>
    </div>
    
<?php }
} }else{ ?>
                             <div class="form-group fieldGroupphone">
                              <div class="input-group">
        
            <input type="text" name="phone[]"   class="form-control" placeholder="Enter Phone"/>
            <div class="input-group-addon"> 
                <a href="javascript:void(0)" class="btn btn-success addMorephone"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
            </div>
        </div>
        </div>
<?php } ?>
    

<!--                         <div class="form-group">
                            <label for="">Tour Link</label>

                            <input class="form-control "   name="tour_link" value="<?php echo isset($clients->tour_link) ? set_value("tour_link", $clients->tour_link) : set_value("tour_link"); ?>"  type="text" placeholder="Tour Link">

                        </div>-->
                          <?php if(isset($clients->id)){ ?>
                          <div class="form-group">
                <label>Tags</label>
                <select class="form-control select3" multiple="multiple" name="tag_id[]" data-placeholder="Select a Tag"
                        style="width: 100%;">
                    <?php foreach($tags as $value){ ?>
                    <option value="<?php echo $value['id']; ?>" <?php if(!empty($clients->tag_id)){ $explode=explode(",",$clients->tag_id);
                    foreach($explode as $ex){
                        if($ex==$value['id']){
                            echo 'selected';
                        }
                    }
                    
                    } ?>><?php echo $value['name']; ?></option>
                    <?php } ?>
                
                </select>
              </div>
                          <?php } ?>
                           </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                    <!-- copy of input fields group -->
<div class="form-group fieldGroupCopy" style="display: none;">
    <div class="input-group">
         
        <input type="text" name="email[]"  required=" " class="form-control" placeholder="Enter email"/>
        <div class="input-group-addon"> 
            <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>
        </div>
    </div>
</div>
<div class="form-group fieldGroupphoneCopy" style="display: none;">
    <div class="input-group">
         
        <input type="text" name="phone[]"    class="form-control" placeholder="Enter phone"/>
        <div class="input-group-addon"> 
            <a href="javascript:void(0)" class="btn btn-danger removephone"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>
        </div>
    </div>
</div>
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