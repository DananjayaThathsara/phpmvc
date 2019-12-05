<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<?php include "modules/head.php"; ?>
<?php include_once '../models/dbConfig.php';
$myCon = new dbConfig();
$myCon->connect(); ?>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Page -->
<?php if (isset($_GET['mem_id'])){
    $mem_id=$_GET['mem_id'];
}?>
            <div class="panel-body container-fluid" style="background: #fff;margin-top: -100px">
                <div class="example-wrap">
                    <div class="example">
                        <div class="col-md-12" style="background: #fff;">
                            <?php include_once 'controllers/memberController.php'; ?>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                        $query = "SELECT card.*,i.img_path,i.img_type_id,c.c_name as live_city,c.c_id as live_city_id,d.d_name as live_dis,d.d_id as live_dis_id, 
                                            c1.c_name as cmp_city,c1.c_id as cmp_id,d1.d_name as cmp_dis,d1.d_id as cmp_dis_id,m.*,ml.mem_pword
                                     FROM member m 
                                     LEFT JOIN mem_login ml ON m.mem_id=ml.mem_id
                                     LEFT JOIN sl_district d ON m.mem_living_district=d.d_id
                                     LEFT JOIN sl_city c ON m.mem_living_city=c.c_id
                                     LEFT JOIN sl_city c1 ON m.mem_cmp_loc_city=c1.c_id
                                     LEFT JOIN sl_district d1 ON c1.d_id=d1.d_id
                                     LEFT JOIN images  i ON m.mem_id=i.ref_id AND i.img_type_id=3
                                     LEFT JOIN card_active card ON m.mem_id=card.mem_id
                                     WHERE m.mem_id=$mem_id LIMIT 1";

                                        $result = $myCon->query($query);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
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
                                                                           value="<?php
                                                                           echo $row['card_id'];
                                                                           ?>" readonly>
                                                                    <div id="cardList"></div>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <lable>Form Number <span>*</span></lable>
                                                                    <input type="text" class="form-control"
                                                                           name="form_num"
                                                                           value="<?php
                                                                           echo $row['form_id'];
                                                                           ?>" readonly>
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
                                                                           value="<?php
                                                                           echo $row['mem_f_name'];
                                                                           ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <lable>Last Name <span>*</span></lable>
                                                                    <input type="text" class="form-control"
                                                                           name="mem_l_name"
                                                                           value="<?php
                                                                           echo $row['mem_l_name'];
                                                                           ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <lable>Gender <span>*</span></lable>
                                                                    <select class="form-control" name="mem_gender">
                                                                        <option selected
                                                                                value="<?php
                                                                                echo $row['mem_gender'];
                                                                                ?>"><?php
                                                                            echo $row['mem_gender'];
                                                                            ?></option>
                                                                        <option value="Male">Male</option>
                                                                        <option value="Female">Female</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <lable>Birthday<span>*</span></lable>
                                                                    <input id="input-date" class="form-control"
                                                                           type="date"
                                                                           name="mem_bdate" data-date-format='yy-mm-dd'
                                                                           value="<?php
                                                                           echo $row['mem_bdate'];
                                                                           ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <lable>NIC<span>*</span></lable>
                                                                    <input type="text" class="form-control"
                                                                           name="mem_nic"
                                                                           value="<?php
                                                                           echo $row['mem_nic'];
                                                                           ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <lable>Phone Number<span>*</span></lable>
                                                                    <input type="tel" class="form-control"
                                                                           name="mem_tel"
                                                                           value="<?php
                                                                           echo $row['mem_tel'];
                                                                           ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <lable>Civil Status <span>*</span></lable>
                                                                    <select class="form-control"
                                                                            name="mem_civil_status">
                                                                        <option selected><?php
                                                                            echo $row['mem_civil_status'];
                                                                            ?></option>
                                                                        <option value="Married">Married</option>
                                                                        <option value="Single">Single</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <lable>Address <span>*</span></lable>
                                                                    <textarea name="mem_address"
                                                                              class="form-control"><?php
                                                                        echo $row['mem_address'];
                                                                        ?></textarea>
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
                                                                    <select class="form-control"
                                                                            name="mem_living_district"
                                                                            data-show-subtext="true"
                                                                            data-live-search="true"
                                                                            onchange="cityFilter(this.value)">
                                                                        <option selected
                                                                                value="<?php echo $row['live_dis_id'] ?>"><?php echo $row['live_dis'] ?></option>
                                                                        <?php
                                                                        $querydis = "SELECT * FROM sl_district";
                                                                        $resultdis = $myCon->query($querydis);
                                                                        while ($rowdis = mysqli_fetch_assoc($resultdis)) {
                                                                            ?>
                                                                            <option value="<?php echo $rowdis['d_id'] ?>"><?php echo $rowdis['d_name'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div id="citymem">
                                                                    <div class="form-group">
                                                                        <lable>Living City <span>*</span></lable>
                                                                        <select class="form-control"
                                                                                name="mem_living_city">
                                                                            <option selected
                                                                                    value="<?php echo $row['live_city_id'] ?>"><?php echo $row['live_city'] ?></option>
                                                                            <?php
                                                                            $querycity = "SELECT * FROM sl_city WHERE d_id='" . $row['live_dis_id'] . "'";
                                                                            $resultcity = $myCon->query($querycity);
                                                                            while ($rowcity = mysqli_fetch_assoc($resultcity)) {
                                                                                ?>
                                                                                <option value="<?php echo $rowcity['c_id'] ?>"><?php echo $rowcity['c_name'] ?></option>
                                                                            <?php } ?>
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
                                                                           value="<?php
                                                                           echo $row['mem_email'];
                                                                           ?>">
                                                                </div>

                                                            </div>
                                                            <div class="col-md-6">
                                                                <img src="../uploads/member/profile/<?php echo $row['img_path']; ?>"
                                                                     alt="" width="100" height="100">
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
                                                                           value="<?php
                                                                           echo $row['mem_designation'];
                                                                           ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <lable>Company Name <span>*</span></lable>
                                                                    <input type="text" class="form-control"
                                                                           name="mem_cmp_name"
                                                                           value="<?php
                                                                           echo $row['mem_cmp_name'];
                                                                           ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <lable>Company Situated District<span>*</span>
                                                                    </lable>
                                                                    <script>
                                                                        function cityFiltermecmp(city) {
                                                                            $('#citymemcmp').load("cityFilterMemCmp.php", {city: city});
                                                                        }
                                                                    </script>
                                                                    <select class="form-control"
                                                                            name="mem_cmp_loc_district"
                                                                            data-show-subtext="true"
                                                                            data-live-search="true"
                                                                            onchange="cityFiltermecmp(this.value)">
                                                                        <option selected
                                                                                value="<?php echo $row['cmp_dis_id'] ?>"><?php echo $row['cmp_dis'] ?></option>
                                                                        <?php
                                                                        $querycmpdis = "SELECT * FROM sl_district";
                                                                        $resultcmpdis = $myCon->query($querycmpdis);
                                                                        while ($rowcmpdis = mysqli_fetch_assoc($resultcmpdis)) {
                                                                            ?>
                                                                            <option value="<?php echo $rowcmpdis['d_id'] ?>"><?php echo $rowcmpdis['d_name'] ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div id="citymemcmp">
                                                                    <div class="form-group">
                                                                        <lable>Company Situated City<span>*</span>
                                                                        </lable>
                                                                        <select class="form-control"
                                                                                name="mem_cmp_loc_city">
                                                                            <option selected
                                                                                    value="<?php echo $row['mem_cmp_loc_city'] ?>"><?php echo $row['cmp_city'] ?></option>
                                                                            <?php
                                                                            $querycity = "SELECT * FROM sl_city WHERE d_id='" . $row['cmp_dis_id'] . "'";
                                                                            $resultcity = $myCon->query($querycity);
                                                                            while ($rowcity = mysqli_fetch_assoc($resultcity)) {
                                                                                ?>
                                                                                <option value="<?php echo $rowcity['c_id'] ?>"><?php echo $rowcity['c_name'] ?></option>
                                                                            <?php } ?>
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
                                                                       value="<?php
                                                                       echo $row['mem_spo_name'];
                                                                       ?>">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <lable>Birthday</lable>
                                                                    <input id="input-date" class="form-control"
                                                                           type="date"
                                                                           name="mem_spo_bdate"
                                                                           data-date-format='yy-mm-dd'
                                                                           value="<?php
                                                                           echo $row['mem_spo_bdate'];
                                                                           ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <lable>NIC</lable>
                                                                    <input type="text" class="form-control"
                                                                           name="mem_spo_nic"
                                                                           value="<?php
                                                                           echo $row['mem_spo_nic'];
                                                                           ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <lable>Phone Number</lable>
                                                                    <input type="tel" class="form-control"
                                                                           name="mem_spo_tel"
                                                                           value="<?php
                                                                           echo $row['mem_spo_tel'];
                                                                           ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <lable>Job Title</lable>
                                                                    <input type="text" class="form-control"
                                                                           name="mem_spo_designation"
                                                                           value="<?php
                                                                           echo $row['mem_spo_designation'];
                                                                           ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <lable>Company Name</lable>
                                                                    <input type="text" class="form-control"
                                                                           name="mem_spo_cmp_name"
                                                                           value="<?php
                                                                           echo $row['mem_spo_cmp_name'];
                                                                           ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <br>
                                                    <fieldset>
                                                        <legend>Details of Children</legend>
                                                        <?php
                                                        $queryCh = "SELECT * FROM mem_children WHERE mem_id=$mem_id AND mem_ch_status='active'";
                                                        $resultCh = $myCon->query($queryCh);
                                                        $countCh=mysqli_num_rows($resultCh);
                                                        if($countCh>=1){
                                                        $i = 0;
                                                        while ($rowCh = mysqli_fetch_assoc($resultCh)) {
                                                            $i++;
                                                            ?>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <lable>Name</lable>
                                                                    <input type="text" class="form-control"
                                                                           name="mem_ch<?php echo $i; ?>_name"
                                                                           value="<?php
                                                                           echo $rowCh['mem_ch_name'];
                                                                           ?>">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <lable>Gender <span>*</span></lable>
                                                                        <select class="form-control"
                                                                                name="mem_ch<?php echo $i; ?>_gender">
                                                                            <option  selected value="<?php
                                                                            echo $rowCh['mem_ch_gender'];
                                                                            ?>"><?php
                                                                                echo $rowCh['mem_ch_gender'];
                                                                                ?></option>
                                                                            <option value="Male">Male</option>
                                                                            <option value="Female">Female</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <lable>Birthday</lable>
                                                                        <input id="input-date" class="form-control"
                                                                               type="date"
                                                                               name="mem_ch<?php echo $i; ?>_bdate"
                                                                               data-date-format='yy-mm-dd'
                                                                               value="<?php
                                                                                   echo $rowCh['mem_ch_bdate'];
                                                                               ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        <?php }
                                                        }else{?>
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
                                                            <?php
                                                        }?>
                                                    </fieldset>
                                                    <br>
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-primary pull-right"
                                                               style="float: right;" value="Submit Details">
                                                    </div>
                                                    <input type="hidden" name="img_path" value="<?php echo $row['img_path']; ?>">
                                                    <input type="hidden" name="mem_id" value="<?php echo $row['mem_id']; ?>">
                                                    <input type="hidden" name="action" value="update">
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

<!-- End Page -->
<!-- Footer -->

<?php include_once 'modules/footer_js.php' ?>

</body>
</html>
