 <?php 
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/classes/user.php');
	//include_once "classes/user.php";
	$usrlogin = new User();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$password = $_POST['u_password'];
		$email    = $_POST['u_email'];
		$userRegistration = $usrlogin->UserLogin($email,$password);
	}

?>