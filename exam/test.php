<?php include 'inc/header.php'; ?>
<?php 
	Session::checkSession();
	if(isset($_GET['ques'])){
		$number = (int) $_GET['ques'];
	}
	else
	{
		echo "<script>window.location = 'exam.php'</script>";
	}
	$total = $exmonline->getTotalRows();
	$question1 = $exmonline->getQuestionByid($number);

?>
<?php 
	 if($_SERVER['REQUEST_METHOD'] == 'POST'){
	 	$process = $pro->ProcessData($_POST);
	 }
?>
<div class="main">
<h1>Question <?php echo $question1['q_no']; ?> to <?php echo $total; ?></h1>
	<div class="test">
		<form method="post" action="">
		<table> 
			<tr>
				<td colspan="2">
				 <h3>Que <?php echo $question1['q_no']; ?>: <?php echo $question1['question']; ?></h3>
				</td>
			</tr>
			<?php 
				$answer = $exmonline->getAnswer($number);
				if($answer){
					while($result1 = $answer->fetch_assoc()){


			?>
			<tr>
				<td>
				 <input type="radio" name="ans" value="<?php echo $result1['ans_id'];?>" /><?php echo $result1['answer'];?>
				</td>
			</tr>
		<?php }} ?>
			<tr>
			  <td>
				<input type="submit" name="submit" value="Next Question"/>
				<input type="hidden" name="number" value="<?php echo $number;?>" />
			</td>
			</tr>
			
		</table>
	</form>
</div>
 </div>
<?php include 'inc/footer.php'; ?>