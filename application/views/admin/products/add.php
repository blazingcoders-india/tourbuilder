<div class="content-wrapper" style="min-height: 916px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Products

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/products_list">Products</a></li>
            <li class="active">Add Products</li>
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
                    <?php $form_attr=array("id"=>"products"); echo form_open_multipart('admin/products_save',$form_attr); ?>
                    <div class="box-body">
 <div class="form-group">
                                <label>Meal Plan</label>
                                <select class="form-control select2"  name="meal_plan_id" style="width: 100%;" required="">
                                    <option selected="selected" disabled="">Select Meal Plan</option>
                                    <?php foreach($meal_plan as $value){ ?>
                                    <option <?php if(!empty($products->meal_plan_id)) { if($value['id']==$products->meal_plan_id){ echo 'selected'; } } ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                                    <?php } ?>
                                     
                                </select>
                            </div>
                        

                        <div class="form-group">
                            <label for="">Name</label>

                            <input class="form-control form-control-lg mb-3"   name="id" value="<?php echo isset($products->id) ? set_value("id", $products->id) : set_value("id"); ?>"  type="hidden" placeholder="">
                            <input class="form-control "  required="" name="name" value="<?php echo isset($products->name) ? set_value("name", $products->name) : set_value("name"); ?>"  type="text" placeholder="Name">

                        </div>
                        <div class="form-group">
                            <label for="">Net Rate</label>

                            <input class="form-control "  required="" name="net_rate" value="<?php echo isset($products->net_rate) ? set_value("net_rate", $products->net_rate) : set_value("net_rate"); ?>"  type="text" placeholder="Net Rate">

                        </div>
                         <div class="form-group">
                            <label>Net Per Night</label><br>
                          <label>
                              <input type="radio" name="net_per_night" <?php if(isset($products->net_per_night)){if($products->net_per_night=='1'){ echo 'checked'; } }?>  value="1" class="minimal-red">
                            YES
                          </label>
                          <label>
                            <input type="radio" name="net_per_night" value="0" <?php if(isset($products->net_per_night)){if($products->net_per_night==0){ echo 'checked'; } }?>  class="minimal-red">
                            NO
                          </label>
                          
                        </div>
                         <div class="form-group">
                            <label>Obsolete</label><br>
                          <label>
                              <input type="radio" name="obsolete" <?php if(isset($products->obsolete)){if($products->obsolete=='1'){ echo 'checked'; } }?>  value="1" class="minimal-red">
                            YES
                          </label>
                          <label>
                            <input type="radio" name="obsolete" value="0" <?php if(isset($products->obsolete)){if($products->obsolete=='0'){ echo 'checked'; } }?>  class="minimal-red">
                            NO
                          </label>
                          
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