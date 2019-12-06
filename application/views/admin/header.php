 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>El Tucan Viajero | Tour Builder</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel=icon type=image/png sizes=32x32 href="<?php echo base_url(); ?>assets/images/favicon.png">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">



  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="<?php echo site_url(); ?>assets//css/dropzone.css">
  <style>
      .error{
          color:red;
      }
  .skin-blue .main-header .logo {
    background-color: #ECF0F5;
    color: #fff;
    border-bottom: 0 solid transparent;
}
.main-header .logo {
    -webkit-transition: width .3s ease-in-out;
    -o-transition: width .3s ease-in-out;
    transition: width .3s ease-in-out;
    display: block;
    float: left;
    height: 73px;
    font-size: 20px;
    line-height: 50px;
    text-align: center;
    width: 230px;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    padding: 0 15px;
    font-weight: 300;
    overflow: hidden;
}
.control-sidebar{
margin-top: 27px;
}
.skin-black .main-header .navbar>.sidebar-toggle {
    color: #333;
    border-right: 1px solid #eee;
    height: 74px;
}
.navbar-custom-menu>.navbar-nav>li {
    position: relative;
    padding: 10px;
}
.skin-blue .main-header .logo:hover {
    background-color: #ECF0F5;
}
.control-sidebar-menu li{
display: inline-block;
    width: 100%;
    margin-bottom: 10px;
	}
	.tour-zone{
	float:left;margin-left: 20px;
	}
	.zone-img{
	float:left;
	width: 80px;
	margin-left: 10px;
	}
	.skin-blue .main-header .navbar .nav>li>label {
    color: #fff;
}
.nav>li>label {
    position: relative;
    display: block;
    padding: 10px 15px;
}
  </style>
  <script>
  var url="<?php echo base_url(); ?>";
  </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <?php  $where[] = array(TRUE, 'is_active', 1);
        $destination = $this->Base_Model->get_records('destinations', '', $where, '', 'id', 'desc', ''); 
       
        ?>
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url(); ?>" class="logo">
     <img src="<?php echo base_url().'assets/dist/img/logo (1).png'?>"  alt="logo" style="width: 130px;">
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div>
   
	  </div>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <?php
            $destination_details='';
            if(!empty($this->session->userdata('destination_id'))){
            $where_des[] = array(TRUE, 'id', $this->session->userdata('destination_id'));
        $destination_details = $this->Base_Model->get_records('destinations', '', $where_des, 'row', 'id', 'desc', '');
            ?>
            <li>
		 <label style="padding: 0px;"><?php echo $destination_details->full_name; ?></label>
                 <?php if(!empty($destination_details->flag)){ ?>
    <img src="<?php echo base_url(); ?>appdata/destination_flag/<?php echo $destination_details->id?>/<?php echo $destination_details->flag; ?>" style="width: 15%;">
                 <?php } ?>
    <?php if(!empty($destination_details->logo)){ ?>
    <img src="<?php echo base_url(); ?>appdata/destination_logo/<?php echo $destination_details->id?>/<?php echo $destination_details->logo; ?>" style="width: 15%;">
    <?php } ?>
		</li>
            <?php } ?>
		<li>
		<label>Choose Destination</label>
		</li>
		<li style="width:300px;">
		 
		 <div class="form-group">
               
                     <select class="form-control select2" style="width: 100%;" onchange="getVal(this.value)" >
                         <option selected="selected" value="">Choose Destination</option>
                         <?php foreach($destination as $value){ ?>
                         <option <?php if($this->session->userdata('destination_id')==$value['id']){ echo 'selected'; } ?> value="<?php echo $value['id']; ?>"><?php echo $value['full_name']; ?></option>
                         <?php } ?>
                  
                 
                 
                </select>
              </div>
		</li>
                 
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
              <span class="hidden-xs"> Welcome User</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                

                <p>
                  Welcome User
                  <small></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url();?>logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" id="display-zone" data-toggle="control-sidebar"><i class="fa fa-gears"></i> Tour Builder</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
    
      <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        
        
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
       
        <li class="active">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Tour Builder</span>
            
          </a>
          
        </li>
         <li>
          <a href="<?php echo base_url(); ?>admin/clients_list">
             <span>Clients</span>            
          </a>
        </li>
         <li>
          <a href="<?php echo base_url(); ?>admin/zones_list">
             <span>Zones</span>            
          </a>
        </li>
         <li>
          <a href="<?php echo base_url(); ?>admin/providers_list">
             <span>Providers</span>            
          </a>
        </li>
         <li>
          <a href="<?php echo base_url(); ?>admin/tours_list">
             <span>Tours</span>            
          </a>
        </li>
<!--          <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i> <span>Tours</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             
            <li class="">
              <a href="<?php echo base_url(); ?>admin/tours_info_list"><i class="fa fa-circle-o"></i> Info
                
              </a>
              
            </li>
           <li class="">
              <a href=" "><i class="fa fa-circle-o"></i> Scheduling                
              </a>              
            </li>
           <li class="">
              <a href=" "><i class="fa fa-circle-o"></i> Payment            
              </a>              
            </li>
           
          </ul>
        </li>-->
<!--         <li>
          <a href="<?php echo base_url(); ?>admin/products_list">
             <span>Products</span>            
          </a>
        </li>-->
       
		  
		 
		 
		 
      <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             
            <li class="">
              <a href="<?php echo base_url(); ?>admin/destinations_list"><i class="fa fa-circle-o"></i> Destinations
                
              </a>
              
            </li>
           <li class="">
              <a href="<?php echo base_url(); ?>admin/users_list"><i class="fa fa-circle-o"></i> Users                
              </a>              
            </li>
           <li class="">
              <a href="<?php echo base_url(); ?>admin/type_list"><i class="fa fa-circle-o"></i> Provider's Types               
              </a>              
            </li>
           <li class="">
              <a href="<?php echo base_url(); ?>admin/categories_list"><i class="fa fa-circle-o"></i>Hotel's Categories                
              </a>              
            </li>
           <li class="">
              <a href="<?php echo base_url(); ?>admin/tags_list"><i class="fa fa-circle-o"></i>Client's Tags               
              </a>              
            </li>
           <li class="">
              <a href="<?php echo base_url(); ?>admin/meal_plan_list"><i class="fa fa-circle-o"></i>Products Meal Plan               
              </a>              
            </li>
           <li class="">
              <a href="<?php echo base_url(); ?>admin/tours_status_list"><i class="fa fa-circle-o"></i>Tours Status          
              </a>              
            </li>
          </ul>
        </li>
 
         
        
        
         
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>