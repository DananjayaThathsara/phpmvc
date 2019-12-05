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
            <div class="col-xxl-4 col-lg-12">
                <div class="row h-full">
                    <div class="col-xxl-12 col-lg-3">
                        <!-- Widget Linepoint -->
                        <div class="card-inverse card-shadow bg-blue-600 white" id="widgetLinepoint">
                            <div class="card-block p-0">
                                <div class="pt-25 px-30">
                                    <div class="row no-space">
                                        <div class="col-6">
                                            <p>Categories</p>
                                        </div>
                                        <?php
                                        $cat = "SELECT me_cat_name FROM me_category WHERE me_cat_status='active'";
                                        $rescat = $myCon->query($cat);
                                        $catcount = mysqli_num_rows($rescat)
                                        ?>
                                        <div class="col-6 text-right">
                                            <p class="font-size-30 text-nowrap"><?php echo $catcount; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Widget Linepoint -->
                    </div>
                    <div class="col-xxl-12 col-lg-3">
                        <!-- Widget Linepoint -->
                        <div class="card-inverse card-shadow bg-blue-600 white" id="widgetLinepoint">
                            <div class="card-block p-0">
                                <div class="pt-25 px-30">
                                    <div class="row no-space">
                                        <div class="col-6">
                                            <p>Sub Categories</p>
                                        </div>
                                        <?php
                                        $subcat = "SELECT me_sub_cat_name FROM me_sub_category  WHERE me_sub_cat_status='active'";
                                        $ressubcat = $myCon->query($subcat);
                                        $subcatcount = mysqli_num_rows($ressubcat)
                                        ?>
                                        <div class="col-6 text-right">
                                            <p class="font-size-30 text-nowrap"><?php echo $subcatcount; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Widget Linepoint -->
                    </div>
                    <div class="col-xxl-12 col-lg-3">
                        <!-- Widget Sale Bar -->
                        <div class="card-inverse card-shadow bg-purple-600 white" id="widgetSaleBar">
                            <div class="card-block p-0">
                                <div class="pt-25 px-30">
                                    <div class="row no-space">
                                        <div class="col-6">
                                            <p>Merchants</p>
                                        </div>
                                        <?php
                                        $merchant = "SELECT me_name FROM merchant WHERE me_status='active'";
                                        $resmerchant = $myCon->query($merchant);
                                        $merchantcount = mysqli_num_rows($resmerchant)
                                        ?>
                                        <div class="col-6 text-right">
                                            <p class="font-size-30 text-nowrap"><?php echo $merchantcount; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Widget Sale Bar -->
                    </div>
                    <div class="col-xxl-12 col-lg-3">
                        <!-- Widget Sale Bar -->
                        <div class="card-inverse card-shadow bg-purple-600 white" id="widgetSaleBar">
                            <div class="card-block p-0">
                                <div class="pt-25 px-30">
                                    <div class="row no-space">
                                        <div class="col-6">
                                            <p>Card Holders</p>
                                        </div>
                                        <?php
                                        $members = "SELECT mem_login_id FROM mem_login WHERE mem_login_status='active'";
                                        $resmembers = $myCon->query($members);
                                        $memberscount = mysqli_num_rows($resmembers)
                                        ?>
                                        <div class="col-6 text-right">
                                            <p class="font-size-30 text-nowrap"><?php echo $memberscount; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Widget Sale Bar -->
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
