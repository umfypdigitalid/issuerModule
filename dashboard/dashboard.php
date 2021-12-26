<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin|DigitalID</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

</head>

<body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>AD</b>ID</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Admin</b>DigitalID</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">



                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="dist/img/avatar6.png" class="user-image" alt="User Image">
                                <span class="hidden-xs">
                                    <?php 
                  $username = $_GET['username'];
                  echo $username;
                  ?>

                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="dist/img/avatar6.png" class="img-circle" alt="User Image">
                                    <p>
                                        <?php
                    $host ="localhost";
                    $user = "root";
                    $passw = "";
                    $db = "digitalid";
                    $conn = new mysqli($host,$user,$passw,$db);
                               
                    if(mysqli_connect_error()){
                        die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
                        $ok = false;
                    }else{
                        $sql = "SELECT staff.fullname, department.name from staff,department where username = '".$username."' and department.departmentID = staff.departmentID";
                    
                        $result = mysqli_query($conn, $sql);  
                        $count = mysqli_num_rows($result);
                    
                        if(($count)==1){
                            //$row = mysqli_fetch_assoc($result);
                            //$hash = $row['password'];
  
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            echo  $row["fullname"]; 
                            echo "<small><br>".$row["name"]. "</small>";
                       
                          
                        }
                            else{
                                echo "no result";                         
                                exit();
                            }    
          
                          }
                          $conn->close();
                    
                    ?>

                                    </p>
                                </li>

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="dist/img/avatar6.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>
                            <?php
                $username = $_GET['username'];
                  echo $username;
                  ?>
                        </p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                    class="fa fa-search"></i></button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i
                                class="fa fa-angle-left pull-right"></i>
                        </a>

                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                            <span>Digital ID registration</span>
                            <span class="label fa fa-angle-left pull-right">4</span>
                        </a>
                        <ul class="treeview-menu">

                            <li><a
                                    href="../dashboard/tables/table1_pending.php?username=<?php echo $username=$_GET['username'];?>"><i
                                        class="fa fa-circle-o"></i> Pending</a></li>
                            <li><a href="tables/table2_approved.php?username=<?php echo $username=$_GET['username'];?>"><i class="fa fa-circle-o"></i> Approved</a></li>
                            <li><a href="tables/table3_rejected.php?username=<?php echo $username=$_GET['username'];?>"><i class="fa fa-circle-o"></i> Rejected</a></li>
                        </ul>
                    </li>
                    <li>
                        </a>
                    </li>


                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-files-o"></i> <span>Report on missing/stolen</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="tables/table4_report.php?username=<?php echo $username=$_GET['username'];?>"><i class="fa fa-circle-o"></i> Missing/stolen</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-comments-o "></i> <span>Feedback/Complaint</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="tables/table5_feedback.php?username=<?php echo $username=$_GET['username'];?>"><i class="fa fa-circle-o"></i> Feedback and complaints</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="pages/mailbox/mailbox.html">
                            <i class="fa fa-envelope"></i> <span>Mailbox</span>
                            <small class="label pull-right bg-yellow">12</small>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>
                            <?php  
                                $host ="localhost";
                                $user = "root";
                                $passw = "";
                                $db = "digitalid";
                                $conn = new mysqli($host,$user,$passw,$db);
                                           
                                if(mysqli_connect_error()){
                                    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
                                    $ok = false;
                                }else{
                                    $sql = "SELECT COUNT(userID) as total from userapplication where applicationstatus='Verifying'";
                                
                                    $result = mysqli_query($conn, $sql);  
                         
                                
                                    if($result == true){
                                     
                                       $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                        echo $data['total'];                 
                                      
                                    }
                                        else{
                                            echo "no result";                         
                                            exit();
                                        }    
                      
                                      }
                                      $conn->close();
     
                                ?></h3>
                                <p>Users pending</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>
                                <?php  
                                $host ="localhost";
                                $user = "root";
                                $passw = "";
                                $db = "digitalid";
                                $conn = new mysqli($host,$user,$passw,$db);
                                           
                                if(mysqli_connect_error()){
                                    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
                                    $ok = false;
                                }else{
                                    $sql = "SELECT COUNT(userID) as total from userapplication where applicationstatus='Verified'";
                                
                                    $result = mysqli_query($conn, $sql);  
                         
                                
                                    if($result == true){
                                     
                                       $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                        echo $data['total'];                 
                                      
                                    }
                                        else{
                                            echo "no result";                         
                                            exit();
                                        }    
                      
                                      }
                                      $conn->close();
     
                                ?>
                                </h3>
                                <p>Users Verified</p>
                            </div>
                            <div class="icon">
                                <i class="ion-checkmark-circled"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>
                                <?php  
                                $host ="localhost";
                                $user = "root";
                                $passw = "";
                                $db = "digitalid";
                                $conn = new mysqli($host,$user,$passw,$db);
                                           
                                if(mysqli_connect_error()){
                                    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
                                    $ok = false;
                                }else{
                                    $sql = "SELECT COUNT(userID) as total from userapplication where applicationstatus='Unverified'";
                                
                                    $result = mysqli_query($conn, $sql);  
                         
                                
                                    if($result == true){
                                     
                                       $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                        echo $data['total'];                 
                                      
                                    }
                                        else{
                                            echo "no result";                         
                                            exit();
                                        }    
                      
                                      }
                                      $conn->close();
     
                                ?>
                                </h3>
                                <p>Users rejected</p>
                            </div>
                            <div class="icon">
                                <i class="ion-close-circled"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>
                                <?php  
                                $host ="localhost";
                                $user = "root";
                                $passw = "";
                                $db = "digitalid";
                                $conn = new mysqli($host,$user,$passw,$db);
                                           
                                if(mysqli_connect_error()){
                                    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
                                    $ok = false;
                                }else{
                                    $sql = "SELECT COUNT(userID) as total from userapplication";
                                
                                    $result = mysqli_query($conn, $sql);  
                         
                                
                                    if($result == true){
                                     
                                       $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                        echo $data['total'];                 
                                      
                                    }
                                        else{
                                            echo "no result";                         
                                            exit();
                                        }    
                      
                                      }
                                      $conn->close();
     
                                ?>
                                
                                </h3>
                                <p>Total application</p>
                            </div>
                            <div class="icon">
                                <i class="ion-arrow-graph-up-right"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div><!-- ./col -->
                </div><!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-7 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="nav-tabs-custom">
                            <!-- Tabs within a box -->
                            <ul class="nav nav-tabs pull-right">
                                <li class="pull-left header"><i class="fa fa-inbox"></i> Announcement</li>                           
                            </ul>

                        </div><!-- /.nav-tabs-custom -->


                    </section><!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-5 connectedSortable">



                        <!-- Calendar -->
                        <div class="box box-solid bg-green-gradient">
                            <div class="box-header">
                                <i class="fa fa-calendar"></i>
                                <h3 class="box-title">Calendar</h3>
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                    <!-- button with a dropdown -->
                                    <div class="btn-group">
                                        <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><i
                                                class="fa fa-bars"></i></button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li><a href="#">Add new event</a></li>
                                            <li><a href="#">Clear events</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">View calendar</a></li>
                                        </ul>
                                    </div>
                                    <button class="btn btn-success btn-sm" data-widget="collapse"><i
                                            class="fa fa-minus"></i></button>
                                    <button class="btn btn-success btn-sm" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                                </div><!-- /. tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body no-padding">
                                <!--The calendar -->
                                <div id="calendar" style="width: 100%"></div>
                            </div><!-- /.box-body -->
                    </section><!-- right col -->
                </div><!-- /.row (main row) -->

            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>FYPDigitalID</strong>
        </footer>


        <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="plugins/sparkline/jquery.sparkline.min.js"></script>

    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
->
    <script src="plugins/knob/jquery.knob.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>

    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
 
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>>
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <script src="dist/js/app.min.js"></script>
    <script src="dist/js/pages/dashboard.js"></script>


    <script src="dist/js/demo.js"></script>
</body>

</html>