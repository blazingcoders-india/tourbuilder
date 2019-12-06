<div class="content-wrapper" style="min-height: 916px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Providers

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/providers_list">Providers</a></li>
            <li class="active">Add Providers</li>
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
                    <div class="box-body">
                          <?php $form_attr=array("id"=>"providers"); echo form_open_multipart('admin/providers_save',$form_attr); ?>
                            <div class="form-group">
                                <label>Country</label>
                                <select class="form-control select2"  name="destination_id" style="width: 100%;" required="">
                                    <option selected="selected" disabled="">Select Destination</option>
                                    <?php foreach($destinations as $value){ ?>
                                    <option <?php if(empty($zones->destination_id) && !empty($this->session->userdata('destination_id'))){if($value['id']==$this->session->userdata('destination_id')){ echo 'selected'; } } ?> <?php if(!empty($providers->destination_id)) { if($value['id']==$providers->destination_id){ echo 'selected'; } } ?> value="<?php echo $value['id']; ?>"><?php echo $value['full_name']; ?></option>
                                    <?php } ?>
                                     
                                </select>
                            </div>
                         <div class="form-group">
                                <label>Zones</label>
                                <select class="form-control select2"  name="zone_id" style="width: 100%;" required="">
                                    <option selected="selected" disabled="">Select Zone</option>
                                    <?php foreach($zones as $value){ ?>
                                    <option <?php if(!empty($providers->zone_id)) { if($value['id']==$providers->zone_id){ echo 'selected'; } } ?> value="<?php echo $value['id']; ?>"><?php echo $value['full_name']; ?></option>
                                    <?php } ?>
                                     
                                </select>
                            </div>
                        

                        <div class="form-group">
                            <label for="">Full Name</label>

                            <input class="form-control form-control-lg mb-3"   name="id" value="<?php echo isset($providers->id) ? set_value("id", $providers->id) : set_value("id"); ?>"  type="hidden" placeholder="">
                            <input class="form-control "  required="" id="full_name" name="full_name" value="<?php echo isset($providers->full_name) ? set_value("full_name", $providers->full_name) : set_value("full_name"); ?>"  type="text" placeholder="Full Name">

                        </div>
                        <div class="form-group">
                            <label for="">Short Name</label>

                            <input class="form-control "  required="" id="short_name" name="short_name" value="<?php echo isset($providers->short_name) ? set_value("short_name", $providers->short_name) : set_value("short_name"); ?>"  type="text" placeholder="Short Name">

                        </div>
                       
                         <div class="form-group">
                            <label for="">Web Link</label>

                            <input class="form-control "    name="web_link" value="<?php echo isset($providers->web_link) ? set_value("web_link", $providers->web_link) : set_value("web_link"); ?>"  type="text" placeholder="Web Link">

                        </div>
                         
                        <div class="form-group">
                            <label>Notes</label>
                            <textarea id="" class="form-control" name="notes" value="<?php echo isset($providers->notes) ? set_value("notes", $providers->notes) : set_value("notes"); ?>" rows="3" placeholder="Notes"><?php
                                if (!empty($providers->notes)) {
                                    echo $providers->notes;
                                }
                                ?> </textarea>
                        </div>
                         <div class="form-group">
                            <label>Create Date:</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="create_date"  value="<?php echo (isset($providers->create_date)) ? date('m/d/Y', strtotime($providers->create_date)) : date('m/d/Y'); ?>" required="" class="form-control pull-right datepicker" id="" >
                            </div>
                            <!-- /.input group -->
                        </div>
                        <?php if(isset($providers->id) ){ ?>
                         <div class="form-group">
                            <label>Favorite</label><br>
                          <label>
                              <input type="radio" name="favourites" <?php if(isset($providers->favourites)){if($providers->favourites=='1'){ echo 'checked'; } }?>  value="1" class="minimal-red">
                            YES
                          </label>
                          <label>
                            <input type="radio" name="favourites" value="0" <?php if(isset($providers->favourites)){if($providers->favourites=='0'){ echo 'checked'; } }?>  class="minimal-red">
                            NO
                          </label>
                          
                        </div>
                        <?php } ?>
                        <label>Email</label>
                            <?php  if (!empty($providers->email)) { 
                                $explode = explode(",", $providers->email);
foreach($explode as $key=> $value) {
    if($key==0){
 
                                ?>
                        
                         <div class="form-group fieldGroup">
        <div class="input-group">
        
            <input type="text" name="email[]" value="<?php echo $value; ?>"   class="form-control" placeholder="Enter email"/>
            <div class="input-group-addon"> 
                <a href="javascript:void(0)" class="btn btn-success addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
            </div>
        </div>
        </div>
<?php  }else{ ?>
                          <div class="form-group fieldGroup">
     <div class="input-group">
         
        <input type="text" name="email[]" value="<?php echo $value; ?>"    class="form-control" placeholder="Enter email"/>
        <div class="input-group-addon"> 
            <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>
        </div>
    </div>
    </div>
    
<?php }
} }else{ ?>
                             <div class="form-group fieldGroup">
                              <div class="input-group">
        
            <input type="text" name="email[]"   class="form-control" placeholder="Enter email"/>
            <div class="input-group-addon"> 
                <a href="javascript:void(0)" class="btn btn-success addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
            </div>
        </div>
        </div>
<?php } ?>
                        
                          <label>Phone</label>
                                              <?php  if (!empty($providers->phone)) { 
                                $explode = explode(",", $providers->phone);
foreach($explode as $key=> $value) {
    if($key==0){
 
                                ?>
                         <div class="form-group fieldGroupphone">
        <div class="input-group">
        
            <input type="text" name="phone[]" value="<?php echo $value; ?>"   class="form-control" placeholder="Enter Phone"/>
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


                            <div class="form-group">
                                <label>Provider Type</label>
                                <select class="form-control select2"  name="type_id" style="width: 100%;" required="">
                                    <option selected="selected" disabled="">Select Type</option>
                                    <?php foreach($type as $value){ ?>
                                    <option <?php if(!empty($providers->type_id)) { if($value['id']==$providers->type_id){ echo 'selected'; } } ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                    <?php } ?>
                                     
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Hotel's Category</label>
                                <select class="form-control select2"  name="category_id" style="width: 100%;" required="">
                                    <option selected="selected" disabled="">Select Hotel's Category</option>
                                    <?php foreach($categories as $value){ ?>
                                    <option <?php if(!empty($providers->category_id)) { if($value['id']==$providers->category_id){ echo 'selected'; } } ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                    <?php } ?>
                                     
                                </select>
                            </div>
                           
                        
    

<!--                         <div class="form-group">
                            <label for="">Client Link</label>

                            <input class="form-control " required=""  name="client_link" value="<?php echo isset($providers->client_link) ? set_value("client_link", $providers->client_link) : set_value("client_link"); ?>"  type="text" placeholder="Client Link">

                        </div>-->
                        
                        <div class="form-group">
                            <label for="exampleInputFile">Image</label>
                                                       <input type="file" name="image"   value="<?php echo isset($providers->image) ? set_value("image", $providers->image) : set_value("image"); ?>" id="">

<?php if (!empty($providers->image)) { ?>
                                <img src="<?php echo base_url() . 'appdata/providers_image/' . $providers->id . '/' . $providers->image; ?>" style="width:100px;height:100px">
<?php } ?>
                    </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Files</label>
                                                           <input class="form-control form-control-lg mb-3"   name="implode" value="<?php echo isset($providers->file_name) ? set_value("file_name", $providers->file_name) : set_value("file_name"); ?>" type="hidden" placeholder="Your Post Title">

<?php if (!empty($providers->file_name)) { ?>
                                                       
                                                        <div class="card-content">

                                            <div class="card-body  my-gallery" itemscope=""   data-pswp-uid="1">
                                                <div class="row">
                                                    <?php
                                                    $gallery = explode(',',$providers->file_name);

                                                    foreach ($gallery as $value) {
                                                        ?>
                                                        <figure class="col-lg-3 col-md-6 col-sm-6 col-xs-12" itemprop="associatedMedia" itemscope=""  >
                                                            <div><a onclick="return confirm('Are you sure?')" href="<?php echo base_url('admin/deleteimg/' . $value . '/' . $providers->id); ?>"><i style="cursor:pointer;padding-left:200px"  class="fa fa-times-circle" aria-hidden="true"></i> </a></div>
                                                           <a target="_blank" href="<?php echo base_url() . 'appdata/providers_directory/' . $providers->id . '/' . $value ?>"><?php echo $value; ?></a>

                                                        </figure>
                                                    <?php } ?>

                                                </div>

                                            </div>


                                        </div>
                                                       
                                                       
                                                       
                                                       
                             <?php } ?>
                                    <div class="col-md-12">

                    <div id="filesuploaderrordetails"></div>
                    <div class="dropzone" id="my-dropzone" name="mainFileUploader">

                    </div>
                    <div id="filesuploaddetails"></div>
                </div> 
                    </div>
                    <!-- /.box-body -->

                   
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                 <?php echo form_close(); ?>
                </div>
                <!-- /.box -->

 



                <!-- /.box -->
 
            </div>
            <!--/.col (left) -->

            <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Products</h3>
              <?php if (!empty($providers->id)) { ?>
              <a data-toggle="modal" data-target="#modal-default" href="javascript:void(0)" class="btn btn-success  pull-right"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add Products</a>
              <?php }else{ ?>
              <a  onclick="alert('Please save the provider and then proceed to save products')" class="btn btn-success  pull-right"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add Products</a>
              <?php } ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                                  
                
                
                 <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                    <th style="width: 100px">Action</th>
                    <th>Name </th>
                     <th>Net Rate</th>
                  <th>Meal Plan </th>   
                  <th>Net Per Night</th>
                  <th>Obsolete</th>
                                      
                                  
                                </tr>
                            </thead>
                            <tbody>
                                                                    <?php if(!empty($products)){ foreach ($products as $value) {
                     if(!empty($value['meal_plan_id'])){
                         $meal_plan_id=$value['meal_plan_id'];
                     }else{
                         $meal_plan_id=0;
                     }
                     
                     $plan = $this->db->query("SELECT * FROM meal_plan WHERE id=".$meal_plan_id." LIMIT 1;")->row();
                      if($value['net_per_night']==1){
                          $net_per_night='Yes';
                      }elseif(is_null($value['net_per_night'])){
                         $net_per_night='';
                      }else{
                          $net_per_night='No';

                      }
                      if($value['obsolete']==1){
                          $obsolete='Yes';
                      }elseif(is_null($value['obsolete'])){
                         $obsolete='';
                      }else{
                          $obsolete='No';

                      }
                     ?>
                <tr>
                  <td><a data-toggle="modal" data-target="#modal-default_edit<?php echo $value['id']; ?>" href="javascript:void(0)" class=" ">   <i class="fa fa-fw fa-edit"></i></a> |  <a href="<?php echo base_url() . 'admin/products_delete/' . $value['id'].'/'.$providers->id ?>" title="Delete" onclick="return confirm('Are you sure want to delete?')"> <i class="fa fa-fw fa-trash"></i></a></td>
                  <td><a data-toggle="modal" data-target="#modal-default_edit<?php echo $value['id']; ?>" href="javascript:void(0)" class=" "><?php echo $value['name']; ?></a></td> 
                    <td><?php echo $value['net_rate']; ?></td>
                  <td><?php echo isset($plan->name) ? $plan->name : "N/A";?></td>
                  
                     <td><?php echo $net_per_night; ?></td>
                      <td><?php echo $obsolete; ?></td>
                   
              
                </tr>
                 <?php }  } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                    <th style="width: 100px">Action</th>
                    <th>Name </th>
                     <th>Net Rate</th>
                  <th>Meal Plan </th>   
                  <th>Net Per Night</th>
                  <th>Obsolete</th>
                                      
                                </tr>
                            </tfoot>
                        </table>
            </div>
            <!-- /.box-body -->
           
          <!-- /.box -->

        </div>
        
      </div>


           
        </div>
            
        <!-- /.row -->
        
    </section>
    <!-- /.content -->
     
  
         <div class="form-group fieldGroupCopy" style="display: none;">
    <div class="input-group">
         
        <input type="text" name="email[]"    class="form-control" placeholder="Enter email"/>
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
           <div class="fieldGrouppropertyCopy" style="display: none;">
        <div class="col-md-12">

          <div class="box box-danger">
            <div class="box-header">
              <h2 class="box-title">Properties</h2>
            </div>
              
            <div class="box-body">
              
               
                     
                    <div class=" " style="padding:10px"> 
                        <a href="javascript:void(0)" class="btn btn-danger removeproperty" style="float:right"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>

                    </div>
           
            <div class="form-group">
                                <label>Meal Plan</label>
                                <select class="form-control select2"  name="meal_plan_id[]" style="width: 100%;" >
                                    <option selected="selected" disabled="">Select Meal Plan</option>
                                    <?php foreach($meal_plan as $value){ ?>
                                    <option  value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                    <?php } ?>
                                     
                                </select>
                            </div>
                        

                        <div class="form-group">
                            <label for="">Name</label>

                            <input class="form-control "    name="name[]" value=""  type="text" placeholder="Name">

                        </div>
                        <div class="form-group">
                            <label for="">Net Rate</label>

                            <input class="form-control "    name="net_rate[]" value=""  type="text" placeholder="Net Rate">

                        </div>
                         
                         <div class="form-group">
                            <label>Net Per Night</label><br>
                            <select class="form-control select2"  name="net_per_night[]" style="width: 100%;"  >
                                                                    <option selected="selected" disabled="">Net Per Night</option>
                                                                    <option value="1"> Yes</option>
                                                                    <option value="0"> No</option>
                            </select>
                         
                          
                        </div>
                         <div class="form-group">
                            <label>Obsolete</label><br>
                            <select class="form-control select2"  name="obsolete[]" style="width: 100%;"  >
                                                                    <option selected="selected" disabled="">Obsolete</option>
                                                                    <option value="1"> Yes</option>
                                                                    <option value="0"> No</option>
                            </select>
                          
                          
                        </div>
                </div>
                        
              <!-- /.form group -->

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         

        </div>
    <!-- /.content -->
</div>

<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  
                <h4 class="modal-title">Add Products</h4>
              </div>
              <div class="modal-body">
                  <?php $form_attr=array("id"=>""); echo form_open_multipart('admin/products_save',$form_attr); ?>
             

                        <div class="form-group">
                            <label for="">Name</label>

                            <input class="form-control "  required=""   name="name" value=""  type="text" placeholder="Name">
                            <input class="form-control "  value="<?php echo isset($providers->id) ? set_value("id", $providers->id) : set_value("id"); ?>"   name="provider_id" value=""  type="hidden" placeholder="Name">

                        </div>
                   <div class="form-group">
                            <label for="">Net Rate</label>

                            <input class="form-control "    name="net_rate" value=""  type="text" placeholder="Net Rate">

                        </div>
                   <div class="form-group">
                            <label>Description</label>
                            <textarea id="editor1" class="form-control" name="description" value="" rows="3" placeholder="Description"> </textarea>
                        </div>
                    <div class="form-group">
                                <label>Meal Plan</label>
                                <select class="form-control select2"  name="meal_plan_id" style="width: 100%;"  >
                                    <option selected="selected" disabled="">Select Meal Plan</option>
                                    <?php foreach($meal_plan as $value){ ?>
                                    <option  value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                    <?php } ?>
                                     
                                </select>
                            </div>
                        
                       
                            <div class="form-group">
                            <label>Net Per Night</label><br>
                          <label>
                              <input type="radio" name="net_per_night"   value="1" class="minimal-red">
                            YES
                          </label>
                          <label>
                            <input type="radio" name="net_per_night" value="0"   class="minimal-red">
                            NO
                          </label>
                          
                        </div>
                         <div class="form-group">
                            <label>Obsolete</label><br>
                          <label>
                              <input type="radio" name="obsolete"  value="1" class="minimal-red">
                            YES
                          </label>
                          <label>
                            <input type="radio" name="obsolete" value="0"   class="minimal-red">
                            NO
                          </label>
                          
                        </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
                  <?php echo form_close(); ?>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</div>
             <?php if(!empty($products)){ foreach ($products as $value) { ?>
<div class="modal fade" id="modal-default_edit<?php echo $value['id']; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  
                <h4 class="modal-title">Edit Products</h4>
              </div>
              <div class="modal-body">
                  <?php $form_attr=array("id"=>""); echo form_open_multipart('admin/products_save',$form_attr); ?>
              
                        

                        <div class="form-group">
                            <label for="">Name</label>

                            <input class="form-control "  required=""   name="name" value="<?php echo isset($value['name']) ? set_value("name", $value['name']) : set_value("name"); ?>" type="text" placeholder="Name">
                            <input class="form-control "  required=""   name="id" value="<?php echo isset($value['id']) ? set_value("id", $value['id']) : set_value("id"); ?>" type="hidden" placeholder="id">
                             <input class="form-control "  value="<?php echo isset($providers->id) ? set_value("id", $providers->id) : set_value("id"); ?>"   name="provider_id" value=""  type="hidden" placeholder="Name">

                        </div>
                   <div class="form-group">
                            <label for="">Net Rate</label>

                            <input class="form-control "    name="net_rate" value="<?php echo isset($value['net_rate']) ? set_value("net_rate", $value['net_rate']) : set_value("net_rate"); ?>"  type="text" placeholder="Net Rate">

                        </div>
                   <div class="form-group">
                            <label>Description</label>
                            <textarea id="editor1"  class="editors form-control" name="description" value="<?php echo isset($value['description']) ? set_value("description", $value['description']) : set_value("description"); ?>" rows="3" placeholder="Description"> <?php
                                if (!empty($value['description'])) {
                                    echo $value['description'];
                                }
                                ?> </textarea>
                        </div>
                   <div class="form-group">
                                <label>Meal Plan</label>
                                <select class="form-control select2"  name="meal_plan_id" style="width: 100%;"  >
                                    <option selected="selected" disabled="">Select Meal Plan</option>
                                    <?php foreach($meal_plan as $meal_value){ ?>
                                    <option  <?php if(!empty($value['meal_plan_id'])) { if($meal_value['id']==$value['meal_plan_id']){ echo 'selected'; } } ?> value="<?php echo $meal_value['id']; ?>"><?php echo $meal_value['name']; ?></option>
                                    <?php } ?>
                                     
                                </select>
                            </div>
                       
                            <div class="form-group">
                            <label>Net Per Night</label><br>
                          <label>
                              <input type="radio" name="net_per_night"  <?php if(isset($value['net_per_night'])){if($value['net_per_night']=='1'){ echo 'checked'; } }?>  value="1" class="minimal-red">
                            YES
                          </label>
                          <label>
                            <input type="radio" name="net_per_night" value="0"  <?php if(isset($value['net_per_night'])){if($value['net_per_night']=='0'){ echo 'checked'; } }?>  class="minimal-red">
                            NO
                          </label>
                          
                        </div>
                         <div class="form-group">
                            <label>Obsolete</label><br>
                          <label>
                              <input type="radio" name="obsolete"  <?php if(isset($value['obsolete'])){if($value['obsolete']=='1'){ echo 'checked'; } }?> value="1" class="minimal-red">
                            YES
                          </label>
                          <label>
                            <input type="radio" name="obsolete" value="0"  <?php if(isset($value['obsolete'])){if($value['obsolete']=='0'){ echo 'checked'; } }?>  class="minimal-red">
                            NO
                          </label>
                          
                        </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
                  <?php echo form_close(); ?>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</div>
             <?php }  }?>