 <?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/classes/user.php');
include_once "classes/user.php";
	$usrreg = new User();
	 if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$u_name     = $_POST['u_name'];
		$u_username = $_POST['u_username'];
		$u_password = $_POST['u_password'];
		$u_email    = $_POST['u_email'];
		$userRegistration = $usrreg->UserRegistration($u_name,$u_username,$u_email,$u_password);
	}

?>