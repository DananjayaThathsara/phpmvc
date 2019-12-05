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
<style>

</style>
<div class="page">
    <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">All Users</li>
            </ol>
            <a href="addUser.php" class="btn btn-primary" style="height:35px !important;">
                Add New
            </a>
            <div class="form-group col-md-12">
                <div class="input-group">
                    <select class="form-control selectpicker" data-live-search="true" data-size="5"
                            onChange="filterPost(this.value)">
                        <option disabled selected>Search</option>
                        <?php
                        $query_mer = "SELECT user_name,user_level,user_email FROM login WHERE active='active'";
                        $result_mer = $myCon->query($query_mer);
                        while ($row_mer = mysqli_fetch_assoc($result_mer)) {
                            ?>
                            <option value="<?php echo($row_mer['me_id']); ?>"><?php echo($row_mer['me_name']); ?></option>
                            <?php

                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="panel-body container-fluid" style="background: #fff">
                <?php include_once 'controllers/userController.php' ?>
                <div class="example table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email(Username)</th>
                            <th>User Level</th>
                            <th class="text-nowrap">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = "SELECT user_id,user_name,user_level,user_email FROM login WHERE active='active'";
                        $result = $myCon->query($query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>

                            <tr>
                            <td><?php echo $row['user_name']; ?></td>
                            <td>
                                <?php echo $row['user_email']; ?>
                            </td>
                            <td><?php
                                if ($row['user_level'] == 1) {
                                    echo 'Admin';
                                } elseif ($row['user_level'] == 2) {
                                    echo 'Editor';
                                } elseif ($row['user_level'] == 3) {
                                    echo 'Data operator';
                                } ?></td>

                            <td class="text-nowrap">
                                <a class="btn btn-sm btn-icon btn-flat btn-default" data-fancybox data-type="iframe"
                                   data-src="editUser.php?user_id=<?php echo $row['user_id']; ?>"
                                   href="javascript:;" title="Edit">
                                    <i class="icon wb-wrench" aria-hidden="true"></i>
                                </a>

                                <button type="button" class="btn btn-sm btn-icon btn-flat btn-default"
                                        data-target="#del<?php echo $row['user_id']; ?>" data-toggle="modal"
                                        title="Delete">
                                    <i class="icon wb-close" aria-hidden="true"></i>
                                </button>

                            </td>
                            <div class="modal fade" id="del<?php echo $row['user_id']; ?>" aria-hidden="false"
                                 aria-labelledby="exampleFillIn" role="dialog" tabindex="-1">
                                <div class="modal-dialog modal-simple">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title" id="exampleFillInModalTitle">Delete User</h4>
                                        </div>
                                        <div class="modal-body">
                                            Are You Sure to delete this user ?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="" method="post">
                                                <input type="hidden" name="user_id"
                                                       value="<?php echo $row['user_id']; ?>">
                                                <input type="hidden" name="action" value="delete">
                                                <input type="submit" data-bb-handler="danger" type="button"
                                                       class="btn btn-danger" value="Confirm">
                                            </form>
                                            <button data-bb-handler="main" type="button" data-dismiss="modal"
                                                    class="btn btn-primary">
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
<!-- End Page -->
<!-- Footer -->
<?php include "modules/footer.php"; ?>
<?php include_once 'modules/footer_js.php' ?>
</body>
</html>
