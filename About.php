<?php
include ("proseslogin.php");
error_reporting(0);
session_start();
if (!isset($_SESSION['access_token'])) {
    
    header("location: index.php");
}
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mail Crypto</title>

    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bootstrap/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="bootstrap/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="bootstrap/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="bootstrap/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bootstrap/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $_SERVER['PHP_SELF'];?>">Mail Crypto</a>
				
        
            <!-- /.navbar-header -->
             
            <ul class="nav navbar-top-links navbar-right">
			
				<?php #if (isset($_SESSION['access_token'])) {?>
					<li><a href="?logout"><i class="fa fa-fw fa-power-off"></i>Logout</a></li>
					
                <?php#} else { ?>
					
				<?php #}?>
				
				
            </ul>
			
			
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="writeemail.php"><i class="fa fa-sign-out"></i>  Write </a>
                        </li>
                        <li>
                            <a href="inboxemail3.php"><i class="fa fa-sign-in"></i>  Inbox</a>
                        </li>
                        <li>
                            <a href="help.php"><i class="fa fa-warning"></i>  Help</a>
                        </li>
                        <li>
                            <a href="about.php"><i class="fa fa-wrench fa-fw"></i>  About</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
				<?php echo $notice; ?>
                    <h3 class="page-header">About</h3>
                </div>			       
            </div>
            <!-- /.row -->
				
				<div class="panel-body">
                           <div class="header">
                                </div>
                                        <p>
										Mail Crypto adalah aplikasi pengamanan mail. Aplikasi ini dibuat untuk digunakan di PT. Optima Karir Konsultama. <br><br><br><br>
										Created by Selvy Megira<br>Universitas Budi Luhur
                                         </p>
                </div>
            </div>    
    <!-- jQuery -->
    <script src="bootstrap/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bootstrap/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="bootstrap/bower_components/raphael/raphael-min.js"></script>
    <script src="bootstrap/bower_components/morrisjs/morris.min.js"></script>
    <script src="bootstrap/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="bootstrap/dist/js/sb-admin-2.js"></script>

</body>

</html>
