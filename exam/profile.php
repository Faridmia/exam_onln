<?php include 'inc/header.php'; ?>
<?php 
	Session::checkSession();
	$userId = Session::get("u_id");
	$getData = $usr->ReceiveData($userId);
?>
<style type="text/css">
	.profile{
		width: 530px;
		margin:0 auto;
		border:1px solid #ddd;
		padding:50px;
		padding-top: 30px;
	}
</style>
<div class="main">
<h1>User Profile</h1>
<div class="profile">
	<form action="" method="post">
		<?php 
			if($getData){
				$result = $getData->fetch_assoc();
		?>
		<table class="tbl">    
			 <tr>
			   <td>Name</td>
			   <td><input name="u_name" type="text" value="<?php echo $result['u_name']; ?>" id="u_name"></td>
			 </tr>
			 <tr>
			   <td>Username</td>
			   <td><input name="u_username"  type="text" value="<?php echo $result['u_username']; ?>" id="u_username"></td>
			 </tr>
			 <tr>
			   <td>E-mail</td>
			   <td><input name="u_email" type="text" value="<?php echo $result['u_email']; ?>" id="u_email"></td>
			 </tr>
			  <tr>
			  <td></td>
			   <td><input type="submit" id="updateprofile" value="Update">
			   </td>
			 </tr>
       </table>
       <?php } ?>
	   </form>
	   <span id="success"></span>
	 </div>
	 
</div>
<?php include 'inc/footer.php'; ?>