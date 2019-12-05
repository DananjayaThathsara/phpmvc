<?php include "modules/head.php"; ?>
<?php include_once '../models/dbConfig.php';
$myCon = new dbConfig();
$myCon->connect(); ?>
<div class="container">
    <?php include_once 'controllers/memberController.php'; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <?php $query = "SELECT i.img_path,i.img_type_id,c.c_name as live_city,d.d_name as live_dis, c1.c_name as cmp_city,d1.d_name as cmp_dis,d1.d_id as cmp_dis_id,m.*,ml.mem_pword
                            FROM member m 
                            LEFT JOIN mem_login ml ON m.mem_id=ml.mem_id
                            LEFT JOIN sl_district d ON m.mem_living_district=d.d_id
                            LEFT JOIN sl_city c ON m.mem_living_city=c.c_id
                            LEFT JOIN sl_city c1 ON m.mem_cmp_loc_city=c1.c_id
                            LEFT JOIN sl_district d1 ON c1.d_id=d1.d_id
                            LEFT JOIN images  i ON m.mem_id=i.ref_id AND i.img_type_id=3
                            WHERE m.mem_id='" . $_GET['mem_id'] . "'";
                  $result = $myCon->query($query);
                  while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-6">
                    <div class="form-group">
                        <lable>Company Name <span>*</span></lable>
                        <input type="text" class="form-control" name="mem_cmp_name"
                               value="<?php echo $row['mem_cmp_name'] ?>">
                    </div>
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
                            <option selected
                                    value="<?php echo $row['cmp_dis_id'] ?>"><?php echo $row['cmp_dis'] ?></option>
                            <?php
                            $querydis = "SELECT * FROM sl_district";
                            $resultdis = $myCon->query($querydis);
                            while ($rowdis = mysqli_fetch_assoc($resultdis)) {
                                ?>
                                <option value="<?php echo $rowdis['d_id'] ?>"><?php echo $rowdis['d_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div id="citymemcmp">
                        <div class="form-group">
                            <lable>Company Situated City<span>*</span></lable>
                            <select class="form-control" name="mem_cmp_loc_city">
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
                    <div class="form-group">
                        <lable>Designation <span>*</span></lable>
                        <select class="form-control" name="mem_designation">
                            <option selected
                                    value="<?php echo $row['mem_designation'] ?>"> <?php echo $row['mem_designation'] ?></option>
                            <option value="Manager">Manager</option>
                            <option value="Officer">Officer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <lable>Gender <span>*</span></lable>
                        <select class="form-control" name="mem_gender">
                            <option selected
                                    value="<?php echo $row['mem_gender'] ?>"> <?php echo $row['mem_gender'] ?></option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <lable>Member Name <span>*</span></lable>
                        <input type="text" class="form-control" name="mem_name" value="<?php echo $row['mem_name'] ?>">
                    </div>
                    <div class="form-group">
                        <lable>Birthday<span>*</span></lable>
                        <input id="input-date" class="form-control" type="date"
                               name="mem_bdate" value="<?php echo $row['mem_bdate'] ?>">
                    </div>
                    <div class="form-group">
                        <lable>NIC<span>*</span></lable>
                        <input type="text" class="form-control"
                               name="mem_nic" value="<?php echo $row['mem_nic'] ?>">
                    </div>

                    <div class="form-group">
                        <img src="../uploads/member/profile/<?php echo $row['img_path'] ?>" alt="" class="img-responsive" width="200" height="200">
                        <br>
                        <lable>Your photo</lable>
                        <input type="file" class="form-control"
                               name="mem_pic">
                    </div>
                    <input type="hidden" name="img_path" value="<?php echo $row['img_path'] ?>">
                </div>
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
                            <option selected value="<?php echo $row['mem_living_district'] ?>"><?php echo $row['live_dis'] ?>
                            </option>
                            <?php
                            $querydis = "SELECT * FROM sl_district";
                            $resultdis = $myCon->query($querydis);
                            while ($rowdis = mysqli_fetch_assoc($resultdis)) {
                                ?>
                                <option value="<?php echo $rowdis['d_id'] ?>"><?php echo $rowdis['d_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div id="citymem">
                        <div class="form-group">
                            <lable>Living City <span>*</span></lable>
                            <select class="form-control" name="mem_living_city">
                                    <option selected value="<?php echo $row['mem_living_city']?>"><?php echo $row['live_city'] ?>
                                    </option>
                                <?php
                                $querylivingcityall="SELECT c_name,c_id FROM sl_city WHERE d_id='".$row['mem_living_district']."'";
                                $resultlivingcityall=$myCon->query($querylivingcityall);
                                while($rowlivingcityall=mysqli_fetch_assoc($resultlivingcityall)){?>
                                    ?>
                                    <option  value="<?php echo $rowlivingcityall['c_id'] ?>"><?php echo $rowlivingcityall['c_name'] ?>
                                    </option><?php }?>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <lable>Land Phone Number<span>*</span></lable>
                        <input type="text" class="form-control"
                               name="mem_tel" value="<?php echo $row['mem_tel'] ?>">
                    </div>
                    <div class="form-group">
                        <lable>Mobile Phone Number <span>*</span></lable>
                        <input type="text" class="form-control"
                               name="mem_mobile_phone" value="<?php echo $row['mem_mobile_phone'] ?>">
                    </div>
                    <div class="form-group">
                        <lable>Email <span>*</span></lable>
                        <input type="email" class="form-control" name="mem_email" value="<?php echo $row['mem_email'] ?>">
                    </div>
                    <div class="form-group">
                        <lable>Address <span>*</span></lable>
                        <textarea class="form-control" name="mem_address"><?php echo $row['mem_address'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <lable>Civil Status<span>*</span></lable>
                        <select class="form-control" name="mem_civil_status">
                            <option selected value="<?php echo $row['mem_civil_status'] ?>"><?php echo $row['mem_civil_status'] ?></option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <lable>Password <span>*</span></lable>
                        <?php include_once '../models/encryption.php';
                        $enObj=new encryption();
                        $pword=$enObj->decode($row['mem_pword']);
                        ?>
                        <input type="password" class="form-control" name="mem_pword" value="<?php echo $pword ?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary pull-right"
                               style="float: right;" value="Update Details">
                    </div>
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="mem_id" value="<?php echo $row['mem_id'] ?>">

                </div>
            <?php } ?>
        </div>
    </form>
</div>
<?php include_once 'modules/footer_js.php' ?>