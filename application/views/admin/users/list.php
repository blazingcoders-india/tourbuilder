<div class="content-wrapper" style="min-height: 916px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Users List

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Users</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12">


                <div class="box">
                    <div class="box-header">

                        <h3 class="box-title"><a href="<?php echo base_url() . 'admin/users_add' ?>"><button type="button" class="btn btn-block btn-primary">Add Users</button></a></h3><br>
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

                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $value) { ?>
                                    <tr>
                                      <td><a href="<?php echo base_url() . 'admin/users_add/' . $value['id'] ?>" title="Edit" ><i class="fa fa-fw fa-edit"></i></a> |  <a href="<?php echo base_url() . 'admin/users_delete/' . $value['id'] ?>" title="Delete" onclick="return confirm('Are you sure want to delete?')"> <i class="fa fa-fw fa-trash"></i></a></td>

                                        <td><?php echo $value['first_name']; ?></td>
                                        <td><?php echo $value['last_name']; ?></td>
                                        <td><?php echo $value['email']; ?></td> 
                                    </tr>
                                <?php } ?>


                            </tbody>
                            <tfoot>
                                <tr>
                                     <th>Action</th>

                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th> 
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