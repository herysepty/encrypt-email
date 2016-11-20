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
    <title>Enkripsi AES</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <link href="assets/css/demo.css" rel="stylesheet" />
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <style>
      iframe {
        width: 100%;
        border: 0;
        min-height: 80%;
        height: 600px;
        display: flex;
      }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">
    <!--
        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag
    -->
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="<?php echo $_SERVER['PHP_SELF'];?>" class="simple-text">
                    Enkripsi Aes 128
                </a>
            </div>
            <ul class="nav">
                <li class="active">
                    <a href="writeemail.php">
                        <i class="pe-7s-pen"></i>
                        <p>Tulis Email</p>
                    </a>
                </li>
                <li>
                    <a href="inboxemail3.php">
                        <i class="pe-7s-mail"></i>
                        <p>Pesan Masuk</p>
                    </a>
                </li>
                <li>
                    <a href="help.php">
                        <i class="pe-7s-note2"></i>
                        <p>Bantuan</p>
                    </a>
                </li>
                <li class="active-pro">
                    <a href="about.php">
                        <i class="pe-7s-rocket"></i>
                        <p>Tentang aplikasi</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>
    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><i class="pe-7s-mail"></i> Pesan Masuk</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    Dropdown
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li>
                        <li>
                            <li><a href="?logout"><i class="fa fa-fw fa-power-off"></i>Logout</a></li>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
	                <div class="card">
		                <div class="header">
	                        <h4 class="title"><i class="pe-7s-mail"></i> Pesan Masuk</h4>
	                        <p class="category">Dafatar pesan masuk</p>
	                    </div>
	                    <div class="content table-responsive table-full-width">
		                    <button id="authorize-button" class="btn btn-primary hidden">Authorize</button>
					      <table class="table table-striped table-hover table-inbox hidden">
					        <thead>
					          <tr>
					            <th>From</th>
					            <th>Subject</th>
					            <th>Date/Time</th>
					          </tr>
					        </thead>
					        <tbody></tbody>
					      </table>
					    </div>
				    </div>
                </div>
            </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="inboxemail3.php">
                                Pesan Masuk
                            </a>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; 2016 <a href="http://herysepty.cf">Enkripsi Email</a> @hs
                </p>
            </div>
        </footer>
    </div>
</div>

    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>
    <!-- <script src="assets/js/chartist.min.js"></script> -->
    <script src="assets/js/bootstrap-notify.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script src="assets/js/light-bootstrap-dashboard.js"></script>
    <script src="assets/js/demo.js"></script>
    <script type="text/javascript">
    	$(document).ready(function(){
        	demo.initChartist();
          $.notify({
          icon: 'pe-7s-gift',
          message: "Selamat datang di Enkripsi Gmail"
          },{
          type: 'info',
          timer: 4000
          });
    	});
	</script>
	<script type="text/javascript">
      var clientId = '504799605278-53mp1pf95q3pls969akpoeqh9o64ln8n.apps.googleusercontent.com';
      var apiKey = 'AIzaSyCxb13fKEE1irLRLL66dHMz6SQ42AZ5Ons';
      var scopes = 'https://www.googleapis.com/auth/gmail.modify';
	  //'https://www.googleapis.com/auth/gmail.readonly';
      function handleClientLoad() {
        gapi.client.setApiKey(apiKey);
        window.setTimeout(checkAuth, 1);
      }
      function checkAuth() {
        gapi.auth.authorize({
          client_id: clientId,
          scope: scopes,
          immediate: true
        }, handleAuthResult);
      }
      function handleAuthClick() {
        gapi.auth.authorize({
          client_id: clientId,
          scope: scopes,
          immediate: false
        }, handleAuthResult);
        return false;
      }
      function handleAuthResult(authResult) {
        if(authResult && !authResult.error) {
          loadGmailApi();
          $('#authorize-button').remove();
          $('.table-inbox').removeClass("hidden");
        } else {
          $('#authorize-button').removeClass("hidden");
          $('#authorize-button').on('click', function(){
            handleAuthClick();
          });
        }
      }
      function loadGmailApi() {
        gapi.client.load('gmail', 'v1', displayInbox);
      }
      function displayInbox() {
        var request = gapi.client.gmail.users.messages.list({
          'userId': 'me',
          'labelIds': 'INBOX',
		  'labelIds':'CATEGORY_PERSONAL',
          'MaxResults': 50
        });
        request.execute(function(response) {
          $.each(response.messages, function() {
            var messageRequest = gapi.client.gmail.users.messages.get({
              'userId': 'me',
              'id': this.id
            });

            messageRequest.execute(appendMessageRow);
          });
        });
      }
    // <td>\
    //           <a href="#message-modal-' + message.id +
    //             '" data-toggle="modal" id="message-link-' + message.id+'">' +
    //             getHeader(message.payload.headers, 'Subject') +
    //           '</a>\
    //         </td>\
      function appendMessageRow(message) {
        $('.table-inbox tbody').append(
          '<tr>\
            <td>'+getHeader(message.payload.headers, 'From')+'</td>\
            <td>\
              <a href="#message-modal-key' + message.id +
                '" data-toggle="modal" id="message-link-key' + message.id+'">' +
                getHeader(message.payload.headers, 'Subject') +
              '</a>\
            </td>\
            <td>'+getHeader(message.payload.headers, 'Date')+'</td>\
          </tr>'
        );
        $('body').append(
          '<div class="modal fade" id="message-modal-' + message.id +
              '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">\
            <div class="modal-dialog modal-lg">\
              <div class="modal-content">\
                <div class="modal-header">\
                  <button type="button"\
                          class="close"\
                          data-dismiss="modal"\
                          aria-label="Close">\
                    <span aria-hidden="true">&times;</span></button>\
                  <h4 class="modal-title" id="myModalLabel">' +
                    getHeader(message.payload.headers, 'Subject') +
                  '</h4>\
                </div>\
                <div class="modal-body">\
                  <iframe id="message-iframe-'+message.id+'" srcdoc="<p>Loading...</p>">\
                  </iframe>\
                </div>\
              </div>\
            </div>\
          </div>'
        );
        // HS
        $('body').append(
          '<div class="modal fade" id="message-modal-key'+ message.id +
              '" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">\
            <div class="modal-dialog modal-lg">\
              <div class="modal-content">\
                <div class="modal-header">\
                  <button type="button"\
                          class="close"\
                          data-dismiss="modal"\
                          aria-label="Close">\
                    <span aria-hidden="true">&times;</span></button>\
                  <h4 class="modal-title" id="myModalLabel">Pesan Masuk</h4>\
                </div>\
                <div class="modal-body">\
                <h5> Subjek : ' +
                    getHeader(message.payload.headers, 'Subject') +
                '</h5>\
                <input type="text" class="form-control" name="key_decrypt" id="key_decrypt">\
                <button type="button" class="btn btn-info btn-fill pull-right" id="btn_decrypt_'+message.id+'">Dekrip sms</button>\
                <h5 style="border-bottom:1px;">Isi Pesan:</h5>\
                  <iframe id="message-iframe-key'+message.id+'" srcdoc="<p>Loading...</p>">\
                  </iframe>\
                </div>\
              </div>\
            </div>\
          </div>'
          );
        // HS
        $('#message-link-key'+message.id).on('click', function(){
            var ifrmKey     = $('#message-iframe-key'+message.id)[0].contentWindow.document;
            var subject  =getHeader(message.payload.headers, 'Subject');
            var Isipesan =getBody(message.payload);
            var replace  = Isipesan.replace(" ","+");
            // $('body', ifrmKey).html(Isipesan);
        });
        $('[data-dismiss=modal]').click(function () {
            var ifrmKey     = $('#message-iframe-key'+message.id)[0].contentWindow.document;
            $('#key_decrypt').val("");
            $('body', ifrmKey).html("");

        });
        $('#btn_decrypt_'+message.id).click(function(){
            var ifrmKey     = $('#message-iframe-key'+message.id)[0].contentWindow.document;
            var subject  =getHeader(message.payload.headers, 'Subject');
            var Isipesan =getBody(message.payload);
            var key = $('#key_decrypt').val();
            var replace  = Isipesan.replace(" ","+");
             // $('#message-iframe-key-'+message.id).modal('hide'); 
             $.ajax({
                url:'ajax.php',
                data:'action=dekripsi&key='+key+'&text='+Isipesan,
                type:'post',
                success:function(php){
                  //alert(php);
                  $('body', ifrmKey).html(php);
                  
                },
              });
        });


        $('#message-link-'+message.id).on('click', function(){
          var ifrm     = $('#message-iframe-'+message.id)[0].contentWindow.document;
          var subject  =getHeader(message.payload.headers, 'Subject');
          var Isipesan =getBody(message.payload);
          var replace  = Isipesan.replace(" ","+");
    		  
          pesan = subject.length;
    		  if(pesan!=0){			  
    			$.ajax({
    			  url:'ajax.php',
    			  data:'action=dekripsi&key='+subject+'&text='+Isipesan,
    			  type:'post',
    			  success:function(php){
    				  //alert(php);
    				  $('body', ifrm).html(php);
    				  
    			  },
    			  //$('body', ifrm).html(Isipesan);
    		  });
    		  } else {
    			   $('body', ifrm).html(Isipesan);
    		  } 
    		  //$('body', ifrm).html(getBody(message.payload));
        });
      }
      function getHeader(headers, index) {
        var header = '';

        $.each(headers, function(){
          if(this.name === index){
            header = this.value;
          }
        });
        return header;
      }
      function getBody(message) {
        var encodedBody = '';
        if(typeof message.parts === 'undefined')
        {
          encodedBody = message.body.data;
        }
        else
        {
          encodedBody = getHTMLPart(message.parts);
        }
        encodedBody = encodedBody.replace(/-/g, '+').replace(/_/g, '/').replace(/\s/g, '');
        var xxx= decodeURIComponent(escape(window.atob(encodedBody)));
		//return decodeURIComponent(escape(window.atob(encodedBody)));
		return xxx ;
      }
      function getHTMLPart(arr) {
        for(var x = 0; x <= arr.length; x++)
        {
          if(typeof arr[x].parts === 'undefined')
          {
            if(arr[x].mimeType === 'text/html')
            {
              return arr[x].body.data;
            }
          }
          else
          {
            return getHTMLPart(arr[x].parts);
          }
        }
        return '';
      }
    </script>
    <script src="https://apis.google.com/js/client.js?onload=handleClientLoad"></script>
  </body>

