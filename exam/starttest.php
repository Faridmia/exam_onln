<?php include 'inc/header.php'; ?>
<?php 
	Session::checkSession();
	$ques = $exmonline->getQuestion();
	$total = $exmonline->getTotalRows();
?>
<style type="text/css">
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
	
		<h1>Welcome to Online Exam - Start Now</h1>
	<div class="starttest">
		<h2>Test Your knowledge</h2>
		<p>This is multiple choise quiz to test your knowledge</p>
		<ul>
			<li><strong>Number of Question:</strong><?php echo $total; ?></li>
			<li><strong>Question Type:</strong>Multiple Choise</li>
		</ul>
		<a href="test.php?ques=<?php echo $ques['q_no'];?>">Test Exam</a>
	</div>
	
	
</div>
<?php include 'inc/footer.php'; ?>