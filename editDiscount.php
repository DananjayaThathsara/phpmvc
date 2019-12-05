<?php include "modules/head.php"; ?>
<?php include_once '../models/dbConfig.php';
$myCon = new dbConfig();
$myCon->connect(); ?>
    <div class="container">
        <div class="panel-body container-fluid" style="background: #fff">
            <div class="example-wrap">
                <div class="example">
                    <div class="col-md-12" style="background: #fff;">
                        <?php include_once 'controllers/discountController.php' ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary pull-right"
                                       style="float: right;margin-top: -50px" value="Update Discount">
                            </div>
                            <?php
                            $query = "SELECT dis.*,m.me_name FROM discounts dis LEFT JOIN merchant m ON dis.me_id=m.me_id WHERE dis_status='active' AND me_dis_id='" . $_GET['me_dis_id'] . "'";
                            $result = $myCon->query($query);
                            while ($row = mysqli_fetch_assoc($result)) {

                                ?>
                                <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <lable>Mechant <span>*</span></lable>
                                        <select class="form-control" name="me_id">
                                            <option selected
                                                    value="<?php echo $row['me_id'] ?>"><?php echo $row['me_name'] ?></option>
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
                                        <input type="text" class="form-control" name="me_dis_rate"
                                               value="<?php echo $row['me_dis_rate'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <lable>Discout Discription</lable>
                                        <textarea class="form-control"
                                                  name="me_dis_dsp"><?php echo $row['me_dis_dsp'] ?></textarea>
                                    </div>

                                </div>
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" name="me_dis_id" value="<?php echo $row['me_dis_id']; ?>">
                                </div><?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php include_once 'modules/footer_js.php' ?>