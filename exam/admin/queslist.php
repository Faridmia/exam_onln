<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
    include_once ($filepath.'/../classes/exam.php');

    $exmon = new Examonline();
    
?>
<?php
  // Session::checkLogin();
?>
<style type="text/css">
	
	.adminpanel{
    width:500px;
    color:#999;
    margin:30px auto 0;
    padding:80px;
    border:1px solid #ddd;
    }
</style>
<?php 
    if(isset($_GET['delque'])){
        $queNO = (int)$_GET['delque'];
        $delque = $exmon->delqueData($queNO);

    }
?>
<div class="main">
    
    <h1>Admin Panel- Question List</h1>
    <?php 
        if(isset($delque)){
            echo $delque;
        }
    ?>
    <div class="manageuser">
        <table class="tblone">
    
            <tr>
                <th width="10%">No</th>
                <th width="70%">Question</th>
                <th width="20%">Action</th>
            </tr>
<?php
   $getData = $exmon->getQueByOrder();
    if($getData){
        $i = 0;
        while ($data = $getData->fetch_assoc()) {
            $i++;
     

?>
            <tr>
                <td><?php echo $i; ?></td>   
                <td><?php echo $data['question']; ?></td>
                <td>
                 <a onclick="return confirm('/Are You Sure Want to Remove Data')" href="?delque=<?php echo $data['q_no']; ?>">Remove</a>
                </td>
            </tr>
    <?php }} ?>
            
        </table>
    </div>
	
</div>
<?php include 'inc/footer.php'; ?>