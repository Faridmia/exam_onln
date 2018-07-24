<?php include 'inc/header.php'; ?>
<div class="main">
<h1>Online Exam System - User Registration</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/regi.png"/>
	</div>
	<div class="segment">
	<form action="" method="post">
		<table>
		<tr>
           <td>Name</td>
           <td><input type="text" name="u_name" id="u_name"></td>
         </tr>
		<tr>
           <td>Username</td>
           <td><input name="u_username" type="text" id="u_username"></td>
         </tr>
         <tr>
           <td>Password</td>
           <td><input type="password" name="u_password" id="u_password"></td>
         </tr>
         
         <tr>
           <td>E-mail</td>
           <td><input name="u_email" type="text" id="u_email"></td>
         </tr>
         <tr>
           <td></td>
           <td><input type="submit" id="regSubmit" value="Signup">
           </td>
         </tr>
       </table>
	   </form>
	   <p>Already Registered ? <a href="index.php">Login</a> Here</p>
     <span id="success"></span>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>