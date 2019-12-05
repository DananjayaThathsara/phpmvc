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
                <li class="breadcrumb-item active">Add New Outlet</li>
            </ol>
            <div class="panel-body container-fluid" style="background: #fff">
                <div class="example-wrap">
                    <div class="example">
                        <div class="col-md-12" style="background: #fff;">
                            <?php include_once 'controllers/outletController.php'; ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary pull-right"
                                           style="float: right;margin-top: -50px" value="Submit Details">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>Outlet Details</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <lable>Mechant <span>*</span></lable>
                                                    <select class="form-control" name="me_id">
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
                                                <div class="form-group">
                                                    <lable>District <span>*</span></lable>
                                                    <script>
                                                        function cityFilter(city) {
                                                            $('#city').load("cityFilter.php", {city: city});
                                                        }
                                                    </script>
                                                    <select class="form-control" name="out_district"
                                                            data-show-subtext="true" data-live-search="true"
                                                            onchange="cityFilter(this.value)">
                                                        <option disabled selected></option>
                                                        <?php

                                                        $querydis = "SELECT * FROM sl_district";
                                                        $resultdis = $myCon->query($querydis);

                                                        while ($row = mysqli_fetch_assoc($resultdis)) {

                                                            ?>
                                                            <option value="<?php echo $row['d_id'] ?>"><?php echo $row['d_name'] ?></option>
                                                        <?php } ?>

                                                    </select>
                                                </div>
                                                <div id="city">
                                                    <div class="form-group">
                                                        <lable>City <span>*</span></lable>
                                                        <select class="form-control" name="me_city">
                                                            <option selected></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <lable>Email <span>*</span></lable>
                                                    <input type="email" class="form-control" name="out_email"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <lable>Hotline <span>*</span></lable>
                                                    <input type="tel" class="form-control" name="out_hotline"
                                                    >
                                                </div>
                                                <div class="form-group">
                                                    <lable>Address <span>*</span></lable>
                                                    <textarea class="form-control" name="out_address"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <lable>Longitude,Latitude</lable>
                                                    <input type="tel" class="form-control" name="out_log_lat"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3>Contact People</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <lable>Title <span>*</span></lable>
                                                    <select class="form-control" name="out_cont_prsn_title">
                                                        <option selected>Select</option>
                                                        <option value="Mr">Mr</option>
                                                        <option value="Mis">Mis</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <lable>Designation <span>*</span></lable>
                                                    <select class="form-control" name="out_cont_prsn_desig">
                                                        <option disabled selected></option>
                                                        <option value="Manager">Manager</option>
                                                        <option value="Officer">Officer</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <lable>Name <span>*</span></lable>
                                                    <input type="text" class="form-control" name="out_cont_prsn">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Phone Number<span>*</span></lable>
                                                    <input type="text" class="form-control" name="out_cont_prsn_mobile">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <lable>Email <span>*</span></lable>
                                                    <input type="email" class="form-control" name="out_cont_prsn_email">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="action" value="insert">
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
