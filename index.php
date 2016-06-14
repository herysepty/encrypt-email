<head>
<?php
error_reporting(0);
include ('proseslogin.php');

session_start();
if (isset($_SESSION['access_token'])) {
	header("location: home.php");
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tulis pesan | Enkripsi</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <style type="text/css">
        body{
            background-color: #2265b0;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:15%;">
			<?php// echo $notice; ?>
            <h3 class="text-center" style="margin-bottom:10px; color:#fff;"><i class="pe-7s-door-lock"></i> Aplikasi Enkripsi Email</h3>
            <p class="text-center" style="color:#fff; margin-bottom:40px;">Untuk masuk ke aplikasi silahkan masuk ke akun Gmail</p>
                <form role="form">
                    <fieldset>
                      <?php if(isset($loginUrl) || $authException) { ?>
						<!-- Change this to a button or input when using this as a form -->
						<a  href="<?php echo $loginUrl; ?>" class="btn btn-lg btn-success btn-block" style="background-color:#fff;"><span class="pe-7s-mail"></span> Masuk ke akun <font style="color:red;">G</font>Mail saya</a>
                      <?php } else { ?>
					  <?php echo $notice; ?>
					  <?php } ?>
					</fieldset>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>
    <script src="assets/js/chartist.min.js"></script>
    <script src="assets/js/bootstrap-notify.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script src="assets/js/light-bootstrap-dashboard.js"></script>
    <script src="assets/js/demo.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            demo.initChartist();
            $.notify({
                icon: 'pe-7s-gift',
                message: "Selamat datang di Enkripsi Email"
            },{
                type: 'info',
                timer: 4000
            });
        });
    </script>
    <!-- <script src="bootstrap/bower_components/summernote/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#message').summernote({
            height: 50,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['undo', ['undo']],
                ['redo', ['redo']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
    });
</script> -->
</body>
</body>

