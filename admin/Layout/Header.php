<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

     <!-- Bootstrap Core CSS -->
     <link href="Assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="Assets/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="Assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="Assets/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Font awesome 5 -->
    <link href="Assets/fonts/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">

    <!-- custom style -->
    <link href="Assets/css/ui.css" rel="stylesheet" type="text/css"/>
    <link href="Assets/css/responsive.css.map" rel="stylesheet" type="text/css" />

    <!-- STYLE.CSS -->
    <link href="Assets/css/style.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">William PT Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown" style="position: relative; z-index: 10;">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                        <?=isset($_SESSION['ADMIN'])?'ADMIN':''?>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <?php

                        
                    ?>
                    <li class="
                        <?php
                            if(isset($_GET['page']) && $_GET['page'] == 'admin'){
                                echo 'active';
                            }
                        ?>  
                    ">
                        <a href="index.php?page=admin"><i class="fa fa-fw fa-dashboard"></i> Dashboard
                           
                        </a>
                    </li>
                    <li class="<?php
                            if(isset($_GET['page']) && $_GET['page'] == 'categorylist'){
                                echo 'active';
                            }
                        ?>  ">
                        <a href="index.php?page=categorylist"><i class="fa fa-fw fa-bar-chart-o"></i> Quản lý danh mục
                           
                        </a>
                    </li>
                    <li class="<?php
                            if(isset($_GET['page']) && $_GET['page'] == 'product'){
                                echo 'active';
                            }
                        ?>  ">
                        <a href="index.php?page=product"><i class="fa fa-fw fa-table"></i> Quản lý sản phẩm</a>
                    </li>
                    <li class="<?php
                            if(isset($_GET['page']) && $_GET['page'] == 'user'){
                                echo 'active';
                            }
                        ?>  ">
                        <a href="index.php?page=user"><i class="fa fa-fw fa-edit"></i> Quản lý người dùng</a>
                    </li>
                    <li class="<?php
                            if(isset($_GET['page']) && $_GET['page'] == 'order'){
                                echo 'active';
                            }
                        ?>  ">
                        <a href="index.php?page=order"><i class="fa fa-fw fa-desktop"></i> Quản lý hóa đơn</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php
                                $page ='';
                                if(isset($_GET['page'])){
                                    $page = $_GET['page'];
                                }

                                switch ($page){
                                    case 'admin':
                                        echo "Dashboard";
                                        break;

                                    case 'categorylist':
                                        echo "Category";
                                        break;
                                    
                                    case 'product':
                                        echo "Product ";
                                       
                                        if(isset($_GET['catid'])){
                                            switch ($_GET['catid']){
                                                case 1:
                                                    echo "Clothes";
                                                    break;

                                                case 2:
                                                    echo "Electronics";
                                                    break;

                                                case 3:
                                                    echo "Accessory";
                                                    break;
                                                
                                                case 4:
                                                    echo "Inventory";
                                                    break;

                                                case 5:
                                                    echo "Iphone";
                                                    break;
                                            }
                                            
                                        }
                                        break;

                                    case 'user':
                                        echo "User";
                                        break;

                                    case 'order':
                                        echo "Order";
                                        break;
                                    
                                    case 'insertcategory':
                                        echo"Category Add New";
                                        break;
                                    
                                    case 'userdetail':
                                        echo "User Detail";
                                        break;
          
                                    default:
                                        echo "Dashboard";
                                        break;
                                }
                                
                                
                            ?>
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
