<?php include "modules/head.php"; ?>
<?php include_once '../models/dbConfig.php';
$myCon = new dbConfig();
$myCon->connect(); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12" style="background: #fff;">
                <?php include_once 'controllers/outletController.php'; ?>
                <?php
                $query = "SELECT o.*,m.me_name,d.d_name,c.c_name FROM outlets o LEFT JOIN merchant m  ON o.me_id=m.me_id LEFT JOIN sl_district d ON o.out_district=d.d_id LEFT JOIN sl_city c ON o.out_city=c.c_id WHERE o.out_status='active' AND o.out_id='".$_GET['out_id']."'";

            $result = $myCon->query($query);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary pull-right"
                               style="float: right;margin-top: -50px" value="Update Outlet">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Outlet Details</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <script>
                                            function catFilter(cat) {
                                                $('#sub').load("catFilter.php", {cat: cat});
                                            }
                                        </script>
                                        <lable>Mechant <span>*</span></lable>
                                        <select class="form-control" name="me_id">
                                            <option  selected value="<?php echo $row['me_id'] ?>"><?php echo $row['me_name'] ?></option>
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
                                            <option  selected value="<?php echo $row['out_district'] ?>"><?php echo $row['d_name'] ?></option>
                                            <?php

                                            $querydis = "SELECT * FROM sl_district";
                                            $resultdis = $myCon->query($querydis);

                                            while ($rowdis = mysqli_fetch_assoc($resultdis)) {

                                                ?>
                                                <option value="<?php echo $rowdis['d_id'] ?>"><?php echo $rowdis['d_name'] ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                    <div id="city">
                                        <div class="form-group">
                                            <lable>City <span>*</span></lable>
                                            <select class="form-control" name="me_city">
                                                <option selected value="<?php echo $row['out_city'] ?>"><?php echo $row['c_name'] ?></option>
                                                <?php

                                                $querycity = "SELECT * FROM sl_city WHERE d_id='".$row['out_district']."'";
                                                $resultcity = $myCon->query($querycity);
                                                while ($rowcity  = mysqli_fetch_assoc($resultcity)) {

                                                    ?>
                                                    <option value="<?php echo $rowcity['c_id'] ?>"><?php echo $rowcity['c_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <lable>Email <span>*</span></lable>
                                        <input type="email" class="form-control" name="out_email"
                                        value="<?php echo $row['out_email'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <lable>Hotline <span>*</span></lable>
                                        <input type="tel" class="form-control" name="out_hotline"
                                               value="<?php echo $row['out_hotline'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <lable>Address <span>*</span></lable>
                                        <textarea class="form-control" name="out_address"><?php echo $row['out_address'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <lable>Longitude,Latitude</lable>
                                        <input type="tel" class="form-control" name="out_log_lat"
                                               value="<?php echo $row['out_log_lat'] ?>">
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
                                            <option selected value="<?php echo $row['out_cont_prsn_title'] ?>"><?php echo $row['out_cont_prsn_title'] ?></option>
                                            <option value="Mr">Mr</option>
                                            <option value="Mis">Mis</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <lable>Designation <span>*</span></lable>
                                        <select class="form-control" name="out_cont_prsn_desig">
                                            <option selected value="<?php echo $row['out_cont_prsn_desig'] ?>"><?php echo $row['out_cont_prsn_desig'] ?></option>
                                            <option value="Manager">Manager</option>
                                            <option value="Officer">Officer</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <lable>Name <span>*</span></lable>
                                        <input type="text" class="form-control" name="out_cont_prsn" value="<?php echo $row['out_cont_prsn'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <lable>Phone Number <span>*</span></lable>
                                        <input type="text" class="form-control" name="out_cont_prsn_mobile" value="<?php echo $row['out_cont_prsn_mobile'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <lable>Email <span>*</span></lable>
                                        <input type="email" class="form-control" name="out_cont_prsn_email" value="<?php echo $row['out_cont_prsn_email'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="out_id" value="<?php echo $row['out_id'];?>">
                </form>
                <?php }?>
            </div>

        </div>

    </div>
<?php include_once 'modules/footer_js.php' ?>