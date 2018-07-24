<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
    include_once ($filepath.'/../classes/exam.php');
    $examobj = new Examonline();
?>
<?php
  // Session::checkLogin();
?>
<style type="text/css">
	
	.adminpanel{
    width:480px;
    color:#999;
    margin:20px auto 0;
    padding:100px;
    border:1px solid #ddd;
    }
</style>
<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $AddQue = $examobj->Addquestion($_POST);
    }

    // Get Total...............
    $total = $examobj->getTotalRows();
    $next  = $total + 1;
?>
<div class="main">
<h1>Admin Panel - Add Question</h1>
<?php 
    if(isset($AddQue)){
        echo $AddQue;
    }
?>
<div class="adminpanel">
	<form action="" method="post">
        <table>
            <tr>
                <td>Question No</td>
                <td>:</td>
                <td><input type="number" value="<?php 
                    if(isset($next)){
                        echo $next;
                    }
                ?>" name="q_no"></td>
            </tr>
            <tr>
                <td>Question</td>
                <td>:</td>
                <td><input type="text" name="question" placeholder="Insert Your Question"></td>
            </tr>
            <tr>
                <td>Choise one</td>
                <td>:</td>
                <td><input type="text" name="ans_1" placeholder="Enter choise one..."></td>
            </tr>
            <tr>
                <td>Choise two</td>
                <td>:</td>
                <td><input type="text" name="ans_2" placeholder="Enter choise two..."></td>
            </tr>
            <tr>
                <td>Choise three</td>
                <td>:</td>
                <td><input type="text" name="ans_3" placeholder="Enter choise three..."></td>
            </tr>
            <tr>
                <td>Choise four</td>
                <td>:</td>
                <td><input type="text" name="ans_4" placeholder="Enter choise four..."></td>
            </tr>
             <tr>
                <td>Correct No</td>
                <td>:</td>
                <td><input type="number" name="rightans" required></td>
            </tr>
             <tr>
                <td colspan="3" align="center">
                    <input type="submit"  name="submit" value="Add a Question">
                </td>
               
            </tr>
            
        </table>
        
    </form>
</div>



	
</div>
<?php include 'inc/footer.php'; ?>