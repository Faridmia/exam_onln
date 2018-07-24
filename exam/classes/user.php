<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
	class User{
		private $db;
		private $fm;

		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();

		}

		public function getAdminData($data){
			$adminuser = $this->fm->validation($data['a_user']);
			$adminpass = $this->fm->validation(md5($data['a_pass']));
			
		}

		public function getAlluser(){
			$query = "SELECT * FROM tbl_user";
			$result = $this->db->select($query);
			return $result;
		}

		public function DisableUser($userid){
			$userid = $this->fm->validation($userid);
			$query = "UPDATE tbl_user SET u_status = '1' WHERE u_id = '$userid'";
			$result = $this->db->update($query);
			if($result){
				$msg = "<span class='success'>User Disable..!</span>";
				return $msg;
			}
			else{
				$msg = "<span class='error'>User Not Disable..!</span>";
				return $msg;
			}
			

		}

		public function enableUser($eblid){
			$eblid = $this->fm->validation($eblid);
			$query = "UPDATE tbl_user SET u_status = '0' WHERE u_id = '$eblid'";
			$result = $this->db->update($query);
			if($result){
				$msg = "<span class='success'>User Enable..!</span>";
				return $msg;
			}
			else{
				$msg = "<span class='error'>User Not Enable..!</span>";
				return $msg;
			}

		}

		public function deleteuser($delId){
			$delId = $this->fm->validation($delId);
			$query = "DELETE FROM tbl_user WHERE u_id = '$delId'";
			$result = $this->db->delete($query);
			if($result){
				$msg = "<span class='success'>User Deleted ..!</span>";
				return $msg;
			}
			else{
				$msg = "<span class='error'>User Not Delete..!</span>";
				return $msg;
			}
		}

		public function UserRegistration($name,$username,$email,$password){
			$name     = $this->fm->validation($name);
			$username = $this->fm->validation($username);
			$email    = $this->fm->validation($email);
			$password = $this->fm->validation($password);

			
			
			

			$errors = array();
			

			if(isset($name,$username,$email,$password)){
				
				if(empty($name) && empty($username) && empty($email) && empty($password)){
					//$errors[] = "All field are required";
				}
				else{
					if(empty($name)){
						$errors[] = "u_name field are required<br/>";

					}
					if(empty($username)){
						$errors[] = "u_username field are required<br/>";

					}
					if(empty($email)){
						$errors[] = "u_email field are required<br/>";

					}
					elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
						$errors[] = "Invalid email format<br/>";
					}
					if(empty($password)){
						$errors[] = "u_password field are required<br/>";

					}
					if(!empty($errors)){
						foreach($errors as $error){
							echo $error;
							//exit();
						}
					}

					else
					{
						$password = $this->fm->validation(md5($password));
						
						$chkquery = "SELECT * FROM tbl_user WHERE u_email = '$email'";
						$chkresult = $this->db->select($chkquery);
						if($chkresult != false){
							echo "<span class='error'>E-mail address already exits....!</span>";
							exit();
						}
						else{
							//$password = $this->fm->validation(hash('sha256',$password));
							
							
							$instquery = "INSERT INTO tbl_user(u_name,u_username,u_email,u_password)VALUES('$name','$username','$email','$password')";

							$insert_row = $this->db->insert($instquery);
							if($insert_row){
								echo "<span class='success'>Registration successfully....!</span>";
							    exit();
							}
							else{
								echo "<span class='error'>Registration error....!</span>";
							    exit();
							}

						}
						
						
					}// else ar closing..
				}

			}// isset ar closing.....

		}//function ar closing.....

		public function UserLogin($email,$password){

			$email    = $this->fm->validation($email);
			$password = $this->fm->validation($password);

			if($email == "" || $password == ""){
				echo "empty";
				exit();
			}

			else
			{
				$password = $this->fm->validation(md5($password));
				$query = "SELECT * FROM tbl_user WHERE u_email = '$email' AND u_password = '$password'";
				$result = $this->db->select($query);
				if($result != false){
					$value = $result->fetch_assoc();
					if($value['u_status'] == '1'){
						echo "Disable";
						exit();
					}
					else
					{
						    Session::init();
						    Session::set("login", true);
							Session::set("u_id", $value['u_id']);
							Session::set("u_username", $value['u_username']);
							Session::set("u_name", $value['u_name']);
							
							
						
					}
				}
				else
				{
					echo "error";
					exit();
				}
			}

		}

		public function ReceiveData($userId){
			$query = "SELECT * FROM tbl_user WHERE u_id = '$userId'";
			$result = $this->db->select($query);
			return $result;

		}

		public function UpdateProfile($u_name,$u_username,$u_email,$userid){
			$u_name     = $this->fm->validation($u_name);
			$u_username = $this->fm->validation($u_username);
			$u_email    = $this->fm->validation($u_email);
			$userid    = $this->fm->validation($userid);
			



			

			if($u_email == "" || $u_username == "" || $u_name == ""){
				echo "<span class='error'>Field must can,t be empty...!</span>";
				exit();
			}
			else{
				 
				$query = "UPDATE tbl_user SET
						u_name = '$u_name',
						u_username = '$u_username',
						u_email = '$u_email'
						WHERE u_id = '$userid'";
				$result = $this->db->update($query);
				if($result){
					echo "<span class='success'>update successfully...</span>";

				}
				else{
					echo "<span class='error'>Profile not Updated..!</span>";
				}
			}

		}

		
	}// class ar closing.....

?>