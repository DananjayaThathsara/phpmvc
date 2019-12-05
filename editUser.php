<?php include "modules/head.php";
include_once '../models/dbConfig.php';
include_once '../models/encryption.php';
$myCon = new dbConfig();
$myCon->connect();
$query = "SELECT user_id,user_name,user_level,user_email,user_pword FROM login WHERE active='active' AND user_id='".$_GET['user_id']."'";

$result = $myCon->query($query);
while ($row = mysqli_fetch_assoc($result)) {
?>
<div class="col-md-12" style="background: #fff;">
    <?php include_once 'controllers/userController.php' ?>
    <form action="" method="post">
        <div class="form-group">
            <input type="submit" class="btn btn-primary pull-right"
                   style="float: right;margin-top: -50px" value="Update User">
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <lable>User Type <span>*</span></lable>
                    <select class="form-control" name="user_level">
                        <option selected value="<?php echo $row['user_level'];?>">
                            <?php
                            if ($row['user_level'] == 1) {
                                echo 'Admin';
                            } elseif ($row['user_level'] == 2) {
                                echo 'Editor';
                            } elseif ($row['user_level'] == 3) {
                                echo 'Data operator';
                            } ?>
                        </option>
                        <option value="1">Admin</option>
                        <option value="2">Editor</option>
                        <option value="3">Data Operator</option>
                    </select>
                </div>
                <div class="form-group">
                    <lable>Name</lable>
                    <input type="text" class="form-control" name="user_name" value="<?php echo $row['user_name'];?>">
                </div>
                <div class="form-group">
                    <lable>User Email(Username)</lable>
                    <input class="form-control" type="email" name="user_email" value="<?php echo $row['user_email'];?>" readonly>
                </div>
                <div class="form-group">
                    <lable>Password</lable>
                    <?php $enObj=new encryption();
                    $password=$enObj->decode($row['user_pword'])?>
                    <input class="form-control" type="password" name="user_pword" value="<?php echo $password;?>">
                </div>
            </div>
            <input type="hidden" name="user_id" value="<?php echo $row['user_id'];?>">
            <input type="hidden" name="action" value="update">
        </div>
    </form>
</div>
<?php } ?>
<?php include_once 'modules/footer_js.php' ?>
