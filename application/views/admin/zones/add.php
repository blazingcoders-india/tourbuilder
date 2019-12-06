<div class="content-wrapper" style="min-height: 916px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Zones

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/zones_list">Zones</a></li>
            <li class="active">Add Zones</li>
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
                    <?php $form_attr=array("id"=>"zones"); echo form_open_multipart('admin/zones_save',$form_attr); ?>
                    <div class="box-body">
 <div class="form-group">
                                <label>Country</label>
                                <select class="form-control select2"  name="destination_id" style="width: 100%;" required="">
                                    <option selected="selected" disabled="">Select Destination</option>
                                    <?php foreach($destinations as $value){ ?>
                                    <option <?php if(empty($zones->destination_id) && !empty($this->session->userdata('destination_id'))){if($value['id']==$this->session->userdata('destination_id')){ echo 'selected'; } } ?><?php if(!empty($zones->destination_id)) { if($value['id']==$zones->destination_id){ echo 'selected'; } } ?> value="<?php echo $value['id']; ?>"><?php echo $value['full_name']; ?></option>
                                    <?php } ?>
                                     
                                </select>
                            </div>
                        

                        <div class="form-group">
                            <label for="">Full Name</label>

                            <input class="form-control form-control-lg mb-3"   name="id" value="<?php echo isset($zones->id) ? set_value("id", $zones->id) : set_value("id"); ?>"  type="hidden" placeholder="">
                            <input class="form-control "  required="" id="full_name" name="full_name" value="<?php echo isset($zones->full_name) ? set_value("full_name", $zones->full_name) : set_value("full_name"); ?>"  type="text" placeholder="Full Name">

                        </div>
                        <div class="form-group">
                            <label for="">Short Name</label>

                            <input class="form-control "  required="" id="short_name" name="short_name" value="<?php echo isset($zones->short_name) ? set_value("short_name", $zones->short_name) : set_value("short_name"); ?>"  type="text" placeholder="Short Name">

                        </div>
                        <div class="form-group">
                            <label for="">GPS Latitude</label>

                            <input class="form-control "  required="" name="gps_latitude" value="<?php echo isset($zones->gps_latitude) ? set_value("gps_latitude", $zones->gps_latitude) : set_value("gps_latitude"); ?>"  type="text" placeholder="GPS Latitude">

                        </div>
                        <div class="form-group">
                            <label for="">GPS Longitude</label>

                            <input class="form-control "  required="" name="gps_longitude" value="<?php echo isset($zones->gps_longitude) ? set_value("gps_longitude", $zones->gps_longitude) : set_value("gps_longitude"); ?>"  type="text" placeholder="GPS Longitude">

                        </div>
                         
                        <div class="form-group">
                            <label>Proposal</label>
                            <textarea id="editor1" class="form-control" name="proposal" value="<?php echo isset($zones->proposal) ? set_value("proposal", $zones->proposal) : set_value("proposal"); ?>" rows="3" placeholder="Proposal"><?php
                                if (!empty($zones->proposal)) {
                                    echo $zones->proposal;
                                }
                                ?> </textarea>
                        </div>
                        <div class="form-group">
                            <label> Roadbook </label>
                            <textarea id="editor2" class="form-control" name="roadbook" value="<?php echo isset($zones->roadbook) ? set_value("roadbook", $zones->roadbook) : set_value("roadbook"); ?>" rows="3" placeholder="Roadbook"><?php
                                if (!empty($zones->roadbook)) {
                                    echo $zones->roadbook;
                                }
                                ?> </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Image</label>
                                                       <input type="file" name="file_name"   value="<?php echo isset($zones->file_name) ? set_value("file_name", $zones->file_name) : set_value("file_name"); ?>" id="">

<?php if (!empty($zones->file_name)) { ?>
                                <img src="<?php echo base_url() . 'appdata/zones/' . $zones->id . '/' . $zones->file_name; ?>" style="width:100px;height:100px">
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