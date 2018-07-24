<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
	class Examonline{
		private $db;
		private $fm;

		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();

		}

		public function getQueByOrder(){
			$query = "SELECT * FROM tbl_question ORDER BY q_no ASC";

			$result = $this->db->select($query);
			return $result;
		}

		public function delqueData($delid){
			$tables = array("tbl_question","tbl_answer");
			foreach($tables as $table){
				$delquery = "DELETE FROM $table WHERE q_no = '$delid'";
				$delData = $this->db->delete($delquery);
			}
			if($delData){
				$msg = "<span class='success'>Data Deleted...!</span>";
				return $msg;
			}
			else{
				$msg = "<span class='error'>Data not Deleted...!</span>";
				return $msg;
			}
			
		}

		public function getTotalRows(){
			$query = "SELECT * FROM tbl_question";
			$getResult1 = $this->db->select($query);
			$total = $getResult1 ->num_rows;
			return $total;
		}

		public function Addquestion($data){
			$q_no     = $this->fm->validation($data['q_no']);
			$question = $this->fm->validation($data['question']);
			$ans = array();
			$ans[1]    = $this->fm->validation($data['ans_1']);
			$ans[2]    = $this->fm->validation($data['ans_2']);
			$ans[3]    = $this->fm->validation($data['ans_3']);
			$ans[4]    = $this->fm->validation($data['ans_4']);
			$rightans  = $this->fm->validation($data['rightans']);

			$query = "INSERT INTO tbl_question(q_no,question)VALUES('$q_no','$question')";
			$insert_row = $this->db->insert($query);
			if($insert_row){
				foreach($ans as $key => $ansname){
					if($ansname != ''){
						if($rightans == $key){
							$rquery = "INSERT INTO tbl_answer(q_no,rightans,answer)VALUES('$q_no','1','$ansname')";

						}
						else{
							$rquery = "INSERT INTO tbl_answer(q_no,rightans,answer)VALUES('$q_no','0','$ansname')";

						}
						$insertrow = $this->db->insert($rquery);
						if($insertrow){
							continue;
						}
						else{
							die("error");
						}
					}
				}

				$msg = "<span class='success'>Question added successfully......</span>";
				return $msg;

			}
			

		}

		public function getQuestion(){
			$query22 = "SELECT * FROM tbl_question";
			$getques = $this->db->select($query22);
			//$result = mysqli_fetch_array($getData);
			$result = $getques->fetch_assoc();
			return $result;

		}

		public function getQuestionByid($number){
			$query1 = "SELECT * FROM tbl_question WHERE q_no = '$number'";
			$getData = $this->db->select($query1);
			$result = $getData->fetch_assoc();
			return $result;
		}

		public function getAnswer($number){
			$query = "SELECT * FROM tbl_answer WHERE q_no = '$number'";
			$getData = $this->db->select($query);
			return $getData;
		}

		
	}

?>