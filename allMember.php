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
                <li class="breadcrumb-item active">All Members</li>
            </ol>
            <a href="memRegister.php" class="addnew btn btn-primary" style="height:35px;">
                Add New
            </a>
            <div class="panel-body container-fluid" style="background: #fff">
                <div class="col-md-6">
                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="pending">Pending</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" id="forapproval" >For Approval</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Approved Not Paid</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Active Members</a>
                        </li>
                    </ul>
                </div>
                <?php include_once 'controllers/memberController.php'; ?>
                <div id="member">
                    <div class="example table-responsive">
                        <div class="form-group col-md-12">
                            <div class="input-group">
                                <select class="form-control selectpicker" data-live-search="true" data-size="5"
                                        onChange="filterPost(this.value)">
                                    <option disabled selected>Search</option>
                                    <?php
                                    $query_mem = "SELECT m.mem_cmp_name,m.mem_f_name,m.mem_phone,m.mem_email,m.mem_address,m.mem_id,ml.mem_user_name 
                                              FROM member m LEFT JOIN mem_login ml ON m.mem_id=ml.mem_id 
                                              WHERE m.mem_status='active'";
                                    $result_mem = $myCon->query($query_mem);
                                    while ($row_mem = mysqli_fetch_assoc($result_mem)) {
                                        ?>
                                        <option value="<?php echo($row_mem['me_id']); ?>"><?php echo($row_mem['me_name']); ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                            <tr>

                                <th>Company</th>
                                <th>Member Name</th>

                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query ="SELECT m.*
                                    FROM member m
                                    WHERE m.mem_status='active'";
                            $result = $myCon->query($query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                <td><?php echo $row['mem_cmp_name']; ?></td>
                                <td><?php echo $row['mem_f_name'].''.$row['mem_l_name']; ?></td>
                                <td><?php echo $row['mem_tel']; ?></td>
                                <td><?php echo $row['mem_email']; ?></td>
                                <td><?php echo $row['mem_address']; ?></td>

                                <td class="text-nowrap">
<!--                                    <a class="btn btn-sm btn-icon btn-flat btn-default" data-fancybox data-type="iframe"-->
<!--                                       data-src="memView.php?mem_id=--><?php //echo $row['mem_id']; ?><!--"-->
<!--                                       href="javascript:;" title="View">-->
<!--                                        <i class="icon wb-eye" aria-hidden="true"></i>-->
<!--                                    </a>-->
                                    <a class="btn btn-sm btn-icon btn-flat btn-default" data-fancybox data-type="iframe"
                                       data-src="memEdit.php?mem_id=<?php echo $row['mem_id']; ?>"
                                       href="javascript:;" title="Edit">
                                        <i class="icon wb-wrench" aria-hidden="true"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-icon btn-flat btn-default"
                                            data-target="#del<?php echo $row['mem_id']; ?>" data-toggle="modal"
                                            title="Delete">
                                        <i class="icon wb-close" aria-hidden="true"></i>
                                    </button>

                                </td>
                                <div class="modal fade" id="del<?php echo $row['mem_id']; ?>" aria-hidden="false"
                                     aria-labelledby="exampleFillIn" role="dialog" tabindex="-1">
                                    <div class="modal-dialog modal-simple">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <h4 class="modal-title" id="exampleFillInModalTitle">Delete Member</h4>
                                            </div>
                                            <div class="modal-body">
                                                Are You Sure to delete <?php echo $row['mem_name'] ?> ?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="" method="post">
                                                    <input type="hidden" name="mem_id"
                                                           value="<?php echo $row['mem_id']; ?>">
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
</div>
<!-- End Page -->
<!-- Footer -->
<?php include "modules/footer.php"; ?>
<?php include_once 'modules/footer_js.php' ?>
<script>
    // Shorthand for $( document ).ready()
    $(function () {

    });

    function pendingMember() {
        $('#member').load('pendingMember.php');
        $('#pending').addClass('active');
        $('#forapproval').removeClass('active');

    }

    function forApproval() {
        $('#pending').removeClass('active');
        $('#member').load('pendingMember.php');
        $('#forapproval').addClass('active');


    }
</script>
</body>
</html>
