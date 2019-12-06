<div class="content-wrapper" style="min-height: 916px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Clients List

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Client Details</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">
                            Details
                        </h2>
                    </header>
                    <div class="panel-body">
                        <table class="table table-bordered">

                           
                            <tbody> 
                                <tr>
                                    <td>First Name</td>
                                    <td><?php echo $client_details->first_name; ?> </td>
                                    <td>Last Name </td>
                                    <td><?php echo $client_details->last_name; ?></td>
                                </tr>
                                <tr>
                                    <td>Short Name</td>
                                    <td><?php echo (!empty($client_details->short_name)) ? $client_details->short_name : 'N/A'; ?></td>
                                    <td>Email</td>
                                    <td><?php echo (!empty($client_details->email)) ? $client_details->email : 'N/A'; ?></td>
                                </tr>
                                <tr>
                                    <td>Mobile</td>
                                    <td><?php echo (!empty($client_details->phone)) ? $client_details->phone : 'N/A'; ?></td>
                                    <td>Notes</td>
                                    <td><?php echo (!empty($client_details->notes)) ? $client_details->notes : 'N/A'; ?></td>
                                </tr>
                                <tr>
                                    <td>Create Date</td>
                                    <td><?php echo (!empty($client_details->create_date)) ? $client_details->create_date : 'N/A'; ?></td>
                                    <td>Tour Link</td>
                                    <td><?php echo (!empty($client_details->tour_link)) ? $client_details->tour_link : 'N/A'; ?></td>
                                </tr>
                                 
                                
                            </tbody></table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>