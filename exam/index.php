<?php include 'inc/header.php'; ?>
<?php 
	Session::checkLogin();
?>
<div class="main">
<h1>Online Exam System - User Login</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/test.png"/>
	</div>
	<div class="segment">
	<form action="" method="post">
		<table class="tbl">    
			 <tr>
			   <td>E-mail</td>
			   <td><input name="u_email" type="text" id="u_email"></td>
			 </tr>
			 <tr>
			   <td>Password </td>
			   <td><input name="u_password" type="password" id="u_password"></td>
			 </tr>
			 
			  <tr>
			  <td></td>
			   <td><input type="submit" id="loginsubmit" value="Login">
			   </td>
			 </tr>
       </table>
	   </form>
	   <p>New User ? <a href="register.php">Signup</a> Free</p>
	   <span class="empty" style="display: none;">Field must not be empty</span>
	   <span class="error" style="display: none;">E-mail or password doesn't match..!</span>
	   <span class="disable" style="display: none;">user id disable</span>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>