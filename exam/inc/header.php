<?php
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: pre-check=0, post-check=0, max-age=0"); 
header("Pragma: no-cache"); 
header("Expires: Mon, 6 Dec 1977 00:00:00 GMT"); 
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
?>
<?php 
	//$filepath = realpath(dirname(__FILE__));
	include_once 'lib/Session.php';
	Session::init();
	include_once 'lib/Database.php';
	include_once 'helpers/Format.php';
	spl_autoload_register(function($classes){
		include_once "classes/".$classes.".php";

	}); 
	 require_once "classes/exam.php";

	$db        = new Database();
	$fm        = new Format();
	$usr       = new User();
	$exmonline = new Examonline();
	$pro       = new Process();
?>
<?php 
		if(isset($_GET['action']) && $_GET['action'] == 'logout'){
			Session::destroy();
			header("Refresh:2;url=index.php");
			exit();

		}
	?>
<!doctype html>
<html>
<head>
	<title>Online Exam System</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="no-cache">
	<meta http-equiv="Expires" content="-1">
	<meta http-equiv="Cache-Control" content="no-cache">
	<link rel="stylesheet" href="css/main.css">
	<script src="js/jquery.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="js/main.js"></script>
	<style type="text/css">
		.error,.disable,.empty{
  color:red;
}
	</style>
</head>
<body>

<div class="phpcoding">
	<section class="headeroption"></section>
		<section class="maincontent">
		<div class="menu">
		<ul>
		<?php 
			$login = Session::get("login");
			if($login == true){
		?>
			<li><a href="exam.php">Exam</a></li>
			
			<li><a href="profile.php">Profile</a></li>
			<li><a href="?action=logout">Logout</a></li>
		<?php } else{ ?>
			<li><a href="register.php">Register</a></li>
			<li><a href="index.php">Login</a></li>
		<?php } ?>
			
			
		</ul>
		<?php 
			$login = Session::get("login");
			if($login == true){
		?>
		<span style="float: right;color:#888;">Welcome <?php echo Session::get("u_name"); ?>
		<?php } ?>
			
		</span>
		</div>
	