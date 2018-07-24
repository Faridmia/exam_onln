<?php include 'inc/header.php'; ?>
<?php 
	Session::checkSession();
?><style type="text/css">
.starttest{width:590px;padding:20px;margin:0 auto;border:1px solid #ddd;}
.starttest h2 {
    font-size: 20px;
    border-bottom: 2px solid #ddd;
    margin-bottom: 10px;
    padding-bottom: 10px;
    text-align: center;
}
  .starttest p{}
  .starttest ul {
    margin: 0px;
    padding: 0px;
    list-style: none;
   
}
.starttest ul li{ padding-top: 5px;}
.starttest a {
    display: block;
    margin-top: 10px;
    border: 1px solid #ddd;
    background: #f4f4f4;
    text-decoration: none;
    text-align: center;
}
</style>
<div class="main">
<h1>You are Done......</h1>
<div class="starttest">
		<p>Congrats...! You have just completed the test..</p>
		<p>Final score:
			<?php if(isset($_SESSION['score'])){
				echo $_SESSION['score'];
				unset($_SESSION['score']);
			}
			?> 
		</p>
		<a href="viewans.php">View Answer</a>
		<a href="starttest.php">Start Aganin</a>
</div>	
	
</div>
<?php include 'inc/footer.php'; ?>