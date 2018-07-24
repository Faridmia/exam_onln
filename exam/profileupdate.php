 <?php 
	$filepath = realpath(dirname(__FILE__));
	include_once 'lib/Session.php';
	Session::init();
	include_once ($filepath.'/classes/user.php');
	
	$update = new User();

	 if($_SERVER['REQUEST_METHOD'] == 'POST'){
	 	$userid = Session::get("u_id");
		$u_name     = $_POST['u_name'];
		$u_username = $_POST['u_username'];
		$u_email    = $_POST['u_email'];
		$userRegistration = $update->UpdateProfile($u_name,$u_username,$u_email,$userid);
	}

?>