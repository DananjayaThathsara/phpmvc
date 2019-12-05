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
                <li class="breadcrumb-item active">Register Member</li>
            </ol>
            <div class="panel-body container-fluid" style="background: #fff">
                <div class="example-wrap">
                    <div class="example">
                        <div class="col-md-12" style="background: #fff;">
                            <?php include_once 'controllers/memberController.php'; ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <fieldset>
                                                    <legend>Card Deails</legend>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <lable>Card ID <span>*</span></lable>
                                                                <input type="text" class="form-control"
                                                                       name="card_id_num"
                                                                       id="card_id_num"
                                                                       value="<?php if (isset($_POST['card_id_num'])) {
                                                                           echo $_POST['card_id_num'];
                                                                       } ?>">
                                                                <div id="cardList"></div>
                                                                <script>
                                                                    function selectCard(number) {
                                                                        $('#card_id_num').val(number);
                                                                        $("#cardList").hide();
                                                                    }
                                                                </script>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <lable>Form Number <span>*</span></lable>
                                                                <input type="text" class="form-control" name="form_num"
                                                                       value="<?php if (isset($_POST['form_num'])) {
                                                                           echo $_POST['form_num'];
                                                                       } ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <br>
                                                <fieldset>
                                                    <legend>
                                                        Member Details
                                                    </legend>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <lable>First Name <span>*</span></lable>
                                                                <input type="text" class="form-control"
                                                                       name="mem_f_name"
                                                                       value="<?php if (isset($_POST['mem_f_name'])) {
                                                                           echo $_POST['mem_f_name'];
                                                                       } ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <lable>Last Name <span>*</span></lable>
                                                                <input type="text" class="form-control"
                                                                       name="mem_l_name"
                                                                       value="<?php if (isset($_POST['mem_l_name'])) {
                                                                           echo $_POST['mem_l_name'];
                                                                       } ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <lable>Gender <span>*</span></lable>
                                                                <select class="form-control" name="mem_gender">
                                                                    <option selected
                                                                            value="<?php if (isset($_POST['mem_gender'])) {
                                                                                echo $_POST['mem_gender'];
                                                                            } ?>"><?php if (isset($_POST['mem_gender'])) {
                                                                            echo $_POST['mem_gender'];
                                                                        } ?></option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <lable>Birthday<span>*</span></lable>
                                                                <input id="input-date" class="form-control" type="date"
                                                                       name="mem_bdate" data-date-format='yy-mm-dd'
                                                                       value="<?php if (isset($_POST['mem_bdate'])) {
                                                                           echo $_POST['mem_bdate'];
                                                                       } ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <lable>NIC<span>*</span></lable>
                                                                <input type="text" class="form-control"
                                                                       name="mem_nic"
                                                                       value="<?php if (isset($_POST['mem_nic'])) {
                                                                           echo $_POST['mem_nic'];
                                                                       } ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <lable>Phone Number<span>*</span></lable>
                                                                <input type="tel" class="form-control"
                                                                       name="mem_tel"
                                                                       value="<?php if (isset($_POST['mem_tel'])) {
                                                                           echo $_POST['mem_tel'];
                                                                       } ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <lable>Civil Status <span>*</span></lable>
                                                                <select class="form-control" name="mem_civil_status">
                                                                    <option selected><?php if (isset($_POST['mem_civil_status'])) {
                                                                            echo $_POST['mem_civil_status'];
                                                                        } ?></option>
                                                                    <option value="Married">Married</option>
                                                                    <option value="Single">Single</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <lable>Address <span>*</span></lable>
                                                                <textarea name="mem_address"
                                                                          class="form-control"><?php if (isset($_POST['mem_address'])) {
                                                                        echo $_POST['mem_address'];
                                                                    } ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <lable>Living District<span>*</span></lable>
                                                                <script>
                                                                    function cityFilter(city) {
                                                                        $('#citymem').load("cityFilterMem.php", {city: city});
                                                                    }
                                                                </script>
                                                                <select class="form-control" name="mem_living_district"
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
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div id="citymem">
                                                                <div class="form-group">
                                                                    <lable>Living City <span>*</span></lable>
                                                                    <select class="form-control" name="mem_living_city">
                                                                        <option disabled selected></option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <lable>Email <span>*</span></lable>
                                                                <input type="email" class="form-control"
                                                                       name="mem_email"
                                                                       value="<?php if (isset($_POST['mem_email'])) {
                                                                           echo $_POST['mem_email'];
                                                                       } ?>">
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <lable>Your photo</lable>
                                                                <input type="file" class="form-control"
                                                                       name="mem_pic">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <lable>Job Title <span>*</span></lable>
                                                                <input type="text" class="form-control"
                                                                       name="mem_designation"
                                                                       value="<?php if (isset($_POST['mem_designation'])) {
                                                                           echo $_POST['mem_designation'];
                                                                       } ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <lable>Company Name <span>*</span></lable>
                                                                <input type="text" class="form-control"
                                                                       name="mem_cmp_name"
                                                                       value="<?php if (isset($_POST['mem_cmp_name'])) {
                                                                           echo $_POST['mem_cmp_name'];
                                                                       } ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <lable>Company Situated District<span>*</span></lable>
                                                                <script>
                                                                    function cityFiltermecmp(city) {
                                                                        $('#citymemcmp').load("cityFilterMemCmp.php", {city: city});
                                                                    }
                                                                </script>
                                                                <select class="form-control" name="mem_cmp_loc_district"
                                                                        data-show-subtext="true" data-live-search="true"
                                                                        onchange="cityFiltermecmp(this.value)">
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
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div id="citymemcmp">
                                                                <div class="form-group">
                                                                    <lable>Company Situated City<span>*</span></lable>
                                                                    <select class="form-control"
                                                                            name="mem_cmp_loc_city">
                                                                        <option disabled selected></option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-6">
                                                <fieldset>
                                                    <legend>Details of Spouse</legend>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <lable>Name</lable>
                                                            <input type="text" class="form-control"
                                                                   name="mem_spo_name"
                                                                   value="<?php if (isset($_POST['mem_spo_name'])) {
                                                                       echo $_POST['mem_spo_name'];
                                                                   } ?>">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <lable>Birthday</lable>
                                                                <input id="input-date" class="form-control" type="date"
                                                                       name="mem_spo_bdate" data-date-format='yy-mm-dd'
                                                                       value="<?php if (isset($_POST['mem_spo_bdate'])) {
                                                                           echo $_POST['mem_spo_bdate'];
                                                                       } ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <lable>NIC</lable>
                                                                <input type="text" class="form-control"
                                                                       name="mem_spo_nic"
                                                                       value="<?php if (isset($_POST['mem_spo_nic'])) {
                                                                           echo $_POST['mem_spo_nic'];
                                                                       } ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <lable>Phone Number</lable>
                                                                <input type="tel" class="form-control"
                                                                       name="mem_spo_tel"
                                                                       value="<?php if (isset($_POST['mem_spo_tel'])) {
                                                                           echo $_POST['mem_spo_tel'];
                                                                       } ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <lable>Job Title</lable>
                                                                <input type="text" class="form-control"
                                                                       name="mem_spo_designation"
                                                                       value="<?php if (isset($_POST['mem_spo_designation'])) {
                                                                           echo $_POST['mem_spo_designation'];
                                                                       } ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <lable>Company Name</lable>
                                                                <input type="text" class="form-control"
                                                                       name="mem_spo_cmp_name"
                                                                       value="<?php if (isset($_POST['mem_spo_cmp_name'])) {
                                                                           echo $_POST['mem_spo_cmp_name'];
                                                                       } ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <br>
                                                <fieldset>
                                                    <legend>Details of Children</legend>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <lable>Name</lable>
                                                            <input type="text" class="form-control"
                                                                   name="mem_ch1_name"
                                                                   value="<?php if (isset($_POST['mem_ch1_name'])) {
                                                                       echo $_POST['mem_ch1_name'];
                                                                   } ?>">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <lable>Gender <span>*</span></lable>
                                                                <select class="form-control" name="mem_ch1_gender">
                                                                    <option disabled selected></option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <lable>Birthday</lable>
                                                                <input id="input-date" class="form-control" type="date"
                                                                       name="mem_ch1_bdate" data-date-format='yy-mm-dd'
                                                                       value="<?php if (isset($_POST['mem_ch1_bdate'])) {
                                                                           echo $_POST['mem_ch1_bdate'];
                                                                       } ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <lable>Name</lable>
                                                            <input type="text" class="form-control"
                                                                   name="mem_ch2_name"
                                                                   value="<?php if (isset($_POST['mem_ch2_name'])) {
                                                                       echo $_POST['mem_ch2_name'];
                                                                   } ?>">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <lable>Gender <span>*</span></lable>
                                                                <select class="form-control" name="mem_ch2_gender">
                                                                    <option disabled selected></option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <lable>Birthday</lable>
                                                                <input id="input-date" class="form-control" type="date"
                                                                       name="mem_ch2_bdate" data-date-format='yy-mm-dd'
                                                                       value="<?php if (isset($_POST['mem_ch2_bdate'])) {
                                                                           echo $_POST['mem_ch2_bdate'];
                                                                       } ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <lable>Name</lable>
                                                            <input type="text" class="form-control"
                                                                   name="mem_ch3_name"
                                                                   value="<?php if (isset($_POST['mem_ch3_name'])) {
                                                                       echo $_POST['mem_ch3_name'];
                                                                   } ?>">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <lable>Gender <span>*</span></lable>
                                                                <select class="form-control" name="mem_ch3_gender">
                                                                    <option disabled selected></option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <lable>Birthday</lable>
                                                                <input id="input-date" class="form-control" type="date"
                                                                       name="mem_ch3_bdate" data-date-format='yy-mm-dd'
                                                                       value="<?php if (isset($_POST['mem_ch3_bdate'])) {
                                                                           echo $_POST['mem_ch3_bdate'];
                                                                       } ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <br>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-primary pull-right"
                                                           style="float: right;" value="Submit Details">
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
<script>
    $(document).ready(function () {
        $('#card_id_num').keyup(function () {
            var query = $(this).val();
            if (query != '') {
                $.ajax({
                    url: "cardSearch.php",
                    method: "POST",
                    data: {query: query},
                    success: function (data) {
                        $('#cardList').fadeIn();
                        $('#cardList').html(data);
                    }
                });
            }
        });
        $(document).on('click', 'li', function () {
            $('#card_id_num').val($(this).text());
            $('#cardList').fadeOut();
        });
        $("#card_id_num").focusout(function () {
            $('#cardList').fadeOut();
        });
    });
</script>
</body>
</html>
