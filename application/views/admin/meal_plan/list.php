<div class="content-wrapper" style="min-height: 916px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Meal Plan List

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Meal Plan</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">


                <div class="box">
                    <div class="box-header">

                        <h3 class="box-title"><a href="<?php echo base_url() . 'admin/meal_plan_add' ?>"><button type="button" class="btn btn-block btn-primary">Add Meal Plan</button></a></h3><br>
                        <div id="success-alert">
                            <?php if ($this->session->flashdata('message')) { ?>
                                <div class="alert alert-success">      
                                    <?php echo $this->session->flashdata('message') ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Name</th>
                                    <th>French Name</th>    
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($meal_plan as $value) { ?>
                                    <tr>
                                        
 
                                        <td><a href="<?php echo base_url() . 'admin/meal_plan_add/' . $value['id'] ?>" title="Edit" ><i class="fa fa-fw fa-edit"></i></a> |  <a href="<?php echo base_url() . 'admin/meal_plan_delete/' . $value['id'] ?>" title="Delete" onclick="return confirm('Are you sure want to delete?')"> <i class="fa fa-fw fa-trash"></i></a></td>

                                        <td><?php echo $value['name']; ?></td>
                                        <td><?php echo $value['french_name']; ?></td>
                                         
                                       
                                    </tr>
                                <?php } ?>


                            </tbody>
                            <tfoot>
                                <tr>
                                     <th>Action</th>
                                    <th>Name</th>
                                    <th>French Name</th>   
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>