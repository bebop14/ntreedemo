<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Activiti Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="./assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="./assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="./assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="./assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Activiti Rest Demo</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="process_definition.php">Process Definition List</a></li>
              <li><a href="process_definition_form.php">Process Definition Form</a></li>
              <li class="active"><a href="start_process.php">Start Process</a></li>
              <li><a href="query_task.php">Query Task</a></li>
              <li><a href="query_task_form.php">Query Task Form</a></li>
              <li><a href="perform_task.php">Perform Task</a></li>
              <li><a href="rate_service.php">Rate Service</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
<?php
$process_definition_id = $_POST["process_definition_id"];
$requester = $_POST["requester"];
$assignee = $_POST["assignee"];
$createAccount = $_POST["createAccount"] == "on" ? "true" : "false";
$createAccountList = $_POST["createAccountList"];
$createAccountReason = $_POST["createAccountReason"];

$arr = array('processDefinitionId' => $process_definition_id,
			 'requester' => $requester,
			 'assignee' => $assignee,
			 'createAccount' => $createAccount,
			 'createAccountList' => $createAccountList,
			 'createAccountReason' => $createAccountReason);

$curl = "POST http://localhost:8080/activiti-rest/service/process-instance";
$ch = curl_init("http://localhost:8080/activiti-rest/service/process-instance");
curl_setopt($ch, CURLOPT_FILE, fopen('php://stdout', 'w')); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC ) ; 
curl_setopt($ch, CURLOPT_USERPWD, "kermit:kermit"); 
curl_setopt($ch, CURLOPT_USERPWD, "kermit:kermit"); 
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arr));

$output = curl_exec($ch);
curl_close($ch);
$output = json_decode($output);
?>

    <div class="container">

      <h1>Activiti Rest Demo</h1>
	  <h4><?php echo($curl) ?></h4>
	  <pre><code><?php var_dump(json_encode($arr)); ?></code></pre>
	  <br>

	  <pre><code><?php var_dump($output); ?></code></pre>


    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/bootstrap-transition.js"></script>
    <script src="./assets/js/bootstrap-alert.js"></script>
    <script src="./assets/js/bootstrap-modal.js"></script>
    <script src="./assets/js/bootstrap-dropdown.js"></script>
    <script src="./assets/js/bootstrap-scrollspy.js"></script>
    <script src="./assets/js/bootstrap-tab.js"></script>
    <script src="./assets/js/bootstrap-tooltip.js"></script>
    <script src="./assets/js/bootstrap-popover.js"></script>
    <script src="./assets/js/bootstrap-button.js"></script>
    <script src="./assets/js/bootstrap-collapse.js"></script>
    <script src="./assets/js/bootstrap-carousel.js"></script>
    <script src="./assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>
