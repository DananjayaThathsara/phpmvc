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
                <li class="breadcrumb-item active">All Discount</li>
            </ol>
            <a href="addDiscounts.php" class="btn btn-primary" style="height:35px !important;">
                Add New
            </a>

            <div class="form-group col-md-12">
                <div class="input-group">
                    <select class="form-control selectpicker" data-live-search="true" data-size="5"
                            onChange="filterPost(this.value)">
                        <option disabled selected>Search</option>
                        <?php
                        $query_mer = "SELECT me_id, me_name FROM merchant WHERE me_status='active'";
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
                <?php include_once 'controllers/discountController.php'?>
                <div class="example table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Merchant Name</th>
                            <th>Discount Rate</th>
                            <th>Description</th>


                            <th class="text-nowrap">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = "SELECT ds.*,m.me_name FROM discounts ds LEFT JOIN merchant m  ON ds.me_id=m.me_id WHERE ds.dis_status='active'";

                        $result = $myCon->query($query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>

                            <tr>
                            <td><?php echo $row['me_name']; ?></td>
                            <td>
                                <?php echo $row['me_dis_rate']; ?>
                            </td>
                            <td><?php echo $row['me_dis_dsp']; ?></td>

                            <td class="text-nowrap">
                                <a class="btn btn-sm btn-icon btn-flat btn-default" data-fancybox data-type="iframe"
                                   data-src="editDiscount.php?me_dis_id=<?php echo $row['me_dis_id']; ?>" href="javascript:;" title="Edit">
                                    <i class="icon wb-wrench" aria-hidden="true"></i>
                                </a>

                                <button type="button" class="btn btn-sm btn-icon btn-flat btn-default"
                                        data-target="#del<?php echo $row['me_dis_id']; ?>" data-toggle="modal"
                                      title="Delete">
                                    <i class="icon wb-close" aria-hidden="true"></i>
                                </button>

                            </td>
                            <div class="modal fade" id="del<?php echo $row['me_dis_id']; ?>" aria-hidden="false"
                                 aria-labelledby="exampleFillIn" role="dialog" tabindex="-1">
                                <div class="modal-dialog modal-simple">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <h4 class="modal-title" id="exampleFillInModalTitle">Delete Outlet</h4>
                                        </div>
                                        <div class="modal-body">
                                            Are You Sure to delete this dicount ?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="" method="post">
                                                <input type="hidden" name="me_dis_id" value="<?php echo $row['me_dis_id']; ?>">
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
