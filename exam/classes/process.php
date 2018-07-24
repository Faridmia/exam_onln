<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Session.php');
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
	class Process{
		private $db;
		private $fm;

		public function __construct(){
			$this->db = new Database();
			$this->fm = new Format();

		}

		public function ProcessData($data){
			$ansright    = $this->fm->validation($data['ans']);
			$number = $this->fm->validation($data['number']);
			$next   = $number+1;

			if(!isset($_SESSION['score'])){
				$_SESSION['score'] = '0';
			}

			$total = $this->totalRows();
			$right = $this->rightans($number);
			if($right == $ansright){
				$_SESSION['score']++;
			}
			if($number == $total){
				header("location:final.php");
				exit();
			}
			else
			{
				header("location:test.php?ques=".$next);
			}


		}

		private function totalRows(){
			$query = "SELECT * FROM tbl_question";
			$getResult1 = $this->db->select($query);
			$total = $getResult1 ->num_rows;
			return $total;
		}
		private function rightans($number){
			$query = "SELECT * FROM tbl_answer WHERE q_no = '$number' AND rightans = '1'";
			$getData = $this->db->select($query);
			$result  = $getData->fetch_assoc();
			$data = $result['ans_id'];
			return $data;
		}

		
		
	}

?>