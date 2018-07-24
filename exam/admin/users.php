<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
    include_once ($filepath.'/../classes/user.php');

    $usr = new User();
    
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
<div class="main">
    <?php 
        if(isset($_GET['dis'])){
            $disId   = (int) $_GET['dis'];
            $disuser = $usr->DisableUser($disId);
        }
        if(isset($_GET['ebl'])){
            $eblid   = (int) $_GET['ebl'];
            $ebluser = $usr->enableUser($eblid);
        }
        if(isset($_GET['delid'])){
            $delId   = (int) $_GET['delid'];
            $deluser = $usr->deleteuser($delId);
        }
    ?>
    <h1>Admin Panel- Manage User</h1>
    <?php 
        if(isset($disuser)){
            echo $disuser;
        }
        if(isset($ebluser)){
            echo $ebluser;
        }
        if(isset($deluser)){
            echo $deluser;
        }
    ?>
    <div class="manageuser">
        <table class="tblone">
    
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Username</th>
                <th>E-mail</th>
                <th>Action</th>
            </tr>
<?php
    $userData = $usr->getAlluser();
    if($userData){
        $i = 0;
        while ($data = $userData->fetch_assoc()) {
            $i++;
     

?>
            <tr>
                <td><?php 
                    if($data['u_status'] == '1'){
                        echo "<span class='error'>".$i."</span>";
                    }
                    else{
                        echo $i;
                    }
                    ?>
                        
                </td>
                    
                <td><?php echo $data['u_name'];?></td>
                <td><?php echo $data['u_username'];?></td>
                <td><?php echo $data['u_email'];?></td>
                <td>
                <?php if($data['u_status'] == '0'){ ?>
                     <a onclick="return confirm('/Are You Sure Want to Disable Data')" href="?dis=<?php echo $data['u_id']; ?>">Disable</a> 
                   
                <?php }else{ ?>
                    <a onclick="return confirm('/Are You Sure Want to Enable Data')" href="?ebl=<?php echo $data['u_id']; ?>">Enable</a>

                <?php } ?>
                     
                  || <a onclick="return confirm('/Are You Sure Want to Remove Data')" href="?delid=<?php echo $data['u_id']; ?>">Remove</a>
                </td>
            </tr>
    <?php }} ?>
            
        </table>
    </div>
	
</div>
<?php include 'inc/footer.php'; ?>