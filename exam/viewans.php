<?php include 'inc/header.php'; ?>
<?php 
	Session::checkSession();
	$total = $exmonline->getTotalRows();

	

?>
<div class="main">
<h1>All Question and Ans: <?php echo $total; ?></h1>
	<div class="test">
		<?php 
			$getQuestion = $exmonline->getQueByOrder();
			if($getQuestion){
				while($question = $getQuestion->fetch_assoc()){


		?> 
		<table>
		
			<tr>
				<td colspan="2">
				 <h3>Que <?php echo $question['q_no']; ?>: <?php echo $question['question']; ?></h3>
				</td>
			</tr>
			<?php 
				$number = $question['q_no'];
				$answer = $exmonline->getAnswer($number);
				if($answer){
					while($result = $answer->fetch_assoc()){


			?>
			<tr>
				<td>
				 <input type="radio"
				 <?php 
				 	if($result['rightans'] == '1') {?> checked <?php } ?>/>
				 <?php 
				 	if($result['rightans'] == '1'){ 
				 		 echo "<span style='color:blue;'>".$result['answer']."</span>"; 
				 		
				    }else{
				 		echo $result['answer'];
				 	}
				 ?>
				</td>
			</tr>
		<?php }} ?>
			
			
		</table>
		<?php }} ?>
</div>
 </div>
<?php include 'inc/footer.php'; ?>