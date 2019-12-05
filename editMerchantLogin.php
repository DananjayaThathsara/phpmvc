<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<?php include "modules/head.php"; ?>
<?php include_once '../models/dbConfig.php';
include_once '../models/encryption.php';
$myCon = new dbConfig();
$myCon->connect(); ?>
<!-- Page -->
<div class="container" style="margin-top: -20px">
    <?php include_once 'controllers/merchantController.php'; ?>
    <?php
    $query = "SELECT ml.*,m.me_name,c.c_name FROM me_login ml LEFT JOIN merchant m  ON ml.me_id=m.me_id LEFT  JOIN outlets o ON  ml.out_id=o.out_id 
              LEFT  JOIN  sl_city c ON o.out_city=c.c_id WHERE ml.me_log_id='".$_GET['me_log_id']."' AND  ml.user_status='active'";
    $result = $myCon->query($query);
    while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <h3>Update Login Details</h3>
        <script>
            function outletFilter(me_id) {
                $("#out").load('outFilter.php', {me_id: me_id});
            }
            function setUserId() {
                function genUserId() {
                    function randomNumberFromRange(min, max) {
                        return Math.floor(Math.random() * (max - min + 1) + min);
                    }

                    var me_id = $("#merchant").find(":selected").text();
                    var out_id = $("#out").find(":selected").text();
                    var ran = randomNumberFromRange(1000, 9999);
                    var user_id = me_id + out_id + ran;
                    return user_id;
                }

                function setToTextField(user_id) {
                    $("#user_id").val(user_id);
                }

                function checkAndSet(user_id) {
                    $.ajax({
                        url: 'checkMerchantLogin.php',
                        type: 'post',
                        data: {
                            'user_id': user_id,
                        },
                        success: function (response) {
                            if (response == 'exist') {
                                $("#msg").html("<div class='alert alert-danger'>Sorry! user id is taken try another one</div>");
                            } else if (response == 'not_exist') {
                                setToTextField(user_id);
                                $("#msg").removeAttr("style").hide();
                            }
                        }
                    });
                }

                var user_id = genUserId();
                checkAndSet(user_id);
            }
        </script>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <lable>Mechant <span>*</span></lable>
                    <select class="form-control" name="me_id" id="merchant"
                            onchange="outletFilter(this.value)">
                        <option selected value="<?php echo $row['me_id'] ?>"><?php echo $row['me_name'] ?></option>
                        <?php
                        $querymer = "SELECT * FROM merchant WHERE me_status='active'";
                        $resultmer = $myCon->query($querymer);
                        while ($rowmer = mysqli_fetch_assoc($resultmer)) {
                            ?>
                            <option value="<?php echo $rowmer['me_id'] ?>"><?php echo $rowmer['me_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div id="out">
                    <div class="form-group">
                        <lable>Outlets <span>*</span></lable>
                        <select class="form-control" name="out_id">
                            <option selected value="<?php echo $row['out_id'] ?>"><?php echo $row['c_name'] ?></option>
                            <?php
                            $queryout = "SELECT c.c_name,o.out_city,o.out_id FROM outlets o LEFT JOIN sl_city c ON o.out_city=c.c_id WHERE o.out_status='active' AND o.me_id='".$row['me_id']."'";
                            $resultout = $myCon->query($queryout);
                            while ($rowout = mysqli_fetch_assoc($resultout)) {
                            ?>
                            <option value="<?php echo $rowout['out_id'] ?>"><?php echo $rowout['c_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <lable>User Type<span>*</span></lable>
                    <select class="form-control" name="user_type">
                        <option selected value="<?php echo $row['user_type'] ?>"><?php echo $row['user_type'] ?></option>
                        <option value="Manager">Manager</option>
                        <option value="Officer">Officer</option>
                        <option value="Worker">Worker</option>
                    </select>
                </div>
                <div id="userId">
                    <span id="msg" style="display:block;"></span>
                    <div class="form-group">
                        <lable>User Id<span>*</span></lable>
                        <input type="text" class="form-control" name="user_id" id="user_id"  value="<?php echo $row['user_id'] ?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <lable>Password<span>*</span></lable>
                    <?php $enObj = new encryption();
                    $user_pword=$enObj->decode($row['user_pword']);
                    ?>
                    <input type="password" class="form-control" name="user_pword" value="<?php echo $user_pword; ?>">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary pull-right" style="float: right;" value="Update Login">
                </div>
                <br><br>
            </div>
        </div>
        <input type="hidden" name="action" value="update_login">
        <input type="hidden" name="me_log_id" value="<?php echo $row['me_log_id'] ?>">
    </form>
    <?php }?>
</div>
<!-- End Page -->
<?php include_once 'modules/footer_js.php' ?>
</html>