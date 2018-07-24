<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
	class Admin{
		private $db;
		private $fm;

		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();

		}

		public function getAdminData($data){
			$adminuser = $this->fm->validation($data['a_user']);
			$adminpass = $this->fm->validation(md5($data['a_pass']));
			$errors = array();

			if(isset($adminuser,$adminpass)){
				if(empty($adminuser) && empty($adminpass)){
					$errors[] = "All field are required";
				}
				else{
					if(empty($adminuser)){
						$errors[] = "Username field are required";

					}
					if(empty($adminpass)){
						$errors[] = "Password field are required";

					}
					if(!empty($errors)){
						foreach($errors as $error){
							return $error;
						}
					}
					else{
						$query = "SELECT * FROM admin WHERE a_user = '$adminuser' AND a_pass = '$adminpass'";
						$result = $this->db->select($query);
						if($result != false){
							$value = $result->fetch_assoc();
							Session::set("adminlogin", true);
							Session::set("adminuser", $value['a_user']);
							Session::set("adminId", $value['a_id']);
							header("Refresh:2; url=index.php");
							exit();
						}
						else{
							$msg = "<span class='error'>Username or password doesn't match...!</span>";

							return $msg;
						}
					}
				}
			}
		}
	}

?>