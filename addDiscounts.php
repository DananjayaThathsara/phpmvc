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
                <li class="breadcrumb-item active">Add New Discounts</li>
            </ol>
            <div class="panel-body container-fluid" style="background: #fff">
                <div class="example-wrap">
                    <div class="example">
                        <div class="col-md-12" style="background: #fff;">
                            <?php include_once 'controllers/discountController.php'?>
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary pull-right" style="float: right;margin-top: -50px" value="Add Discount">
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <lable>Mechant<span>*</span></lable>
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
                                        <lable>Discout Rate</lable>
                                        <input type="text" class="form-control" name="me_dis_rate" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <lable>Discout Discription</lable>


                                    <textarea name="me_dis_dsp" class=""><?php
                                        if (isset($_POST['me_dis_dsp'])) {
                                            echo $_POST['me_dis_dsp'];
                                        }
                                        ?>
                                        </textarea>
                                    <script>
                                        CKEDITOR.replace('me_dis_dsp');
                                    </script>
                                </div>
                                </div>
                                <input type="hidden" name="action" value="insert">
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
