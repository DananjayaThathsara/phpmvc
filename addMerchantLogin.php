<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<?php include "modules/head.php"; ?>
<?php include_once '../models/dbConfig.php';
$myCon = new dbConfig();
$myCon->connect(); ?>
<body class="animsition dashboard">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<?php include "modules/nav.php"; ?>
<?php include "modules/leftMenu.php"; ?>
<!-- Page -->
<div class="page">
    <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Set Merchant Login</li>
            </ol>
            <div class="panel-body container-fluid" style="background: #fff">
                <div class="example-wrap">
                    <div class="example">
                        <div class="col-md-12" style="background: #fff;">
                            <?php include_once 'controllers/merchantController.php'; ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Login Details</h3>
                                        <div class="row">
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
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <lable>Mechant <span>*</span></lable>
                                                    <select class="form-control" name="me_id" id="merchant"
                                                            onchange="outletFilter(this.value)">
                                                        <option disabled selected>Select Merchant</option>
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
                                                        <select class="form-control" name="me_id"></select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <lable>User Type<span>*</span></lable>
                                                    <select class="form-control" name="user_type">
                                                        <option value="" disabled selected>Select</option>
                                                        <option value="Manager">Manager</option>
                                                        <option value="Officer">Officer</option>
                                                        <option value="Worker">Worker</option>
                                                    </select>
                                                </div>
                                                <div id="userId">
                                                    <span id="msg" style="display:block;"></span>
                                                    <div class="form-group">
                                                        <lable>User Id<span>*</span></lable>
                                                        <input type="text" class="form-control" name="user_id"
                                                               id="user_id" "
                                                        onclick="setUserId()">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <lable>Password<span>*</span></lable>
                                                    <input type="password" class="form-control" name="user_pword">
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-primary pull-right"
                                                           style="float: right;" value="Set Login" name="ins_login">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="example table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <th>Merchant</th>
                                                            <th>Outlet</th>
                                                            <th>User ID</th>
                                                            <th>User Type</th>
                                                            <th class="text-nowrap">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $query = "SELECT ml.user_id,ml.user_type,ml.me_log_id,m.me_name,c.c_name 
                                                                  FROM me_login ml LEFT JOIN merchant m  ON ml.me_id=m.me_id LEFT  JOIN outlets o ON  ml.out_id=o.out_id 
                                                                  LEFT  JOIN  sl_city c ON o.out_city=c.c_id WHERE ml.user_status='active'";
                                                        $result = $myCon->query($query);
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            ?>
                                                            <tr>
                                                            <td><?php echo $row['me_name']; ?></td>
                                                            <td><?php echo $row['c_name']; ?></td>
                                                            <td><?php echo $row['user_id']; ?></td>
                                                            <td><?php echo $row['user_type']; ?></td>

                                                            <td class="text-nowrap">
                                                                <a class="btn btn-sm btn-icon btn-flat btn-default" data-fancybox data-type="iframe"data-src="editMerchantLogin.php?me_log_id=<?php echo $row['me_log_id']; ?>" href="javascript:void(0)" title="Edit">
                                                                    <i class="icon wb-wrench" aria-hidden="true"></i>
                                                                </a>
                                                                <button type="button"
                                                                        class="btn btn-sm btn-icon btn-flat btn-default"
                                                                        data-target="#del<?php echo $row['me_log_id']; ?>"
                                                                        data-toggle="modal"
                                                                        title="Delete">
                                                                    <i class="icon wb-close" aria-hidden="true"></i>
                                                                </button>
                                                            </td>
                                                            <div class="modal fade"
                                                                 id="del<?php echo $row['me_log_id']; ?>"
                                                                 aria-hidden="false"
                                                                 aria-labelledby="exampleFillIn" role="dialog"
                                                                 tabindex="-1">
                                                                <div class="modal-dialog modal-simple">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                <span aria-hidden="true">×</span>
                                                                            </button>
                                                                            <h4 class="modal-title" id="exampleFillInModalTitle">Delete Merchant Login</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Are You Sure to delete this merchant login ?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <form method="post" action=""  id="form<?php echo $row['me_log_id'];?>">
                                                                                <input type="hidden" name="me_log_id" value="<?php echo $row['me_log_id']; ?>">
                                                                                <input type="hidden" name="actionDel" value="delete_login">
                                                                                <input type="submit" data-bb-handler="danger"  type="button" class="btn btn-danger" value="Confirm" name="del_login">
                                                                            </form>
                                                                            <button data-bb-handler="main" type="button" data-dismiss="modal"  class="btn btn-primary">
                                                                                Cancel
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End Modal -->
                                                            </tr><?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="action" value="insert_login">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Page -->
<!-- Footer -->
<?php include "modules/footer.php"; ?>
<?php include_once 'modules/footer_js.php' ?>
</body>
</html>
