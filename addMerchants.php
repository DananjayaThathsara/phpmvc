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
                <li class="breadcrumb-item active">Add New Merchant</li>
            </ol>
            <div class="panel-body container-fluid" style="background: #fff">
                <div class="example-wrap">
                    <div class="example">
                        <div class="col-md-12" style="background: #fff;">
                            <?php include_once 'controllers/merchantController.php'; ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary pull-right"
                                           style="float: right;margin-top: -50px" value="Submit Details">
                                </div>
                                <?php include_once 'controllers/merchantController.php'; ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3>Company Details</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <script>
                                                        function catFilter(cat) {
                                                            $('#sub').load("catFilter.php", {cat: cat});
                                                        }
                                                    </script>
                                                    <lable>Category <span>*</span></lable>
                                                    <select class="form-control" name="me_cat_id"
                                                            onchange="catFilter(this.value)">
                                                        <option disabled selected></option>
                                                        <?php
                                                        $querycat = "SELECT * FROM me_category WHERE me_cat_status='active'";
                                                        $resultcat = $myCon->query($querycat);
                                                        while ($row = mysqli_fetch_assoc($resultcat)) {
                                                            ?>
                                                            <option value="<?php echo $row['me_cat_id'] ?>"><?php echo $row['me_cat_name'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div id="sub">
                                                    <div class="form-group">
                                                        <lable>Sub Category <span>*</span></lable>
                                                        <select class="form-control" name="me_sub_cat_id">
                                                            <option disabled selected></option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <lable>Name <span>*</span></lable>
                                                    <input type="text" class="form-control" name="me_name"
                                                    >
                                                </div>
                                                <div class="form-group">
                                                    <lable>District <span>*</span></lable>
                                                    <script>
                                                        function cityFilter(city) {
                                                            $('#city').load("cityFilter.php", {city: city});
                                                        }
                                                    </script>
                                                    <select class="form-control" name="me_district"
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
                                                            <option disabled selected></option>

                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <lable>Email <span>*</span></lable>
                                                    <input type="email" class="form-control" name="me_email"
                                                    >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <lable>Hotline <span>*</span></lable>
                                                    <input type="tel" class="form-control" name="me_hotline"
                                                    >
                                                </div>
                                                <div class="form-group">
                                                    <lable>Website URL</lable>
                                                    <input type="url" class="form-control" name="me_website"
                                                    >
                                                </div>
                                                <div class="form-group">
                                                    <lable>Outlet Count <span>*</span></lable>
                                                    <input type="text" class="form-control" name="me_no_outlets"
                                                    >
                                                </div>
                                                <div class="form-group">
                                                    <lable>Address <span>*</span></lable>
                                                    <textarea class="form-control" name="me_address"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <lable>Logo (400 x 230 px) <span>*</span></lable>
                                                    <input type="file" class="form-control" name="me_logo"
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3>Contact People</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5>First Contact person</h5>
                                                <div class="form-group">
                                                    <lable>Title <span>*</span></lable>
                                                    <select class="form-control" name="me_cont_prsn_title">
                                                        <option selected>Select</option>
                                                        <option value="Mr">Mr</option>
                                                        <option value="Mis">Mis</option>
                                                        <option value="Ms">Ms</option>
                                                        <option value="Miss">Miss</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <lable>Designation <span>*</span></lable>
                                                    <select class="form-control" name="me_cont_prsn_desig">
                                                        <option disabled selected></option>
                                                        <option value="Manager">Manager</option>
                                                        <option value="Officer">Officer</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <lable>Name <span>*</span></lable>
                                                    <input type="text" class="form-control" name="me_cont_prsn">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Phone Number <span>*</span></lable>
                                                    <input type="text" class="form-control" name="me_cont_prsn_phone">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Email <span>*</span></lable>
                                                    <input type="email" class="form-control" name="me_cont_prsn_email">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h5>Second Contact person(Optional)</h5>
                                                <div class="form-group">
                                                    <lable>Title</lable>
                                                    <select class="form-control" name="me_se_cont_prsn_title">
                                                        <option disabled selected></option>
                                                        <option value="Mr">Mr</option>
                                                        <option value="Mis">Mis</option>
                                                        <option value="Ms">Ms</option>
                                                        <option value="Miss">Miss</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <lable>Designation</lable>
                                                    <select class="form-control" name="me_se_cont_prsn_desig">
                                                        <option disabled selected>Select</option>
                                                        <option value="Manager">Manager</option>
                                                        <option value="Officer">Officer</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <lable>Name</lable>
                                                    <input type="text" class="form-control" name="me_se_cont_prsn"
                                                    >
                                                </div>
                                                <div class="form-group">
                                                    <lable>Phone Number</lable>
                                                    <input type="text" class="form-control"
                                                           name="me_se_cont_prsn_phone">
                                                </div>
                                                <div class="form-group">
                                                    <lable>Email</lable>
                                                    <input type="email" class="form-control"
                                                           name="me_se_cont_prsn_email">
                                                </div>
                                                <input type="hidden" name="action" value="insert">
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
