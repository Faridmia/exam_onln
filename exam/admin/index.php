<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
?>
<?php
  // Session::checkLogin();
?>
<style type="text/css">
	
	.adminpanel{
    width:500px;
    color:#999;
    margin:30px auto 0;
    padding:80px;
    border:1px solid #ddd;
    }
</style>
<div class="main">
<h1>Admin Panel</h1>
<div class="adminpanel">
	<h2>Welcome to control admin panel</h2>
	<p>you can manage your user and online exam system from here...........</p>
</div>



	
</div>
<?php include 'inc/footer.php'; ?>