<?php include "modules/head.php"; ?>
<?php include_once '../models/dbConfig.php';
$myCon = new dbConfig();
$myCon->connect(); ?>
<div class="container">
    <?php include_once 'controllers/merchantController.php' ?>
    <form action="" method="post" enctype="multipart/form-data">
        <?php
        $query = "SELECT c.*,d.*,m.*,i.*,cat.* ,subcat.me_sub_cat_name FROM merchant m LEFT JOIN sl_city c
                         ON m.me_city=c.c_id LEFT  JOIN sl_district d ON m.me_district=d.d_id LEFT JOIN images i 
                             ON m.me_id = i.ref_id AND i.img_type_id=1 LEFT JOIN me_category cat 
                             ON m.me_cat_id=cat.me_cat_id LEFT JOIN me_sub_category subcat ON m.me_sub_cat_id=subcat.me_sub_cat_id WHERE m.me_id='" . $_GET['me_id'] . "' AND m.me_status='active'";

        $result = $myCon->query($query);
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
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
                                    <option selected
                                            value="<?php echo $row['me_cat_id'] ?>"
                                    ><?php echo $row['me_cat_name'] ?></option>
                                    <?php
                                    $querycat = "SELECT * FROM me_category WHERE me_cat_status='active'";
                                    $resultcat = $myCon->query($querycat);
                                    while ($row1 = mysqli_fetch_assoc($resultcat)) {
                                        ?>
                                        <option value="<?php echo $row1['me_cat_id'] ?>"><?php echo $row1['me_cat_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div id="sub">
                                <div class="form-group">
                                    <lable>Sub Category <span>*</span></lable>
                                    <select class="form-control"
                                            name="me_sub_cat_id">
                                        <option selected
                                                value="<?php echo $row['me_sub_cat_id'] ?>"><?php echo $row['me_sub_cat_name'] ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <lable>Name <span>*</span></lable>
                                <input type="text" class="form-control"
                                       name="me_name"
                                       value="<?php echo $row['me_name'] ?>">
                            </div>
                            <div class="form-group">
                                <lable>District <span>*</span></lable>
                                <script>
                                    function cityFilter(city) {
                                        $('#city').load("cityFilter.php", {city: city});
                                    }
                                </script>
                                <select class="form-control" name="me_district"
                                        data-show-subtext="true"
                                        data-live-search="true"
                                        onchange="cityFilter(this.value)">
                                    <option selected
                                            value="<?php echo $row['me_district']; ?>"><?php echo $row['d_name']; ?></option>
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
                                        <option selected
                                                value="<?php echo $row['me_city']; ?>"><?php echo $row['c_name']; ?></option>
                                        <?php $querycityup = "SELECT * FROM sl_city WHERE d_id='" . $row['me_district'] . "'";
                                        $resultcityup = $myCon->query($querycityup);
                                        while ($rowcityup = mysqli_fetch_assoc($resultcityup)) {
                                            ?>
                                            <option value="<?php echo $rowcityup['c_id']; ?>"><?php echo $rowcityup['c_name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <lable>Email <span>*</span></lable>
                                <input type="email" class="form-control"
                                       value="<?php echo $row['me_email']; ?>"
                                       name="me_email"
                                >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <lable>Hotline <span>*</span></lable>
                                <input type="tel" class="form-control"
                                       value="<?php echo $row['me_hotline']; ?>"
                                       name="me_hotline"
                                >
                            </div>
                            <div class="form-group">
                                <lable>Website URL</lable>
                                <input type="url" class="form-control"
                                       value="<?php echo $row['me_website']; ?>"
                                       name="me_website"
                                >
                            </div>
                            <div class="form-group">
                                <lable>Outlet Count <span>*</span></lable>
                                <input type="text" class="form-control"
                                       value="<?php echo $row['me_no_outlets']; ?>"
                                       name="me_no_outlets"
                                >
                            </div>
                            <div class="form-group">
                                <lable>Address <span>*</span></lable>
                                <textarea class="form-control"
                                          name="me_address"><?php echo $row['me_address']; ?></textarea>
                            </div>
                            <div class="col-md-3">
                                <img src="../uploads/merchants/<?php echo $row['img_path']; ?>"
                                     style="width:100px" alt="">
                            </div>
                            <div class="form-group">
                                <lable>Logo (400 x 230 px) <span>*</span></lable>
                                <input type="file" class="form-control"
                                       name="me_logo"
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
                                <select class="form-control"
                                        name="me_cont_prsn_title">
                                    <option selected
                                            value="<?php echo $row['me_cont_prsn_title']; ?>"><?php echo $row['me_cont_prsn_title']; ?></option>
                                    <option value="Mr">Mr</option>
                                    <option value="Mis">Mis</option>
                                    <option value="Ms">Ms</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <lable>Designation <span>*</span></lable>
                                <select class="form-control"
                                        name="me_cont_prsn_desig">
                                    <option selected
                                            value="<?php echo $row['me_cont_prsn_desig']; ?>"><?php echo $row['me_cont_prsn_desig']; ?></option>
                                    <option value="Manager">Manager</option>
                                    <option value="Officer">Officer</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <lable>Name <span>*</span></lable>
                                <input type="text" class="form-control"
                                       name="me_cont_prsn"
                                       value="<?php echo $row['me_cont_prsn']; ?>">
                            </div>
                            <div class="form-group">
                                <lable>Phone Number <span>*</span></lable>
                                <input type="text" class="form-control"
                                       name="me_cont_prsn_phone"
                                       value="<?php echo $row['me_cont_prsn_phone']; ?>">
                            </div>
                            <div class="form-group">
                                <lable>Email <span>*</span></lable>
                                <input type="email" class="form-control"
                                       name="me_cont_prsn_email"
                                       value="<?php echo $row['me_cont_prsn_email']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>Second Contact person(Optional)</h5>
                            <div class="form-group">
                                <lable>Title</lable>
                                <select class="form-control"
                                        name="me_se_cont_prsn_title">
                                    <option selected
                                            value="<?php echo $row['me_se_cont_prsn_title']; ?>"><?php echo $row['me_se_cont_prsn_title']; ?></option>

                                    <option value="Mr">Mr</option>
                                    <option value="Mis">Mis</option>
                                    <option value="Ms">Ms</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <lable>Designation</lable>
                                <select class="form-control"
                                        name="me_se_cont_prsn_desig">
                                    <option selected
                                            value="<?php echo $row['me_se_cont_prsn_desig']; ?>"><?php echo $row['me_se_cont_prsn_desig']; ?></option>
                                    <option value="Manager">Manager</option>
                                    <option value="Officer">Officer</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <lable>Name</lable>
                                <input type="text" class="form-control"
                                       name="me_se_cont_prsn"
                                       value="<?php echo $row['me_se_cont_prsn']; ?>"
                                >
                            </div>
                            <div class="form-group">
                                <lable>Phone Number</lable>
                                <input type="text" class="form-control"
                                       name="me_se_cont_prsn_phone"
                                       value="<?php echo $row['me_se_cont_prsn_phone']; ?>">
                            </div>
                            <div class="form-group">
                                <lable>Email</lable>
                                <input type="email" class="form-control"
                                       name="me_se_cont_prsn_email"
                                       value="<?php echo $row['me_se_cont_prsn_email']; ?>">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="me_id" value="<?php echo $_GET['me_id']; ?>">
            <input type="hidden" name="ref_id" value="<?php echo $_GET['me_id']; ?>">
            <input type="hidden" name="img_type_id"
                   value="1">
            <input type="hidden" name="img_path_up"
                   value="<?php echo $row['img_path']; ?>">
        <?php } ?>
        <input type="hidden" name="action" value="update">
        <div class="form-group">
            <input type="submit" class="btn btn-primary pull-right"
                   style="float: right;margin-top: -10px"
                   value="Update Details">
        </div>
    </form>
</div>
